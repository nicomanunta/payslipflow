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
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
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
