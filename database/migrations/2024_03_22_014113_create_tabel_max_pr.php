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
        Schema::create('max_pr', function (Blueprint $table) {
            $table->id();
            $table->string('pr_no', 100);
            $table->date('req_date')->nullable();
            $table->string('pr_line')->nullable();
            $table->string('pr_type', 20)->nullable();
            $table->text('pr_desc')->nullable();
            $table->decimal('pr_qty', 20, 2)->nullable();
            $table->string('pr_unit', 20)->nullable();
            $table->decimal('pr_cost', 20, 2)->nullable();
            $table->string('pr_tax', 50)->nullable();
            $table->decimal('pr_tax_total', 20, 2)->nullable();
            $table->string('pr_wo', 100)->nullable();
            $table->text('pr_note')->nullable();
            $table->timestamps();
            $table->string('created_by', 100)->nullable();
            $table->string('updated_by', 100)->nullable();
            $table->unsignedBigInteger('pr_id')->nullable();
            $table->unsignedBigInteger('pr_lineid')->nullable();
            $table->string('itemnum', 50)->nullable();
            $table->text('rev_attr')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('max_pr');
    }
};
