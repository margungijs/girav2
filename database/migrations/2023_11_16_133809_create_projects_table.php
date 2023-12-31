<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id'); // Add this line for team_id
            $table->string('projectName');
            $table->text('description');
            $table->date('creationDate');
            $table->string('creator');
            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
}
