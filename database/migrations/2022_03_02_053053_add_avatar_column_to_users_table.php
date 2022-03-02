<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvatarColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable()->
            default('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT8TeQ5iojLROQXom0AApSQbIamNDJRFDYgjw&usqp=CAU')
            ->after('username');                 
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
            $table->dropColumn('avatar');                                               //when rollback, this will run
        });
    }
}
