<template>
    <AppLayout>
        <Head>
            <title>{{ lang.menu.roles.text }}</title>
        </Head>
        <div class="card shadow-sm">
            <div class="card-header bg-transparent">{{ lang.menu.roles.edit }}</div>

            <div class="card-body">
                <form @submit.prevent="submit">
                    <input type="hidden" name="_token" :value="$page.props.csrf_token">

                    <div class="row">
                        <div class="col-12 col-sm-4 mb-3">
                            <label for="name" class="form-label">{{ lang.content.roles.labels.name }}: <span class="text-danger">*</span></label>

                            <input type="text" v-model="form.name" id="name" class="form-control" :class="{ 'is-invalid': errors.name }" />

                            <div class="invalid-feedback" v-if="errors.name">
                                <strong>{{ errors.name }}</strong>
                            </div>
                        </div>
                    </div>

                    <fieldset>
                        <label class="form-label">{{ lang.content.roles.legends.permissions }}:</label>

                        <hr class="mt-0">

                        <div class="row">
                            <div v-for="permission in permissions" class="col-12 col-sm-4 mb-3">
                                <div class="form-check">
                                    <input type="checkbox" v-model="form.permissions" :value="permission.id" class="form-check-input" :id="'permission-' + permission.id" />
                                    <label class="form-check-label" :for="'permission-' + permission.id">
                                        {{ lang.permissions[permission.name] }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <hr class="mt-0">

                    <button type="submit" class="btn btn-primary">{{ lang.content.roles.buttons.update }}</button>
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
            role: Object,
            permissions: Array,
            errors: Object
        },
        data () {
            return {
                form: {
                    name: this.role.name,
                    permissions: this.role.permissions.map((permission) => permission.id)
                }
            };
        },
        methods: {
            submit () {
                router.put(route('roles.update', {role: this.role.id}), this.form);
            }
        }
    }
</script>
