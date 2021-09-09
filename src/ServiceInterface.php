<?php

declare(strict_types=1);

namespace Yii\Component\ServiceLocator;

/**
 * Common service.
 */
interface ServiceInterface
{
    /**
     * Alias of service using for identify service by service locator.
     */
    public static function alias(): string;
}
