<x-app-layout>
    <x-slot name="title">{{ user_page_title($user, format_date($snowday->getDate(), DATE_FULL_ABBREV) . ' at ' . snowday_title($snowday, MTN_NICKNAME_ONLY)) }}</x-slot>

    <x-pages.page :logged-in-user="$loggedInUser">

        <div class="mt-4 mb-8 space-y-4">
            <x-user.user-nav :user="$user" active="snowdays"/>

            <x-containers.box-primary class="space-y-4">
                <div class="space-y-1">
                    <a class="ssq-default" href="{{ route_user_mountain($user, $snowday->getMountain()) }}">
                        <h2>{{ snowday_title($snowday, MTN_FULL_FULL) }}</h2>
                    </a>
                    <div>{{ format_date($snowday->getDate()) }}</div>
                </div>

                <div class="flex flex-col-reverse md:flex-row justify-between
                        items-center border-t border-b border-black-300 border-dotted">
                    <div class="py-3">
                        <livewire:user.snowday-stats :snowday-id="$snowday->getId()" lazy />
                    </div>
                    <div class="py-3 border-b border-black-300 border-dotted md:border-none">
                        <livewire:user.snowday-nav :snowday-id="$snowday->getId()" lazy />
                    </div>
                </div>

                <p class="text-lg">{{ $snowday->getNotes() }}</p>
            </x-containers.box-primary>
        </div>

    </x-pages.page>
</x-app-layout>
