<?php

namespace Php\Package\Tests\Downloader;

use PHPUnit\Framework\TestCase;

use function Hexlet\Downloader\downloadPage;

class DownloaderTest extends TestCase
{
    private $url = 'http://example.com';
    private $outputPath = '/tmp/example';

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testDownload()
    {
        $client = new \GuzzleHttp\Client();
        $fullFileName = downloadPage($this->url, $this->outputPath, $client);
        $this->assertFileExists($fullFileName);
    }
}
