<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageLinksTest extends TestCase
{
    /**
     * Comprova que carrega correctament la vista managa-links
     * @return void
     */
    public function test_loads_manage_page()
    {
        $this->get('/manage')
            ->assertStatus(200)
            ->assertSee("Manage Links");
    }
}
