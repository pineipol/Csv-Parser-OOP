<?php
declare(strict_types = 1);

namespace Awesome\CsvParserOOP\Transformation;

interface TransformationInterface
{
    public function getTransformation($value): array;
}
