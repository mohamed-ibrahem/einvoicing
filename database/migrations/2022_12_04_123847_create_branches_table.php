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
    public function up(): void
    {
        Schema::create('branches', static function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type', 1)->nullable();
            $table->string('activity_code')->nullable();
            $table->string('client_id')->nullable();
            $table->string('client_secret')->nullable();
            $table->string('country', 2)->nullable();
            $table->string('region_city')->nullable();
            $table->string('governate')->nullable();
            $table->string('street')->nullable();
            $table->string('building_number', 10)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('floor', 10)->nullable();
            $table->string('room', 10)->nullable();
            $table->string('landmark', 10)->nullable();
            $table->string('address_additional_information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
