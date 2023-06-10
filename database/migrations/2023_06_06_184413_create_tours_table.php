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
        Schema::create('tours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid', 255);
            $table->integer('number');
            $table->string('guest_name', 255);
            $table->string('guest_address', 255);
            $table->string('guest_phone', 255)->nullable();
            $table->foreignId('tour_service_id')->nullable(); //ID ture
            $table->integer('adults_amount')->default(0);
            $table->integer('children_amount')->default(0);
            $table->integer('infants_amount')->default(0);
            $table->date('date')->nullable();
            $table->foreignId('tour_pickup_point_id')->nullable(); //ID pickup point
            $table->integer('discount')->default(0);
            $table->decimal('total_price', 12, 2);
            $table->decimal('paid_amount', 12, 2)->default(0);
            $table->decimal('rest_to_pay_amount', 12, 2);
            $table->text('note')->nullable();
            $table->foreignId('user_id')->nullable(); //ID usera-agenta
            $table->timestamps();

            $table->foreign('tour_service_id')
                ->references('id')
                ->on('tour_services')
                ->onDelete('set null');

            $table->foreign('tour_pickup_point_id')
                ->references('id')
                ->on('tour_pickup_points')
                ->onDelete('set null');
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
};
