<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Models\Project;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::bind('project', function ($slug, $route) {
    $project = $route->parameter('project');

    return Project::where([
        'is_active' => 1,
    ])->with(['user','company','city'])->findOrFail($project);
});


Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/recent', [ProjectController::class, 'recent']);

Route::get('/projects/latest', [ProjectController::class, 'latest']);

Route::post('/projects/create', [ProjectController::class, 'create']);


Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::get('/projects/view/{project}', [ProjectController::class, 'view']);
