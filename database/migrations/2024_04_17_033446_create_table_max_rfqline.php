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
        Schema::create('max_rfqline', function (Blueprint $table) {
            $table->id();
            $table->string('line_type', 20)->nullable();
            $table->integer('conversion')->nullable();
            $table->string('line_desc', 255)->nullable();
            $table->decimal('order_qty', 20, 2)->nullable();
            $table->timestamps();
            $table->string('created_by', 50)->nullable();
            $table->string('updated_by', 50)->nullable();
            $table->decimal('order_cost', 20, 2)->nullable();
            $table->string('itemnum', 20)->nullable();
            $table->integer('rfq_id')->nullable();
            $table->integer('pengadaan_rincian_id')->nullable();
            $table->integer('max_id')->nullable();
            $table->string('ref_file')->nullable();
            $table->string('line_unit')->nullable();
            $table->text('other_attr')->nullable();
            $table->text('rev_attr')->nullable();
            $table->string('line_num')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('max_rfqline');
    }
};
