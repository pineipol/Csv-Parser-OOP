<?php
declare(strict_types = 1);

namespace Awesome\CsvParserOOP;

use Awesome\CsvParserOOP\Transformation\TransformationInterface;

/**
 * Class Parser
 *
 * Csv parser
 *
 * @package Awesome\CsvParserOOP
 */
class Parser
{
    const TRANSFORMATION_NAMESPACE = 'Awesome\CsvParserOOP\Transformation\\';

    const TRANSFORMATION_SUFFIX = 'Transformation';

    /**
     * Main public method
     *
     * @param array $row
     *
     * @return array
     */
    public function parse(array $row)
    {
        $targetRow = [];
        foreach ($row as $rowKey => $rowValue) {
            // compose transformation name
            $transformationName = ucfirst(strtolower($rowKey)) . self::TRANSFORMATION_SUFFIX;
            $transformationFqcn = self::TRANSFORMATION_NAMESPACE . $transformationName;

            // instantiate transformation object
            /** @var TransformationInterface $transformationHandler */
            $transformationHandler = new $transformationFqcn();

            // get new column name and new value (transformed)
            list($newColumnName, $newValue) = $transformationHandler->getTransformation($rowValue);
            $targetRow[$newColumnName] = $newValue;
        }

        return $targetRow;
    }
}
