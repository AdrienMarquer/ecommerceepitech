<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComposantsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'composants';

    /**
     * Run the migrations.
     * @table composants
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->double('prix')->nullable();
            $table->text('marque')->nullable();
            $table->text('modele')->nullable();
            $table->mediumText('description')->nullable();
            $table->text('taille')->nullable();
            $table->text('categorie')->nullable();
            $table->text('image')->nullable();
            $table->double('poids')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('commande_user_id');
            $table->double('consommation')->nullable();
            $table->text('frequence')->nullable();
            $table->text('capacite')->nullable();
            $table->text('socket')->nullable();
            $table->boolean('atx')->nullable();
            $table->boolean('microAtx')->nullable();
            $table->text('type_stockage')->nullable();
            $table->text('type_ram')->nullable();
            $table->integer('proc_nb_coeur')->nullable();
            $table->integer('proc_nb_thread')->nullable();
            $table->double('alim_puissance')->nullable();
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
