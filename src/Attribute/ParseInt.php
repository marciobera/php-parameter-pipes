<?php

declare(strict_types=1);

namespace ParameterPipes\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_PARAMETER)]
final class ParseInt
{
    public function __construct(
        private ?string $message = null,
    ) {}

    public function getMessage(): string
    {
        return $this->message ?? 'Invalid integer parameter.';
    }
}
