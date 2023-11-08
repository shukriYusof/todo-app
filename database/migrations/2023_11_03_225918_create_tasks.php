<?php

use App\Enums\Priority;
use App\Enums\Status;
use App\Enums\TaskPriority;
use App\Models\File;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('description');
            $table->date('due_date')->nullable();
            $table->enum('priority', Priority::values())->nullable();
            $table->enum('status', Status::values())->default(Status::Unassign)->nullable();
            $table->json('tags')->default(null)->nullable();
            $table->foreignIdFor(File::class)->nullable()->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
