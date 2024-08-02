<?php

use App\Models\role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     public function up(): void
     {
         Schema::table('users', function (Blueprint $table) {
             $table->string('alamat')->after('email');
             $table->char('status',2)->after('remember_token');
             $table->foreignIdFor(role::class)->after('status');

         });
     }

     /**
      * Reverse the migrations.
      */
     public function down(): void
     {
         Schema::table('users', function (Blueprint $table) {
             $table->dropColumn(['alamat','status','role_id']);
         });
     }
};
