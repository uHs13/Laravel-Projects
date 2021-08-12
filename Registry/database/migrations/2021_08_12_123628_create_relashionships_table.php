<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelashionshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relashionships', function (Blueprint $table) {
            $table->unsignedBigInteger('developer_id')->unsigned();
            $table->unsignedBigInteger('project_id')->unsigned();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('developer_id')->references('id')->on('developers');
            $table->foreign('project_id')->references('id')->on('projects');
            $table->primary(['developer_id', 'project_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relashionships');
    }
}
