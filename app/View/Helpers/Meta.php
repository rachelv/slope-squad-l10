<?php

function page_title(string $title = null): string
{
    $title = $title ?? 'Simple ski day tracking for avid skiers';

    return "{$title} | Slope Squad";
}