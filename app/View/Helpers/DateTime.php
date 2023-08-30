<?php

use Carbon\Carbon;

// Saturday, December 4, 2021
const DATE_FULL = 'l, F j, Y';

// Sat, Dec 4, 2021
const DATE_FULL_ABBREV = 'D, M j, Y';

// December 4
const DATE_DATE_FULL = 'F j';

function format_date(Carbon $datetime, string $format = DATE_FULL): string
{
    return $datetime->format($format);
}