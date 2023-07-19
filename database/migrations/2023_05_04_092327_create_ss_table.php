<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longtext('description');
            $table->string('image');
            $table->string('alt_text')->nullable();
            $table->string('focus_keyword')->nullable();
            
            $table->string('social_title')->nullable();
            $table->longtext('social_description')->nullable();
            $table->string('social_image')->nullable();
            $table->string('social_alt_text')->nullable();

            $table->string('meta_title')->nullable();
            $table->string('meta_link')->nullable();
            $table->longtext('meta_description')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('events');
    }
};
