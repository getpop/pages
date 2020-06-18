<?php

declare(strict_types=1);

namespace PoP\Pages;

use PoP\ComponentModel\ComponentConfiguration\EnvironmentValueHelpers;
use PoP\ComponentModel\ComponentConfiguration\ComponentConfigurationTrait;

class ComponentConfiguration
{
    use ComponentConfigurationTrait;

    private static $getPageListDefaultLimit;
    private static $getPageListMaxLimit;

    public static function getPageListDefaultLimit(): ?int
    {
        // Define properties
        $envVariable = Environment::PAGE_LIST_DEFAULT_LIMIT;
        $selfProperty = &self::$getPageListDefaultLimit;
        $defaultValue = 10;
        $callback = [EnvironmentValueHelpers::class, 'toInt'];

        // Initialize property from the environment/hook
        self::maybeInitializeConfigurationValue(
            $envVariable,
            $selfProperty,
            $defaultValue,
            $callback
        );
        return $selfProperty;
    }

    public static function getPageListMaxLimit(): ?int
    {
        // Define properties
        $envVariable = Environment::PAGE_LIST_MAX_LIMIT;
        $selfProperty = &self::$getPageListMaxLimit;
        $defaultValue = -1; // Unlimited
        $callback = [EnvironmentValueHelpers::class, 'toInt'];

        // Initialize property from the environment/hook
        self::maybeInitializeConfigurationValue(
            $envVariable,
            $selfProperty,
            $defaultValue,
            $callback
        );
        return $selfProperty;
    }
}