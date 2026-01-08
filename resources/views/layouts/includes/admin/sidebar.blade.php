<aside
    id="top-bar-sidebar"
    class="fixed top-0 left-0 z-50 w-64 h-full
        bg-white
        transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">

    <div class="h-full px-3 py-4 overflow-y-auto border-e border-default">

    <a href="https://flowbite.com/" class="flex items-center ps-2.5 mb-5">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 me-3" alt="Flowbite Logo" />
            <span class="self-center text-lg text-heading font-semibold whitespace-nowrap">
                Flowbite
            </span>
        </a>

        <ul class="space-y-2 font-medium">
            @foreach ($itemsSidebar as $link)
                <li>
                    {!! $link->render() !!}
                </li>

            @endforeach
        </ul>
    </div>
</aside>




