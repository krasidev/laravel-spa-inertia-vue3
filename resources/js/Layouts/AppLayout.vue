<template>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark border-bottom shadow-sm">
        <div class="container">
            <Link :href="$page.props.app.url" class="navbar-brand">
                {{ $page.props.app.name }}
            </Link>

            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <Link href="/dashboard" class="nav-link" :class="{ 'active': $page.component === 'Dashboard' }">
                            {{ $page.props.lang.menu.dashboard }}
                        </Link>
                    </li>
                    <template v-if="$page.props.auth.user">
                        <template v-if="hasRoleOrPermission('admin', 'users.index') || hasRoleOrPermission('admin', 'users.create')">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $page.props.lang.menu.users.text }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-start m-0">
                                    <template v-if="hasRoleOrPermission('admin', 'users.index')">
                                        <Link :href="route('users.index')" class="dropdown-item" :class="{ 'active': $page.component === 'Users/Index' }">
                                            {{ $page.props.lang.menu.users.index }}
                                        </Link>
                                    </template>
                                    <template v-if="hasRoleOrPermission('admin', 'users.create')">
                                        <Link :href="route('users.create')" class="dropdown-item" :class="{ 'active': $page.component === 'Users/Create' }">
                                            {{ $page.props.lang.menu.users.create }}
                                        </Link>
                                    </template>
                                </div>
                            </li>
                        </template>

                        <template v-if="hasRoleOrPermission('admin', 'roles.index') || hasRoleOrPermission('admin', 'roles.create')">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $page.props.lang.menu.roles.text }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-start m-0">
                                    <template v-if="hasRoleOrPermission('admin', 'roles.index')">
                                        <Link :href="route('roles.index')" class="dropdown-item" :class="{ 'active': $page.component === 'Roles/Index' }">
                                            {{ $page.props.lang.menu.roles.index }}
                                        </Link>
                                    </template>
                                    <template v-if="hasRoleOrPermission('admin', 'roles.create')">
                                        <Link :href="route('roles.create')" class="dropdown-item" :class="{ 'active': $page.component === 'Roles/Create' }">
                                            {{ $page.props.lang.menu.roles.create }}
                                        </Link>
                                    </template>
                                </div>
                            </li>
                        </template>

                        <template v-if="hasRoleOrPermission('admin', 'permissions.index')">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $page.props.lang.menu.permissions.text }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-start m-0">
                                    <Link :href="route('permissions.index')" class="dropdown-item" :class="{ 'active': $page.component === 'Permissions/Index' }">
                                        {{ $page.props.lang.menu.permissions.index }}
                                    </Link>
                                </div>
                            </li>
                        </template>
                    </template>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-uppercase">{{ $page.props.currentLocale }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-start m-0">
                            <template v-for="(properties, localeCode) in $page.props.localesOrder">
                                <a :href="properties.url" class="dropdown-item" :class="{ 'disabled': $page.props.currentLocale == localeCode }">
                                    {{ properties.native }}
                                    (<span class="text-uppercase">{{ localeCode }}</span>)
                                </a>
                            </template>
                        </div>
                    </li>

                    <template v-if="$page.props.auth.user">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $page.props.auth.user.name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end m-0" aria-labelledby="navbarDropdown">
                                <Link :href="route('profile.edit')" class="dropdown-item" :class="{ 'active': $page.component === 'Profile/Edit' }">
                                    <i class="fas fa-user text-dark me-1"></i>
                                    {{ $page.props.lang.menu.profile.edit }}
                                </Link>
                                <template v-if="route().has('logout')">
                                    <hr class="dropdown-divider">
                                    <Link :href="route('logout')" method="post" as="button" type="button" class="dropdown-item">
                                        <i class="fas fa-power-off text-dark me-1"></i>
                                        {{ $page.props.lang.menu.logout }}
                                    </Link>
                                </template>
                            </div>
                        </li>
                    </template>
                    <template v-else>
                        <li v-if="route().has('login')" class="nav-item">
                            <Link :href="route('login')" class="nav-link">
                                {{ $page.props.lang.menu.login }}
                            </Link>
                        </li>
                        <li v-if="route().has('register')" class="nav-item">
                            <Link :href="route('register')" class="nav-link">
                                {{ $page.props.lang.menu.register }}
                            </Link>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-3">
        <div class="container">
            <slot></slot>
        </div>
    </main>
</template>

<script>
    import { Link } from '@inertiajs/vue3';
    import { usePermission } from '../helpers';

    const { hasRoleOrPermission } = usePermission();

    export default {
        components: {
            Link
        },
        setup () {
            return {
                hasRoleOrPermission
            };
        },
        mounted () {
            if (this.$page.props.flash.success) {
                this.$swal({
                    icon: 'success',
                    title: this.$page.props.flash.success.title,
                    text: this.$page.props.flash.success.text,
                    confirmButtonText: this.$page.props.lang.messages.success['confirm-button-text'],
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'swal2-styled btn btn-primary'
                    }
                });
            }
        }
    }
</script>
