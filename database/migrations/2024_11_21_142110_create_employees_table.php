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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('contract_id');
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
            $table->string('employee_name', 100);
            $table->string('employee_surname', 100);
            $table->string('employee_email', 100);->unique();
            $table->string('employee_phone', 20);->unique();
            $table->date('employee_birth_date');
            $table->string('employee_role', 150);
            $table->enum('employee_status', ['Attivo', 'Sospeso', 'In prova', 'Licenziato', 'Pensione'])->default('Attivo');
            $table->date('employee_hiring_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
