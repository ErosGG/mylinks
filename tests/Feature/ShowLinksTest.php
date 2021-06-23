<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Link;
use Tests\TestCase;

class ShowLinksTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Comprova que carrega correctament la vista show-links
     * @return void
     */
    public function test_loads_links_page()
    {
        $link = Link::factory()->create();
        $this->get('/')
            ->assertStatus(200)
            ->assertSee($link->title)
            ->assertSee($link->url);
    }
}
