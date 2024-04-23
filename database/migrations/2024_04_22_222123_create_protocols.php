<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtocols extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocols', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title')->default('');
            $table->string('number')->default('');
            $table->date('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreignId('item_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('protocol_type_id')->nullable()->constrained()->onDelete('set null');
            $table->text('verdict')->default('');
            $table->text('notes')->default('');
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
        Schema::dropIfExists('protocols');
    }
}