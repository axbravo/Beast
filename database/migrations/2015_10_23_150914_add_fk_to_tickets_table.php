<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('owner_id')
                ->references('id')
                ->on('users');
            
            $table->foreign('event_id')
                ->references('id')
                ->on('events');

            $table->foreign('presentation_id')
                ->references('id')
                ->on('presentations');

            $table->foreign('seat_id')
                ->references('id')
                ->on('slots');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign('tickets_owner_id_foreign');
            $table->dropForeign('tickets_event_id_foreign');
            $table->dropForeign('tickets_presentation_id_foreign');
            $table->dropForeign('tickets_seat_id_foreign');
        });
    }
}