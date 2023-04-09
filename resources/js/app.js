require('./bootstrap');
import { createApp, h } from 'vue';
import { createInertiaApp, usePage } from '@inertiajs/vue3';
import VueSweetalert2 from 'vue-sweetalert2';

createInertiaApp({
    title: (title) => usePage().props.app.name + (title ? ' - ' + title : ''),
    resolve: name => require(`./Pages/${name}`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(VueSweetalert2)
            .mixin({ methods: {route} })
            .mount(el)
    },
});
