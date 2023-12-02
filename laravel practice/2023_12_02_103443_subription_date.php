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
        //
        Schema::create('subscription_date', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('date'); // String data type with a length of 255 characters
            $table->timestamps(); // Created_at and updated_at timestamps
        });
        DB::table('subscription_date')->insert([
            ['date' => '02-12-2023']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_date');
    }
};
