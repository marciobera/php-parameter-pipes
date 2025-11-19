<?php

declare(strict_types=1);

namespace ParameterPipes\TypeCasting;

use ParameterPipes\Attribute\ParseInt;
use ParameterPipes\Contract\PipeInterface;
use ParameterPipes\Exception\PipeValidationException;
use ReflectionParameter;

final class IntPipe implements PipeInterface
{
    public function supports(ReflectionParameter $parameter, object $attribute): bool
    {
        return $attribute instanceof ParseInt;
    }

    public function transform(mixed $value, ReflectionParameter $parameter, object $attribute): mixed
    {
        if ($value === null || $value === '') {
            // Let callers/framework handle missing params; return null as-is.
            return null;
        }

        // Accept numeric strings, integers, etc.
        if (!is_numeric($value)) {
            throw new PipeValidationException($attribute->getMessage());
        }

        return (int)$value;
    }
}
