<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBvnVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bvn_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identity_verifications_id')->constrained('identity_verifications');
            $table->string('service_reference');
            $table->json('validations')->nullable();
            $table->string('status');
            $table->string('reason')->nullable();
            $table->boolean('data_validation');
            $table->boolean('selfie_validation');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('image')->nullable();
            $table->string('enrollment_branch')->nullable();
            $table->string('enrollment_institution')->nullable();
            $table->string('phone');
            $table->string('dob');
            $table->boolean('subject_consent');
            $table->string('pin');
            $table->boolean('should_retrieve_nin')->nullable();
            $table->string('type');
            $table->string('gender')->nullable();
            $table->string('country');
            $table->string('requested_at');
            $table->string('last_modified_at');
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
        Schema::dropIfExists('bvn_verifications');
    }
}
