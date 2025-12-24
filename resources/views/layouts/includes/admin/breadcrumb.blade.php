@if (count($breadcrumbs))

    <nav @class('mb-4')>

        <ol class="flex flex-wrap items-center">

            @foreach ($breadcrumbs as $index => $item)

                <li class="text-sm leading-normal text-slate-700 flex items-center">

                    @isset($item['href'])

                        <a href="{{ $item['href'] }}" class="opacity-50">

                            {{ $item['name'] }}

                        </a>

                    @else

                        {{ $item['name'] }}

                    @endisset

                    @if ($index < count($breadcrumbs) - 1)

                        {{-- Si no es el último elemento, muestra la barra de separación --}}

                        <span class="mx-4 text-gray-400 font-bold text-lg">/</span>

                    @endif

                </li>

            @endforeach

        </ol>

        @if (count($breadcrumbs) > 1)

            <h6 class="font-bold">

                {{ end($breadcrumbs)['name'] }}

            </h6>

        @endif

    </nav>

@endif