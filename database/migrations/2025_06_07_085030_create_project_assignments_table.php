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
        Schema::create('project_assignments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('assignable_id');
            $table->string('assignable_type');
            $table->foreignId('role_id')->constrained('roles')->onDelete('restrict');
            $table->timestamps();

            $table->unique(['project_id', 'assignable_id', 'assignable_type'], 'unique_project_assignment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_assignments');
    }
};
