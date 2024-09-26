<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            // id BIGINT UNSIGNED Auto Increment Primary key
            // $table->bigInteger('id')->unsigned()->autoIncrement()->primary();
            // $table->unsignedBigInteger('id)->autoIncrement()->primary();
            // $table->bigIncrements('id);
            $table->id();

            $table->string('name');

            $table->string('slug')->unique();

            // text(64000)
            $table->text('description')->nullable();
            $table->string('logo_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('percent')->nullable();
            $table->string('phone_number')->nullable();
            $table->foreignId('governorate_id')->nullable()->constrained('destinations', 'id')->nullOnDelete();
            $table->foreignId('city_id')->nullable()->constrained('destinations', 'id')->nullOnDelete();
            $table->foreignId('neighborhood_id')->nullable()->constrained('destinations', 'id')->nullOnDelete();
            $table->string('street_address')->nullable();
            $table->boolean('featured');
            $table->string('open_at')->nullable();
            $table->string('close_at')->nullable();
            // 24 hours availability
            $table->boolean('all_time')->default(0);
            $table->boolean('all_days')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('stores');
    }
};
