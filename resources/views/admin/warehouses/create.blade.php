<x-admin-layout 
title="Almacenes"
:breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard'),
    ],
    [
        'name' => 'Almacenes',
        'href' => route('admin.warehouses.index'),
    ],
    [
        'name' => 'Nuevo',
    ]
]">
    <x-wire-card>
        <form action="{{route('admin.warehouses.store')}}" method="POST" class="space-y-4">

            @csrf
            <x-wire-input 
                label="Nombre" 
                name="name" 
                placeholder="Nombre del almacén" 
                value="{{old('name')}}" />

            <x-wire-input 
                label="Ubicación" 
                name="location" 
                placeholder="Ubicación del almacén" 
                value="{{old('location')}}" />

            <div class="flex justify-end">
                <x-button>
                    Guardar
                </x-button>

            </div>

            

    </x-wire-card>

</x-admin-layout>