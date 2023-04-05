<template>
    <a @click.prevent="_action">
        <slot></slot>
    </a>
</template>

<script>
    import { router } from '@inertiajs/vue3';

    const actions = {
        delete: 'delete',
        restore: 'patch'
    };

    export default {
        props: {
            action: String,
            method: 'get'
        },
        methods: {
            _action () {
                if (this.action in actions) {
                    this.$swal({
                        icon: 'question',
                        title: this.$page.props.lang.datatables.messages[this.action].question.title,
                        text: this.$page.props.lang.datatables.messages[this.action].question.text,
                        confirmButtonText: this.$page.props.lang.datatables.messages[this.action].question['confirm-button-text'],
                        cancelButtonText: this.$page.props.lang.datatables.messages['cancel-button-text'],
                        showCancelButton: true,
                        buttonsStyling: false,
                        customClass: {
                            confirmButton: 'swal2-styled btn btn-danger me-1',
                            cancelButton: 'swal2-styled btn btn-primary ms-1'
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            router.visit(this.$el.href, {
                                method: actions[this.action]
                            });
                        }
                    });
                } else {
                    router.visit(this.$el.href, {
                        method: this.method
                    });
                }
            }
        }
    }
</script>