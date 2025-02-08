<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key  
            
            $table->string('product_name');  
            $table->longText('description');  
            $table->string('sku')->unique();  
            $table->foreignId('seller_id')->constrained('users')->onDelete('cascade');  
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');  
            $table->foreignId('subcategory_id')->constrained('subcategories')->onDelete('cascade');  
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade');  
            
            $table->decimal('regular_price', 8, 2); // Price with two decimal places  
            $table->decimal('discounted_price', 8, 2)->nullable(); // Nullable discount price  
            $table->decimal('tax_rate', 5, 2)->default(0.00); // Default tax rate  

            $table->integer('stock_quantity')->default(0); // Default stock quantity  
            $table->enum('stock_status', ['In Stock', 'Out of Stock'])->default('In Stock'); // Stock status  
            
            $table->string('slug')->unique(); // Unique slug for SEO  
            $table->boolean('visibility')->default(false); // Default visibility flag  
            $table->string('meta_title')->nullable(); // Nullable SEO title  
            $table->text('meta_description')->nullable(); // Nullable SEO description  

            $table->enum('status', ['Draft', 'Published']); // Product status  
            
            $table->timestamps(); // Creates created_at and updated_at columns  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
