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
        Schema::create('user_tokens', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
/*             $table->integer('user_id',false,true);
            $table->string('api_tokens',60)->unique();
            $table->timestamp('created_at')->useCurrentOnUpdate();
            $table->foreign('user_id')->references('id')->on('users')
                  ->onDelete('cascade')->onUpdate('cascade');
            // <--- 라라벨 버전 7 미만 */
            // <--- 라라벨 버전 7 이상
            // $table->integer('user_id',false,true);
            $table->string('api_token',60)->unique();
            $table->timestamp('created_at')->useCurrentOnUpdate();
            // $table->foreign('user_id')->references('id')->on('users')
            //       ->onDelete('cascade')->onUpdate('cascade');

            $table->foreignId('user_id')->constrained('users')
                  ->onDelete('cascade')->onUpdate('cascade');
                //   또는 $table->foreignId('user_id')->constrained()
                //   ->onDelete('cascade')->onUpdate('cascade');                  

            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // $table->dropForeign(['user_id']);
        Schema::dropIfExists('user_tokens');
    }
};
