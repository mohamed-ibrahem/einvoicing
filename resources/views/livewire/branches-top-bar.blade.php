@php
    use App\Domains\Branch\Filament\BranchResource;
@endphp

<x-filament::dropdown placement="bottom-end">
    <x-slot name="trigger" class="ml-4">
        <button
            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition"
            aria-label="{{ __('Branches Management') }}"
        >
            {{ Auth::user()->currentBranch->name }}

            <svg
                class="ml-2 -mr-0.5 h-4 w-4"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
            >
                <path
                    fill-rule="evenodd"
                    d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                    clip-rule="evenodd"
                />
            </svg>
        </button>
    </x-slot>

    <x-filament::dropdown.header
        color="secondary"
        tag="div"
    >
        {{ __('Manage Branch') }}
    </x-filament::dropdown.header>

    <x-filament::dropdown.list>
        <x-filament::dropdown.list.item
            color="secondary"
            tag="a"
            icon="heroicon-o-cog"
            :href="BranchResource::getUrl('edit', Auth::user()->currentBranch)"
        >
            {{ __('Branch Settings') }}
        </x-filament::dropdown.list.item>

        <x-filament::dropdown.list.item
            color="secondary"
            tag="a"
            icon="heroicon-o-plus-circle"
            :href="BranchResource::getUrl('create')"
        >
            {{ __('Create New Branch') }}
        </x-filament::dropdown.list.item>
    </x-filament::dropdown.list>

    <x-filament::dropdown.header
        color="secondary"
        tag="div"
    >
        {{ __('Switch Branches') }}
    </x-filament::dropdown.header>

    <x-filament::dropdown.list>
        @foreach (Auth::user()->branches as $branch)
            <x-filament::dropdown.list.item
                :color="Auth::user()->isCurrentBranch($branch) ? 'primary' : 'secondary'"
                :tag="Auth::user()->isCurrentBranch($branch) ? 'button' : 'a'"
                :href="route('update_current_branch', $branch)"
                icon="heroicon-o-check-circle"
            >
                {{ $branch->name }}
            </x-filament::dropdown.list.item>
        @endforeach
    </x-filament::dropdown.list>
</x-filament::dropdown>
