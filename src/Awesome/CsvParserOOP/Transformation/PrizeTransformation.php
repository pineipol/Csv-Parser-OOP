<?php
declare(strict_types = 1);

namespace Awesome\CsvParserOOP\Transformation;

class PrizeTransformation implements TransformationInterface
{
    public function getTransformation($value): array
    {
        return ['Value', round(((float)$value) * 2, 2)];
    }
}
