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
        Schema::create('liabilities', function (Blueprint $table) {
            $table->id();
            $table->string('আসন',255)->nullable();
            $table->string('প্রার্থী',255)->nullable();
            $table->string('দায়সমূহের_প্রকৃতি_বর্ণণা',255)->nullable();
            $table->string('পরিমাণ',255)->nullable();
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
        Schema::dropIfExists('liabilities');
    }
};
