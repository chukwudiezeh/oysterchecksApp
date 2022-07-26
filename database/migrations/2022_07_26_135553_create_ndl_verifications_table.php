<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNdlVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ndl_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identity_verifications_id')->constrained('identity_verifications');
            $table->string('service_reference');
            $table->json('address');
            $table->json('validations');
            $table->string('status');
            $table->string('reason')->nullable();
            $table->boolean('data_validation');
            $table->boolean('selfie_validation');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('expired_date');
            $table->string('issued_date');
            $table->string('state_of_issuance');
            $table->string('notify_when_id_expire');
            $table->string('image');
            $table->string('phone');
            $table->string('email');
            $table->string('dob');
            $table->boolean('subject_consent');
            $table->string('pin');
            $table->string('type');
            $table->string('gender')->nullable();
            $table->string('requested_at');
            $table->string('last_modified_at');
            $table->string('country');
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
        Schema::dropIfExists('ndl_verifications');
    }
}