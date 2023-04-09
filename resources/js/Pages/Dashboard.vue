<template>
    <AppLayout>
        <Head>
            <title>{{ lang.menu.dashboard }}</title>
        </Head>
        <div class="card shadow-sm">
            <div class="card-header bg-transparent">{{ lang.menu.dashboard }}</div>

            <div class="card-body">
                {{ lang.content.dashboard.content }}
            </div>
        </div>
    </AppLayout>
</template>

<script>
    import AppLayout from '../Layouts/AppLayout.vue';
    import { Head } from '@inertiajs/vue3';

    export default {
        components: {
            AppLayout,
            Head
        },
        props: {
            lang: Object
        }
    }
</script>
