<?php

namespace App\Drivers;

use App\Contracts\NotificationContract;
use App\Models\User;

class EmailNotification implements NotificationContract
{
    public function __construct()
    {
        
    }

    public function send(User $user, array $data)
    {

    }
}
