import React from 'react'
import {createRoot} from 'react-dom/client'

const defaultOptions = {
    
 };

const createComponent = (mingleId, wireId, Component, options = defaultOptions) => {

    const
        el = document.getElementById(mingleId),
        wire = window.Livewire.find(wireId)

    if (! el) {
        throw new Error(`Element for type '${Component}' with id '${mingleId}' not found.`)
    }

    el.dataset.reactApp = 'true'

    const root = createRoot(el)

    let mingleData = JSON.parse(el.dataset.mingleData);

    root.render(<Component wire={wire} wireId={wireId} mingleData={mingleData} />)

    return {
        root,
        node: el,
        mingleData
    }
}

const registerReactMingle = (name, component, options = defaultOptions) => {
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

export default registerReactMingle
