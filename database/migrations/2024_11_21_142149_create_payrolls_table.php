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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->unsignedBigInteger('contract_id');
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
            $table->string('payroll_month', 7);
            $table->date('payroll_day_paid');
            $table->decimal('payroll_irpef_to_pay', 10, 2)->unsigned();
            $table->decimal('payroll_total_inps', 10, 2)->unsigned();
            $table->decimal('payroll_monthly_basic_deduction', 10, 2)->unsigned();
            $table->decimal('payroll_monthly_family_deduction', 10, 2)->unsigned();
            $table->decimal('payroll_monthly_children_deduction', 10, 2)->unsigned();
            $table->decimal('payroll_monthly_employee_deduction', 10, 2)->unsigned();
            $table->decimal('payroll_total_surcharge', 10, 2)->unsigned();
            $table->decimal('payroll_net_salary', 10, 2)->unsigned();
            $table->decimal('payroll_taxable_irpef', 10, 2)->unsigned();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
