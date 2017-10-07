<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Submits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('company_id');
            $table->foreign('company_id')->references('id')->on('users');

            $table->string('name');

            $table->unsignedInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');

            $table->text('value');
            $table->float('size');

            $table->tinyInteger('status')->default('0');

            $table->binary('blob_value')->default(null);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
