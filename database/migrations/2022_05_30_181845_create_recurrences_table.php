<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recurrences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id');
            $table->enum('period', ['day', 'month'])->nullable(false);
            $table->integer('period_value')->nullable(false)->default(1);
            $table->decimal('expense_amount', $precision = 8, $scale = 2);
            $table->string('expense_description');
            $table->date('last_updated')->nullable(false);
            $table->boolean('active')->default(true);
            $table->date('active_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recurrences');
    }
};
