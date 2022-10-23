<?php

namespace Unit;

use DTApi\Helpers\TeHelper;

class TeHelperTest
{
    public function test_will_expire_at_returns_valid_expiry_date()
    {
        /**
         * 1. Test if DueTime is less then 90 hours.
         */
        $dueTime = now()->addHours(89);
        $createdAt = now();

        $response = TeHelper::willExpireAt(
            $dueTime,
            $createdAt
        );

        $this->assertTrue(
            $dueTime->eq(Carbon::parse($response))
        );

        /**
         * 2. Test if due is less then 24 hours
         */

        $dueTime = now()->addHours(23);
        $createdAt = now();

        $response = TeHelper::willExpireAt(
            $dueTime,
            $createdAt
        );

        $this->assertTrue(
            $createdAt->addMinutes(90)->eq( Carbon::parse($response) )
        );

        /**
         * 3. Test if due is less then 72 hours and greater then 24 hours
         */

        $dueTime = now()->addHours(23);
        $createdAt = now();

        $response = TeHelper::willExpireAt(
            $dueTime,
            $createdAt
        );

        $this->assertTrue(
            $createdAt->addHours(16)->eq(Carbon::parse($response))
        );

        /**
         * 4. Test if due is greater then 90 hours.
         */

        $dueTime = now()->addHours(100);
        $createdAt = now();

        $response = TeHelper::willExpireAt(
            $dueTime,
            $createdAt
        );

        $this->assertTrue(
            $dueTime->subHours(16)->eq(Carbon::parse($response))
        );
    }
}
