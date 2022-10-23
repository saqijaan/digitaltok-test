<?php

namespace App\Managers;

use App\Drivers\EmailNotification;
use App\Drivers\PushNotification;

class NotificationManager extends LaravelManager
{
    /**
     * Get the default driver name.
     *
     * @return string
     */
    public function getDefaultDriver()
    {
        return $this->config->get('notifications.default', 'email');
    }

    public function createEmailDriver(): EmailNotification
    {
        return new EmailNotification();
    }

    public function createPushDriver(): PushNotification
    {
        return new PushNotification();
    }
}
