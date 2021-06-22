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

    /*************************
     *                       *
     *  PÀGINA MANAGE LINKS  *
     *                       *
     *************************/

    /**
     * Comprova que carrega correctament la vista managa-links
     * @return void
     */
    public function test_loads_manage_links_page()
    {
        $this->get('/links/')
            ->assertStatus(200)
            ->assertSee("Manage Links");
    }

    public function test_shows_no_links_message()
    {
        $this->get('/links/')
            ->assertSee("No hi ha links");
    }

    public function test_shows_links_when_loads_manage_links_page()
    {
        $link = Link::factory()->create();
        $this->assertDatabaseHas("links", [
            "title" => $link->title,
            "url" => $link->url,
        ]);
        $this->get('/links/')
            ->assertSee($link->title)
            ->assertSee($link->url);
    }

    /************************
     *                      *
     *  DETALLS DELS LINKS  *
     *                      *
     ************************/

    public function test_displays_link_details_page()
    {
        $link = Link::factory()->create();
        $this->get("/links/{$link->id}")
            ->assertStatus(200)
            ->assertSee("Detalls del link {$link->id}")
            ->assertSee($link->title)
            ->assertSee($link->url)
            ->assertSee($link->views);
    }

    public function test_shows_link_does_not_exist_message_on_details_page()
    {
        $link = 1;
        $this->get("/links/{$link}")
            ->assertStatus(404)
            ->assertSee("Pàgina no trobada");
    }

    /**********************
     *                    *
     *  CREACIÓ DE LINKS  *
     *                    *
     **********************/

    public function test_creates_a_new_link()
    {
        $link = Link::factory()->create();
        $this->post("/links/", [
            "title" => $link->title,
            "url" => $link->url,
        ]);
        $this->assertDatabaseHas("links", [
            "title" => $link->title,
            "url" => $link->url,
        ]);
        $this->get("/links/")
            ->assertSee($link->title)
            ->assertSee($link->url);
    }

    public function test_required_title_on_link_creation_form()
    {
        $link = Link::factory()->make();
        $this->post("/links/", [
            "title" => "",
            "url" => $link->url,
        ])->assertSessionHasErrors([
            "title" => "El camp títol és obligatori"
        ]);
        $this->assertEquals(0, Link::count());
        // $this->assertDatabaseMissing("links", [
        //     "url" => $link->url,
        // ]);
        $this->get("/links/")
            ->assertSee("El camp títol és obligatori");
    }

    public function test_required_url_on_link_creation_form()
    {
        $link = Link::factory()->make();
        $this->post("/links/", [
            "title" => $link->title,
            "url" => "",
        ])->assertSessionHasErrors([
            "url" => "El camp URL és obligatori"
        ]);
        $this->assertEquals(0, Link::count());
        // $this->assertDatabaseMissing("links", [
        //     "url" => $link->url,
        // ]);
        $this->get("/links/")
            ->assertSee("El camp URL és obligatori");
    }

    public function test_valid_url_on_link_creation_form()
    {
        $link = Link::factory()->make();
        $this->post("/links/", [
            "title" => $link->title,
            "url" => "url-no-valida",
        ])->assertSessionHasErrors([
            "url" => "El camp URL ha de ser una URL vàlida"
        ]);
        $this->assertEquals(0, Link::count());
        // $this->assertDatabaseMissing("links", [
        //     "url" => $link->url,
        // ]);
        $this->get("/links/")
            ->assertSee("El camp URL ha de ser una URL vàlida");
    }

    public function test_url_must_be_unique_when_trying_to_create_it()
    {
        $linkA = Link::factory()->create();
        $linkB = Link::factory()->make([
            "url" => $linkA->url,
        ]);
        $this->post("/links/", [
            "title" => $linkB->title,
            "url" => $linkB->url,
        ])->assertSessionHasErrors([
            "url" => "La URL no pot ser repetida",
        ]);
        $this->assertEquals(1, Link::count());
        $this->get("/links/")
            ->assertSee("La URL no pot ser repetida");
    }

    /*********************
     *                   *
     *  EDICIÓ DE LINKS  *
     *                   *
     *********************/

    public function test_loads_edit_link_page()
    {
        $link = Link::factory()->create();
        $this->get("/links/{$link->id}/edit/")
            ->assertStatus(200)
            ->assertViewIs("edit-link")
            ->assertViewHas("link", $link)
            ->assertSee("Edició del link {$link->id}")
            ->assertSee($link->title)
            ->assertSee($link->url);
    }

    public function test_updates_a_link()
    {
        $link = Link::factory()->create();
        $oldTitle = $link->title;
        $oldUrl = $link->url;
        $newTitle = "Títol nou";
        $newUrl = "https://www.urlnova.cat/";
        $link->title = $newTitle;
        $link->url = $newUrl;
        $this->put("/links/{$link->id}/edit/", [
            "title" => $newTitle,
            "url" => $newUrl,
        ])->assertRedirect("/links/{$link->id}/");
        $this->assertDatabaseMissing("links", [
            "title" => $oldTitle,
            "url" => $oldUrl,
        ])->assertDatabaseHas("links", [
            "title" => $newTitle,
            "url" => $newUrl,
        ]);
        $this->get("/links/{$link->id}/")
            ->assertSee($newTitle)
            ->assertSee($link->url);
    }

    public function test_required_title_on_link_edit_form()
    {

        $link = Link::factory()->create();
        $this->from("/links/{$link->id}/edit/")
            ->put("/links/{$link->id}/edit/", [
                "title" => "",
                "url" => "https://www.provaedicio.cat/",
        ])
            ->assertRedirect("/links/{$link->id}/edit/")
            ->assertSessionHasErrors([
            "title" => "El camp títol és obligatori",
        ]);
        $this->assertDatabaseMissing("links", [
            "url" => "https://www.provaedicio.cat/",
        ])->assertDatabaseHas("links", [
            "title" => $link->title,
            "url" => $link->url,
        ]);;
    }

    public function test_required_url_on_link_edit_form()
    {
        $link = Link::factory()->create();
        $this->from("/links/{$link->id}/edit/")
            ->put("/links/{$link->id}/edit/", [
                "title" => "Títol Editat",
                "url" => "",
            ])
            ->assertRedirect("/links/{$link->id}/edit/")
            ->assertSessionHasErrors([
                "url" => "El camp URL és obligatori",
            ]);
        $this->assertDatabaseMissing("links", [
            "title" => "Títol Editat",
        ])->assertDatabaseHas("links", [
            "title" => $link->title,
            "url" => $link->url,
        ]);
    }

    public function test_valid_url_on_link_edit_form()
    {
        $link = Link::factory()->create();
        $this->from("/links/{$link->id}/edit/")
            ->put("/links/{$link->id}/edit/", [
                "title" => "Títol Editat",
                "url" => "url-no-valida",
            ])
            ->assertRedirect("/links/{$link->id}/edit/")
            ->assertSessionHasErrors([
                "url" => "El camp URL ha de ser una URL vàlida"
            ]);
        $this->assertDatabaseMissing("links", [
            "title" => "Títol Editat",
        ])->assertDatabaseHas("links", [
            "title" => $link->title,
            "url" => $link->url,
        ]);
    }

    public function test_url_must_be_unique_when_trying_to_update_it()
    {
        $linkA = Link::factory()->create([
            "url" => "https://www.url-existent.cat/",
        ]);
        $linkB = Link::factory()->create([
            "url" => "https://www.url-a-editar.cat/",
        ]);
        $this->from("/links/{$linkB->id}/edit/")
            ->put("/links/{$linkB->id}/edit/", [
                "title" => $linkB->title,
                "url" => $linkA->url,
            ])
            ->assertRedirect("/links/{$linkB->id}/edit/")
            ->assertSessionHasErrors([
                "url" => "La URL no pot ser repetida",
            ]);
    }

    public function test_url_can_be_the_same_when_trying_to_update_a_link()
    {
        $link = Link::create([
            "title" => "Original",
            "url" => "https://www.url-original.cat/",
        ]);
        $this->from("/links/{$link->id}/edit/")
            ->put("/links/{$link->id}/edit/", [
                "title" => "Editat",
                "url" => "https://www.url-original.cat/",
            ])
            ->assertRedirect("/links/{$link->id}/");
        $this->assertDatabaseMissing("links", [
            "title" => "Original",
        ])->assertDatabaseHas("links", [
            "title" => "Editat",
        ]);
    }

    /*************************
     *                       *
     *  ELIMINACIÓ DE LINKS  *
     *                       *
     *************************/

    public function test_soft_deletes_a_link()
    {
        $link = Link::factory()->create();
        $this->delete("links/{$link->id}/")
            ->assertRedirect("/links/");
        $this->assertSoftDeleted($link)
            ->assertSame(0, Link::count());
        $this->get('/links/')
            ->assertDontSee($link->title)
            ->assertDontSee($link->url);
    }

    /*
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
        $this->get('/links/')
            ->assertDontSee($link->title)
            ->assertDontSee($link->url);
    }
    */
}
