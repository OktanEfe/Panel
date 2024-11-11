<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGuardNameToRolesTable extends Migration
{
  public function up()
  {
    Schema::table('roles', function (Blueprint $table) {
      $table->string('guard_name')->default('web'); // guard_name sütununu ekliyoruz
    });
  }

  public function down()
  {
    Schema::table('roles', function (Blueprint $table) {
      $table->dropColumn('guard_name'); // Rollback için guard_name sütununu kaldırıyoruz
    });
  }
}
