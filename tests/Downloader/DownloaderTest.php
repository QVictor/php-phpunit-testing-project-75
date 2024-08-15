<?php

namespace Php\Package\Tests\Downloader;

use PHPUnit\Framework\TestCase;

use function Hexlet\Downloader\downloadPage;

class DownloaderTest extends TestCase
{
    private $url;
    private $outputPath;

    public function setUp(): void
    {
        parent::setUp();
        $this->url = 'http://example.com';
        $this->outputPath = '/tmp/example';
    }

    public function testDownload()
    {
        $client = new \GuzzleHttp\Client();
        $fullFileName = downloadPage($this->url, $this->outputPath, $client);
        $this->assertFileExists($fullFileName);
    }
}