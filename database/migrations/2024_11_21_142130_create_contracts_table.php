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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->string('contract_name', 255);
            $table->set('contract_type', ['Full-Time', 'Part_Time', 'Tempo indeterminato', 'Tempo determinato', 'Stage', 'Lavoro a progetto','Freelance', 'Apprendistato',]);
            $table->string('contract_level', 50);
            $table->decimal('contract_gross_monthly_salary', 10, 2)->unsigned();
            $table->integer('contract_vacation_days')->unsigned()->nullable();
            $table->decimal('contract_inps_tax', 5, 2)->unsigned()->nullable();
            $table->decimal('contract_naspi_tax', 5, 2)->unsigned()->nullable();
            $table->decimal('contract_surcharge_municipal', 5, 2)->unsigned()->nullable();
            $table->decimal('contract_surcharge_regional', 5, 2)->unsigned()->nullable();
            $table->date('contract_start_date');
            $table->date('contract_end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
