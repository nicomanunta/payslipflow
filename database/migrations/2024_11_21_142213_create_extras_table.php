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
            $table->string('extra_weekday_overtime_hours', 5)->default('00:00');
            $table->string('extra_weekend_overtime_hours', 5)->default('00:00');
            $table->string('extra_holiday_overtime_hours', 5)->default('00:00');
            $table->boolean('extra_thirteenth_salary')->default(false);
            $table->boolean('extra_fourteenth_salary')->default(false);
            $table->decimal('extra_reimbursement_expenses', 8, 2)->unsigned()->default(0);
            $table->decimal('extra_bonus_rewards', 8, 2)->unsigned()->default(0);
            $table->text('extra_notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
