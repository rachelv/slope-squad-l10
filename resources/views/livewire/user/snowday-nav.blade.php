<div class="flex text-xs">
    @if ($prevSnowday->exists)
        <a href="{{ route_user_snowday($user, $prevSnowday) }}"
            class="ssq-default flex flex-col space-y-0.5 px-3 items-end border-r border-black-300 border-dotted">
            <p><span class="fa-solid fa-arrow-left-long mr-1"></span> Previous</p>
            <p>{{ format_date($prevSnowday->getDate(), DATE_FULL_ABBREV) }}</p>
            <p>{{ $prevSnowday->getMountain()->getNickname() }}</p>
        </a>
    @else
        <div class="flex flex-col space-y-0.5 px-3 items-end border-r border-black-300 border-dotted text-black-500">
            <p><span class="fa-solid fa-arrow-left-long mr-1"></span> Previous</p>
            <p><i>none</i></p>
        </div>
    @endif

    @if ($nextSnowday->exists)
        <a href="{{ route_user_snowday($user, $nextSnowday) }}"
            class="ssq-default flex flex-col space-y-0.5 px-3 items-start">
            <p>Next <span class="fa-solid fa-arrow-right-long ml-1"></span></p>
            <p>{{ format_date($nextSnowday->getDate(), DATE_FULL_ABBREV) }}</p>
            <p>{{ $nextSnowday->getMountain()->getNickname() }}</p>
        </a>
    @else
        <div class="flex flex-col space-y-0.5 px-3 items-start text-black-500">
            <p>Next <span class="fa-solid fa-arrow-right-long ml-1"></span></p>
            <p><i>none</i></p>
        </div>
    @endif
</div>
