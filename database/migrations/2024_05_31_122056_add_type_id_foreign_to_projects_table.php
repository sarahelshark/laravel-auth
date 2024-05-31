<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if the column already exists
        if (!Schema::hasColumn('projects', 'type_id')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->unsignedBigInteger('type_id')->nullable()->after('id');
                $table->foreign('type_id')->references('id')->on('types');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('projects_type_id_foreign');
            $table->dropColumn('type_id');
        });
    }
};

