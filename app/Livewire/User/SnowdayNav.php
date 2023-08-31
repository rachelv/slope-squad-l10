<?php

namespace App\Livewire\User;

use App\Models\Snowday;
use Livewire\Component;

class SnowdayNav extends Component
{
    public int $snowdayId = 0;

    public function render()
    {
        $snowday = Snowday::find($this->snowdayId);
        $prevSnowday = $this->getPreviousSnowday($snowday);
        $nextSnowday = $this->getNextSnowday($snowday);

        return view('livewire.user.snowday-nav', [
            'user' => $snowday->getUser(),
            'prevSnowday' => $prevSnowday,
            'nextSnowday' => $nextSnowday,
        ]);
    }

    private function getPreviousSnowday(Snowday $snowday): Snowday
    {
        $prevSnowday = Snowday::with(['mountain'])
            ->whereUserId($snowday->getUserId())
            ->whereSeasonId($snowday->getSeasonId())
            ->where('date', '<', $snowday->getDate()->startOfDay())
            ->orderBy('date', 'desc')
            ->first();

        return $prevSnowday ?? new Snowday();
    }

    private function getNextSnowday(Snowday $snowday): Snowday
    {
        $nextSnowday = Snowday::with(['mountain'])
            ->whereUserId($snowday->getUserId())
            ->whereSeasonId($snowday->getSeasonId())
            ->where('date', '>', $snowday->getDate()->endOfDay())
            ->orderBy('date', 'asc')
            ->first();

        return $nextSnowday ?? new Snowday();
    }
}