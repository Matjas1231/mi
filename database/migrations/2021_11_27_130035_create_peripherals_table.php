<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class CreatePeripheralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peripherals', function (Blueprint $table) {
            $table->id();
            $table->string('brand', 60);
            $table->string('model', 100)->nullable();
            $table->string('serial_number', 100)->nullable()->default('N/D');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->text('description')->nullable();
            $table->string('ip_address')->nullable()->default('N/D');
            $table->string('mac_address')->nullable()->default('N/D');
            $table->string('network_name')->nullable()->default('N/D');
            $table->foreignId('worker_id')->nullable()->references('id')->on('workers')->onDelete('set null');
            $table->date('date_of_buy')->default(Carbon::now()->format('Y-m-d'));
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
        Schema::dropIfExists('peripherals');
    }
}
