<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateTable extends Migration
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

        Schema::create('column_template', function (Blueprint $table) {
            $table->foreignId('template_id')->constrained()->onDelete('cascade')->name('fk_ctf');
            $table->foreignId('column_id')->constrained()->onDelete('cascade')->name('fk_ftc');
        });

        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('template_id')->constrained()->onDelete('cascade')->name('fk_ftt');
            $table->foreignId('item_id')->constrained()->onDelete('cascade')->name('fk_fti');
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
        Schema::dropIfExists('templates');
        Schema::dropIfExists('columns');
        Schema::dropIfExists('column_template');
        Schema::dropIfExists('forms');
    }
}
