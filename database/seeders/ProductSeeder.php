<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSize;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Nike Superfly 10 Elite Mercurial Dream Speed',
                'description' => 'Obsessed with speed? So are the game\'s biggest stars...',
                'price' => 4429000,
                'stock' => 100, // stock total untuk produk, akan diganti dengan stok untuk tiap ukuran
                'tag' => 'Trending',
                'category_id' => 2, // Football
                'series_id' => 1,  // Mercurial
                'image' => '/src/assets/product_detail/cover_image1.png',
                'sizes' => [
                    ['size' => 'EU 40', 'stock' => 10],
                    ['size' => 'EU 41', 'stock' => 20],
                    ['size' => 'EU 42', 'stock' => 30],
                    ['size' => 'EU 43', 'stock' => 25],
                    ['size' => 'EU 44', 'stock' => 15]
                ],
                'images' => [
                    '/src/assets/product_detail/imglist1.png',
                    '/src/assets/product_detail/imglist2.png',
                    '/src/assets/product_detail/imglist3.png',
                ],
            ],
            [
                'name' => 'Nike Vaporfly 2',
                'description' => 'Designed for runners seeking speed with lightweight support.',
                'price' => 2999000,
                'stock' => 50,
                'tag' => 'Bestseller',
                'category_id' => 1, // Running
                'series_id' => 1,  // Vaporfly
                'image' => '/src/assets/product_detail/cover_image2.png',
                'sizes' => [
                    ['size' => 'EU 40', 'stock' => 15],
                    ['size' => 'EU 41', 'stock' => 15],
                    ['size' => 'EU 42', 'stock' => 10],
                    ['size' => 'EU 43', 'stock' => 10]
                ],
                'images' => [
                    '/src/assets/product_detail/imglist4.png',
                    '/src/assets/product_detail/imglist5.png',
                ],
            ],
            [
                'name' => 'Nike Air Jordan 1',
                'description' => 'The ultimate basketball shoe with iconic style and performance.',
                'price' => 3899000,
                'stock' => 75,
                'tag' => 'Popular',
                'category_id' => 3, // Basketball
                'series_id' => 1,  // Air Jordan
                'image' => '/src/assets/product_detail/cover_image3.png',
                'sizes' => [
                    ['size' => 'EU 40', 'stock' => 25],
                    ['size' => 'EU 42', 'stock' => 20],
                    ['size' => 'EU 44', 'stock' => 20],
                    ['size' => 'EU 46', 'stock' => 10]
                ],
                'images' => [
                    '/src/assets/product_detail/imglist6.png',
                    '/src/assets/product_detail/imglist7.png',
                    '/src/assets/product_detail/imglist8.png',
                ],
            ],
            [
                'name' => 'Nike Metcon 8',
                'description' => 'Perfect for weightlifting and high-intensity training sessions.',
                'price' => 1799000,
                'stock' => 120,
                'tag' => 'Trending',
                'category_id' => 4, // Gym & Training
                'series_id' => 1,  // Metcon
                'image' => '/src/assets/product_detail/cover_image4.png',
                'sizes' => [
                    ['size' => 'EU 39', 'stock' => 40],
                    ['size' => 'EU 40', 'stock' => 40],
                    ['size' => 'EU 41', 'stock' => 40],
                ],
                'images' => [
                    '/src/assets/product_detail/imglist9.png',
                    '/src/assets/product_detail/imglist10.png',
                ],
            ],
            [
                'name' => 'Nike Air Force 1',
                'description' => 'A timeless classic perfect for your everyday lifestyle.',
                'price' => 1499000,
                'stock' => 200,
                'tag' => 'Bestseller',
                'category_id' => 5, // Lifestyle
                'series_id' => 1,  // Air Force
                'image' => '/src/assets/product_detail/cover_image5.png',
                'sizes' => [
                    ['size' => 'EU 38', 'stock' => 50],
                    ['size' => 'EU 39', 'stock' => 50],
                    ['size' => 'EU 40', 'stock' => 50],
                    ['size' => 'EU 41', 'stock' => 25],
                    ['size' => 'EU 42', 'stock' => 25],
                ],
                'images' => [
                    '/src/assets/product_detail/imglist11.png',
                    '/src/assets/product_detail/imglist12.png',
                ],
            ],
        ];

        foreach ($products as $productData) {
            // Create the main product
            $product = Product::create([
                'name' => $productData['name'],
                'description' => $productData['description'],
                'price' => $productData['price'],
                'stock' => $productData['stock'],
                'tag' => $productData['tag'],
                'category_id' => $productData['category_id'],
                'series_id' => $productData['series_id'],
                'image' => $productData['image'],
            ]);

            // Add sizes for the product
            foreach ($productData['sizes'] as $size) {
                ProductSize::create([
                    'product_id' => $product->id,
                    'size' => $size['size'],
                    'stock' => $size['stock'], // Include stock for each size
                ]);
            }

            // Add images for the product
            foreach ($productData['images'] as $image) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $image,
                ]);
            }
        }
    }
}
