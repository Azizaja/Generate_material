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
        Schema::create('perusahaan_commodity', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('perusahaan_id')->unsigned();
            $table->bigInteger('sub_commodity_id')->unsigned();
            $table->timestamps();
            $table->string('created_by', 255);
            $table->smallInteger('state')->default(0)->nullable();
            $table->text('satuan')->nullable();
            $table->decimal('stock', 20, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan_commodity');
    }
};
