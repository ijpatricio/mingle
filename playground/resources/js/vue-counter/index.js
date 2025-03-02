import mingle, { createMingle } from '@mingle/mingleVue'
import Counter from './Counter.vue'

const helloPlugin = {
    install: (app, options) => {
        app.config.globalProperties.$hello = (name) => {
            alert(`Hello ${name}!`)
        }
    }
}

// mingle('resources/js/vue-counter/index.js', Counter)

createMingle('resources/js/vue-counter/index.js', ({createApp, props, el, wire, mingleId, wireId, mingleData}) => {
    const app = createApp(Counter, props)
    app.use(helloPlugin)
    app.mount(el)
    return true
})
