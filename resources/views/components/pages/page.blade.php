<x-page-chrome.header :logged-in-user="$loggedInUser"/>

<div>
    <div class="container">
        {{ $slot }}
    </div>
</div>

<x-page-chrome.footer/>