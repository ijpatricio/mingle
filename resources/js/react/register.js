import registerMingle from "../register";

export default function registerReactMingle(name, Component) {
    console.log("registerReactMingle", name, Component);
    registerMingle("react", name, Component);
}
