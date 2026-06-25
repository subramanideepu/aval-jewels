<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price', 12, 2)->default(0)->after('image');
            $table->decimal('sale_price', 12, 2)->nullable()->after('price');
            $table->integer('stock')->default(10)->after('sale_price');
            $table->json('purity_options')->nullable()->after('stock');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['price', 'sale_price', 'stock', 'purity_options']);
        });
    }
};
