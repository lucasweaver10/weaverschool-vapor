<?php

namespace App\Enums;

class SubscriptionTypes
{
    const ESSAYS = 'essays';
    const BASIC = 'basic';
    const PRO = 'pro';
    const PREMIUM = 'premium';
    const FRIEND = 'friend';

    public static function getHierarchy()
    {
        return [
            self::ESSAYS => 0,
            self::BASIC => 1,
            self::PRO => 2,
            self::PREMIUM => 3,
            self::FRIEND => 4,
        ];
    }
}
