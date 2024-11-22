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
        Schema::create('extras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payroll_id');
            $table->foreign('payroll_id')->references('id')->on('payrolls')->onDelete('cascade');
            $table->decimal('extra_overtime_hours', 8, 2)->unsigned()->default(0);
            $table->boolean('extra_thirteenth_salary')->default(false);
            $table->boolean('extra_fourteenth_salary')->default(false);
            $table->decimal('extra_reimbursement_expenses', 8, 2)->unsigned()->default(0);
            $table->decimal('bonus_rewards', 8, 2)->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extras');
    }
};
