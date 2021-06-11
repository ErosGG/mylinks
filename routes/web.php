<?php

use App\Http\Controllers\HomeController;
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
 * Ruta que carregarà el mètode index() del controlador HomeController
 */
Route::get("/", [HomeController::class, "index"]);

/*
 * Ruta que carregarà el mètode index() del controlador ManageLinksController
 */
Route::get("/manage", [ManageLinksController::class, "index"]);

/*
 * TODO:
 * Afegir les rutes per a afegir, modificar i eliminar links
 */

/*
 * Ruta que carregarà el mètode showLinks() del controlador ShowLinksController
 */
Route::get("/{user}", [ShowLinksController::class, "showLinks"]);

