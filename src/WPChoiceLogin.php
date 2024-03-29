<?php

declare(strict_types=1);

namespace DBTedman\WPChoiceLogin;

use DBTedman\WPChoiceLogin\Adapter\WordPress\WordPress;
use DBTedman\WPChoiceLogin\Web\Web;

readonly class WPChoiceLogin
{
    private Web $web;

    public function __construct(WordPress $wp)
    {
        $this->web = new Web($wp);
    }

    public function bind(): void
    {
        $this->web->bind();
    }
}
