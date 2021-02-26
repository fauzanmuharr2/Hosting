<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Provinsi extends Seeder
{

    public function run()
    {
        DB::table('provinsis')->insert([
            ['kode_provinsi' => 100, 'nama_provinsi' => 'ACEH'],
            ['kode_provinsi' => 101, 'nama_provinsi' => 'SUMATERA UTARA'],
            ['kode_provinsi' => 102, 'nama_provinsi' => 'SUMATERA BARAT'],
            ['kode_provinsi' => 103, 'nama_provinsi' => 'RIAU'],
            ['kode_provinsi' => 104, 'nama_provinsi' => 'JAMBI'],
            ['kode_provinsi' => 105, 'nama_provinsi' => 'SUMATERA SELATAN'],
            ['kode_provinsi' => 106, 'nama_provinsi' => 'BENGKULU'],
            ['kode_provinsi' => 107, 'nama_provinsi' => 'LAMPUNG'],
            ['kode_provinsi' => 108, 'nama_provinsi' => 'KEPULAUAN BANGKA BELITUNG'],
            ['kode_provinsi' => 109, 'nama_provinsi' => 'KEPULAUAN RIAU'],
            ['kode_provinsi' => 110, 'nama_provinsi' => 'DKI JAKARTA'],
            ['kode_provinsi' => 111, 'nama_provinsi' => 'JAWA BARAT'],
            ['kode_provinsi' => 112, 'nama_provinsi' => 'JAWA TENGAH'],
            ['kode_provinsi' => 113, 'nama_provinsi' => 'DI YOGYAKARTA'],
            ['kode_provinsi' => 114, 'nama_provinsi' => 'JAWA TIMUR'],
            ['kode_provinsi' => 115, 'nama_provinsi' => 'BANTEN'],
            ['kode_provinsi' => 116, 'nama_provinsi' => 'BALI'],
            ['kode_provinsi' => 117, 'nama_provinsi' => 'NUSA TENGGARA BARAT'],
            ['kode_provinsi' => 118, 'nama_provinsi' => 'NUSA TENGGARA TIMUR'],
            ['kode_provinsi' => 119, 'nama_provinsi' => 'KALIMANTAN BARAT'],
            ['kode_provinsi' => 120, 'nama_provinsi' => 'KALIMANTAN TENGAH'],
            ['kode_provinsi' => 121, 'nama_provinsi' => 'KALIMANTAN SELATAN'],
            ['kode_provinsi' => 122, 'nama_provinsi' => 'KALIMANTAN TIMUR'],
            ['kode_provinsi' => 123, 'nama_provinsi' => 'KALIMANTAN UTARA'],
            ['kode_provinsi' => 124, 'nama_provinsi' => 'SULAWESI UTARA'],
            ['kode_provinsi' => 125, 'nama_provinsi' => 'SULAWESI TENGAH'],
            ['kode_provinsi' => 126, 'nama_provinsi' => 'SULAWESI SELATAN'],
            ['kode_provinsi' => 127, 'nama_provinsi' => 'SULAWESI TENGGARA'],
            ['kode_provinsi' => 128, 'nama_provinsi' => 'GORONTALO'],
            ['kode_provinsi' => 129, 'nama_provinsi' => 'SULAWESI BARAT'],
            ['kode_provinsi' => 130, 'nama_provinsi' => 'MALUKU'],
            ['kode_provinsi' => 131, 'nama_provinsi' => 'MALUKU UTARA'],
            ['kode_provinsi' => 132, 'nama_provinsi' => 'PAPUA BARAT'],
            ['kode_provinsi' => 133, 'nama_provinsi' => 'PAPUA']
        ]);
    }
}