<?php
declare(strict_types = 1);

namespace Awesome\CsvParserOOP\Transformation;

class ProductTransformation implements TransformationInterface
{
    public function getTransformation($value): array
    {
        return ['Product name', $value];
    }
}
