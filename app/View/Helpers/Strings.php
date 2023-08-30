<?php

use Illuminate\Support\Str;

function fmt_notes($snowday): string
{
    if ($snowday->hasNotes()) {
        return Str::limit($snowday->getNotes(), 90);
    } else {
        return '';
    }
}

function count_snowdays(int $count): string
{
    return $count . ' ' . Str::plural('day', $count);
}

function count_seasons(int $count): string
{
    return $count . ' ' . Str::plural('season', $count);
}

function count_mountains(int $count): string
{
    return $count . ' ' . Str::plural('mountain', $count);
}