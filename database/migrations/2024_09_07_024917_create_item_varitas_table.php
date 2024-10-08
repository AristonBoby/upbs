<?php

use App\Models\tblPengajuan;
use App\Models\tblVaritas;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_varitas', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('tbl_pengajuan_id');
            $table->foreignIdFor(tblVaritas::class);
            $table->foreign('tbl_pengajuan_id')->references('id')->on('tbl_pengajuans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('tbl_varitas_id')->references('id')->on('tbl_varitas');
            $table->bigInteger('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_varitas');
    }
};
