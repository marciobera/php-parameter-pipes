# Examples

## Symfony adapter example (minimal)

```php
use ParameterPipes\Pipeline\PipeProcessor;
use ParameterPipes\TypeCasting\IntPipe;
use ParameterPipes\Attribute\ParseInt;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;

// register:
$processor = new PipeProcessor([new IntPipe()]);

// in a ValueResolver:
$reflectionParam = $argument->getReflectionParameter();
$value = $request->attributes->get($argument->getName());
$value = $processor->processParameter($reflectionParam, $value);
yield $value;
```
