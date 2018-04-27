<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableApplicants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('application_number');
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->dateTime('submitted_at')->nullable();
            $table->dateTime('approved_status_at')->nullable();
            $table->enum('status', ['saved', 'submitted', 'unlocked', 'locked'])->default('saved');
            $table->enum('approval_status', ['approved', 'rejected', 'unlocked', 'locked'])->nullable();
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_last_name')->nullable();
            
            //$table->string('phone');
            //$table->string('email');
            //$table->date('date_of_birth');
            $table->string('place_of_birth')->nullable();
            $table->string('nationality')->nullable();
            $table->enum('sex',['Male', 'Female', 'Other'])->nullable();
            $table->longText('communication_address')->nullable();
            $table->longText('permanent_address')->nullable();
            $table->boolean('is_handicapped')->default(false);
            $table->boolean('is_government_undertaking')->default(false);
            $table->string('government_undertaking_name')->nullable();
            $table->string('government_undertaking_post')->nullable();
            $table->date('government_undertaking_start_date')->nullable();
            $table->longText('special_qualification')->nullable();
            // $table->integer('category_id')->unsigned();
            $table->double('payment_amount')->nullable();
            $table->mediumText('payment_transaction_id')->nullable();
            $table->mediumText('payment_request_id')->nullable();
            $table->dateTime('payment_date')->nullable();
          //  $table->foreign('post_id')->references('id')->on('posts');
            //$table->foreign('category_id')->references('id')->on('categories');
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
            //$table->integer('updated_at')->unsigned()->nullable();
            $table->enum('gender',['Male', 'Female', 'Other']);
            $table->string('communication_address_state')->nullable();
            $table->string('permanent_address_state')->nullable();
         
            //$table->integer('created_at')->unsigned()->nullable();
           // $table->foreign('updated_by')->references('id')->on('users');
           // $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('applicants');
    }
}
