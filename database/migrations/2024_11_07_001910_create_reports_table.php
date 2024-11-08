<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            // Adding foreign key with proper constraints
            $table->foreignId('user_id')
                  ->constrained('users') // Ensures the 'user_id' references 'id' in the 'users' table
                  ->onDelete('cascade'); // Deletes the report if the associated user is deleted
            $table->string('classification');
            $table->string('title');
            $table->text('content');
            $table->date('event_date');
            $table->string('location');
            $table->string('institution');
            $table->string('attachment_path')->nullable(); // Store file path for attachment
            $table->string('status')->default('pending'); // New field for status
            $table->text('response')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
 