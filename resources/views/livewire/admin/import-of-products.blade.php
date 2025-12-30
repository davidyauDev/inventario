<div>
    <x-wire-card>
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">
            Importar productos desde Excel
        </h1>

        <x-wire-button blue wire:click="downloadTemplate">
            <i class="fas fa-file-excel"></i>
            Descargar plantilla
        </x-wire-button>

        <p class="text-sm text-gray-500 mt-1">
            Completa la plantilla con los datos de tus productos y súbelas aca.
        </p>

        <div class="mt-4">
            <input type="file" accept=".xlsx, .xls" wire:model="file" />
            <x-input-error for="file" class="mt-2"/>

        </div>

        <div class="mt-4">
            <x-wire-button 
                green 
                wire:click="importProducts"
                wire:loading.attr="disabled"
                wire:target="file">
                <i class="fas fa-upload mr-2"></i>
                Importar productos
            </x-wire-button>
        </div>
    </x-wire-card>

</div>
