<?php

namespace App\Services\Sidebar;

class ItemGroup implements ItemInterface
{
    private string $title;
    private string $icon;
    private bool $active;
    private array $items = [];

    public function __construct(string $title, string $icon, bool $active = false)
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->active = $active;
    }

    public function add(ItemInterface $item): self
    {
        $this->items[] = $item;
        return $this;
    }

    public function render(): string
    {
        $open = $this->active ? 'true' : 'false';
        $itemsHtml = collect($this->items)
            ->map(function(ItemInterface $item){
                return '<li class="pl-4">' . $item->render() . '</li>';
            })->implode("\n");

        return <<<HTML
            <div x-data="{ open: {$open} }">

                <button
                    type="button"
                    @click="open = !open"
                    class="flex items-center justify-between w-full px-3 py-2
                        text-body rounded-base
                        hover:bg-neutral-tertiary hover:text-fg-brand">

                    <div class="flex items-center gap-4">
                        <span class="w-5 h-5 flex justify-center items-center text-gray-500">
                            <i class="{$this->icon}"></i>
                        </span>

                        <span class="whitespace-nowrap">
                            {$this->title}
                        </span>
                    </div>

                    <i class="fa-solid text-xs text-gray-500"
                    :class="open ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                </button>

                <ul x-show="open" x-cloak class="mt-1 space-y-1">
                    {$itemsHtml}
                </ul>

            </div>
        HTML;
    }
    
    public function authorize(): bool
    {
        return true;
    }
}