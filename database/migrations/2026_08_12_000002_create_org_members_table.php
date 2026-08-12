<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('org_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->enum('role_type', ['ketua_rw', 'rt', 'divisi']);
            $table->unsignedTinyInteger('rt_number')->nullable();
            $table->string('photo_url')->nullable();
            $table->string('phone')->nullable();
            $table->string('period')->nullable();
            $table->string('description')->nullable();
            $table->string('bg_color')->default('2563eb');
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('org_members');
    }
};
