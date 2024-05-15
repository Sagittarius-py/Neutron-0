<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('');
            $table->timestamps();
        });
        Schema::create('columns', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('');
            $table->string('type')->default('');
            $table->timestamps();
        });

        Schema::create('column_templates', function (Blueprint $table) {
            $table->foreignId('templates_id')->constrained()->onDelete('cascade')->name('fk_ctf');
            $table->foreignId('column_id')->constrained()->onDelete('cascade')->name('fk_ftc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('templates');
        Schema::dropIfExists('columns');
        Schema::dropIfExists('column_templates');
    }
}
