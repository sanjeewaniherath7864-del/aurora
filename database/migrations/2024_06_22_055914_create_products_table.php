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
        if (!Schema::hasTable("products")) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable(false)->default(time()."-error-img.png");
                $table->double('price')->default(0);
                $table->integer('stoke')->default(0);    
                $table->string('unit')->default('unit');     
                $table->timestamp('updated_at')->nullable();   
                $table->timestamp('created_at')->nullable();   

                $table->string('img')->nullable();
            });
        }
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('products');
    }
};
