<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('document', function (Blueprint $table) {
            $table->boolean('display')->default(true)->after('total_download');
        });
    }

    public function down()
    {
        Schema::table('document', function (Blueprint $table) {
            $table->dropColumn('display');
        });
    }
};