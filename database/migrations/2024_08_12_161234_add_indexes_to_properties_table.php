<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesToPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            // Index for VARCHAR columns
            $table->index('title');
            
            // Full-text index for TEXT columns
            $table->fullText('description');
            $table->index('bedrooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropIndex(['title']);
            $table->dropFullText('description'); // Drop full-text index by column name
            $table->dropIndex(['bedrooms']);
        });
    }
}
