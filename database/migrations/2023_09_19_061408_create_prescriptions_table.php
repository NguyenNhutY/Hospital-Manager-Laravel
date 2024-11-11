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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id('PrescriptionID');
            $table->foreignId('PatientID')->constrained('patients', 'PatientID');
            $table->foreignId('StaffID')->constrained('staff', 'StaffID');
            $table->dateTime('PrescriptionDate');
            $table->foreignId('MedicationID')->constrained('medications','MedicationID');
            $table->integer('Quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
