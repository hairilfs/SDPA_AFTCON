<h4 class="text-center">LAPORAN DETIL SISWA</h4>
<?php  foreach ($data_lap as $key_lap) { } ?>
<img src="<?= base_url().'assets/uploads/'.$key_lap['Foto'];?>" align="center" alt="" width="200px" class="img-thumbnail center-block"><br><br>
<div class="row">
  <div class="col-xs-6 col-sm-4">
    <table class="table">
      <tr>
        <td><b>NIS</b></td>
        <td><?= $key_lap['NIS']; ?></td>
      </tr>
      <tr>
        <td><b>NISN</b></td>
        <td><?= $key_lap['NISN']; ?></td>
      </tr>
      <tr>
        <td><b>Nama</b></td>
        <td><?= $key_lap['Nama']; ?></td>
      </tr>
      <tr>
        <td><b>Tempat, Tgl. Lahir</b></td>
        <td><?= $key_lap['Tempat_lahir'].", ".$key_lap['Tanggal_lahir']; ?></td>
      </tr>
      <tr>
        <td><b>Agama</b></td>
        <td><?= $key_lap['Agama']; ?></td>
      </tr>
      <tr>
        <td><b>Jenis Kelamin</b></td>
        <td><?= $key_lap['Jenis_kelamin']; ?></td>
      </tr>
      <tr>
        <td><b>Kewarganegaraan</b></td>
        <td><?= $key_lap['Kewarganegaraan']; ?></td>
      </tr>
      <tr>
        <td><b>Warga Negara</b></td>
        <td><?= $key_lap['Warga_negara']; ?></td>
      </tr>
    </table>
  </div>
  <div class="col-xs-6 col-sm-4">
    <table class="table">
      <tr>
        <td><b>Status Anak</b></td>
        <td><?= $key_lap['Status_anak']; ?></td>
      </tr>
      <tr>
        <td><b>Anak Ke</b></td>
        <td><?= $key_lap['Anak_ke']; ?></td>
      </tr>
      <tr>
        <td><b>Jml. Saudara</b></td>
        <td><?= $key_lap['Jumlah_saudara']; ?></td>
      </tr>
      <tr>
        <td><b>Asal Sekolah</b></td>
        <td><?= $key_lap['Asal_sekolah']; ?></td>
      </tr>
      <tr>
        <td><b>Prestasi</b></td>
        <td><?= $key_lap['Prestasi']; ?></td>
      </tr>
      <tr>
        <td><b>Nama Ayah</b></td>
        <td><?= $key_lap['Nama_ayah']; ?></td>
      </tr>
      <tr>
        <td><b>Nama Ibu</b></td>
        <td><?= $key_lap['Nama_ibu']; ?></td>
      </tr>
      <tr>
        <td><b>Alamat</b></td>
        <td><?= $key_lap['Alamat']; ?></td>
      </tr>
    </table>
  </div>
  <!-- Optional: clear the XS cols if their content doesn't match in height -->
  <div class="clearfix visible-xs-block"></div>
  <div class="col-xs-6 col-sm-4">
    <table class="table">
      <tr>
        <td><b>Telp. Rumah</b></td>
        <td><?= $key_lap['Telepon_rumah']; ?></td>
      </tr>
      <tr>
        <td><b>No. HP</b></td>
        <td><?= $key_lap['Nomor_hp']; ?></td>
      </tr>
      <tr>
        <td><b>Tinggi Badan</b></td>
        <td><?= $key_lap['Tinggi_badan']; ?></td>
      </tr>
      <tr>
        <td><b>Berat Badan</b></td>
        <td><?= $key_lap['Berat_badan']; ?></td>
      </tr>
      <tr>
        <td><b>Wajah</b></td>
        <td><?= $key_lap['Wajah']; ?></td>
      </tr>
      <tr>
        <td><b>Rambut</b></td>
        <td><?= $key_lap['Rambut']; ?></td>
      </tr>
      <tr>
        <td><b>Gol. Darah</b></td>
        <td><?= $key_lap['Golongan_darah']; ?></td>
      </tr>
      <tr>
        <td><b>Riwayat Penyakit</b></td>
        <td><?= $key_lap['Penyakit_riwayat']; ?></td>
      </tr>
    </table>
  </div>
</div>
