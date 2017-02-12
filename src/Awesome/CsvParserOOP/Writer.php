<?php
declare(strict_types = 1);

namespace Awesome\CsvParserOOP;

class Writer
{
    /** @var \League\Csv\Writer */
    protected $csvWriter;

    /** @var bool */
    protected $isHeaderStore = false;

    /**
     * Writer constructor.
     *
     * @param \League\Csv\Writer $csvWriter
     */
    public function __construct(\League\Csv\Writer $csvWriter)
    {
        $this->csvWriter = $csvWriter;
        $this->csvWriter->setDelimiter(';');
    }

    /**
     * @param array $row
     */
    public function write(array $row)
    {
        // first time write header
        if (!$this->isHeaderStore) {
            $header = array_keys($row);
            $this->csvWriter->insertOne($header);
            $this->isHeaderStore = true;
        }

        // every time write data
        $this->csvWriter->insertOne($row);
    }
}
