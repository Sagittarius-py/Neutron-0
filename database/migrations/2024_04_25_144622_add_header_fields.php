<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHeaderFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("protocols", function (Blueprint $table) {
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
            $table->dropColumn('object');
            $table->dropColumn('object_address');

            // Drop foreign key constraint
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');
        });
    }
}
