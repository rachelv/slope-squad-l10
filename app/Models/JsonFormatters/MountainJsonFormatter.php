<?php
namespace App\Models\JsonFormatters;

use App\Models\Mountain;

class MountainJsonFormatter
{
    private Mountain $mountain;

    public function __construct(Mountain $mountain)
    {
        $this->mountain = $mountain;
    }

    public function getMapJson(): array
    {
        return [
            'name' => $this->mountain->getName(),
            'lat' => $this->mountain->getLat(),
            'lng' => $this->mountain->getLon(),
        ];
    }
}