import { usePage } from "@inertiajs/vue3";

export function usePermission () {
    const hasRole = (name) => usePage().props.auth.user.roles.includes(name);
    const hasPermission = (name) => usePage().props.auth.user.permissions.includes(name);
    const hasRoleOrPermission = (role, permission) => hasRole(role) || hasPermission(permission);

    return { hasRole, hasPermission, hasRoleOrPermission };
}
