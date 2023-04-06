<template>
    <AppLayout>
        <Head>
            <title>{{ lang.menu.permissions.text }}</title>
        </Head>
        <div class="card shadow-sm">
            <div class="card-header bg-transparent">{{ lang.menu.permissions.index }}</div>

            <div class="card-body">
                <DataTable class="align-middle">
                    <thead>
                        <tr>
                            <th>{{ lang.content.permissions.table.headers.id }}</th>
                            <th>{{ lang.content.permissions.table.headers.name }}</th>
                            <th>{{ lang.content.permissions.table.headers.guard_name }}</th>
                            <th>{{ lang.content.permissions.table.headers.created_at }}</th>
                            <th>{{ lang.content.permissions.table.headers.updated_at }}</th>
                            <th>{{ lang.content.permissions.table.headers.actions }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="permission in permissions">
                            <td>{{ permission.id }}</td>
                            <td>{{ lang.permissions[permission.name] }}</td>
                            <td>{{ permission.guard_name }}</td>
                            <td>{{ permission.created_at }}</td>
                            <td>{{ permission.updated_at }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <DataTableLink :href="route('permissions.edit', {permission: permission.id})" class="btn">
                                        <i class="fas fa-edit text-primary"></i>
                                    </DataTableLink>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </DataTable>
            </div>
        </div>
    </AppLayout>
</template>

<script>
    import AppLayout from '../../Layouts/AppLayout.vue';
    import { Head, router } from '@inertiajs/vue3';
    import DataTable from '../../Components/DataTable.vue';
    import DataTableLink from '../../Components/DataTableLink.vue';

    export default {
        components: {
            AppLayout,
            Head,
            DataTable,
            DataTableLink
        },
        props: {
            lang: Object,
            permissions: Object
        }
    }
</script>
