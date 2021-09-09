<?php

declare(strict_types=1);

namespace Yii\Component\ServiceLocator;

use Psr\Container\ContainerInterface;

/**
 * Factory for @see ServiceLocator
 */
class ServiceLocatorFactory
{
    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function create(): ServiceLocator
    {
        return ServiceLocator::create($this->container);
    }
}
