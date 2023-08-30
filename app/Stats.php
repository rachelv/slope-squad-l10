<?php

namespace App;

use App\Models\StatsUserMountain;
use App\Models\StatsUserSeason;
use App\Models\StatsUserSeasonMountain;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Stats
{
    public static function updateUserStats(int $userId): void
    {
        $totalMountains = DB::table('snowdays')
            ->where('user_id', $userId)
            ->distinct()->get(['mountain_id'])
            ->count();

        $totalSeasons = DB::table('snowdays')
            ->where('user_id', $userId)
            ->distinct()->get(['season_id'])
            ->count();

        $totalSnowdays = DB::table('snowdays')
            ->where('user_id', $userId)
            ->count();

        $user = User::find($userId);
        $user->setTotalMountains($totalMountains);
        $user->setTotalSeasons($totalSeasons);
        $user->setTotalSnowdays($totalSnowdays);
        $user->save();
    }

    public static function updateAllForUser(int $userId, int $seasonId, int $mountainId): void
    {
        Stats::updateUserSeasonStats($userId, $seasonId);
        Stats::updateUserMountainStats($userId, $mountainId);
        Stats::updateUserSeasonMountainStats($userId, $seasonId, $mountainId);
    }

    private static function updateUserSeasonStats(int $userId, int $seasonId): void
    {
        $seasonMountains = DB::table('snowdays')
            ->where('user_id', $userId)
            ->where('season_id', $seasonId)
            ->distinct()->get(['mountain_id'])
            ->count();

        $seasonSnowdays = DB::table('snowdays')
            ->where('user_id', $userId)
            ->where('season_id', $seasonId)
            ->count();

        $seasonVertical = DB::table('snowdays')
            ->where('user_id', $userId)
            ->where('season_id', $seasonId)
            ->sum('vertical');

        $userSeasonStats = StatsUserSeason::firstOrCreate([
            'user_id' => $userId,
            'season_id' => $seasonId,
        ]);
        $userSeasonStats->setTotalMountains($seasonMountains);
        $userSeasonStats->setTotalSnowdays($seasonSnowdays);
        $userSeasonStats->setTotalVertical($seasonVertical);
        $userSeasonStats->save();
    }

    private static function updateUserMountainStats(int $userId, int $mountainId): void
    {
        $mountainSeasons = DB::table('snowdays')
            ->where('user_id', $userId)
            ->where('mountain_id', $mountainId)
            ->distinct()->get(['season_id'])
            ->count();

        $mountainSnowdays = DB::table('snowdays')
            ->where('user_id', $userId)
            ->where('mountain_id', $mountainId)
            ->count();

        $mountainVertical = DB::table('snowdays')
            ->where('user_id', $userId)
            ->where('mountain_id', $mountainId)
            ->sum('vertical');

        $userMountainStats = StatsUserMountain::firstOrCreate([
            'mountain_id' => $mountainId,
            'user_id' => $userId,
        ]);
        $userMountainStats->setTotalSeasons($mountainSeasons);
        $userMountainStats->setTotalSnowdays($mountainSnowdays);
        $userMountainStats->setTotalVertical($mountainVertical);
        $userMountainStats->save();
    }

    private static function updateUserSeasonMountainStats(int $userId, int $seasonId, int $mountainId): void
    {
        $mountainSeasonSnowdays = DB::table('snowdays')
            ->where('user_id', $userId)
            ->where('season_id', $seasonId)
            ->where('mountain_id', $mountainId)
            ->count();

        $mountainSeasonVertical = DB::table('snowdays')
            ->where('user_id', $userId)
            ->where('season_id', $seasonId)
            ->where('mountain_id', $mountainId)
            ->sum('vertical');

        $userSeasonMountainStats = StatsUserSeasonMountain::firstOrCreate([
            'mountain_id' => $mountainId,
            'season_id' => $seasonId,
            'user_id' => $userId,
        ]);
        $userSeasonMountainStats->setTotalSnowdays($mountainSeasonSnowdays);
        $userSeasonMountainStats->setTotalVertical($mountainSeasonVertical);
        $userSeasonMountainStats->save();
    }
}