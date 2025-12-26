<x-admin-layout 
title="Categorías"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categorías',
        
    ]
]">
    
    <x-slot name="action">
        <x-wire-button href="{{route('admin.categories.create')}}" blue>
            Nuevo

        </x-wire-button>
    </x-slot>

    @livewire('admin.datatables.category-table')

</x-admin-layout>