<template>
    <AppLayout>
        <Head>
            <title>{{ lang.menu.users.text }}</title>
        </Head>
        <div class="card shadow-sm">
            <div class="card-header bg-transparent">{{ lang.menu.users.index }}</div>

            <div class="card-body">
                <DataTable>
                    <thead>
                        <tr>
                            <th>{{ lang.content.users.table.headers.id }}</th>
                            <th>{{ lang.content.users.table.headers.name }}</th>
                            <th>{{ lang.content.users.table.headers.email }}</th>
                            <th>{{ lang.content.users.table.headers.created_at }}</th>
                            <th>{{ lang.content.users.table.headers.updated_at }}</th>
                            <th>{{ lang.content.users.table.headers.actions }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users">
                            <td>{{ user.id }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.created_at }}</td>
                            <td>{{ user.updated_at }}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group">
                                    <DataTableLink :href="route('users.edit', {user: user.id})" class="btn">
                                        <i class="fas fa-edit text-primary"></i>
                                    </DataTableLink>
                                    <template v-if="$page.props.auth.user && $page.props.auth.user.id != user.id">
                                        <DataTableLink :href="route('users.destroy', {user: user.id})" class="btn" action="delete">
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

    export default {
        components: {
            AppLayout,
            Head,
            DataTable,
            DataTableLink
        },
        props: {
            lang: Object,
            users: Object
        }
    }
</script>
