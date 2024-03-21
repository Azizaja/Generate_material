<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pekerjaan_sub_commodity', function (Blueprint $table) {
            $table->unsignedBigInteger('pekerjaan_id');
            $table->unsignedBigInteger('sub_commodity_id');
            $table->unsignedBigInteger('state')->nullable();
            $table->string('created_by', 100)->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->timestamps();

            // Define primary key
            $table->primary(['pekerjaan_id', 'sub_commodity_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan_sub_commodity');
    }
};
