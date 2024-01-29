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
        Schema::table('kosts', function (Blueprint $table) {
            $table->integer('price')->after('description')->change();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kosts', function (Blueprint $table) {
            $table->integer('price')->after('updated_at')->change();
            $table->dropSoftDeletes();
        });
    }
};
