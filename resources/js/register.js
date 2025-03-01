export default function registerMingle(renderer_name, component_name, Component){
    window.Mingle.components[component_name] = {
        renderer: renderer_name,
        Component: Component,
    };
}