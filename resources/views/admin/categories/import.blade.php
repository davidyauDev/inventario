<x-admin-layout 
title="Categorías"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categorías',
        'href' => route('admin.categories.index'),
    ],
    [
        'name' => 'Importar',
    ]
]">

    @livewire('admin.import-of-categories')

</x-admin-layout>