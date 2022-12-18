<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->create([
            'image_product'=>'hijab_motif.jfif',
            'name'=>'Hijab Motif',
            'description'=>'Hijab dengan motif bercorak yang sangat indah dengan variasi warna yang pas',
            'price'=>'33000',
            'stock'=>'0',
            'weight'=>'0.5',
            'status'=>'1',
            'category_id'=>'5',
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'bedong_bayi.jfif',
            'name'=> 'Bedong Bayi',
            'description'=> 'Bedong bayi dengan beberapa varian',           
            'stock'=>'0',
            'price'=>'20000',
            'weight'=>'0.75',
            'status'=>'1',
            'category_id'=>'4',
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'hijab_pashmina_diamond.jfif',
            'name'=> 'Hijab Pashmina Diamond',
            'description'=>'Hijab dengan kain yang lembut',
            'price'=>'23000',
            'stock'=>'0',
            'weight'=>'0.75',
            'status'=>'1',
            'category_id'=>'5',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'handuk_kecil.jfif', 
            'name'=> 'Handuk Kecil',
            'description'=>'Handuk dengan kain lembut kecil',
            'price'=>'48500',
            'stock'=>'0',
            'weight'=>'0.5',
            'status'=>'1',
            'category_id'=>'3',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'handuk_besar.jfif', 
            'name'=> 'Handuk',
            'description'=>'Handuk halus ukuran besar',
            'stock'=>'0',
            'price'=>'54500',
            'weight'=>'0.80',
            'status'=>'1',
            'category_id'=>'3',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'handuk_motif.jfif', 
            'name'=> 'Handuk Motif',
            'description'=>'Handuk bermotif halus',
            'stock'=>'0',
            'price'=>'65000',
            'weight'=>'0.80',
            'status'=>'1',
            'category_id'=>'3',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'dompet_koin_boneka_lucu.jfif', 
            'name'=> 'Dompet Koin Boneka Lucu',
            'description'=>'Dompet koin lucu dengan 4 varian',
            'stock'=>'0',
            'price'=>'13500',
            'weight'=>'1.5',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'dompet_kartu_polos.jfif', 
            'name'=> 'Dompet Kartu Polos',
            'description'=>'Dompet kartu dengan model yang polos',
            'stock'=>'0',
            'price'=>'34500',
            'weight'=>'1.5',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'penjepit_foto.jpeg', 
            'name'=> 'Penjepit Foto',
            'description'=>'Penjepit foto lucu',
            'stock'=>'0',
            'price'=>'6000',
            'weight'=>'0.25',
            'status'=>'1',
            'category_id'=>'7',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'gantungan_kunci_lucu.webp', 
            'name'=> 'Gantungan Kunci Lucu',
            'description'=>'Gantungan kunci lucu dengan beberapa varian',
            'stock'=>'0',
            'price'=>'5500',
            'weight'=>'0.4',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'lomira_lip_serum.jfif', 
            'name'=> 'Lomira Lip Serum',
            'description'=>'Serum pewarna bibir',
            'stock'=>'0',
            'price'=>'19500',
            'weight'=>'0.5',
            'status'=>'1',
            'category_id'=>'2',
              
            'brand_id'=>'2',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'justmiss_highlighter.png', 
            'name'=> 'Highlighter JustMiss',
            'description'=>'Produk kecantikan untuk mempercerah wajah',
            'stock'=>'0',
            'price'=>'33500',
            'weight'=>'0.7',
            'status'=>'1',
            'category_id'=>'2',
              
            'brand_id'=>'3',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'focallure_eyeshadow.png', 
            'name'=> 'Focallure Eyeshadow',
            'description'=>'Palet eyeshadow untuk merias mata',
            'stock'=>'0',
            'price'=>'80000',
            'weight'=>'0.7',
            'status'=>'1',
            'category_id'=>'2',
              
            'brand_id'=>'4',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'cepol_bunga.jfif', 
            'name'=> 'Cepol Bunga',
            'description'=>'Cepol dengan beberapa variasi warna dan berbentuk bunga',
            'stock'=>'0',
            'price'=>'13500',
            'weight'=>'0.7',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'cepol_siput.jfif', 
            'name'=> 'Cepol Siput',
            'description'=>'Cepol bentuk siput dengan beberapa varian',
            'stock'=>'0',
            'price'=>'20000',
            'weight'=>'0.7',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'bando_kain_bintik.jfif', 
            'name'=> 'Bando Kain Bintik-Bintik',
            'description'=>'Bando kain dengan motif bintik bintik',
            'stock'=>'0',
            'price'=>'15000',
            'weight'=>'1.5',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'bando_kain_mekar.jfif', 
            'name'=> 'Bando Kain Mekar',
            'description'=>'Bando kain yang mekar dengan beberapa varian warna',
            'stock'=>'0',
            'price'=>'15000',
            'weight'=>'1.5',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'bando_kepang.jfif', 
            'name'=> 'Bando Kepang',
            'description'=>'Bando dengan model kepang dengan beberapa varian warna',
            'stock'=>'0',
            'price'=>'17500',
            'weight'=>'1.5',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'bando_kepang.jfif', 
            'name'=> 'Bando Kepang',
            'description'=>'Bando dengan model kepang dengan beberapa varian warna',
            'stock'=>'0',
            'price'=>'17500',
            'weight'=>'1.5',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'bando_bunga.jfif', 
            'name'=> 'Bando Bunga-Bunga',
            'description'=>'Bando dengan model kepang dengan beberapa varian warna',
            'stock'=>'0',
            'price'=>'17500',
            'weight'=>'1.5',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'bando_kain_kepang_rantai.jfif', 
            'name'=> 'Bando Kain Kepang Rantai',
            'description'=>'Bando kain kepang dengan rantai emas yang memiliki beberapa varian',
            'stock'=>'0',
            'price'=>'25000',
            'weight'=>'1.5',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'bando_kain_rantai.jfif', 
            'name'=> 'Bando Kain Rantai',
            'description'=>'Bando kain dengan rantai berwarna emas yang memiliki beberapa varian',
            'stock'=>'0',
            'price'=>'13500',
            'weight'=>'2',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'scrunchie_kain_satin.jfif', 
            'name'=> 'Scrunchie Satin',
            'description'=>'Scrunchie terbuat dari kain satin dengan beberapa varian warna',
            'stock'=>'0',
            'price'=>'13500',
            'weight'=>'1.25',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'scrunchie_kain_kotak.jfif', 
            'name'=> 'Scrunchie Kain Motif Kotak-Kotak',
            'description'=>'Scrunchie kain dengan motif bintik bintik yang berbentuk kotak-kotak',
            'stock'=>'0',
            'price'=>'7500',
            'weight'=>'1.25',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'scrunchie_kain_kotak.jfif', 
            'name'=> 'Scrunchie Kain Motif Kotak-Kotak',
            'description'=>'Scrunchie kain dengan motif bintik bintik yang berbentuk kotak-kotak',
            'stock'=>'0',
            'price'=>'7500',
            'weight'=>'1.25',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'tempat_kacamata_bunga.jfif', 
            'name'=> 'Tempat Kacamata Motif Bunga',
            'description'=>'Tempat kacamata dengan motif bunga',
            'stock'=>'0',
            'price'=>'32500',
            'weight'=>'3.25',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'tempat_kacamata_buah.jfif', 
            'name'=> 'Tempat Kacamata Motif Buah',
            'description'=>'Tempat kacamata dengan motif buah',
            'stock'=>'0',
            'price'=>'32500',
            'weight'=>'3.25',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'dompet_kartu_model_buku_motif.jfif', 
            'name'=> 'Dompet Kartu Model Buku Dengan Motif',
            'description'=>'Dompet kartu model buku dengan beberapa varian motif dan warna',
            'stock'=>'0',
            'price'=>'34500',
            'weight'=>'2.25',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'dompet_gantungan_kunci_motif.jfif', 
            'name'=> 'Dompet Gantungan Kunci Motif',
            'description'=>'Dompet gantungan kunci dengan beberapa varian motif dan warna',
            'stock'=>'0',
            'price'=>'34500',
            'weight'=>'2.3',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'dompet_kartu_model_buku_polos.jfif', 
            'name'=> 'Dompet Kartu Model Buku Polos',
            'description'=>'Dompet model buku dan cover yang polos dengan beberapa varian warna',
            'stock'=>'0',
            'price'=>'25000',
            'weight'=>'2.25',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'dompet_kartu_model_buku_florafauna.jfif', 
            'name'=> 'Dompet Kartu Model Buku Flora & Fauna',
            'description'=>'Dompet kartu model buku dengan motif flora dan fauna dengan beberapa varian',
            'stock'=>'0',
            'price'=>'25000',
            'weight'=>'2.25',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'dompet_kartu_model_buku_florafauna.jfif', 
            'name'=> 'Dompet Kartu Model Buku Flora & Fauna',
            'description'=>'Dompet kartu model buku dengan motif flora dan fauna dengan beberapa varian',
            'stock'=>'0',
            'price'=>'25000',
            'weight'=>'2.25',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'dompet_kartu_model_buku_kartunhewan.jfif', 
            'name'=> 'Dompet Kartu Model Buku Kartun Hewan',
            'description'=>'Dompet model buku dengan gambar kartun hewan yang memiliki beberapa varian gambar dan warna',
            'stock'=>'0',
            'price'=>'25000',
            'weight'=>'2.3',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'dompet_kulit_persegi.jfif', 
            'name'=>  'Dompet Kulit Bifold Horizontal Polos',
            'description'=>'Dompet kulit lipat dengan beberapa varian warna',
            'stock'=>'0',
            'price'=>'60000',
            'weight'=>'2.3',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'dompet_kulit_persegipanjang.jfif', 
            'name'=>  'Dompet Kulit Bifold Vertikal Polos',
            'description'=>'Dompet lipat panjang polos dengan beberapa varian warna',
            'stock'=>'0',
            'price'=>'40000',
            'weight'=>'2.3',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'dompet_gantungan_kunci_florafauna.jfif', 
            'name'=>  'Dompet Gantungan Kunci Flora & Fauna',
            'description'=>'Dompet gantungan kunci dengan motif flora & fauna bersama beberapa varian',
            'stock'=>'0',
            'price'=>'27500',
            'weight'=>'2',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'dompet_gantungan_kunci_kartun.jfif', 
            'name'=> 'Dompet Gantungan Kunci Kartun',
            'description'=>'Dompet gantungan kunci dengan gambar kartun',
            'stock'=>'0',
            'price'=>'27500',
            'weight'=>'2',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=> 'tempat_kacamata_bening_setengah.jfif', 
            'name'=>  'Tempat Kacamata Bening Setengah',
            'description'=>'Tempat kacamata bening setengah dengan beberapa varian gambar flora ',
            'stock'=>'0',
            'price'=>'27500',
            'weight'=>'2',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=> 'tempat_kacamata_bening_bergambar.jfif', 
            'name'=>'Tempat Kacamata Bening Bergambar Kartun',
            'description'=>'Tempat kacamata bening dengan gambar kartun',
            'stock'=>'0',
            'price'=>'25000',
            'weight'=>'2',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=> 'tempat_kacamata_lipat.jfif', 
            'name'=> 'Tempat Kacamata Lipat',
            'description'=> 'Tempat kacamata yang bisa dilipat ',
            'stock'=>'0',
            'price'=>'27500',
            'weight'=>'2.2',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'tempat_kacamata_warnabunga.jfif', 
            'name'=> 'Tempat Kacamata Berwarna Dengan Desain Bunga-Bunga',
            'description'=> 'Tempat kacamata dengan warna dan bunga-bunga',
            'stock'=>'0',
            'price'=>'25000',
            'weight'=>'2.3',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'dompet_koin_bulat.jfif', 
            'name'=> 'Dompet Koin Bulat Gambar',
            'description'=>'Dompet koin bulat dengan gambar dan tali',
            'stock'=>'0',
            'price'=>'37500',
            'weight'=>'2.3',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'dompet_koin_garis.jfif', 
            'name'=> 'Dompet Koin Dengan Motif Garis-Garis',
            'description'=>'Dompet koin dengan motif garis-garis',
            'stock'=>'0',
            'price'=>'15000',
            'weight'=>'2.2',
            'status'=>'1',
            'category_id'=>'1',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'aksesoris_mandi_1.jfif', 
            'name'=> 'Perlengkapan Mandi 1',
            'description'=>'Perangkat mandi',
            'stock'=>'0',
            'price'=>'50000',
            'weight'=>'2.2',
            'status'=>'1',
            'category_id'=>'3',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'aksesoris_mandi_2.jfif', 
            'name'=> 'Perlengkapan Mandi 2',
            'description'=>'Set perlengkapan mandi ',
            'stock'=>'0',
            'price'=>'50000',
            'weight'=>'2.2',
            'status'=>'1',
            'category_id'=>'3',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=>'tas_skin_care_kotak.jfif', 
            'name'=> 'Tas Skincare Motif Kotak',
            'description'=>'Tas skin care dengan motif kotak kotak',
            'stock'=>'0',
            'price'=>'15000',
            'weight'=>'2.2',
            'status'=>'1',
            'category_id'=>'6',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=> 'tas_skin_care_bunga.jfif', 
            'name'=> 'Tas Skincare Motif Bunga',
            'description'=>'Tas skin care motif bunga bunga',
            'stock'=>'0',
            'price'=>'28500',
            'weight'=>'2.2',
            'status'=>'1',
            'category_id'=>'6',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=> 'tas_skin_care_terang.jfif', 
            'name'=>  'Tas Skincare Polos Terang',
            'description'=>'Tas skin care warna terang',
            'stock'=>'0',
            'price'=>'32500',
            'weight'=>'2.2',
            'status'=>'1',
            'category_id'=>'6',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=> 'tas_skin_care_gelap.jfif', 
            'name'=>  'Tas Skincare Polos Gelap',
            'description'=>'Tas Skin Care Gelap',
            'stock'=>'0',
            'price'=>'25000',
            'weight'=>'2.2',
            'status'=>'1',
            'category_id'=>'6',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
        Product::factory()->create([
            'image_product'=> 'tas_laptop_escort.jfif', 
            'name'=> 'Tas Laptop Escort',
            'description'=>'Tas laptop escort anti air',
            'stock'=>'0',
            'price'=>'150000',
            'weight'=>'2.2',
            'status'=>'1',
            'category_id'=>'6',
              
            'brand_id'=>'1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")

        ]);
    }
}
