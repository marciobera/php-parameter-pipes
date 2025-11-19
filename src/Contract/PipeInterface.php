<?php

declare(strict_types=1);

namespace ParameterPipes\Contract;

use ParameterPipes\Exception\PipeValidationException;
use ReflectionParameter;

interface PipeInterface
{
    /**
     * Return true when this pipe supports given attribute/parameter.
     */
    public function supports(ReflectionParameter $parameter, object $attribute): bool;

    /**
     * Transform and validate the value. Throw PipeValidationException on invalid value.
     *
     * @throws PipeValidationException
     */
    public function transform(mixed $value, ReflectionParameter $parameter, object $attribute): mixed;
}
