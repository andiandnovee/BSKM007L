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
        Schema::create('tbl_t_iuran', function (Blueprint $table) {
            $table->id();
            $table->string('label')->nullable();
            $table->float('data', 10, 2)->nullable();
            $table->tinyInteger('dataset_name')->nullable();
            $table->tinyInteger('data_type')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
