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
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstName')->after('id')->change();
            $table->string('lastName')->after('firstName')->nullable()->change();
            $table->integer('credits')->after('lastName')->change();
            $table->dropColumn('name');
            $table->softDeletes();
            $table->renameColumn('firstName', 'first_name');
            $table->renameColumn('lastName', 'last_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->string('firstName')->after('updated_at')->change();
            $table->string('lastName')->after('firstName')->change();
            $table->integer('credits')->after('lastName')->change();
            $table->dropSoftDeletes();
            $table->renameColumn('first_name', 'firstName');
            $table->renameColumn('last_name', 'lastName');
        });
    }
};
