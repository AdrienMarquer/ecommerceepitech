<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComposantsHasCartshoppingTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'composants_has_Cartshopping';

    /**
     * Run the migrations.
     * @table composants_has_Cartshopping
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('composants_id');
            $table->integer('composants_commande_user_id');
            $table->integer('Cartshopping_users_id');

            $table->index(["composants_id", "composants_commande_user_id"], 'fk_composants_has_Cartshopping_composants1_idx');

            $table->index(["Cartshopping_users_id"], 'fk_composants_has_Cartshopping_Cartshopping1_idx');


            $table->foreign('composants_id', 'fk_composants_has_Cartshopping_composants1_idx')
                ->references('id')->on('composants')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Cartshopping_users_id', 'fk_composants_has_Cartshopping_Cartshopping1_idx')
                ->references('users_id')->on('Cartshopping')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
