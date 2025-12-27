<x-admin-layout 
title="Ordenes de Compra"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Ordenes de Compra',
        
    ],
    [
        'name' => 'Nuevo',
        
    ]
]">


    @livewire('admin.purchase-order-create')


</x-admin-layout>