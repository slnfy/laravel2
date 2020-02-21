<?php

use Illuminate\Database\Seeder;
use App\Dosen;
use App\Mahasiswa;
use App\Wali;
use App\Hobi;

class RelasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //menghapus semua sample data
        DB::table('dosens')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('hobis')->delete();
        DB::table('mahasiswa_hobi')->delete();

        //membuat data dosen
        $dosen = Dosen::create([
            'nama' =>'Abdul Musthafa',
            'nipd' =>'1234567890',
        ]);
        $this->command->info('Data Dosen Berhasil Dibuat');

         //membuat data mahasiswa
        $mamat = Mahasiswa::create([
            'nama' =>'Mamat Karbit',
            'nim' =>'123',
            'id_dosen' => $dosen->id
        ]);


        $dadang = Mahasiswa::create([
            'nama' =>'Dadang Musthafa',
            'nim' =>'4567',
            'id_dosen' => $dosen->id
        ]);

        $feri = Mahasiswa::create([
            'nama' =>'Feri ambyar',
            'nim' =>'1010101',
            'id_dosen' => $dosen->id
        ]);

         $this->command->info('Data Mahasiswa Berhasil Dibuat');


        //membuat data wali
        $ahmad = Wali::create([
            'nama' => 'Ahmad',
            'id_mahasiswa' =>$mamat->id
        ]);

         $dudung = Wali::create([
            'nama' => 'Dudung',
            'id_mahasiswa' =>$dadang->id
        ]);

         $basit = Wali::create([
            'nama' => 'Basit',
            'id_mahasiswa' =>$feri->id
        ]);

        $this->command->info('Data Wali Berhasil Dibuat');



        //membuat data hobi

        $mancing = Hobi::create([
            'hobi' => 'Mancing Keributan'
        ]);

        $gaming = Hobi::create([
            'hobi' => 'Game Mobile '
        ]);

        $mengaji = Hobi::create([
            'hobi' => 'Mengaji al - quran'
        ]);

        //melampirkan hobi ke mahasiswa
        $mamat->hobi()->attach($mancing->id);
        $mamat->hobi()->attach($mengaji->id);
        $dadang->hobi()->attach($gaming->id);
        $feri->hobi()->attach($mengaji->id);
        $this->command->info('Data Hobi Mahasiswa Berhasil Dibuat');

    }
}
