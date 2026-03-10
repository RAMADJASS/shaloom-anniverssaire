<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->string('participation')->change();
            $table->string('disponible')->change();
            $table->string('gele')->change();
            $table->string('respect')->change();
        });
    }

    public function down(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->boolean('participation')->change();
            $table->boolean('disponible')->change();
            $table->boolean('gele')->change();
            $table->boolean('respect')->change();
        });
    }
};