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
        Schema::create('immovables', function (Blueprint $table) {
            $table->id();
            $table->string('আসন',255)->nullable();
            $table->string('প্রার্থী',255)->nullable();
            $table->string('নিজ',255)->nullable();
            $table->string('স্ত্রী_স্বামী',255)->nullable();
            $table->string('নির্ভরশীল',255)->nullable();
            $table->string('যৌথ_মালিকানা',255)->nullable();
            $table->string('প্রার্থীর_অংশ',255)->nullable();
            $table->string('খাত',255)->nullable();
            $table->string('সাল',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('immovables');
    }
};
