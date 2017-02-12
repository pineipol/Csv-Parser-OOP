<?php
declare(strict_types = 1);

namespace Awesome\CsvParserOOP\Transformation;

class CodeTransformation implements TransformationInterface
{
    public function getTransformation($value): array
    {
        return ['Code-name', 'SUP-' . strtoupper(substr($value, 0, 3))];
    }
}
