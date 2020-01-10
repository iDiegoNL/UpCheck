<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('hostname')->nullable();
            $table->string('distro')->nullable();
            $table->string('uptime')->nullable();
            $table->string('private_ip')->nullable();
            $table->string('public_ip')->nullable();
            $table->string('cpus')->nullable();
            $table->string('cpu_load')->nullable();
            $table->string('total_memory')->nullable();
            $table->string('memory_in_use')->nullable();
            $table->string('free_memory')->nullable();
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
        Schema::dropIfExists('servers');
    }
}
