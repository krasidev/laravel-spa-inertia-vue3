require('./bootstrap');
import { createApp, h } from 'vue';
import { createInertiaApp, usePage } from '@inertiajs/vue3';

createInertiaApp({
    title: (title) => usePage().props.app.name + (title ? ' - ' + title : ''),
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mixin({ methods: {route} })
            .mount(el)
    },
});
