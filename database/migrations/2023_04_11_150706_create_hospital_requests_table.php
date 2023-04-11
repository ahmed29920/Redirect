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
        Schema::create('hospital_requests', function (Blueprint $table) {
            $table->id();
            $table->string('serial');
            $table->string('code');
            $table->enum('type_of_blood' , [ 'A-' , 'A+' , 'B+' , 'B-' , 'AB+' , 'AB-' , 'O+' , 'O-' ]);
            $table->integer('amount');
            $table->enum('state' , [ 'Pending' , 'Delivering' , 'Success' , 'Fail' ]);
            $table->string('note');
            $table->unsignedBigInteger('hospital_id')->unsigned()->nullable();
            $table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('cascade');
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
        Schema::dropIfExists('hospital_requests');
    }
};
