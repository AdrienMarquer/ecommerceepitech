<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdresseTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'adresse';

    /**
     * Run the migrations.
     * @table adresse
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('users_id');
            $table->text('adresse1')->nullable();
            $table->text('adresse2')->nullable();
            $table->integer('codePostal')->nullable();
            $table->text('ville')->nullable();
            $table->text('region')->nullable();
            $table->text('pays')->nullable();

            $table->index(["users_id"], 'fk_adresse_users1_idx');


            $table->foreign('users_id', 'fk_adresse_users1_idx')
                ->references('id')->on('users')
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
