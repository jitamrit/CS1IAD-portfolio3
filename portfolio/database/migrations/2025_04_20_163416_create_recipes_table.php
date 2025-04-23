<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('recipes')) {
            Schema::create('recipes', function (Blueprint $table) {
                $table->id('rid');
                $table->string('name');
                $table->text('description');
                $table->string('type');
                $table->integer('cookingtime');
                $table->integer('servings')->nullable();
                $table->string('difficulty')->nullable();
                $table->text('ingredients');
                $table->text('instructions');
                $table->string('image')->nullable();
                $table->string('uid');
                $table->timestamps();
                $table->foreign('uid')->references('uid')->on('users')->onDelete('cascade');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
