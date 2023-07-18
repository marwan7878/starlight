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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->longtext('description');
            $table->string('alt_text')->nullable();
            $table->string('focus_keyword')->nullable();
            
            $table->string('social_title')->nullable();
            $table->string('social_image')->nullable();
            $table->longtext('social_description')->nullable();
            $table->string('social_alt_text')->nullable();

            $table->string('meta_title')->nullable();
            $table->string('meta_link')->nullable();
            $table->longtext('meta_description')->nullable();

            $table->unsignedBigInteger('category_id')->nullable(false);
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
