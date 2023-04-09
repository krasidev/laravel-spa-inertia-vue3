<template>
    <AuthLayout>
        <Head>
            <title>{{ lang.content.register.title }}</title>
        </Head>
        <div class="card shadow-sm">
            <div class="card-header bg-transparent">{{ lang.content.register.title }}</div>

            <div class="card-body">
                <form @submit.prevent="submit" style="max-width: 100%; width: 360px;">
                    <input type="hidden" name="_token" :value="$page.props.csrf_token">

                    <div class="mb-3">
                        <label for="name" class="form-label">{{ lang.content.register.labels.name }}: <span class="text-danger">*</span></label>

                        <input type="text" v-model="user.name" id="name" class="form-control" :class="{ 'is-invalid': errors.name }" />

                        <div class="invalid-feedback" v-if="errors.name">
                            <strong>{{ errors.name }}</strong>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ lang.content.register.labels.email }}: <span class="text-danger">*</span></label>

                        <input type="email" v-model="user.email" id="email" class="form-control" :class="{ 'is-invalid': errors.email }" />

                        <div class="invalid-feedback" v-if="errors.email">
                            <strong>{{ errors.email }}</strong>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ lang.content.register.labels.password }}: <span class="text-danger">*</span></label>

                        <input type="password" v-model="user.password" id="password" class="form-control" :class="{ 'is-invalid': errors.password }" />

                        <div class="invalid-feedback" v-if="errors.password">
                            <strong>{{ errors.password }}</strong>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">{{ lang.content.register.labels.password_confirmation }}: <span class="text-danger">*</span></label>

                        <input type="password" v-model="user.password_confirmation" id="password-confirm" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-outline-primary d-block w-100">{{ lang.content.register.buttons.register }}</button>
                </form>
            </div>
        </div>
    </AuthLayout>
</template>

<script>
    import AuthLayout from '../../Layouts/AuthLayout.vue';
    import { Head, Link, router } from '@inertiajs/vue3';

    export default {
        components: {
            AuthLayout,
            Head,
            Link
        },
        props: {
            lang: Object,
            errors: Object
        },
        data() {
            return {
                user: {}
            }
        },
        methods: {
            submit() {
                router.post(route('register'), this.user);
            }
        }
    }
</script>
