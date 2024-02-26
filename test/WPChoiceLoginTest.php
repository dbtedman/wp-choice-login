<?php

declare(strict_types=1);

namespace DBTedman\WPChoiceLoginTest;

use DBTedman\WPChoiceLogin\WPChoiceLogin;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(WPChoiceLogin::class)]
class WPChoiceLoginTest extends TestCase
{
    public function testPlaceholder(): void
    {
        static::assertNotNull(new WPChoiceLogin());
    }
}
