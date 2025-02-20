import { createApp } from 'vue';

export default function render(root_element, Component, props) {
    // Initialize the Vue Component
    const app = createApp(Component, props);
    const instance = app.mount(root_element);

    // Create update function to handle prop changes
    const renderComponent = (newProps) => {
        // In Vue 3, we need to update each prop individually
        for (const [key, value] of Object.entries(newProps)) {
            instance.$data[key] = value;
        }
    };

    return {
        updateProps: renderComponent,
        unmount: () => app.unmount()
    };
}