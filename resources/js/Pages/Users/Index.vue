<template>
    <AppLayout>
        <Head>
            <title>{{ lang.menu.users.text }}</title>
        </Head>
        <div class="card shadow-sm">
            <div class="card-header bg-transparent d-flex align-items-center">
                {{ lang.menu.users.index }}
                <div class="btn-group btn-group-sm flex-shrink-0 ms-auto" role="group">
                    <button type="button" class="btn p-0" data-bs-toggle="collapse" data-bs-target="#usersTableFilters" aria-controls="usersTableFilters" aria-expanded="false" aria-label="Toggle users table filters">
                        <i class="fas fa-filter text-primary"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <form id="usersTableFilters" class="collapse" @submit.prevent="submit">
                    <div class="row">
                        <div class="col-12 col-sm-4 mb-3">
                            <select v-model="filter.trashed" @change="submit()" class="form-control select2 users-table-filters">
                                <option value="0">{{ lang.content.users.table.filters.trashed.options.all }}</option>
                                <option value="1">{{ lang.content.users.table.filters.trashed.options.deleted }}</option>
                            </select>
                        </div>
                    </div>
                </form>

                <DataTable class="align-middle">
                    <thead>
                        <tr>
                            <th>{{ lang.content.users.table.headers.id }}</th>
                            <th>{{ lang.content.users.table.headers.name }}</th>
                            <th>{{ lang.content.users.table.headers.email }}</th>
                            <th>{{ lang.content.users.table.headers.roles }}</th>
                            <th>{{ lang.content.users.table.headers.created_at }}</th>
                            <th v-if="filter.trashed == 0">{{ lang.content.users.table.headers.updated_at }}</th>
                            <th v-else>{{ lang.content.users.table.headers.deleted_at }}</th>
                            <th>{{ lang.content.users.table.headers.actions }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users">
                            <td>{{ user.id }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.roles_name }}</td>
                            <td>{{ user.created_at }}</td>
                            <td v-if="filter.trashed == 0">{{ user.updated_at }}</td>
                            <td v-else>{{ user.deleted_at }}</td>
                            <td>
                                <div v-if="user.is_trashed" class="btn-group btn-group-sm" role="group">
                                    <DataTableLink :href="route('users.restore', {id: user.id, trashed: 1})" class="btn" action="restore">
                                        <i class="fas fa-trash-restore text-success"></i>
                                    </DataTableLink>
                                    <DataTableLink :href="route('users.force-delete', {id: user.id, trashed: 1})" class="btn" action="delete">
                                        <i class="fas fa-trash text-danger"></i>
                                    </DataTableLink>
                                </div>
                                <div v-else class="btn-group btn-group-sm" role="group">
                                    <DataTableLink :href="route('users.edit', {user: user.id})" class="btn">
                                        <i class="fas fa-edit text-primary"></i>
                                    </DataTableLink>
                                    <template v-if="$page.props.auth.user && $page.props.auth.user.id != user.id">
                                        <DataTableLink :href="route('users.destroy', {user: user.id})" class="btn" action="delete">
                                            <i class="fas fa-trash text-warning"></i>
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
            filter: Object,
            users: Object,
        },
        methods: {
            submit () {
                router.get(route('users.index'), this.filter);
            }
        }
    }
</script>
