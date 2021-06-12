<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * Comprova que carrega correctament la vista home
     * @return void
     */
    public function test_loads_home_page()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSee("Home")
            ->assertSee("Aquesta és la pàgina principal");
    }
}
