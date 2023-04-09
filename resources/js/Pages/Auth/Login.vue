<template>
    <AuthLayout>
        <Head>
            <title>{{ lang.content.login.title }}</title>
        </Head>
        <div class="card shadow-sm">
            <div class="card-header bg-transparent">{{ lang.content.login.title }}</div>

            <div class="card-body">
                <form @submit.prevent="submit" style="max-width: 100%; width: 360px;">
                    <input type="hidden" name="_token" :value="$page.props.csrf_token">

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ lang.content.login.labels.email }}: <span class="text-danger">*</span></label>

                        <input type="email" v-model="user.email" id="email" class="form-control" :class="{ 'is-invalid': errors.email }" />

                        <div class="invalid-feedback" v-if="errors.email">
                            <strong>{{ errors.email }}</strong>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ lang.content.login.labels.password }}: <span class="text-danger">*</span></label>

                        <input type="password" v-model="user.password" id="password" class="form-control" :class="{ 'is-invalid': errors.password }" />

                        <div class="invalid-feedback" v-if="errors.password">
                            <strong>{{ errors.password }}</strong>
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" v-model="user.remember" id="remember" class="form-check-input">

                        <label for="remember" class="form-check-label">{{ lang.content.login.labels.remember }}</label>
                    </div>

                    <button type="submit" class="btn btn-outline-primary d-block w-100">{{ lang.content.login.buttons.login }}</button>

                    <template v-if="route().has('register')">
                        <Link :href="route('register')" class="btn btn-link d-block">{{ lang.content.login.buttons.register }}</Link>
                    </template>
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
                router.post(route('login'), this.user);
            }
        }
    }
</script>
