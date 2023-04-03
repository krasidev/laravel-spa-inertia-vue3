<template>
    <AppLayout>
        <Head>
            <title>Dashboard</title>
        </Head>
        <div class="card shadow-sm">
            <div class="card-header bg-transparent">Dashboard</div>

            <div class="card-body">
                You are logged in!
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
        }
    }
</script>
