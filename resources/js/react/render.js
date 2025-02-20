import { createRoot } from 'react-dom/client';

export default function render(root_element, Component, props){
    const root = createRoot(root_element);

    // Create renderer function, which we can use to both initialize and update the component
    const renderComponent = (props) => {
        root.render(<Component {...props} />);
    }

    // Initialize the react component
    renderComponent(props);

    return {
        updateProps: renderComponent,
        unmount: () => root.unmount()
    }
}