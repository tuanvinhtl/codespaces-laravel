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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->index();
            $table->uuid('key_uuid')->nullable()->index();
            $table->string('key_type')->nullable();
            $table->string('caption')->nullable();
            $table->string('path')->nullable();
            $table->string('bucket')->nullable();
            $table->string('name')->nullable();
            $table->string('original_filename')->nullable();
            $table->string('type')->nullable()->index();
            $table->string('content_type')->nullable();
            $table->string('extension')->nullable();
            $table->integer('size')->nullable();
            $table->string('slug')->nullable()->index();
            $table->softDeletes();
            $table->timestamps();
            $table->index('created_at');
            $table->index('deleted_at');

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
        Schema::dropIfExists('files');
    }
};
