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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('আসন',255)->nullable();
            $table->string('প্রার্থী',255)->nullable();
            $table->string('ব্যাংক_প্রতিষ্ঠানের নাম',255)->nullable();
            $table->string('ঋণের_পরিমাণ',255)->nullable();
            $table->string('খেলাপী_ঋণের_পরিমাণ',255)->nullable();
            $table->string('পূনঃতফসীল_সর্বশেষ_তারিখ',255)->nullable();
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
        Schema::dropIfExists('loans');
    }
};
