<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowLinksTest extends TestCase
{
    /**
     * Comprova que carrega correctament la vista show-links
     * @return void
     */
    public function test_loads_links_page()
    {
        $this->get('/jana')
            ->assertStatus(200)
            ->assertSee("Links - jana");
    }
}
