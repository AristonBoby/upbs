<?php

use App\Models\tblkatVaritas;
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
        Schema::create('tbl_varitas', function (Blueprint $table) {
            $table->id();
            $table->string('varitas',100);
            $table->integer('harga');
            $table->foreignIdFor(tblkatVaritas::class);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('tblkat_varitas_id')->references('id')->on('tblkat_varitas')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_varitas');
    }
};
