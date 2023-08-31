<?php

namespace App\Livewire\User;

use App\Models\Season;
use App\Models\StatsUserSeason;
use App\Models\User;
use App\Models\UserFollowing;
use Illuminate\Support\Collection;
use Livewire\Component;

class Leaderboard extends Component
{
    public int $userId = 0;
    public int $seasonId = 0;
    public int $limit = 0;

    public bool $hideSeasonSelector = false;

    public function render()
    {
        $followingUsers = $this->getFollowingUserStats();

        return view('livewire.user.leaderboard', [
            'user' => User::find($this->userId),
            'season' => Season::find($this->seasonId),
            'followingUsers' => $followingUsers,
        ]);
    }

    private function getFollowingUserStats(): Collection
    {
        // get all users this user is following
        $followingUsers = UserFollowing::with(['followingUser'])
            ->whereUserId($this->userId)
            ->get();

        $followingUserIds = $followingUsers->map(function (UserFollowing $userFollowing) {
            return $userFollowing->getFollowingUserId();
        });

        // get all stats for the given season for the users this user is following
        $followingUserStats = StatsUserSeason::whereIn('user_id', $followingUserIds)
            ->whereSeasonId($this->seasonId)
            ->get()
            ->keyBy('user_id');

        foreach ($followingUsers as $followingUser) {
            $userId = $followingUser->getFollowingUserId();
            if ($followingUserStats->has($userId)) {
                $stats = $followingUserStats->get($userId);
            } else {
                $stats = new StatsUserSeason();
                $stats->setTotalSnowdays(0);
                $stats->setSeasonId($this->seasonId);
            }
            $followingUser->setFollowingUserStats($stats);
        }

        $followingUsers = $followingUsers->sortByDesc(function (UserFollowing $userFollowing) {
            return $userFollowing->getFollowingUserStats()->getTotalSnowdays();
        });

        if ($this->limit > 0) {
            $followingUsers = $followingUsers->slice(0, $this->limit);
        }

        return $followingUsers->values();
    }
}