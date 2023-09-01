<x-app-layout>
    <x-slot name="title">{{ user_page_title($user, "All Mountain Stats") }}</x-slot>

    <x-pages.page :logged-in-user="$loggedInUser">

        <div class="mt-4 mb-8 space-y-4">
            <x-user.user-nav :user="$user" active="mountains"/>

            <x-containers.box-primary class="space-y-4">
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-3 md:col-span-1">
                        <div class="space-y-3">
                            <h2>All Mountains</h2>

                            <livewire:user.mountain-list
                                :user-id="$user->getId()"
                                season-id="0"
                                context="mountain" />
                        </div>
                    </div>
                    <div class="col-span-3 md:col-span-2">
                        <livewire:user.mountain-map
                            :user-id="$user->getId()"
                            season-id="0" />
                    </div>
                </div>
            </x-containers.box-primary>
        </div>

    </x-pages.page>
</x-app-layout>
