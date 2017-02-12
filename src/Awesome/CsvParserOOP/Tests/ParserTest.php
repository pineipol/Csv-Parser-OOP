<?php
declare(strict_types = 1);

namespace Awesome\CsvParserOOP\Tests;

use Awesome\CsvParserOOP\Parser;
use League\Csv\Reader;
use League\Csv\Writer;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    public function testParseOriginCsvShouldGenerateParsedCsv()
    {
        // fixtures stage
        $expectedData = [
            [
                'Product name' => 'Banana',
                'Section'      => 'SEC-Veg',
                'Code-name'    => 'SUP-BAN',
                'Value'        => '4',
                'Store'        => 'Top',
            ],
            [
                'Product name' => 'Cream',
                'Section'      => 'SEC-Dru',
                'Code-name'    => 'SUP-DRU',
                'Value'        => '10',
                'Store'        => 'Middle',
            ],
            [
                'Product name' => 'Pizza DrOetker',
                'Section'      => 'SEC-Fro',
                'Code-name'    => 'SUP-DRO',
                'Value'        => '6',
                'Store'        => '',
            ],
        ];
        $fixturesPath = dirname(__FILE__) . '/Fixtures/fixtures.csv';
        $outputPath = 'src/Awesome/CsvParserOOP/Tests/Output/output.csv';

        // execution stage
        $csvReader = Reader::createFromPath($fixturesPath);
        $csvWriter = Writer::createFromPath($outputPath, 'w');

        $reader = new \Awesome\CsvParserOOP\Reader($csvReader);
        $parser = new Parser();
        $writer = new \Awesome\CsvParserOOP\Writer($csvWriter);

        foreach ($reader->read() as $row) {
            $parsedRow = $parser->parse($row);
            $writer->write($parsedRow);
        }

        // assertion stage
        $generatedPath = 'src/Awesome/CsvParserOOP/Tests/Output/output.csv';
        $this->assertTrue(file_exists($generatedPath));

        $csv = Reader::createFromPath($generatedPath);
        $csv->setDelimiter(';');
        $results = $csv->fetchAll();
        $this->assertCount(4, $results);
        $this->assertEquals($expectedData[0]['Product name'], $results[1][0]);
        $this->assertEquals($expectedData[0]['Section'], $results[1][1]);
        $this->assertEquals($expectedData[0]['Code-name'], $results[1][2]);
        $this->assertEquals($expectedData[0]['Value'], $results[1][3]);
        $this->assertEquals($expectedData[0]['Store'], $results[1][4]);
    }
}