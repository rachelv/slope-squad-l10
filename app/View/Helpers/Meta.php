<?php

use App\Models\Mountain;
use App\Models\User;

function user_page_title(User $user, string $title): string
{
    return page_title("{$title} - {$user->getName()}");
}

function mountain_page_title(Mountain $mountain, string $title = ''): string
{
    if (!empty($title)) {
        return page_title("{$title} - {$mountain->getName()}");
    } else {
        return page_title($mountain->getName());
    }
}

function page_title(string $title = null): string
{
    $title = $title ?? 'Simple ski day tracking for avid skiers';

    return "{$title} | Slope Squad";
}