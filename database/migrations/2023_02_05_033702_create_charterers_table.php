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
        Schema::create('charterers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->index();
            $table->string('name')->nullable();
            $table->string('display_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('slug')->nullable();
            $table->softDeletes();
            $table->index('deleted_at');
            $table->timestamps();

            $table->uuid('company_uuid')->nullable()->index();
            $table->foreign('company_uuid')->references('uuid')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charterers');
    }
};
