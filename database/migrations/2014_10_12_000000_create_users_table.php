<?php

use App\Models\House;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignIdFor(House::class)->constrained()->cascadeOnDelete();
            $table->string('image')->nullable();
            $table->integer('age')->default(15);
            $table->dateTime('date_time')->default(now());
            $table->date('date')->default(now()->format('Y-m-d'));
            $table->time('time')->default(now()->format('H:i'));
            $table->json('status')->default(json_encode(['studying']));
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->longText('text')->default('lorem') ;
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
