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
        Schema::create('client_requests', function (Blueprint $table) {
            $table->id();
            $table->string('serial');
            $table->string('code');
            $table->enum('type_of_blood' , [ 'A-' , 'A+' , 'B+' , 'B-' , 'AB+' , 'AB-' , 'O+' , 'O-' ]);
            $table->integer('amount');
            $table->enum('state' , [ 'Pending' , 'Delivering' , 'Testing' , 'Success' , 'Fail' ]);
            $table->enum('type_of_request' , [ 'Donate' , 'Request' ]);
            $table->enum('way' , [ 'Home' , 'Hospital' ]);
            $table->string('location')->nullable();
            $table->boolean('IsOk')->nullable();
            $table->string('note')->nullable();
            //client
            $table->unsignedBigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
            // tester
            $table->unsignedBigInteger('tester_id')->unsigned()->nullable();
            $table->foreign('tester_id')->references('id')->on('testers')->onDelete('cascade');
            // commissary
            $table->unsignedBigInteger('commissary_id')->unsigned()->nullable();
            $table->foreign('commissary_id')->references('id')->on('commissaries')->onDelete('cascade');
            // hospital
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
        Schema::dropIfExists('client_requests');
    }
};
