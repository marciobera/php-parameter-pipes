<?php

declare(strict_types=1);

namespace ParameterPipes\Tests;

use PHPUnit\Framework\TestCase;
use ParameterPipes\Pipeline\PipeProcessor;
use ParameterPipes\TypeCasting\IntPipe;
use ParameterPipes\Tests\Fixtures\ControllerFixture;
use ReflectionMethod;
use ParameterPipes\Exception\PipeValidationException;

final class PipeProcessorTest extends TestCase
{
    public function test_process_parameter_casts_int()
    {
        $processor = new PipeProcessor([new IntPipe()]);
        $ref = new ReflectionMethod(ControllerFixture::class, 'handle');
        $param = $ref->getParameters()[0];

        $result = $processor->processParameter($param, '123');

        $this->assertSame(123, $result);
    }

    public function test_invalid_throws()
    {
        $this->expectException(PipeValidationException::class);

        $processor = new PipeProcessor([new IntPipe()]);
        $ref = new ReflectionMethod(ControllerFixture::class, 'handle');
        $param = $ref->getParameters()[0];

        $processor->processParameter($param, 'abc');
    }
}
