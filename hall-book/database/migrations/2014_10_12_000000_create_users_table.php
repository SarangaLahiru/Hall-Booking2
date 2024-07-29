<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // This creates an auto-incrementing primary key as an unsigned big integer
            $table->string('first_name'); // Added first name field
            $table->string('last_name'); // Added last name field
            $table->string('email')->unique(); // Email field with unique constraint
            $table->string('NIC')->unique(); // National ID Card field with unique constraint
            $table->string('phone'); // Added phone number field
            $table->string('gender'); // Added gender field
            $table->timestamp('email_verified_at')->nullable(); // Nullable timestamp for email verification
            $table->string('password'); // Password field
            $table->string('category');
            $table->rememberToken(); // Token for remembering user sessions
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}