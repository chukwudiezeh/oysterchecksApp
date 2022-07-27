<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankAccountVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_account_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identity_verifications_id')->constrained('identity_verifications');
            $table->string('service_reference');
            $table->string('status');
            $table->string('reason')->nullable();
            $table->boolean('data_validation');
            $table->boolean('selfie_validation');
            $table->boolean('subject_consent');
            $table->string('pin');
            $table->json('bank_details')->nullable();
            $table->string('type');
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
        Schema::dropIfExists('bank_account_verifications');
    }
}
