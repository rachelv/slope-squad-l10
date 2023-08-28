<?php
namespace App\Models;

use App\Interfaces\LeaderboardInterface;
use App\Interfaces\TotalSnowdaysInterface;

class StatsUserMountain extends SlopeSquadBaseModel implements TotalSnowdaysInterface, LeaderboardInterface
{
    use Traits\hasMountain;
    use Traits\hasTotalSnowdays;
    use Traits\hasUser;

    protected $table = 'stats_users_mountains';

    // need these for firstOrCreate() to work
    protected $fillable = [
        'mountain_id',
        'user_id',
    ];

    public function getTotalSeasons(): int
    {
        return $this->total_seasons ?? 0;
    }

    public function setTotalSeasons(int $totalSeasons): void
    {
        $this->total_seasons = $totalSeasons;
    }

    public function getTotalVertical(): int
    {
        return $this->total_vertical ?? 0;
    }

    public function setTotalVertical(int $totalVertical): void
    {
        $this->total_vertical = $totalVertical;
    }
}
