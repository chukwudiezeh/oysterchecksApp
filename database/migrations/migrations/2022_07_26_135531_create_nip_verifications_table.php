<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNipVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nip_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identity_verifications_id')->constrained('identity_verifications');
            $table->string('service_reference');
            $table->json('address')->nullable();
            $table->json('validations')->nullable();
            $table->string('status');
            $table->string('reason')->nullable();
            $table->boolean('data_validation');
            $table->boolean('selfie_validation');
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('expired_date')->nullable();
            $table->string('notify_when_id_expire')->nullable();
            $table->string('image')->nullable();
            $table->string('signature')->nullable();
            $table->string('issued_at')->nullable();
            $table->string('issued_date')->nullable();
            $table->string('phone')->nullable();
            $table->string('dob')->nullable();
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
        Schema::dropIfExists('nip_verifications');
    }
}
