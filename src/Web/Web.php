<?php

declare(strict_types=1);

namespace DBTedman\WPChoiceLogin\Web;

use DBTedman\WPChoiceLogin\Adapter\WordPress\WordPress;
use DBTedman\WPChoiceLogin\Web\Admin\Admin;

readonly class Web
{
    private Admin $admin;

    public function __construct(WordPress $wp)
    {
        $this->admin = new Admin($wp);
    }

    public function bind(): void
    {
        $this->admin->bind();
    }
}
