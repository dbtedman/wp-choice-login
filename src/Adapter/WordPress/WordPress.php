<?php

declare(strict_types=1);

namespace DBTedman\WPChoiceLogin\Adapter\WordPress;

interface WordPress
{
    public function addAction(string $name, callable $callable, int $priority, int $argumentCount): void;

    public function addFilter(string $name, callable $callable, int $priority, int $argumentCount): void;

    public function addMenuPage(string $pageTitle, string $menuTitle, string $requiredCapability, string $menuSlug, callable|null $callable, string|null $iconURL, int|null $position): void;
}
