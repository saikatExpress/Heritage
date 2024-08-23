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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->enum('status', [
                'pending',
                'submitted_to_ceo',
                'approved_by_ceo',
                'approved_by_md',
                'rejected'
            ])->default('pending');
            $table->foreignId('account_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('business_head_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('ceo_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('md_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
