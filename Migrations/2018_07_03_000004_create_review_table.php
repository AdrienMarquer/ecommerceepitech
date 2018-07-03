<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'review';

    /**
     * Run the migrations.
     * @table review
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('composants_id');
            $table->integer('composants_Cartshopping_users_id');
            $table->integer('composants_commande_user_id');

            $table->index(["user_id"], 'fk_review_user1_idx');

            $table->index(["composants_id", "composants_Cartshopping_users_id", "composants_commande_user_id"], 'fk_review_composants1_idx');


            $table->foreign('user_id', 'fk_review_user1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('composants_id', 'fk_review_composants1_idx')
                ->references('id')->on('composants')
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
