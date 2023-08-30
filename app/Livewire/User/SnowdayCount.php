<?php

namespace App\Livewire\User;

use App\Models\Snowday;
use Livewire\Component;

class SnowdayCount extends Component
{
    public int $userId = 0;
    public int $seasonId = 0;

    public function render()
    {
        $count = $this->getSnowdayCount();

        return view('livewire.user.snowday-count', [
            'count' => $count,
        ]);
    }

    private function getSnowdayCount(): int
    {
        return Snowday::whereSeasonId($this->seasonId)
            ->whereUserId($this->userId)
            ->count();
    }
}