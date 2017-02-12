<?php
declare(strict_types = 1);

namespace Awesome\CsvParserOOP\Transformation;

class StoreTransformation implements TransformationInterface
{
    public function getTransformation($value): array
    {
        $newValueArray = [
            '1' => 'Top',
            '2' => 'Middle',
            '3' => 'Bottom',
        ];
        return ['Store', $newValueArray[$value]];
    }
}
