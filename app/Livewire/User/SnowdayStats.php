<?php

namespace App\Livewire\User;

use App\Models\Snowday;
use Livewire\Component;

class SnowdayStats extends Component
{
    public int $snowdayId = 0;

    public function render()
    {
        $snowday = Snowday::find($this->snowdayId);

        $totalDaysAtMountain = $this->getTotalDaysAtMountain($snowday);
        $seasonDaysAtMountain = $this->getSeasonDaysAtMountain($snowday);

        return view('livewire.user.snowday-stats', [
            'season' => $snowday->getSeason(),
            'user' => $snowday->getUser(),
            'mountain' => $snowday->getMountain(),
            'seasonDayNum' => $snowday->getDayNum(),
            'totalDaysAtMountain' => $totalDaysAtMountain,
            'seasonDaysAtMountain' => $seasonDaysAtMountain,
        ]);
    }

    private function getTotalDaysAtMountain(Snowday $snowday): int
    {
        return Snowday::whereUserId($snowday->getUserId())
            ->whereMountainId($snowday->getMountainId())
            ->where('date', '<=', $snowday->getDate())
            ->count();
    }

    private function getSeasonDaysAtMountain(Snowday $snowday): int
    {
        return Snowday::whereUserId($snowday->getUserId())
            ->whereSeasonId($snowday->getSeasonId())
            ->whereMountainId($snowday->getMountainId())
            ->where('date', '<=', $snowday->getDate())
            ->count();
    }
}