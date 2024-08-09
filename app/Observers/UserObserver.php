<?php

namespace App\Observers;

use App\Models\Button;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        for ($i = 0; $i < 9; $i++) {
            Button::create([
                'user_id' => $user->id,
                'url' => '',
                'color' => '#ffffff',
            ]);
        }   
    }
}
