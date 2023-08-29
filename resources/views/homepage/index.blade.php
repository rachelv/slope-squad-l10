<x-app-layout>
    <x-slot name="title">{{ page_title() }}</x-slot>
    <x-slot name="bgColor">bg-white</x-slot>

    <x-pages.page :logged-in-user="$loggedInUser">

        <div class="flex flex-col items-center my-8 space-y-10 text-center">
            <div class="space-y-6">
                <h1 class="font-semibold">Simple Ski Day Tracking For Avid Skiers</h1>
                <div class="space-y-2">
                    <p class="text-xl">Log your days, view your stats, and follow your friends.</p>
                    <p class="text-xl">No app, nothing fancy &mdash; just a nice way to remember your days on the snow.</p>
                </div>
            </div>
        </div>

    </x-pages.page>

</x-app-layout>
