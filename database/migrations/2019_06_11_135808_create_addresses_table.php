<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('FK_person_id');
            $table->string('home_address');
            $table->string('postal_address');
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
        Schema::table('addresses', function(Blueprint $table)
        {
    
            $table->dropForeign('addresses_FK_person_id_foreign');
            $table->dropColumn('FK_person_id');
    
        });
        Schema::dropIfExists('addresses');
    }
}
