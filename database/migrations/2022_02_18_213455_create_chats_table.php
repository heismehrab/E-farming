<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();

            $table->uuid('uuid');
            $table->string('name')->nullable();

            $table->unsignedBigInteger('from_user_id');
            $table->unsignedBigInteger('to_user_id');

            // Create indexes.
            $table->index(['from_user_id', 'to_user_id']);

            $table->softDeletes();
            $table->timestamps();

            // Foreign keys.
            $table->foreign(['from_user_id'])
                ->references('id')
                ->on('users');

            $table->foreign(['to_user_id'])
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
}
