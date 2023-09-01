<x-app-layout>
    <x-slot name="title">{{ user_page_title($user, "Season Comparison") }}</x-slot>

    <x-pages.page :logged-in-user="$loggedInUser">

        <div class="mt-4 mb-8 space-y-4">
            <x-user.user-nav :user="$user" active="seasons"/>

            <x-containers.box-primary class="space-y-3">
                <h2>Season Comparison</h2>

                <livewire:user.season-comparison-list
                    :user-id="$user->getId()"
                    lazy />

                </x-containers.box-primary>
        </div>

    </x-pages.page>
</x-app-layout>
