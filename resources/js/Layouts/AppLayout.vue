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
                    
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <template v-if="$page.props.auth.user">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $page.props.auth.user.name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end m-0" aria-labelledby="navbarDropdown">
                                <Link :href="route('logout')" method="post" as="button" type="button" class="dropdown-item">{{ $page.props.lang.content.login.buttons.logout }}</Link>
                            </div>
                        </li>
                    </template>
                    <template v-else>
                        <li class="nav-item">
                            <Link :href="route('login')" class="nav-link">
                                {{ $page.props.lang.content.login.title }}
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link :href="route('register')" class="nav-link">
                                {{ $page.props.lang.content.register.title }}
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
    import { usePage, Link } from '@inertiajs/vue3';

    export default {
        components: {
            usePage,
            Link
        }
    }
</script>