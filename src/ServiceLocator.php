<?php

declare(strict_types=1);

namespace Yii\Component\ServiceLocator;

use Psr\Container\ContainerInterface;

/**
 * Common service locator component.
 */
class ServiceLocator
{
    private ContainerInterface $container;

    /**
     * @return string[] = [
     *     '<alias_string>' => '<class_name_string>'
     * ]
     */
    private array $services;

    /**
     * Closed from DI.
     * Use {{ self::create() }}
     */
    protected function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Register all services.
     * @param array $services
     */
    public function setAll(array $services): void
    {
        $this->services = $services;
    }

    /**
     * All aliases.
     * @return array
     */
    public function aliases(): array
    {
        return array_keys($this->services);
    }

    /**
     * Instantiate service by alias.
     */
    public function get(string $alias): ?ServiceInterface
    {
        foreach ($this->services as $classAlias => $className) {
            if ($alias !== $classAlias) {
                continue;
            }

            $service = $this->container->get($className);
        }

        return $service ?? null;
    }

    public static function create(ContainerInterface $container): self
    {
        return new self($container);
    }
}
