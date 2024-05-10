<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtocolNextTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocol_next_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('protocol_id')->constrained()->onDelete('cascade')->name('fk_protocol_next_tests_protocol_id');
            $table->date('next_test_date');
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
        Schema::dropIfExists('protocol_next_tests');
    }
}
