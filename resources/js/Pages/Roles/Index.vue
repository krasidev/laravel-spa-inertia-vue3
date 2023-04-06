<template>
    <AppLayout>
        <Head>
            <title>{{ lang.menu.roles.text }}</title>
        </Head>
        <div class="card shadow-sm">
            <div class="card-header bg-transparent">{{ lang.menu.roles.index }}</div>

            <div class="card-body">
                <DataTable class="align-middle">
                    <thead>
                        <tr>
                            <th>{{ lang.content.roles.table.headers.id }}</th>
                            <th>{{ lang.content.roles.table.headers.name }}</th>
                            <th>{{ lang.content.roles.table.headers.guard_name }}</th>
                            <th>{{ lang.content.roles.table.headers.readonly }}</th>
                            <th>{{ lang.content.roles.table.headers.created_at }}</th>
                            <th>{{ lang.content.roles.table.headers.updated_at }}</th>
                            <th>{{ lang.content.roles.table.headers.actions }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="role in roles">
                            <td>{{ role.id }}</td>
                            <td>{{ role.name }}</td>
                            <td>{{ role.guard_name }}</td>
                            <td class="text-center">
                                <i v-if="role.readonly" class="fas fa-lock text-danger"></i>
                                <i v-else class="fas fa-lock-open text-primary"></i>
                            </td>
                            <td>{{ role.created_at }}</td>
                            <td>{{ role.updated_at }}</td>
                            <td>
                                <div v-if="role.readonly == 0" class="btn-group btn-group-sm" role="group">
                                    <template v-if="hasRoleOrPermission('admin', 'roles.edit')">
                                        <DataTableLink :href="route('roles.edit', {role: role.id})" class="btn">
                                            <i class="fas fa-edit text-primary"></i>
                                        </DataTableLink>
                                    </template>
                                    <template v-if="hasRoleOrPermission('admin', 'roles.destroy')">
                                        <DataTableLink :href="route('roles.destroy', {role: role.id})" class="btn" action="delete">
                                            <i class="fas fa-trash text-danger"></i>
                                        </DataTableLink>
                                    </template>
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
    import { Head } from '@inertiajs/vue3';
    import DataTable from '../../Components/DataTable.vue';
    import DataTableLink from '../../Components/DataTableLink.vue';
    import { usePermission } from '../../helpers';

    const { hasRoleOrPermission } = usePermission();

    export default {
        components: {
            AppLayout,
            Head,
            DataTable,
            DataTableLink
        },
        setup () {
            return {
                hasRoleOrPermission
            };
        },
        props: {
            lang: Object,
            roles: Object
        }
    }
</script>
