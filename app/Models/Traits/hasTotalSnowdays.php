<?php
namespace App\Models\Traits;

trait hasTotalSnowdays
{
    public function getTotalSnowdays(): int
    {
        return $this->total_snowdays ?? 0;
    }

    public function setTotalSnowdays(int $totalSnowdays): void
    {
        $this->total_snowdays = $totalSnowdays;
    }
}
