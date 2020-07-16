<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/siswa', function (Request $request) {

    return $request->siswa();
});


Route::apiResources(['siswa' => 'API\userController']);
Route::apiResources(['gtk' => 'API\gtkController']);
Route::apiResources(['rombel' => 'API\rombelController']);
Route::apiResources(['ekskul' => 'API\EkskulController']);
Route::apiResources(['alumni' => 'API\AlumniController']);

Route::get('profile', 'API\userController@profile');
Route::put('userupdate', 'API\userController@userupdate');
Route::put('sisupdate', 'API\userController@sisupdate');
Route::post('addtahun', 'API\userController@addtahun');
Route::post('reg', 'API\userController@createuser');
Route::get('carisiswa', 'API\userController@search');
Route::get('cariGTK', 'API\gtkController@search');
Route::get('user', 'API\userController@user');
Route::get('tahun', 'API\userController@tahun');
Route::get('anggota', 'API\rombelController@anggota');
Route::post('delanggota', 'API\rombelController@delanggota');
Route::get('nonrombel', 'API\rombelController@nonrombel');
Route::get('nonekskul', 'API\EkskulController@nonekskul');
Route::get('loadekskul', 'API\EkskulController@loadekskul');
Route::post('anggotaekskul', 'API\EkskulController@anggotaekskul');
Route::post('delekskul', 'API\EkskulController@delekskul');
Route::post('kelas', 'API\rombelController@kelas');


Route::get('soal', 'API\siswaController@soal');
Route::get('loadsoal', 'API\siswaController@loadsoal');
Route::get('ujiansoal', 'API\siswaController@ujiansoal');
Route::get('ujianloadsoal', 'API\siswaController@ujianloadsoal');
