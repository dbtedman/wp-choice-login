<?php

declare(strict_types=1);

namespace DBTedman\WPChoiceLogin\Web\Admin;

use DBTedman\WPChoiceLogin\Adapter\WordPress\WordPress;

readonly class Admin
{
    private const PAGE_TITLE = 'WordPress Choice Login Settings';
    private const MENU_TITLE = 'Choice Login';
    private const MENU_SLUG = 'choice-login-settings';
    private const MENU_ICON = 'dashicons-shield';
    // https://wordpress.org/documentation/article/roles-and-capabilities/#manage_options
    private const REQUIRED_CAPABILITY = 'manage_options';

    private WordPress $wp;

    public function __construct(WordPress $wp)
    {
        $this->wp = $wp;
    }

    public function bind(): void
    {
        $this->wp->addAction('admin_menu', function () {
            $this->wp->addMenuPage(
                self::PAGE_TITLE,
                self::MENU_TITLE,
                self::REQUIRED_CAPABILITY,
                self::MENU_SLUG,
                function () {
                    echo $this->renderHTML();
                },
                self::MENU_ICON
            );
        });
    }

    private function renderHTML(): string
    {
        $pageTitle = self::PAGE_TITLE;
        $submitURL = $this->wp->adminURL('admin-post.php');

        return <<<EOF
<div class="wrap">
    <h1 class="wp-heading-inline">$pageTitle</h1>
    <p>Providing login choices for your WordPress site.</p>
    <hr class="wp-header-end">

    <form method="post" action="$submitURL">
        <div class="card" style="max-width: 100%">
            <h2>Standard Login</h2>
            <p><em>This is the built-in login.</em></p>
        </div>

        <div class="card" style="max-width: 100%">
            <h2>Email Loop Login</h2>
            <p><em>Proposed feature, not currently implemented.</em></p>
        </div>
    </form>
</div>
EOF;
    }
}
