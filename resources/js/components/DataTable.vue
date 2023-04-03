<template>
    <DataTable class="table table-bordered">
        <slot></slot>
    </DataTable>
</template>

<script setup>
    import { usePage } from '@inertiajs/vue3';
    import DataTable from 'datatables.net-vue3';
    import DataTablesCore from 'datatables.net-bs5';
    import 'datatables.net-select-bs5';
    import 'datatables.net-responsive';

    DataTable.use(DataTablesCore);

    const lang = usePage().props.lang.datatables;

    DataTablesCore.$.fn.dataTable.defaults = Object.assign({}, DataTablesCore.$.fn.dataTable.defaults, {
        responsive: true,
        select: false,
        classes: {
            sLength: 'dataTables_length mb-3',
            sLengthSelect: 'form-control',
            sFilter: 'dataTables_filter mb-3',
            sFilterInput: 'form-control'
        },
        language: {
            lengthMenu: lang.lengthMenu,
            search: lang.search,
            searchPlaceholder: lang.searchPlaceholder,
            loadingRecords: lang.loadingRecords,
            emptyTable: lang.emptyTable,
            zeroRecords: lang.zeroRecords,
            info: lang.info,
            infoEmpty: lang.infoEmpty,
            infoFiltered: lang.infoFiltered,
            processing: '<div class="spinner-border" role="status"><span class="sr-only"></span></div>',
            paginate: {
                first: '<i class="fas fa-angle-double-left"></i>',
                previous: '<i class="fas fa-angle-left"></i>',
                next: '<i class="fas fa-angle-right"></i>',
                last: '<i class="fas fa-angle-double-right"></i>'
            }
        }
    });
</script>
