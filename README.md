# php-parameter-pipes (core)

Framework-agnostic PHP 8+ attribute-based parameter pipes (casters).

This package provides a core `PipeInterface`, a `PipeProcessor`, a `ParseInt` attribute and an example `IntPipe`.
It has **no framework dependencies**. Adapters (Symfony, Laravel, Slim, etc.) should be implemented in separate packages.

## Installation

```bash
composer require marciobera/php-parameter-pipes
```

## Example usage (framework-agnostic)

Use reflection to process parameters before calling your controller:

```php
use ParameterPipes\Pipeline\PipeProcessor;
use ParameterPipes\TypeCasting\IntPipe;
use ParameterPipes\Attribute\ParseInt;

$processor = new PipeProcessor([new IntPipe()]);

// imagine $reflectionParam is ReflectionParameter and $value is from your router/request
$result = $processor->processParameter($reflectionParam, $value);
```

## Adapters

Implement a small adapter for your framework that reads the request value and calls `PipeProcessor::processParameter()`.

## License

MIT
