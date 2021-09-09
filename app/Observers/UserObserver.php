<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Arr;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class UserObserver
{
    public function saving(User $user)
    {
        $avatars = [
            asset('assets/avatar/1.png'),
            asset('assets/avatar/2.png'),
            asset('assets/avatar/3.png'),
            asset('assets/avatar/4.png'),
            asset('assets/avatar/5.png'),
            asset('assets/avatar/6.png'),
        ];

        if (empty($user->avatar)) {
            $user->avatar = asset(Arr::random($avatars));
        }
    }
}
