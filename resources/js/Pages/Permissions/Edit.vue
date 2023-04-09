<template>
    <AppLayout>
        <Head>
            <title>{{ lang.menu.permissions.text }}</title>
        </Head>
        <div class="card shadow-sm">
            <div class="card-header bg-transparent">{{ lang.menu.permissions.edit }}</div>

            <div class="card-body">
                <form @submit.prevent="submit">
                    <input type="hidden" name="_token" :value="$page.props.csrf_token">

                    <div class="row">
                        <div class="col-12 col-sm-4 mb-3">
                            <label for="name" class="form-label">{{ lang.content.permissions.labels.name }}:</label>

                            <input type="text" :value="lang.permissions[permission.name]" id="name" class="form-control" readonly="readonly" />
                        </div>

                        <div class="col-12 col-sm-4 mb-3">
                            <label for="name" class="form-label">{{ lang.content.permissions.labels.guard_name }}:</label>

                            <input type="text" :value="permission.guard_name" id="guard_name" class="form-control" readonly="readonly" />
                        </div>
                    </div>

                    <fieldset>
                        <label class="form-label">{{ lang.content.permissions.legends.roles }}:</label>

                        <hr class="mt-0">

                        <div class="row">
                            <div v-for="role in roles" class="col-12 col-sm-4 mb-3">
                                <div class="form-check">
                                    <input type="checkbox" v-model="form.roles" :value="role.id" class="form-check-input" :id="'role-' + role.id" />
                                    <label class="form-check-label" :for="'role-' + role.id">
                                        {{ role.name }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <hr class="mt-0">

                    <button type="submit" class="btn btn-primary">{{ lang.content.permissions.buttons.update }}</button>
                </form>
            </div>
        </div>
    </AppLayout>
</template>

<script>
    import AppLayout from '../../Layouts/AppLayout.vue';
    import { Head, router } from '@inertiajs/vue3';

    export default {
        components: {
            AppLayout,
            Head
        },
        props: {
            lang: Object,
            permission: Object,
            roles: Array
        },
        data () {
            return {
                form: {
                    roles: this.permission.roles.map((role) => role.id)
                }
            };
        },
        methods: {
            submit () {
                router.put(route('permissions.update', {permission: this.permission.id}), this.form);
            }
        }
    }
</script>
