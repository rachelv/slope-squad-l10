<?php

use App\Models\Snowday;

function snowday_title(Snowday $snowday, int $format): string
{
    if ($snowday->getMountainId() === 0) {
        return $snowday->getTitle();
    } else {
        $mountain = $snowday->getMountain();

        return mountain_name($mountain, $format);
    }

    return 'bad name format';
}