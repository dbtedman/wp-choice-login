<?php

declare(strict_types=1);

namespace DBTedman\WPChoiceLoginTest;

use DBTedman\WPChoiceLogin\Adapter\WordPress\WordPress;
use DBTedman\WPChoiceLogin\WPChoiceLogin;
use Mockery;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(WPChoiceLogin::class)]
class WPChoiceLoginTest extends TestCase
{
    public function testPlaceholder(): void
    {
        $wp = Mockery::mock(WordPress::class);
        $wp->allows('addAction');
        static::assertNotNull(new WPChoiceLogin($wp));
    }
}
