<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceProtocol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_protocol', function (Blueprint $table) {
            $table->foreignId('protocol_id')->constrained()->onDelete('cascade')->name('fk_protocol_device_protocol_id');
            $table->foreignId('device_id')->constrained()->onDelete('cascade')->name('fk_protocol_device_device_id');
            $table->primary(['protocol_id', 'device_id']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_protocol');
    }
}
