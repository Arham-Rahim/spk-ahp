<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alternatif;
use App\Models\Kriteria;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Alternatif::create([
            'nik' => '0000000000000001',
            'nama' => 'Paulus  Kondorura',
            'alamat' => 'Lembang Tondon Induk',
        ]);

        Alternatif::create([
            'nik' => '0000000000000002',
            'nama' => 'Andi  Susinto Bontong',
            'alamat' => 'Lembang Tondon Induk',
        ]);

        Alternatif::create([
            'nik' => '0000000000000003',
            'nama' => 'Matius  Lapi',
            'alamat' => 'Lembang Tondon Induk',
        ]);

        Alternatif::create([
            'nik' => '0000000000000004',
            'nama' => 'Ludia loto',
            'alamat' => 'Lembang Tondon Induk',
        ]);

        Alternatif::create([
            'nik' => '0000000000000005',
            'nama' => 'tadius Serutanan',
            'alamat' => 'Lembang Tondon Induk',
        ]);

        Alternatif::create([
            'nik' => '0000000000000006',
            'nama' => 'O.t  Paladang',
            'alamat' => 'Lembang Tondon Induk',
        ]);

        Alternatif::create([
            'nik' => '0000000000000007',
            'nama' => 'Lince ',
            'alamat' => 'Lembang Tondon Induk',
        ]);

        Alternatif::create([
            'nik' => '0000000000000008',
            'nama' => 'Benyamin R. Toban',
            'alamat' => 'Lembang Tondon Induk',
        ]);

        Alternatif::create([
            'nik' => '0000000000000009',
            'nama' => 'Yohana  Datu siri',
            'alamat' => 'Lembang Tondon Induk',
        ]);

        Alternatif::create([
            'nik' => '0000000000000010',
            'nama' => 'Budi Bontong',
            'alamat' => 'Lembang Tondon Induk',
        ]);

        // Alternatif::create([
        //     'nik' => '0000000000000011',
        //     'nama' => 'Amos Kadang',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000012',
        //     'nama' => 'Yusuf Pairunan',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000013',
        //     'nama' => 'Yunus Romba',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000014',
        //     'nama' => 'Yosafat Palungan',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000015',
        //     'nama' => 'Yosepina Pairunan',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000016',
        //     'nama' => 'Hadi Tanan',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000017',
        //     'nama' => 'Marten Kanan',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '000000000000018',
        //     'nama' => 'Rahmat Mangopo',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000019',
        //     'nama' => 'L. todan',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000020',
        //     'nama' => 'Agustina  Bontong',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000021',
        //     'nama' => 'Marta Sapa',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000022',
        //     'nama' => 'Zadrak edy tayan',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000023',
        //     'nama' => 'Yanti Banne Bontong',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000024',
        //     'nama' => 'Kristina Paladang',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000025',
        //     'nama' => 'Amos loto Paladag',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000026',
        //     'nama' => 'Pidelis Sembo',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000027',
        //     'nama' => 'Andarias Kendek',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000028',
        //     'nama' => 'Margareta  Senin',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000029',
        //     'nama' => 'Lince  Pongsibidang',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000030',
        //     'nama' => 'Marten Sapa Payung',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000031',
        //     'nama' => 'Pasasa',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000032',
        //     'nama' => 'Tenggo',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000033',
        //     'nama' => 'Lai Balao',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000034',
        //     'nama' => 'Rappan',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000035',
        //     'nama' => 'Nober Boro',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000036',
        //     'nama' => 'Simon Ruru',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000037',
        //     'nama' => 'Marta Sapu',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000038',
        //     'nama' => 'Ka ka',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000039',
        //     'nama' => 'Yohanes Tallo Keru',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000040',
        //     'nama' => 'Marten  Ruru',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000041',
        //     'nama' => 'Yulius Bontong',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000042',
        //     'nama' => 'Milka bontong',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000043',
        //     'nama' => 'Daniel Tarru',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000044',
        //     'nama' => 'Rita Bontong',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000045',
        //     'nama' => 'Marten Bontong',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000046',
        //     'nama' => 'Damaris Pairunan',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000047',
        //     'nama' => 'Tadius tappi',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000048',
        //     'nama' => 'Maria Paembonan',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000049',
        //     'nama' => 'Marten Paembonan',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000050',
        //     'nama' => 'Sere Boro',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000051',
        //     'nama' => 'Sarlota',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000052',
        //     'nama' => 'L.  Ruru',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000053',
        //     'nama' => 'Daud Rombe',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000054',
        //     'nama' => 'Yusuf Tandi Konda',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000055',
        //     'nama' => 'Toni Semuel',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000056',
        //     'nama' => 'Simon Paembonan',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000057',
        //     'nama' => 'Aris Paembonan',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000058',
        //     'nama' => 'Marten Tappi',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000059',
        //     'nama' => 'Yohanis  Paembonan',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000060',
        //     'nama' => 'Duma Piter Posi',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000061',
        //     'nama' => 'Marten P',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000062',
        //     'nama' => 'Joni Parubak',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000063',
        //     'nama' => 'Sapan Paresa',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000064',
        //     'nama' => 'L. Bode',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000065',
        //     'nama' => 'Kornelius Kombong',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000066',
        //     'nama' => 'Lobo',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000067',
        //     'nama' => 'Matius Romba',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000068',
        //     'nama' => 'Ferdi Konda',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000069',
        //     'nama' => 'Mikel Matius R',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000070',
        //     'nama' => 'Sattu Pasarrin',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000071',
        //     'nama' => 'Medi Pasumbung',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000072',
        //     'nama' => 'Yulius Simon',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000073',
        //     'nama' => 'Yulianus Patandianan',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000074',
        //     'nama' => 'Piter Rannu',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000075',
        //     'nama' => 'Kombong Tuna',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000076',
        //     'nama' => 'Aris Lalang',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000077',
        //     'nama' => 'Sapriana Pangkung',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000078',
        //     'nama' => 'Yoke Anti',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000079',
        //     'nama' => 'Luter Bado',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000080',
        //     'nama' => 'Andarias P',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000081',
        //     'nama' => 'Jepi Sampe',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000082',
        //     'nama' => 'Ruben Parenden',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000083',
        //     'nama' => 'Alex Munda',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000084',
        //     'nama' => 'Toding Allo',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000085',
        //     'nama' => 'Pendi Parubak',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000086',
        //     'nama' => 'Piter Pabenteng',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000087',
        //     'nama' => 'Yohanis P',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000088',
        //     'nama' => 'Matius Kulu',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000089',
        //     'nama' => 'Y.M. Paembonan',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000090',
        //     'nama' => 'Paris Muru',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000091',
        //     'nama' => 'Simon Siamping',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000092',
        //     'nama' => 'Yakob rupang',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        // Alternatif::create([
        //     'nik' => '0000000000000093',
        //     'nama' => 'Simon Mani',
        //     'alamat' => 'Lembang Tondon Induk',
        // ]);

        
        
        
        
        
        
        // Kriteria::create([
        //     'nama_kriteria' => '',
        //     'bobot_kriteria' => 'Simon Mani',
        // ]);

        
    }
}
