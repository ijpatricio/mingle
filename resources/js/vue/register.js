export default function registerVueMingle(name, Component){
    window.Mingle.components[name] = {
        renderer: "vue",
        Component: Component,
    };
}