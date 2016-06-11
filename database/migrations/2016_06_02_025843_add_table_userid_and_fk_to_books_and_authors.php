<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTableUseridAndFkToBooksAndAuthors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable()->after('id')->index('books_user_id_foreign');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
        });


        Schema::table('authors', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable()->after('id')->index('authors_user_id_foreign');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign('books_user_id_foreign');
            $table->dropColumn('user_id');
        });

        Schema::table('authors', function (Blueprint $table) {
            $table->dropForeign('authors_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
