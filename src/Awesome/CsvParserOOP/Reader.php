<?php
declare(strict_types = 1);

namespace Awesome\CsvParserOOP;

class Reader
{
    /** @var \League\Csv\Reader */
    protected $csvReader;

    /**
     * Reader constructor.
     *
     * @param \League\Csv\Reader $csvReader
     */
    public function __construct(\League\Csv\Reader $csvReader)
    {
        $this->csvReader = $csvReader;
    }

    /**
     * Reads lines from csv
     *
     * @return \Generator
     */
    public function read(): \Generator
    {
        $this->csvReader->setDelimiter(';');

        $header = $this->csvReader->fetchOne();

        $index = 1;
        while ($row = $this->csvReader->fetchOne($index++)) {
            $result = [];
            for ($n=0; $n<count($header); $n++) {
                $result[$header[$n]] = $row[$n];
            }

            yield $result;
        }
    }
}
