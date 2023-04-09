<template>
    <AppLayout>
        <Head>
            <title>{{ lang.menu.users.text }}</title>
        </Head>
        <div class="card shadow-sm">
            <div class="card-header bg-transparent">{{ lang.menu.users.edit }}</div>

            <div class="card-body">
                <form @submit.prevent="submit">
                    <input type="hidden" name="_token" :value="$page.props.csrf_token">

                    <div class="row">
                        <div class="col-12 col-sm-4 mb-3">
                            <label for="name" class="form-label">{{ lang.content.users.labels.name }}: <span class="text-danger">*</span></label>

                            <input type="text" v-model="form.name" id="name" class="form-control" :class="{ 'is-invalid': errors.name }" />

                            <div class="invalid-feedback" v-if="errors.name">
                                <strong>{{ errors.name }}</strong>
                            </div>
                        </div>

                        <div class="col-12 col-sm-4 mb-3">
                            <label for="email" class="form-label">{{ lang.content.users.labels.email }}: <span class="text-danger">*</span></label>

                            <input type="email" v-model="form.email" id="email" class="form-control" :class="{ 'is-invalid': errors.email }" />

                            <div class="invalid-feedback" v-if="errors.email">
                                <strong>{{ errors.email }}</strong>
                            </div>
                        </div>

                        <div class="col-12 col-sm-4 mb-3">
                            <label for="role" class="form-label">{{ lang.content.users.labels.role }}: <span class="text-danger">*</span></label>

                            <select v-model="form.role" id="role" class="form-control" :class="{ 'is-invalid': errors.role }">
                                <option value="">{{ lang.content.users.placeholders.role }}</option>
                                <option v-for="role in roles" :value="role.id">{{ role.name }}</option>
                            </select>

                            <div class="invalid-feedback" v-if="errors.role">
                                <strong>{{ errors.role }}</strong>
                            </div>
                        </div>

                        <div class="col-12 col-sm-4 mb-3">
                            <label for="password" class="form-label">{{ lang.content.users.labels.password }}: <span class="text-danger">*</span></label>

                            <input type="password" v-model="form.password" id="password" class="form-control" :class="{ 'is-invalid': errors.password }" />

                            <div class="invalid-feedback" v-if="errors.password">
                                <strong>{{ errors.password }}</strong>
                            </div>
                        </div>

                        <div class="col-12 col-sm-4 mb-3">
                            <label for="password-confirm" class="form-label">{{ lang.content.users.labels.password_confirmation }}: <span class="text-danger">*</span></label>

                            <input type="password" v-model="form.password_confirmation" id="password-confirm" class="form-control" />
                        </div>
                    </div>

                    <hr class="mt-0">

                    <button type="submit" class="btn btn-primary">{{ lang.content.users.buttons.update }}</button>
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
            roles: Array,
            user: Object,
            errors: Object
        },
        data () {
            return {
                form: {
                    name: this.user.name,
                    email: this.user.email,
                    role: this.user.roles[0].id
                }
            };
        },
        methods: {
            submit () {
                router.put(route('users.update', {user: this.user.id}), this.form);
            }
        }
    }
</script>
