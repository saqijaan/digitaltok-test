<?php

namespace App\Drivers;

use App\Contracts\NotificationContract;
use App\Models\User;

class PushNotification implements NotificationContract
{
    public function send(User $user, array $data)
    {
        
    }
}
