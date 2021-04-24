<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('school_name');
            $table->string('school_logo');
            $table->string('cover_image');
            $table->string('desc_1');
            $table->string('desc_2');
            $table->text('hero_benefits');
            $table->mediumText('program_benefits');
            $table->dateTime('starts_on')->nullable();
            $table->string('duration')->nullable();
            $table->text('introduction');
            $table->string('intro_video_link');
            $table->text('intro_video_desc');
            $table->text('orientation')->nullable();
            $table->text('live_session')->nullable();
            $table->text('visit')->nullable();
            $table->text('certificate')->nullable();
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
        Schema::dropIfExists('programs');
    }
}
