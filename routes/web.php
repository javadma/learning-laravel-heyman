<?php

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


use Imanghafoori\HeyMan\Facades\HeyMan;

HeyMan::whenYouHitRouteName('panel.admin')
    ->youShouldBeLoggedIn()
    ->otherwise()
    ->redirect()->to('/welcome');
HeyMan::whenYouVisitUrl('/user/panel')
    ->youShouldBeLoggedIn()
    ->otherwise()
    ->response()->json(['msg' => 'what do you do here'], 404);


Route::view('/welcome', 'welcome');
Route::view('/admin/panel', 'welcome')->name('panel.admin');
Route::view('/user/panel', 'welcome')->name('panel.user');
