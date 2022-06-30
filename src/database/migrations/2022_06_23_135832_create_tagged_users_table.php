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
        Schema::create('pen_men', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('penable');
            $table->integer('pen_man_id');
            $table->enum('event', ['created', 'updated', 'deleted'])->default('created');
            $table->string('message')->nullable();
            $table->timestamp('written_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pen_men');
    }
};
