<?php

use App\Models\Collection;
use App\Models\HeroBanner;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $hero = HeroBanner::where('is_active', true)->orderBy('order')->first();
    $featuredCollections = Collection::where('is_active', true)->take(3)->get();
    $bestSellers = Product::where('is_best_seller', true)->take(4)->get();
    $testimonials = Testimonial::where('is_active', true)->get();
    
    return view('home', compact('hero', 'featuredCollections', 'bestSellers', 'testimonials'));
});

Route::get('/collections', function () {
    $collections = Collection::where('is_active', true)->get();
    return view('collections', compact('collections'));
});

Route::get('/products/{slug}', \App\Livewire\Products\ProductDetails::class)->name('products.show');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


