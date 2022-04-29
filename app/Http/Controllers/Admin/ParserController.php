<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
        //dd($parser->setUrl('https://news.yandex.ru/music.rss')->getNews());

        $item = $parser->setUrl('https://news.yandex.ru/music.rss')->getNews();
        return view('admin.parser.index', ['newsList' => $item['news']]);

        //dd($parser->setUrl('https://www.cbr-xml-daily.ru/daily_utf8.xml')->getCurs());
    }
}
