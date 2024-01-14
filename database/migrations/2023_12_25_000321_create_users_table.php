<?php

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
            $table->string('full_name'); // 2
            $table->string('slug')->unique();
            $table->string('email')->unique()->nullable();  // 2
            $table->enum('role', ['admin', 'صاحب محل', 'عميل'])->default('عميل');  // 2
            $table->text('address')->nullable();  // shop owner
            $table->foreignId('governorate_id')->constrained('governorates')->cascadeOnDelete()->cascadeOnUpdate(); // 2
            $table->foreignId('city_id')->constrained('cities')->cascadeOnDelete()->cascadeOnUpdate(); // 2
            $table->foreignId('shop_category_id')->nullable()->constrained('shop_categories')->cascadeOnDelete()->cascadeOnUpdate();  //shop owner
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password'); // 2
            $table->string('cover_image')->nullable();   // shop owner          
            $table->string('profile_image')->nullable();   // shop owner
            $table->boolean('payment')->default(false);
            $table->softDeletes();
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
