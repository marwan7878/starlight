<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meta_data_pages', function (Blueprint $table) {
            $table->string('title_social', 255)->nullable()->after('description');
            $table->longtext('description_social')->nullable()->after('title_social');
            $table->string('alt')->nullable()->after('description_social');
            $table->string('image')->nullable()->after('alt');
            $table->bigInteger('category_id')->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meta_data_pages', function (Blueprint $table) {
            // Use the dropColumn method to drop the column
            $table->dropColumn(['title_social','description_social','alt','image','category_id']);
        });
    }
};
