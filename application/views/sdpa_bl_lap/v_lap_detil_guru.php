<h4 class="text-center">LAPORAN DETIL GURU</h4>
<?php  foreach ($data_lap as $key_lap) { } ?>
<img src="<?= $key_lap['foto'];?>" align="center" alt="" width="200px" class="img-thumbnail center-block"><br><br>
<div class="row">
  <div class="col-xs-6 col-sm-4">
    <table class="table">
      <tr>
        <td><b>Emp. ID</b></td>
        <td><?= $key_lap['employee_id']; ?></td>
      </tr>
      <tr>
        <td><b>NIP</b></td>
        <td><?= $key_lap['NIP']; ?></td>
      </tr>
      <tr>
        <td><b>NUPTK</b></td>
        <td><?= $key_lap['NUPTK']; ?></td>
      </tr>
      <tr>
        <td><b>Nama Guru</b></td>
        <td><?= $key_lap['nama_guru']; ?></td>
      </tr>
      <tr>
        <td><b>Tempat, Tgl Lahir</b></td>
        <td><?= $key_lap['tempat_lahir'].", ".$key_lap['tanggal_lahir']; ?></td>
      </tr>
      <tr>
        <td><b>Jenis Kelamin</b></td>
        <td><?= $key_lap['jenis_kelamin']; ?></td>
      </tr>
      <tr>
        <td><b>Alamat</b></td>
        <td><?= $key_lap['alamat']; ?></td>
      </tr>
      <tr>
        <td><b>Agama</b></td>
        <td><?= $key_lap['agama']; ?></td>
      </tr>
      <tr>
        <td><b>Kewarganegaraan</b></td>
        <td><?= $key_lap['kewarganegaraan']; ?></td>
      </tr>
      <tr>
        <td><b>Warga Negara</b></td>
        <td><?= $key_lap['warga_negara']; ?></td>
      </tr>
      <tr>
        <td><b>Status Anak</b></td>
        <td><?= $key_lap['status_anak']; ?></td>
      </tr>
      <tr>
        <td><b>Anak Ke</b></td>
        <td><?= $key_lap['anak_ke']; ?></td>
      </tr>
      <tr>
        <td><b>Status Pernikahan</b></td>
        <td><?= $key_lap['status_pernikahan']; ?></td>
      </tr>
      <tr>
        <td><b>Tahun Menikah</b></td>
        <td><?= $key_lap['tahun_menikah']; ?></td>
      </tr>
    </table>
  </div>
  <div class="col-xs-6 col-sm-4">
    <table class="table">
      <tr>
        <td><b>Tlp. Rumah</b></td>
        <td><?= $key_lap['telp_rumah']; ?></td>
      </tr>
      <tr>
        <td><b>No. HP</b></td>
        <td><?= $key_lap['no_hp']; ?></td>
      </tr>
      <tr>
        <td><b>Email</b></td>
        <td><?= $key_lap['email']; ?></td>
      </tr>
      <tr>
        <td><b>Jml. Saudara</b></td>
        <td><?= $key_lap['jml_saudara']; ?></td>
      </tr>
      <tr>
        <td><b>Thn. Mulai Tugas</b></td>
        <td><?= $key_lap['thn_mulai_tugas']; ?></td>
      </tr>
      <tr>
        <td><b>No. SK Dinas</b></td>
        <td><?= $key_lap['no_sk_dinas']; ?></td>
      </tr>
      <tr>
        <td><b>Tgl. SK Dinas</b></td>
        <td><?= $key_lap['tgl_sk_dinas']; ?></td>
      </tr>
      <tr>
        <td><b>B. Studi Ajar</b></td>
        <td><?= $key_lap['jenis_kelamin']; ?></td>
      </tr>
      <tr>
        <td><b>Mutasi Dari</b></td>
        <td><?= $key_lap['mutasi_dari']; ?></td>
      </tr>
      <tr>
        <td><b>No. SK Mutasi</b></td>
        <td><?= $key_lap['no_sk_mutasi']; ?></td>
      </tr>
      <tr>
        <td><b>Stat. Karyawan</b></td>
        <td><?= $key_lap['stat_karyawan']; ?></td>
      </tr>
      <tr>
        <td><b>Gol. Darah Negara</b></td>
        <td><?= $key_lap['gol_darah']; ?></td>
      </tr>
      <tr>
        <td><b>Tempat Bekerja</b></td>
        <td><?= $key_lap['tempat_bekerja']; ?></td>
      </tr>
      <tr>
        <td><b>Jabatan</b></td>
        <td><?= $key_lap['jabatan']; ?></td>
      </tr>
      <tr>
        <td><b>Pangkat Golongan</b></td>
        <td><?= $key_lap['pangkat_golongan']; ?></td>
      </tr>
      <tr>
        <td><b>Stat. Pegawai</b></td>
        <td><?= $key_lap['stat_pegawai']; ?></td>
      </tr>
    </table>
  </div>
  <!-- Optional: clear the XS cols if their content doesn't match in height -->
  <div class="clearfix visible-xs-block"></div>
  <div class="col-xs-6 col-sm-4">
    <table class="table">
      <tr>
        <td><b>Mengajar Di Kelas</b></td>
        <td><?= $key_lap['mengajar_dikelas']; ?></td>
      </tr>
      <tr>
        <td><b>Tugas Tambahan</b></td>
        <td><?= $key_lap['tugas_tambahan']; ?></td>
      </tr>
      <tr>
        <td><b>Tingkat Pendidikan</b></td>
        <td><?= $key_lap['tgkt_jnjg_pddkn']; ?></td>
      </tr>
      <tr>
        <td><b>Thn. Masuk Pendidikan</b></td>
        <td><?= $key_lap['thn_msk_pddkn']; ?></td>
      </tr>
      <tr>
        <td><b>Thn. Lulus Pendidikan</b></td>
        <td><?= $key_lap['thn_lulus_pddkn']; ?></td>
      </tr>
      <tr>
        <td><b>Nama Bapak</b></td>
        <td><?= $key_lap['nama_bapak']; ?></td>
      </tr>
      <tr>
        <td><b>Nama Ibu</b></td>
        <td><?= $key_lap['nama_ibu']; ?></td>
      </tr>
      <tr>
        <td><b>Nama Suami</b></td>
        <td><?= $key_lap['nama_suami']; ?></td>
      </tr>
      <tr>
        <td><b>Nama Istri</b></td>
        <td><?= $key_lap['nama_istri']; ?></td>
      </tr>
      <tr>
        <td><b>Tinggi Badan</b></td>
        <td><?= $key_lap['tinggi_badan']; ?></td>
      </tr>
      <tr>
        <td><b>Berat Badan</b></td>
        <td><?= $key_lap['berat_badan']; ?></td>
      </tr>
      <tr>
        <td><b>Wajah</b></td>
        <td><?= $key_lap['wajah']; ?></td>
      </tr>
      <tr>
        <td><b>Rambut</b></td>
        <td><?= $key_lap['rambut']; ?></td>
      </tr>
      <tr>
        <td><b>Riwayat Penyakit</b></td>
        <td><?= $key_lap['pykt_derita']; ?></td>
      </tr>
      <tr>
        <td><b>Keahlian</b></td>
        <td><?= $key_lap['keahlian']; ?></td>
      </tr>
    </table>
  </div>
</div>
