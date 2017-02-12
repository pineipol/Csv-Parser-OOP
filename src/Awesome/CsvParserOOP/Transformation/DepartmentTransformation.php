<?php
declare(strict_types = 1);

namespace Awesome\CsvParserOOP\Transformation;

class DepartmentTransformation implements TransformationInterface
{
    public function getTransformation($value): array
    {
        return ['Section', 'SEC-' . ucfirst(strtolower(substr($value, 0, 3)))];
    }
}
