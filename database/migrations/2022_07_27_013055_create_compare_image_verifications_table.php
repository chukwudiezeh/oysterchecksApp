<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompareImageVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compare_image_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('identity_verifications_id')->constrained('identity_verifications');
            $table->string('service_reference');
            $table->string('status');
            $table->string('reason')->nullable();
            $table->boolean('selfie_validation');
            $table->json('image_comparison')->nullable();
            $table->boolean('subject_consent');
            $table->string('type');
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
        Schema::dropIfExists('compare_image_verifications');
    }
}
