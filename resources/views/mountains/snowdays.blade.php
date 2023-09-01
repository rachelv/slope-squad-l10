<x-app-layout>
    <x-slot name="title">{{ mountain_page_title($mountain, 'All Snowdays') }}</x-slot>

    <x-pages.page :logged-in-user="$loggedInUser">

        <div class="mt-4 mb-8 space-y-4">
            <x-mountain.mountain-nav :mountain="$mountain"/>

            <x-containers.box-primary class="space-y-3">
                <h2>All Snowdays</h2>

                <livewire:mountain.snowday-list
                    :mountain-id="$mountain->getId()"
                    :season-id="$seasons->first()->getId()" />

            </x-containers.box-primary>
        </div>

    </x-pages.page>
</x-app-layout>
