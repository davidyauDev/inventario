

@php
$links = [
[
'name' => 'Dashboard',
'icon' => 'fa-solid fa-gauge',
'href' => route('admin.dashboard'),
'active' => request()->routeIs('admin.dashboard'),
],
[
'header' => 'Administrar página',
],
[
'name' => 'Dashboard',
'icon' => 'fa-solid fa-gauge',
'active' => false,
'submenu' => [
['name' => 'Products', 'href' => '#'],
['name' => 'Billing', 'href' => '#'],
['name' => 'Invoice', 'href' => '#'],
],
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
                <button type="button"
                    class="flex items-center w-full px-2 py-1.5 text-body rounded-base
                                hover:bg-neutral-tertiary hover:text-fg-brand group"
                    aria-controls="dropdown-example"
                    data-collapse-toggle="dropdown-example">

                    <span class="w-5 h-5 inline-flex justify-center items-center text-gray-500">
                        <i class="{{ $link['icon'] }}"></i>
                    </span>

                    <span class="ms-3 whitespace-nowrap">
                        {{ $link['name'] }}
                    </span>

                    <svg class="w-5 h-5 ml-auto text-gray-500"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </button>

                <ul id="dropdown-example" class="hidden mt-1 space-y-1">
                    @foreach ($link['submenu'] as $item)
                    <li>
                        <a href="{{ $item['href'] }}"
                            class="flex items-center px-2 py-1.5 text-body rounded-base
                                hover:bg-neutral-tertiary hover:text-fg-brand">

                            {{-- espacio icono --}}
                            <span class="w-5 h-5 inline-flex justify-center items-center"></span>

                            <span class="ms-3">
                                {{ $item['name'] }}
                            </span>
                        </a>
                    </li>
                    @endforeach
                </ul>

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




