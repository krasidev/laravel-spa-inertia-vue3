<template>
    <AppLayout>
        <Head>
            <title>{{ lang.menu.profile.edit }}</title>
        </Head>
        <div id="accordionProfile" class="accordion shadow-sm">
            <div class="accordion-item bg-white">
                <div class="accordion-header accordion-button bg-transparent px-3 py-2" :class="{ 'collapsed': errors.password || errors.current_password }" data-bs-toggle="collapse" data-bs-target="#collapseUpdate" :aria-expanded="(errors.password || errors.current_password ? 'false' : 'true')" aria-controls="collapseUpdate">
                    {{ lang.menu.profile.edit }}
                </div>

                <div id="collapseUpdate" class="accordion-collapse collapse" :class="{ 'show': !(errors.password || errors.current_password) }" data-bs-parent="#accordionProfile">
                    <div class="accordion-body p-3">
                        <form @submit.prevent="update">
                            <input type="hidden" name="_token" :value="$page.props.csrf_token">

                            <div class="row">
                                <div class="col-12 col-sm-4 mb-3">
                                    <label for="name" class="form-label">{{ lang.content.profile.labels.name }}: <span class="text-danger">*</span></label>

                                    <input type="text" v-model="form.name" id="name" class="form-control" :class="{ 'is-invalid': errors.name }" />

                                    <div class="invalid-feedback" v-if="errors.name">
                                        <strong>{{ errors.name }}</strong>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mb-3">
                                    <label for="email" class="form-label">{{ lang.content.profile.labels.email }}: <span class="text-danger">*</span></label>

                                    <input type="email" v-model="form.email" id="email" class="form-control" :class="{ 'is-invalid': errors.email }" />

                                    <div class="invalid-feedback" v-if="errors.email">
                                        <strong>{{ errors.email }}</strong>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mb-3">
                                    <label for="role" class="form-label">{{ lang.content.profile.labels.role }}: <span class="text-danger">*</span></label>

                                    <select v-model="form.role" id="role" class="form-control" :class="{ 'is-invalid': errors.role }">
                                        <option value="">{{ lang.content.profile.placeholders.role }}</option>
                                        <option v-for="role in roles" :value="role.id">{{ role.name }}</option>
                                    </select>

                                    <div class="invalid-feedback" v-if="errors.role">
                                        <strong>{{ errors.role }}</strong>
                                    </div>
                                </div>
                            </div>

                            <hr class="mt-0">

                            <button type="submit" class="btn btn-primary">{{ lang.content.profile.buttons.update }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-item bg-white">
                <div class="accordion-header accordion-button bg-transparent px-3 py-2" data-bs-toggle="collapse" :class="{ 'collapsed': !(errors.password || errors.current_password) }" data-bs-target="#collapseUpdatePassword" :aria-expanded="(errors.password || errors.current_password ? 'true' : 'false')" aria-controls="collapseUpdatePassword">
                    {{ lang.menu.profile['edit-password'] }}
                </div>

                <div id="collapseUpdatePassword" class="accordion-collapse collapse" :class="{ 'show': errors.password || errors.current_password }" data-bs-parent="#accordionProfile">
                    <div class="accordion-body p-3">
                        <form @submit.prevent="updatePassword">
                            <input type="hidden" name="_token" :value="$page.props.csrf_token">

                            <div class="row">
                                <div class="col-12 col-sm-4 mb-3">
                                    <label for="current-password" class="form-label">{{ lang.content.profile.labels.current_password }}: <span class="text-danger">*</span></label>

                                    <input type="password" v-model="form.current_password" id="current-password" class="form-control" :class="{ 'is-invalid': errors.current_password }" />

                                    <div class="invalid-feedback" v-if="errors.current_password">
                                        <strong>{{ errors.current_password }}</strong>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mb-3">
                                    <label for="password" class="form-label">{{ lang.content.profile.labels.password }}: <span class="text-danger">*</span></label>

                                    <input type="password" v-model="form.password" id="password" class="form-control" :class="{ 'is-invalid': errors.password }" />

                                    <div class="invalid-feedback" v-if="errors.password">
                                        <strong>{{ errors.password }}</strong>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4 mb-3">
                                    <label for="password-confirm" class="form-label">{{ lang.content.profile.labels.password_confirmation }}: <span class="text-danger">*</span></label>

                                    <input type="password" v-model="form.password_confirmation" id="password-confirm" class="form-control" />
                                </div>
                            </div>

                            <hr class="mt-0">

                            <button type="submit" class="btn btn-primary">{{ lang.content.profile.buttons['update-password'] }}</button>
                        </form>
                    </div>
                </div>
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
            errors: Object,
        },
        data () {
            return {
                form: {
                    name: this.user.name,
                    email: this.user.email,
                    role: this.user.role
                }
            };
        },
        methods: {
            update () {
                router.put(route('profile.update'), this.form, {
                    preserveState: false
                });
            },
            updatePassword () {
                router.put(route('profile.update-password'), this.form, {
                    preserveState: false
                });
            }
        }
    }
</script>
