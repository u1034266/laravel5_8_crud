<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEcontactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('econtacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('FK_person_id');
            $table->string('email');
            $table->string('mobile');
            $table->string('home_phone');
            $table->string('office_phone');
            $table->timestamps();
            $table->foreign('FK_person_id')->references('id')->on('persons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('econtacts', function(Blueprint $table)
        {
    
            $table->dropForeign('econtacts_FK_person_id_foreign');
            $table->dropColumn('FK_person_id');
    
        });
        Schema::dropIfExists('econtacts');
    }
}
