<?php

declare(strict_types=1);

namespace ParameterPipes\Tests\Fixtures;

use ParameterPipes\Attribute\ParseInt;

class ControllerFixture
{
    public function handle(#[ParseInt] $id) {}
}
