<?php

use App\Models\jenisPembayaran;
use App\Models\kelurahan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use App\Models\user;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_pengajuans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(user::class);
            $table->foreignIdFor(kelurahan::class);
            $table->foreignIdFor(jenispembayaran::class);
            $table->char('status',2);
            $table->date('tglPengambilan');;
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('jenispembayaran_id')->references('id')->on('jenispembayarans');
            $table->foreign('kelurahan_id')->references('id')->on('kelurahans');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pengajuans');
    }
};
