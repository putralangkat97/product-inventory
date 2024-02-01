<?php

namespace App\Helpers;

class FeatureHelper
{
    const __FEATURE_PREFIX = "FEATURE_";

    // Features Configuration Key
    const CUSTOM_USER_ROLE = 'CUSTOM_USER_ROLE';
    const LOGIN_WITH_USERNAME = 'LOGIN_WITH_USERNAME';

    public static function isEnabled($feature)
    {
        return env(self::__FEATURE_PREFIX . $feature, 'false') == 'true';
    }
}
