<?php

declare(strict_types=1);

namespace DBTedman\WPChoiceLogin\Adapter\WordPress;

readonly class WordPressImpl implements WordPress
{
    public function addAction(
        string $name,
        callable $callable,
        int $priority = 10,
        int $argumentCount = 1
    ): void {
        add_action($name, $callable, $priority, $argumentCount);
    }

    public function addFilter(
        string $name,
        callable $callable,
        int $priority = 10,
        int $argumentCount = 1
    ): void {
        add_filter($name, $callable, $priority, $argumentCount);
    }

    public function addMenuPage(
        string $pageTitle,
        string $menuTitle,
        string $requiredCapability,
        string $menuSlug,
        ?callable $callable = null,
        ?string $iconURL = null,
        ?int $position = null
    ): void {
        add_menu_page($pageTitle, $menuTitle, $requiredCapability, $menuSlug, $callable, $iconURL, $position);
    }

    public function adminURL(string $url): string
    {
        return admin_url($url);
    }
}
