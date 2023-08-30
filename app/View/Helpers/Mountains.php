<?php

use App\Models\Mountain;

// Arapahoe Basin
const MTN_NAME_ONLY = 3;
// A-Basin
const MTN_NICKNAME_ONLY = 4;
// Arapahoe Basin, CO
const MTN_FULL_ABBREV = 1;
// Arapahoe Basin, Colorado
const MTN_FULL_FULL = 2;

function mountain_name(Mountain $mountain, int $format): string
{
    if ($format === MTN_FULL_ABBREV) {
        $name = $mountain->getName();
        $abbrev = $mountain->getRegion3Abbrev();

        return "{$name}, {$abbrev}";
    } elseif ($format === MTN_FULL_FULL) {
        $name = $mountain->getName();
        $region = $mountain->getRegion3();

        return "{$name}, {$region}";
    } elseif ($format === MTN_NAME_ONLY) {
        return $mountain->getName();
    } elseif ($format === MTN_NICKNAME_ONLY) {
        return $mountain->getNickname();
    }

    return 'bad name format';
}