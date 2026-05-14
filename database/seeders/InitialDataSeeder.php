<?php

namespace Database\Seeders;

use App\Models\Collection;
use App\Models\Product;
use App\Models\HeroBanner;
use App\Models\Testimonial;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InitialDataSeeder extends Seeder
{
    public function run(): void
    {
        // Settings
        SiteSetting::create(['key' => 'site_name', 'value' => 'AVAL JEWELS', 'type' => 'text', 'group' => 'general']);
        SiteSetting::create(['key' => 'contact_email', 'value' => 'concierge@avaljewels.com', 'type' => 'text', 'group' => 'contact']);
        SiteSetting::create(['key' => 'whatsapp_number', 'value' => '+919876543210', 'type' => 'text', 'group' => 'contact']);

        // Collections
        $collectionsData = [
            ['name' => 'The Bridal Heritage', 'image' => 'images/necklace.png'],
            ['name' => 'Minimalist Gold', 'image' => 'images/earrings.png'],
            ['name' => 'Royal Bangles', 'image' => 'images/bangles.png'],
        ];

        foreach ($collectionsData as $item) {
            $collection = Collection::create([
                'name' => $item['name'],
                'slug' => Str::slug($item['name']),
                'description' => 'Exquisite ' . $item['name'] . ' crafted for your unique style.',
                'image' => $item['image'],
                'is_active' => true,
            ]);

            // Products for each collection
            for ($i = 1; $i <= 4; $i++) {
                Product::create([
                    'collection_id' => $collection->id,
                    'name' => $item['name'] . ' Masterpiece ' . $i,
                    'slug' => Str::slug($item['name'] . ' Masterpiece ' . $i),
                    'description' => 'A beautiful masterpiece from our ' . $item['name'] . ' collection. Handcrafted with precision and passion.',
                    'specifications' => [
                        'Material' => '22K Hallmarked Gold',
                        'Weight' => (20 + $i) . ' Grams',
                        'Purity' => '916 BIS Hallmarked',
                        'Gemstone' => $i % 2 == 0 ? 'Certified Diamonds' : 'Natural Rubies',
                    ],
                    'image' => $item['image'],
                    'gallery' => [$item['image'], $item['image']],
                    'is_featured' => ($i == 1),
                    'is_best_seller' => ($i == 2),
                    'meta_title' => $item['name'] . ' Masterpiece ' . $i . ' | AVAL JEWELS',
                    'meta_description' => 'Discover the exquisite ' . $item['name'] . ' Masterpiece ' . $i . ' at AVAL JEWELS. Handcrafted luxury jewelry.',
                ]);
            }
        }

        // Hero Banners
        HeroBanner::create([
            'title' => 'Wear Your Confidence Every Day',
            'subtitle' => 'Explore the finest collection of luxury Indian jewelry.',
            'image' => 'images/hero.png',
            'cta_text' => 'Explore Collections',
            'cta_link' => '/collections',
            'order' => 1,
        ]);

        // Testimonials
        Testimonial::create([
            'client_name' => 'Priya Sharma',
            'content' => 'The bridal set I got from AVAL JEWELS made my special day even more magical. The attention to detail is just breathtaking.',
            'rating' => 5,
            'image' => null,
        ]);
    }
}
