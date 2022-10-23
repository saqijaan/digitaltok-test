<?php

namespace App\Contracts;

use App\Models\User;

interface NotificationContract
{
    public function send(User $user, array $data);
}
