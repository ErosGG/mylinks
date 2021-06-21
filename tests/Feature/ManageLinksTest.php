<?php

namespace Tests\Feature;

use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ManageLinksTest extends TestCase
{
    use refreshDatabase;

    /**
     * Comprova que carrega correctament la vista managa-links
     * @return void
     */
    public function test_loads_manage_links_page()
    {
        $this->get('/links')
            ->assertStatus(200)
            ->assertSee("Manage Links");
    }

    public function test_shows_no_links_message()
    {
        $this->get('/links')
            ->assertSee("No hi ha links");
    }

    public function test_shows_links_when_loads_manage_links_page()
    {
        $link = Link::factory()->create();
        $this->assertDatabaseHas("links", [
            "title" => $link->title,
            "url" => $link->url,
        ]);
        $this->get('/links')
            ->assertSee($link->title)
            ->assertSee($link->url);
    }

    public function test_displays_link_details_page()
    {
        $link = Link::factory()->create();
        $this->get("links/{$link->id}")
            ->assertStatus(200)
            ->assertSee("Detalls del link {$link->id}")
            ->assertSee($link->title)
            ->assertSee($link->url)
            ->assertSee($link->views);
    }

    public function test_shows_link_does_not_exist_message_on_details_page()
    {
        $link_id = 1;
        $this->get("links/{$link_id}")
            ->assertStatus(200)
            ->assertSee("No existeix el link {$link_id}");
    }

    public function test_soft_deletes_a_link()
    {
        Link::factory()->create();
        $link = Link::first();
        $link->delete();
        $this->assertSoftDeleted($link);
        $this->get('/links')
            ->assertDontSee($link->title)
            ->assertDontSee($link->url);
    }

    public function test_hard_deletes_a_link()
    {
        $link = Link::factory()->create();
        $link = Link::where("id", $link->id);
        $link->delete();
        $link = Link::onlyTrashed()->first();
        $link->forceDelete();
        $this->assertDatabaseMissing("links", [
            "title" => $link->title,
            "url" => $link->url,
        ]);
        $this->get('/links')
            ->assertDontSee($link->title)
            ->assertDontSee($link->url);
    }
}
