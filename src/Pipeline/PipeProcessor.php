<?php

declare(strict_types=1);

namespace ParameterPipes\Pipeline;

use ParameterPipes\Contract\PipeInterface;
use ReflectionParameter;

final class PipeProcessor
{
    /**
     * @param  PipeInterface[]  $pipes
     */
    public function __construct(private array $pipes = []) {}

    public function addPipe(PipeInterface $pipe): void
    {
        $this->pipes[] = $pipe;
    }

    /**
     * Process a single parameter's value through available pipes.
     *
     * @param  ReflectionParameter  $parameter
     * @param  mixed  $value
     * @return mixed
     */
    public function processParameter(ReflectionParameter $parameter, mixed $value): mixed
    {
        foreach ($parameter->getAttributes() as $reflectionAttribute) {
            $attribute = $reflectionAttribute->newInstance();

            foreach ($this->pipes as $pipe) {
                if ($pipe->supports($parameter, $attribute)) {
                    return $pipe->transform($value, $parameter, $attribute);
                }
            }
        }

        return $value;
    }
}
