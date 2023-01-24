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
        Schema::create('basic_information', function (Blueprint $table) {
            $table->id();
            $table->string('আসন',255);
            $table->string('নাম',255);
            $table->string('শিক্ষাগত_যোগ্যতা',255);
            $table->string('মামলায়_অভিযুক্ত_কি_না',255);
            $table->string('মামলার_ধারা',255)->nullable();
            $table->string('আদালতের_নাম',255)->nullable();
            $table->string('মামলা_নম্বর',255)->nullable();
            $table->string('মামলার_অবস্থা',255)->nullable();
            $table->string('পেশা',255)->nullable();
            $table->string('দায়সমূহের প্রকৃতি ও বর্ণণাা',255)->nullable();
            $table->string('দায়ের পরিমাণ',255)->nullable();
            $table->string('ইতিপূর্বে জাতীয় সংসদ সদস্য',255)->nullable();
            $table->string('প্রতিশ্রুতিসমূহ',300)->nullable();
            $table->string('অর্জন',300)->nullable();
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basic_information');
    }
};
