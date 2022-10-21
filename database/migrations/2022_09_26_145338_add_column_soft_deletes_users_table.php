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
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
            //ユニーク制約を外す
            $table->dropUnique('users_email_unique');
            //emailとdaleted_atを複合ユニーク制約
            $table->unique(['email','deleted_at'],'users_email_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
            $table->dropUnique('users_email_unique');
            $table->unique('email','users_email_unique');
        });
    }
};
