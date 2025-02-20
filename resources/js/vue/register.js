import registerMingle from "../register";

export default function registerVueMingle(name, Component){
    registerMingle("vue", name, Component);
}