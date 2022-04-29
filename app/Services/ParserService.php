<?php

namespace App\Services;

use App\Contracts\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    protected string $url;

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function getNews(): array
    {
        $xml = XmlParser::load($this->url);
        return $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ],
        ]);
    }

    public function getCurs(): array
    {
        $xml = XmlParser::load($this->url);
        return $xml->parse([
            'cur' => [
                'uses' => 'Valute[NumCode,CharCode,Nominal,Name,Value]'
            ],
        ]);
    }
}