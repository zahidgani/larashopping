<?php
//namespace laravelcms\shopping;
use Illuminate\Database\Seeder;
class ProductDemoSeeder extends Seeder
{
    public function run()
    {
        DB::table('laracms_product')->insert([
            'product_name' => 'Samsung Galaxy J2 Pro',
            'product_amount' => 'Rs 9999',
            'product_desc' => 'Samsung Galaxy J2 Pro with 16GB Internal Memory,2GB RAM with Greate Camera',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('laracms_product')->insert([
            'product_name' => 'Dell Inspiron 15',
            'product_amount' => 'Rs 34000',
            'product_desc' => '500GB Hard Disk,4GB RAM,Core-i5',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

         DB::table('laracms_product')->insert([
            'product_name' => 'Micromax Canvas Mobile',
            'product_amount' => 'Rs 6000',
            'product_desc' => '2GB RAM,16GB ROM,8MP Front Camera,5MP Back Camera',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}