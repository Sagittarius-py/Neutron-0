<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->string("object")->nullable();
            $table->string("object_address")->nullable();
            $table->foreignId('customer_id')->default(0)->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('protocols', function (Blueprint $table) {
            // Drop columns
            // Drop foreign key constraint
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');
        });
        Schema::dropIfExists('protocols');
    }
}
