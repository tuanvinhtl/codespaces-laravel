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
        Schema::create('chartertparties', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->index();
            $table->string('status')->default('not_started')->index();
            $table->softDeletes();
            $table->index('deleted_at');
            $table->timestamps();

            $table->uuid('file_uuid')->nullable()->index();
            $table->foreign('file_uuid')->references('uuid')->on('files');

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
        Schema::dropIfExists('chartertparties');
    }
};
