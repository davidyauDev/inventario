<x-admin-layout 
title="Reportes"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Productos con bajo stock',
        
    ]
]">

    @livewire('admin.datatables.low-stock-table')

</x-admin-layout>