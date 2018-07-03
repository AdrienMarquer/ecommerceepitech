<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComposantsHasCommandeTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'composants_has_commande';

    /**
     * Run the migrations.
     * @table composants_has_commande
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
            $table->integer('commande_user_id');

            $table->index(["composants_id", "composants_commande_user_id"], 'fk_composants_has_commande_composants1_idx');

            $table->index(["commande_user_id"], 'fk_composants_has_commande_commande1_idx');


            $table->foreign('composants_id', 'fk_composants_has_commande_composants1_idx')
                ->references('id')->on('composants')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('commande_user_id', 'fk_composants_has_commande_commande1_idx')
                ->references('user_id')->on('commande')
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
