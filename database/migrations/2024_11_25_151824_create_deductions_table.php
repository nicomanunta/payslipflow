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
        Schema::create('deductions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('contract_id');
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
            $table->tinyInteger('dependent_family_members')->unsigned()->dafault(0);
            $table->tinyInteger('dependent_children_under_24')->unsigned()->dafault(0);
            $table->tinyInteger('dependent_children_over_24')->unsigned()->dafault(0);
            $table->tinyInteger('dependent_children_with_disabilities')->unsigned()->dafault(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deductions');
    }
};
