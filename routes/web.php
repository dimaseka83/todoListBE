<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    // Check DB Connection
    try {
        DB::connection()->getPdo();
        if (DB::connection()->getDatabaseName()) {
            echo "Yes! Successfully connected to the DB: " . DB::connection()->getDatabaseName();
        } else {
            die("Could not find the database. Please check your configuration.");
        }
    } catch (\Exception $e) {
        die("Could not open connection to database server.  Please check your configuration.". $e->getMessage());
    }
});


Route::group(['prefix' => 'auth'], function () use ($router) {
    $router->post('login', 'AuthController@login');
    $router->post('register', 'AuthController@register');
});

Route::group(['middleware' => 'jwt'], function () use ($router) {
    $router->get('tasks', 'TasksListController@getTasks');
    $router->post('tasks', 'TasksListController@postOrUpdateTasks');
    $router->delete('tasks/{id}', 'TasksListController@deleteTasks');
});
