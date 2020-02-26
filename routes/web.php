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

Route::get('/', function () {
    return view('welcome');
});
//import model
use App\Mahasiswa;
use App\Dosen;
use App\Hobi;

// Route one to one
Route::get('relasi-1',function()
{
     //memilih data mahasiswa yang memiliki nim '123'
     $mhs =  Mahasiswa::where('nim','=','123')->first();

     //menampilkan data wali dari mahasiswa yang di pilih
     return $mhs->wali->nama;
});

Route::get('relasi-2',function()
{
     //memilih data mahasiswa yang memiliki nim '123'
     $mhs =  Mahasiswa::where('nim','=','4567')->first();

     //menampilkan data wali dari mahasiswa yang di pilih
     return $mhs->dosen->nama;
});

//one to many
Route::get('relasi-3',function()
{
     //mencari dosen yang bernama Abdul Musthafa
     $dosen =  Dosen::where('nama','=','Abdul Musthafa')->first();

     //menampilkan data wali dari mahasiswa yang di pilih
     foreach ($dosen->mahasiswa as $temp)
         echo '<li> nama : ' . $temp->nama .
         '<strong> '.$temp->nim . '</strong></li>';


});


Route::get('relasi-4',function()
{
     //mencari siswa bernama dadang
     $dadang =  Mahasiswa::where('nama','=','Dadang Musthafa')->first();

     //menampilkan data wali dari mahasiswa yang di pilih
     foreach ($dadang->hobi as $temp)
         echo '<li> <strong> '.$temp->hobi . '</strong></li>';


});

Route::get('relasi-5',function()
{
     //mencari siswa bernama dadang
     $mengaji =  Hobi::where('hobi','=','mengaji al - quran')->first();

     //menampilkan data wali dari mahasiswa yang di pilih
     foreach ($mengaji->mahasiswa as $temp)
         echo '<li> nama : ' . $temp->nama .
         '<strong> '.$temp->nim . '</strong></li>';


});

Route::get('relasi-join',function()
{
     //join laravel
     //$sql = Mahasiswa::with('wali')->get();
     $sql = DB::table('mahasiswas')
     ->select('mahasiswas.nama','mahasiswas.nim','walis.nama as nama_wali')
     ->join('walis','walis.id_mahasiswa','=','mahasiswas.id')->get();
      dd($sql);


});

Route::get('eloquent',function()
{
     //mencari mahasiswa yang beranama
     $mahasiswa = Mahasiswa::with('wali','dosen','hobi')->get();
     return view ('eloquent',compact('mahasiswa'));

});


Route::get('eloquent2',function()
{
     //mencari mahasiswa yang beranama
     $mahasiswa = Mahasiswa::with('wali','dosen','hobi')->get()->take(1);
     return view ('eloquent2',compact('mahasiswa'));

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//balde template
Route::get('beranda',function()
{
    return view('beranda');
});

Route::get('tentang',function()
{
    return view('tentang');
});

Route::get('kontak',function()
{
    return view('kontak');
});

//crudd
Route::resource('dosen','DosenController');
