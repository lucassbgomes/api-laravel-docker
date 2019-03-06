<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('email')->unique() ;
      $table->string('password');
      $table->char('firstName',30);
      $table->char('middleName',30)->nullable();
      $table->char('lastName',30);
      $table->text('data')->nullable();
      $table->char('language',2)->nullable();
      $table->unsignedInteger('office_id')->nullable();
      $table->enum('paymentStatus',
      [
          'NAO_PAGO',
          'PENDING_PAYMENT',
          'PAGO',
          'CANCELADO',
          'TESTE',
          'LIBERADO',
          'GRATIS',
          'REQUIRE_UPGRADE',
          'STUDENT'
      ])->nullable();
      $table->rememberToken();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }
}
