<?php
namespace App\Models;

use App\Interfaces\ChartItemInterface;
use App\Interfaces\LeaderboardInterface;
use App\Interfaces\TotalSnowdaysInterface;

class StatsUserSeasonMountain extends SlopeSquadBaseModel implements ChartItemInterface, TotalSnowdaysInterface, LeaderboardInterface
{
    use Traits\hasMountain;
    use Traits\hasSeason;
    use Traits\hasTotalSnowdays;
    use Traits\hasUser;

    protected $table = 'stats_users_seasons_mountains';

    // need these for firstOrCreate() to work
    protected $fillable = [
        'mountain_id',
        'season_id',
        'user_id',
    ];

    public function getLabel(): string
    {
        return $this->getSeason()->getShortName();
    }

    public function getValue(): int
    {
        return $this->getTotalSnowdays();
    }

    public function getTotalVertical(): int
    {
        return $this->total_vertical ?? 0;
    }

    public function setTotalVertical(int $totalVertical): void
    {
        $this->total_vertical = $totalVertical;
    }

    public function getTotalSeasons(): int
    {
        return 1;
    }
}
