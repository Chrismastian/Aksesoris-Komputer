<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * The five product tables. They previously existed only in the MySQL
     * server because no migration ever created them, so a fresh install and
     * the test suite both had nothing to work with.
     *
     * `harga` is a string in the original schema; kept as-is so existing
     * product rows keep working unchanged.
     */
    public function up(): void
    {
        foreach (['keyboard', 'mouse', 'headset', 'monitor', 'storage'] as $table) {
            Schema::create($table, function (Blueprint $blueprint) {
                $blueprint->id();
                $blueprint->string('nama', 100);
                $blueprint->string('harga', 50);
                $blueprint->string('gambar', 255)->nullable();
                $blueprint->timestamps();
            });
        }
    }

    public function down(): void
    {
        foreach (['keyboard', 'mouse', 'headset', 'monitor', 'storage'] as $table) {
            Schema::dropIfExists($table);
        }
    }
};
