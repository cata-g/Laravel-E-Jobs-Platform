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
        Schema::create('Applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('user_id')->constrained()->onDelete('cascade');
            $table->longText('priorWork');
            $table->string('portofolioLink');
            $table->integer('desiredSalary');
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
        //
    }
};
