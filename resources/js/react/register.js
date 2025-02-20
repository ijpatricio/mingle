export default function registerReactMingle(name, Component){
    window.Mingle.components[name] = {
        renderer: "react",
        Component: Component,
    };
}