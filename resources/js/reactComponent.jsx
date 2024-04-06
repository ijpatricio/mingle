import React from 'react'
import {createRoot} from 'react-dom/client'

const createComponent = (mingleId, wireId, Component) => {

    const
        el = document.getElementById(mingleId),
        wire = window.Livewire.find(wireId)

    if (!el) {
        throw new Error(`Element for type '${Component}' with id '${mingleId}' not found.`)
        return
    }

    el.dataset.reactApp = 'true'

    const root = createRoot(el)

    root.render(<Component wire={wire} wireId={wireId} mingleData={JSON.parse(el.dataset.mingleData)} />)
}

export { createComponent as createReact }
