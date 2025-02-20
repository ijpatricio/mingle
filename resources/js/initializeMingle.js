const defaultConfig = {
    renderers: {},
    maxRenderAttempts: 100,
    renderAttemptDelay: 100
}

export function initializeMingle(Livewire, config){
    // Initialize the Mingle Global
    window.Mingle = {
        Elements: {},
        components: {},
        config: {
            ...defaultConfig,
            ...config,
        },
    }

    // This hook is called whenever Livewire detects and initializes a component on the page
    // This includes when dynamic components are rendered. e.g. using Livewire Modals.
    Livewire.hook("component.init", async ({ component, cleanup }) => {
        const component_name = component.el.dataset.mingleComponent;

        if (! component_name) {
            return; // Not a Mingle component
        }

        // Although we are using @assets to load the js,
        // If it's a large component it can take some time to load.
        // So we loop until the component is loaded, or we give up after a certain number of attempts.
        let renderAttempts = 0;
        while(renderAttempts < config.maxRenderAttempts){
            try{
                createComponent(component, component_name);
            }catch(e){
                renderAttempts++;
                await new Promise(resolve => setTimeout(resolve, config.renderAttemptDelay));
            }
        }

        if(renderAttempts >= config.maxRenderAttempts){
            throw new Error(`MingleJs: Component '${component_name}' failed to render after ${config.maxRenderAttempts} attempts.`);
        }

        // Cleanup is called just before Livewire removes the element from the DOM
        cleanup(() => {
            window.Mingle.components[component_name].unmount();
            delete window.Mingle.components[component_name];
        })
    });


    // This is called whenever Livewire detects changes to the components HTML.
    // And allows us to update the component props, if the mingleData has changed.
    Livewire.hook("morph.updated", ({ component, el }) => {
        const mingle_element = window.Mingle.Elements[component.id];

        if (! mingle_element) {
            return; // Not a Mingle component
        }

        // Both sets of props are stored as JSON strings, so we can compare them directly.
        if(mingle_element.props === el.dataset.mingleData){
            return; // No prop changes
        }

        mingle_element.updateProps(JSON.parse(el.dataset.mingleData));
    });
}

/**
 *  Acts as a Middleman between Livewire and the Renderer methods.
 *  Making it easier for others to add their own custom renderers, without having to handle lots of logic themselves.
 */
function createComponent(livewire_component, component_name){
    // Fetch the component definition
    const component = window.Mingle.components[component_name];
    if (! component) {
        throw new Error(`MingleJs: Component '${component_name}' not found.`);
    }

    // Fetch the renderer function
    const renderer = window.Mingle.config.renderers[component.renderer];
    if (! renderer) {
        throw new Error(`MingleJs: Renderer '${component.renderer}' not found.`);
    }

    // Fetch the root element that the renderer will mount to.
    const root_element = livewire_component.el.querySelector('.mingle-root');
    if (! root_element) {
        throw new Error(`Mingle root element for component '${component_name}' not found.`);
    }

    // Parse the component props
    const component_props = JSON.parse(component.el.dataset.mingleData);

    try{
        // Create the component instance
        const component_instance = renderer(root_element, component.Component, {
            wire: livewire_component.$wire,
            ...component_props,
        });

        // Store the component instance so we can update, and unmount later.
        window.Mingle.Elements[livewire_component.id] = {
            ...component_instance,
            props: component.el.dataset.mingleData, // Store stringified props for comparison, on morph.updated.
        };
    }catch(e){
        throw new Error(`MingleJs: Failed to create component '${component_name}'. ${e.message}`);
    }
}
