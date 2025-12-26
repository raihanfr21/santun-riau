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
        Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->string('name');           
        $table->string('email');          
        $table->string('phone');          
        $table->string('category');       
        $table->string('location_name');  
        $table->decimal('latitude', 10, 8)->nullable();  
        $table->decimal('longitude', 11, 8)->nullable(); 
        $table->text('description');      
        $table->string('image_path')->nullable(); 
        $table->enum('status', ['pending', 'proses', 'selesai', 'ditolak'])->default('pending');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};