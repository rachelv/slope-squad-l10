<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserFollowing extends SlopeSquadBaseModel
{
    use Traits\hasUser;

    protected $table = 'users_following';

    private ?User $followingUserObj = null;
    private ?StatsUserSeason $followingUserStatsObj = null;

    public function getFollowingUser(): User
    {
        if ($this->followingUserObj === null) {
            $this->followingUserObj = $this->followingUser ?? new User();
        }
        return $this->followingUserObj;
    }

    public function getFollowingUserStats(): StatsUserSeason
    {
        return $this->followingUserStatsObj;
    }

    public function setFollowingUserStats(StatsUserSeason $stats): void
    {
        $this->followingUserStatsObj = $stats;
    }

    public function getFollowingUserId(): int
    {
        return $this->following_user_id;
    }

    public function setFollowingUserId(int $followingUserId): void
    {
        $this->following_user_id = $followingUserId;
    }

    public function followingUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'following_user_id', 'id');
    }
}
