<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farmer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('consultant_id');
            $table->string('topic');
            $table->text('description');
            $table->enum('status', ['pending', 'in_progress', 'completed', 'cancelled']);
            $table->dateTime('scheduled_at');
            $table->dateTime('completed_at')->nullable();
            $table->text('notes')->nullable();
            $table->text('recommendations')->nullable();
            $table->text('follow_up_actions')->nullable();
            $table->string('consultation_type')->nullable(); // online, visit, office
            $table->decimal('consultation_fee', 10, 2)->default(0);
            $table->boolean('payment_status')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
