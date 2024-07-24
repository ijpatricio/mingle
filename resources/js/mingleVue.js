import {createApp} from 'vue/dist/vue.esm-bundler'

const defaultOptions = {
    autoMount: false,
 };
 
const createComponent = (mingleId, wireId, component, options = defaultOptions) => {

    const
        el = document.getElementById(mingleId),
        wire = window.Livewire.find(wireId)

    if (!el) {
        return
    }

    if (el.__vue_app__) {
        return
    }

    let mingleData = {}
    if (el.dataset.mingleData) {
        mingleData = JSON.parse(el.dataset.mingleData)
    }

    let mingleBoot = {}
    if (el.dataset.mingleBoot) {
        mingleBoot = JSON.parse(el.dataset.mingleBoot)
    }

    let props = {}

    if (! mingleBoot.stopHydrateData === true) {
        props = {
            wire, wireId, mingleData,
        }
    }

    const app = createApp(component, props)

    if (options.autoMount) {
        app.mount(el)
    }

    return {
        app,
        node: el,
        mingleData,
    }
}

const registerVueMingle = (name, component, options = defaultOptions) => {
    return new Promise((resolve, reject) => {
        window.Mingle = window.Mingle || {
            Elements: {},
        };
  
        window.Mingle.Elements[name] = {
            boot(mingleId, wireId) {
                try {
                    const result = createComponent(mingleId, wireId, component, options);
                    if (result) {
                        resolve(result);
                    } else {
                        reject(new Error('Component creation failed'));
                    }
                } catch (error) {
                    reject(error);
                }
            },
        };
     });
}

export default registerVueMingle
