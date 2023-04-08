import { usePage } from "@inertiajs/vue3";

export function usePermission () {
    const hasRole = (name) => usePage().props.auth.user.roleNames.includes(name);
    const hasPermission = (name) => usePage().props.auth.user.permissionNames.includes(name);
    const hasRoleOrPermission = (role, permission) => hasRole(role) || hasPermission(permission);

    return { hasRole, hasPermission, hasRoleOrPermission };
}
