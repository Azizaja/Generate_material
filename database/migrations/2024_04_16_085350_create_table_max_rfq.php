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
        Schema::create('max_rfq', function (Blueprint $table) {
            $table->id();
            $table->string('rfq_num', 50);
            $table->string('rfq_desc', 255)->nullable();
            $table->string('status', 50)->nullable();
            $table->date('req_date')->nullable();
            $table->date('rep_date')->nullable();
            $table->date('close_date')->nullable();
            $table->string('site', 50)->nullable();
            $table->timestamps();
            $table->string('created_by', 50)->nullable();
            $table->string('updated_by', 50)->nullable();
            $table->integer('max_id')->nullable();
            $table->timestamp('max_updateat')->nullable();
            $table->integer('pengadaan_id')->nullable();
            $table->string('ref_file')->nullable();
            $table->text('other_attr')->nullable();
            $table->text('rev_attr')->nullable();
            $table->integer('is_loi')->default(0);
            $table->string('acc_asg', 5)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('max_rfq');
    }
};
