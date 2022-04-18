<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_news_create()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('admin.news.create'))
                ->select('category_id', mt_rand(1, 10))
                ->type('title', 'Test title')
                ->type('author', 'Test Author')
                ->select('status', 'DRAFT')
                ->type('description', 'Test desc')
                ->press('Добавить')
                ->assertPathIs(route('admin.news.index'));
        });
    }
}
