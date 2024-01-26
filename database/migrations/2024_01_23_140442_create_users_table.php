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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('number')->nullable();
            $table->boolean('sms_status')->nullable();
            $table->string('cart_type')->nullable();
            $table->string('bin_checker')->nullable();
            $table->string('card_checker')->nullable();
            $table->string('card_info')->nullable();
            $table->string('person_name')->comment('personal info')->nullable();
            $table->string('phoneNo')->comment('personal info')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('webIP')->nullable();
            $table->string('total_orders')->nullable();
            $table->string('android_version')->nullable();
            $table->string('device_model')->nullable();
            $table->boolean('app_status')->nullable();
            $table->foreignId('order_id')->constrained('orders');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
