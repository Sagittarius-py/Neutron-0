<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained()->onDelete('cascade')->name('fk_rtf');
            $table->timestamps();
        });

        Schema::create('values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('record_id')->constrained()->onDelete('cascade')->name('fk_vtr');
            $table->foreignId('column_id')->constrained()->onDelete('cascade')->name('fk_vtc');
            $table->string('value')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
        Schema::dropIfExists('values');
    }
}
