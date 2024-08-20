<?php

namespace Hexlet\Downloader;

function downloadPage($url, $outputPath, $clientClass)
{
    createDirectoryIfNotExists($outputPath);

    $fullFileName = getFullFileName($url, $outputPath);

    $html = getContent((new $clientClass()), $url);
    $res = file_put_contents($fullFileName, $html);

    return $fullFileName;
}

function createDirectoryIfNotExists($outputPath)
{
    if (!is_dir($outputPath)) {
        mkdir($outputPath);
    }
}

function getFullFileName($url, $outputPath)
{
    $fileName = changeSymbolsOnDash(getUrlWithoutScheme($url)) . '.html';
    return $outputPath . '/' . $fileName;
}

function getContent($client, $url)
{
    return $client->get($url)->getBody()->getContents();
}

function getUrlWithoutScheme($url)
{
    return preg_replace("(^https?://)", "", $url);
}

function changeSymbolsOnDash($url)
{
    return preg_replace('/[^a-zA-Z0-9-]/', '-', $url);
    ;
}
