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
            $table->string('employee_name', 100);
            $table->string('employee_surname', 100);
            $table->enum('employee_sex', ['Uomo', 'Donna']);
            $table->string('employee_email', 100)->unique();
            $table->string('employee_phone', 20)->unique();
            $table->string('employee_state', 50)->nullable();
            $table->string('employee_region', 50)->nullable();
            $table->string('employee_city', 50)->nullable();
            $table->date('employee_birth_date');
            $table->string('employee_role', 150);
            $table->enum('employee_status', ['Attivo', 'Sospeso', 'In prova', 'Licenziato', 'Pensione'])->default('Attivo');
            $table->date('employee_hiring_date');
            $table->string('employee_img')->nullable();
            $table->string('slug', 250)->unique();
            $table->timestamps();
            $table->softDeletes();
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
