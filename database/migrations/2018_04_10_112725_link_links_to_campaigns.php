<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LinkLinksToCampaigns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('links', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->integer('campaign_id')->nullable()->default(null)->unsigned();
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('links', function (Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->dropForeign(['campaign_id']);
            $table->dropColumn('campaign_id');
        });

    }
}
