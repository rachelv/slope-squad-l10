<?php

namespace App\Livewire\User;

use App\Models\Season;
use App\Models\Snowday;
use App\Models\StatsUserSeason;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Component;

class SeasonComparisonList extends Component
{
    public int $userId = 0;

    public function render()
    {
        $user = User::find($this->userId);
        $today = Carbon::now();

        $seasonStats = $this->getSeasonStats($user, $today);

        return view('livewire.user.season-comparison-list', [
            'today' => $today,
            'seasonStats' => $seasonStats,
        ]);
    }

    private function getSeasonStats(User $user, Carbon $today): Collection
    {
        $seasons = $user->getSeasons();

        $useStartYear = $today->year === Season::current()->getStartYear();

        $seasonStats = new Collection();

        foreach ($seasons as $season) {
            $seasonYear = $useStartYear ? $season->getStartYear() : $season->getEndYear();
            $seasonDate = Carbon::createFromDate($seasonYear, $today->month, $today->day);

            $numDays = Snowday::whereUserId($this->userId)
                ->whereSeasonId($season->getId())
                ->where('date', '<=', $seasonDate->startOfDay())
                ->count();

            $seasonStat = new StatsUserSeason();
            $seasonStat->setUser($user);
            $seasonStat->setSeason($season);
            $seasonStat->setTotalSnowdays($numDays);

            $seasonStats->push($seasonStat);
        }

        return $seasonStats;
    }
}