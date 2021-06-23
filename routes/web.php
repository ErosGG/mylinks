<?php

use App\Http\Controllers\ManageLinksController;
use App\Http\Controllers\ShowLinksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Ruta que carregarà el mètode show() del controlador ShowLinksController
 */
Route::get("/", [ShowLinksController::class, "show"])->name("links.show");

/*
 * Ruta que carregarà el mètode index() del controlador ManageLinksController
 */
Route::get("/links/", [ManageLinksController::class, "index"])->name("links.index");

/************************
 *                      *
 *  DETALLS DELS LINKS  *
 *                      *
 ************************/

/*
 * Ruta que carregarà el mètode details() del controlador ManageLinksController
 */
Route::get("/links/{link}/", [ManageLinksController::class, "details"])->name("link.details");

/**********************
 *                    *
 *  CREACIÓ DE LINKS  *
 *                    *
 **********************/

/*
 * Ruta que carregarà el mètode create() del controlador ManageLinksController
 */
Route::post("/links/", [ManageLinksController::class, "create"])->name("link.create");

/*********************
 *                   *
 *  EDICIÓ DE LINKS  *
 *                   *
 *********************/

/*
 * Ruta que carregarà el mètode edit() del controlador ManageLinksController
 */
Route::get("/links/{link}/edit/", [ManageLinksController::class, "edit"])->name("link.edit");

/*
 * Ruta que carregarà el mètode update() del controlador ManageLinksController
 */
Route::put("/links/{link}/edit/", [ManageLinksController::class, "update"])->name("link.update");

/*************************
 *                       *
 *  ELIMINACIÓ DE LINKS  *
 *                       *
 *************************/

/*
 * Ruta que carregarà el mètode softDelete() del controlador ManageLinksController
 */
Route::delete("/links/{link}/", [ManageLinksController::class, "delete"])->name("link.delete");


/*
 * Ruta que carregarà el mètode hardDelete() del controlador ManageLinksController
 */
//Route::delete("/links/{link}/", [ManageLinksController::class, "hardDelete"])->name("links.hardDelete");
