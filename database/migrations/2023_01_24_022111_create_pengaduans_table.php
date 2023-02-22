<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id('id_pengaduan');
            $table->dateTime('tgl_pengaduan');
            $table->char('nik',16);
            $table->text('judul');
            $table->text('isi_laporan');
            $table->dateTime('tgl_kejadian');
            $table->text('lokasi');
            $table->enum('kategori', ['Agama','Ekonomi Dan Keuangan','Kesehatan','Pembangunan Desa, Daerah Tertinggal, Transmigrasi','Kekerasan Di Satuan Pendidikan Sekolah, Kuliah, Lembaga Khusus','Kekerasan Rumah Tangga','Pencegahan, Pemberantasan Penyalahgunaa Dan Peredaran Gelap Narkotika Dan Prekursor Narkotika','Politik Dan Hukum','Sosial Dan Kesejahteraan']);
            $table->string('foto');
            $table->enum('status', ['0', 'proses', 'selesai']);


            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('masyarakat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
};
