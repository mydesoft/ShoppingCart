<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
        	'name' => 'Laptop 1',
        	'slug' => 'Laptop-1',
        	'details' => '15 Inch, 1TB SSD, 4Gig RAM',
        	'price' => 78000,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'
        ]);


        Product::create([
        	'name' => 'Laptop 2',
        	'slug' => 'Laptop-2',
        	'details' => '15 Inch, 1TB SSD, 2Gig RAM',
        	'price' => 88000,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'
        ]);


        Product::create([
        	'name' => 'Laptop 3',
        	'slug' => 'Laptop-3',
        	'details' => '10 Inch, 2TB SSD, 8Gig RAM',
        	'price' => 70000,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'
        ]);


        Product::create([
        	'name' => 'Laptop 4',
        	'slug' => 'Laptop-4',
        	'details' => '8 Inch, 500Gig SSD, 4Gig RAM',
        	'price' => 68000,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'
        ]);


        Product::create([
        	'name' => 'Laptop 5',
        	'slug' => 'Laptop-5',
        	'details' => '15 Inch, 1TB SSD, 2Gig RAM',
        	'price' => 70000,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'
        ]);


        Product::create([
        	'name' => 'Laptop 6',
        	'slug' => 'Laptop-6',
        	'details' => '12 Inch, 1TB SSD, 8ig RAM',
        	'price' => 100000,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'
        ]);


        Product::create([
        	'name' => 'Laptop 7',
        	'slug' => 'Laptop-7',
        	'details' => '10 Inch, 250Gig SSD, 4Gig RAM',
        	'price' => 50000,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'
        ]);


        Product::create([
        	'name' => 'Laptop 8',
        	'slug' => 'Laptop-8',
        	'details' => '18 Inch, 1TB SSD, 6Gig RAM',
        	'price' => 150000,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'
        ]);


        Product::create([
        	'name' => 'Laptop 9',
        	'slug' => 'Laptop-9',
        	'details' => '12 Inch, 3TB SSD, 8Gig RAM',
        	'price' => 250000,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'
        ]);


        Product::create([
        	'name' => 'Laptop 10',
        	'slug' => 'Laptop-10',
        	'details' => '15 Inch, 3TB SSD, 2Gig RAM',
        	'price' => 200000,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'
        ]);


        Product::create([
        	'name' => 'Laptop 11',
        	'slug' => 'Laptop-11',
        	'details' => '15 Inch, 750Gig HDD, 4Gig RAM',
        	'price' => 78000,
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
         					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.'
        ]);
    }
}
