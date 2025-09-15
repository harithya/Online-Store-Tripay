<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories =  ProductCategory::all();
        $description = '- Dibuat dari material yang berkualitas tinggi dengan kilau dan warna yang mewah.
Detail fungsi<br/>
- Transparan: Tidak transparan(Hanya 00 WHITE yang sedikit transparan)<br/>
- Fit: Reguler<br/>
- Saku: Tidak ada<br/>
- Beberapa warna produk mungkin tidak tersedia.<br/>
<br/>
Kode Produk 475357 <br/>
Harap dicatat bahwa produk ini mungkin memiliki ID produk yang berbeda, meskipun itu adalah produk yang serupa.';
        $data = [
            [
                'image' => 'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/475357/item/goods_31_475357_3x4.jpg?width=294',
                'sku' => '475357',
                'name' => 'T-Shirt SUPIMA Katun',
                'price' => 199000,
                'product_category_id' => $categories->random()->id,
                'description' => $description,
                'reference' => config('tripay.merchant_code')
            ],
            [
                'image' => 'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/474244/sub/goods_474244_sub14_3x4.jpg?width=369',
                'sku' => '474244',
                'name' => 'AIRism Katun T-Shirt Kerah Bulat Lengan Pendek',
                'price' => 149000,
                'product_category_id' => $categories->random()->id,
                'description' => $description,
                'reference' => config('tripay.merchant_code')
            ],
            [
                'image' => 'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/464310/sub/goods_464310_sub14_3x4.jpg?width=369',
                'sku' => '464310',
                'name' => 'AIRism Tank Top Mesh Anti Bau',
                'price' => 149000,
                'product_category_id' => $categories->random()->id,
                'description' => $description,
                'reference' => config('tripay.merchant_code')
            ],
            [
                'image' => 'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/454315/sub/goods_454315_sub14_3x4.jpg?width=369',
                'sku' => '454315',
                'name' => 'AIRism Katun T-Shirt Kerah Bulat Lengan Pendek',
                'price' => 149000,
                'product_category_id' => $categories->random()->id,
                'description' => $description,
                'reference' => config('tripay.merchant_code')
            ],
            [
                'image' => 'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/483095/sub/goods_483095_sub14_3x4.jpg?width=369',
                'sku' => '483095',
                'name' => 'Kemeja Kerah Terbuka Lengan Pendek',
                'price' => 299000,
                'product_category_id' => $categories->random()->id,
                'description' => $description,
                'reference' => config('tripay.merchant_code')
            ],
            [
                'image' => 'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/464938/sub/goods_464938_sub14_3x4.jpg?width=369',
                'sku' => '464938',
                'name' => 'Kemeja Katun Modal Kerah Terbuka | Lengan Pendek',
                'price' => 299000,
                'product_category_id' => $categories->random()->id,
                'description' => $description,
                'reference' => config('tripay.merchant_code')
            ],
            [
                'image' => 'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/483096/sub/goods_483096_sub14_3x4.jpg?width=369',
                'sku' => '483096',
                'name' => 'Kemeja Kerah Terbuka Lengan Pendek',
                'price' => 299000,
                'product_category_id' => $categories->random()->id,
                'description' => $description,
                'reference' => config('tripay.merchant_code')
            ],
            [
                'image' => 'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/483095/sub/goods_483095_sub14_3x4.jpg?width=369',
                'sku' => '483095',
                'name' => 'Kemeja Kerah Terbuka Lengan Pendek',
                'price' => 299000,
                'product_category_id' => $categories->random()->id,
                'description' => $description,
                'reference' => config('tripay.merchant_code')
            ],
            [
                'image' => 'https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/479749/sub/goods_479749_sub14_3x4.jpg?width=369',
                'sku' => '479749',
                'name' => 'AIRism Katun Gaun Flare',
                'price' => 399000,
                'product_category_id' => $categories->random()->id,
                'description' => $description,
                'reference' => config('tripay.merchant_code')
            ]
        ];

        foreach ($data as $item) {
            Product::updateOrCreate(['sku' => $item['sku']], array_merge(
                $item,
                [
                    'slug' => Str::slug($item['name'])
                ]
            ));
        }
    }
}
