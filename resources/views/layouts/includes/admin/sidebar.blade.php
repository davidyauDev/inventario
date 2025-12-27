@php
    $links = [
        [
            'header' => 'Principal',
        ],
        [
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-gauge',
            'href' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ],
        [
            'name' => 'Inventario',
            'icon' => 'fa-solid fa-boxes-stacked',
            'active' => request()->routeIs([
                'admin.categories.*',
                'admin.products.*',
                'admin.warehouses.*',
            ]),
            'submenu' => [
                [
                    'name' => 'Categorías',
                    'icon' => 'fa-solid fa-list',
                    'href' => route('admin.categories.index'),
                    'active' => request()->routeIs('admin.categories.*'),
                ],
                [
                    'name' => 'Productos',
                    'icon' => 'fa-solid fa-box',
                    'href' => route('admin.products.index'),
                    'active' => request()->routeIs('admin.products.*'),
                ],
                [
                    'name' => 'Almacenes',
                    'icon' => 'fa-solid fa-warehouse',
                    'href' => route('admin.warehouses.index'),
                    'active' => request()->routeIs('admin.warehouses.*'),
                ],
            ],
        ],

        [
            'name' => 'Compras',
            'icon' => 'fa-solid fa-cart-shopping',
            'active' => request()->routeIs([
                'admin.suppliers.*',
                'admin.purchase-orders.*',
                'admin.purchases.*'
            ]),
            'submenu' => [
                [
                    'name' => 'Proveedores',
                    'href' => route('admin.suppliers.index'),
                    'active' => request()->routeIs('admin.suppliers.*'),
                ],
                [
                    'name' => 'Ordenes de Compra',
                    'href' => route('admin.purchase-orders.index'),
                    'active' => request()->routeIs('admin.purchase-orders.*'),
                ],
                [
                    'name' => 'Compras',
                    'href' => route('admin.purchases.index'),
                    'active' => request()->routeIs('admin.purchases.*'),
                ],
            ],
        ],

        [
            'name' => 'Ventas',
            'icon' => 'fa-solid fa-cash-register',
            'active' => request()->routeIs([
                'admin.customers.*',
                'admin.quotes.*'
            ]),
            'submenu' => [
                [
                    'name' => 'Clientes',
                    'href' => route('admin.customers.index'),
                    'active' => request()->routeIs('admin.customers.*'),
                ],
                [
                    'name' => 'Cotizaciones',
                    'href' => route('admin.quotes.index'),
                    'active' => request()->routeIs('admin.quotes.*'),
                ],
                [
                    'name' => 'Ventas',
                    'href' => '',
                    'active' => false,
                ],
            ],
        ],
        [
            'name' => 'Movimientos',
            'icon' => 'fa-solid fa-arrows-rotate',
            'active' => false,
            'submenu' => [
                [
                    'name' => 'Entradas y Salidas',
                    'href' => '',
                    'active' => false,
                ],
                [
                    'name' => 'Transferencias',
                    'href' => '',
                    'active' => false,
                ],
            ],

        ],

        [
            'name' => 'Reportes',
            'icon' => 'fa-solid fa-chart-line',
            'active' => false,
            'href' => '',
        ],

        [
            'header' => 'Configuración',
        ],
        [
            'name' => 'Usuarios',
            'icon' => 'fa-solid fa-users',
            'href' => '',
            'active' => false,     
        ],
        [
            'name' => 'Roles',
            'icon' => 'fa-solid fa-shield-halved',
            'href' => '',
            'active' => false,     
        ],
        [
            'name' => 'Permisos',
            'icon' => 'fa-solid fa-lock',
            'href' => '',
            'active' => false,     
        ],
        [
            'name' => 'Ajustes',
            'icon' => 'fa-solid fa-gear',
            'href' => '',
            'active' => false,     
        ],

    ];
@endphp

<aside id="top-bar-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">

    <div class="h-full px-3 py-4 overflow-y-auto bg-neutral-primary-soft border-e border-default">

        <a href="https://flowbite.com/" class="flex items-center ps-2.5 mb-5">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 me-3" alt="Flowbite Logo" />
            <span class="self-center text-lg text-heading font-semibold whitespace-nowrap">
                Flowbite
            </span>
        </a>

        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
            <li>

                {{-- HEADER --}}
                @isset($link['header'])
                    <div class="px-2 py-2 text-xs font-semibold text-gray-500 uppercase">
                        {{ $link['header'] }}
                    </div>
                @else

                {{-- ITEM CON SUBMENU --}}
                @isset($link['submenu'])
                    <div x-data="{
                        open: {{ $link ['active'] ? 'true' : 'false'}}
                    }">

                        <button 
                            type="button"
                            @click="open = !open"
                            class="flex items-center w-full px-2 py-1.5 text-body rounded-base
                                        hover:bg-neutral-tertiary hover:text-fg-brand group">

                            <span class="w-5 h-5 inline-flex justify-center items-center text-gray-500">
                                <i class="{{ $link['icon'] }}"></i>
                            </span>

                            <span class="ms-3 whitespace-nowrap">
                                {{ $link['name'] }}
                            </span>

                            <!--<svg class="w-5 h-5 ml-auto text-gray-500"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2"
                                    d="m19 9-7 7-7-7" />
                            </svg>-->

                            <i
                                class="fa-solid text-sm ms-auto"
                                :class="open ? 'fa-chevron-up' : 'fa-chevron-down'">
                            </i>
                        </button>

                        <ul x-show="open" x-cloak class="mt-1 space-y-1">
                            @foreach ($link['submenu'] as $item)
                                <li>
                                    <a href="{{ $item['href'] }}"
                                        class="flex items-center px-2 py-1.5 text-body rounded-base
                                            hover:bg-neutral-tertiary hover:text-fg-brand {{ $item ['active'] ? 'bg-gray-100': ''}}">

                                        {{-- espacio icono --}}
                                        <span class="w-5 h-5 inline-flex justify-center items-center"></span>

                                        <span class="ms-3">
                                            {{ $item['name'] }}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </div>

                {{-- ITEM NORMAL --}}
                @else
                <a href="{{ $link['href'] }}"
                    class="flex items-center px-2 py-1.5 text-body rounded-base
                        hover:bg-neutral-tertiary hover:text-fg-brand
                        {{ $link['active'] ? 'bg-gray-100' : '' }}">

                    <span class="w-5 h-5 inline-flex justify-center items-center text-gray-500">
                        <i class="{{ $link['icon'] }}"></i>
                    </span>

                    <span class="ms-3 whitespace-nowrap">
                        {{ $link['name'] }}
                    </span>
                </a>
                @endisset
                @endisset

            </li>
            @endforeach
        </ul>
    </div>
</aside>




