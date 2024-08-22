<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('type_id')->constrained('property_types')->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->enum('status', ['available', 'sold', 'rented'])->default('available');
            $table->boolean('furnished')->default(false);
            $table->timestamps();
            $table->index('id');
            $table->index('title');
            $table->index('slug');
            $table->index('status');
        });
    }

    public function down()
    {
        Schema::dropIfExists('properties');
    }
}

