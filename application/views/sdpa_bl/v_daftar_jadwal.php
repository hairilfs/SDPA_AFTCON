<!-- <?php
$tahun     = isset($_POST['thn_ajar']) ? $_POST['thn_ajar'] : '' ;
$semester  = isset($_POST['semester']) ? $_POST['semester'] : '' ;
$semester = end($this->uri->segments);
$sem = $this->uri->segment(3);
 ?> -->

<div class="x_title">
  <h2>Data Penilaian</h2>
  <div class="clearfix"></div>
</div>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>No.</th>
      <th>Kode Jadwal</th>
      <th>Semester</th>
      <th>Mata Pelajaran</th>
      <th>Kelas</th>
      <th>Hari</th>
      <th>Ruang</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($isi_jadwal as $key_jadwal) { ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= $key_jadwal['kd_jadwal']; ?></td>
      <td><?= $key_jadwal['semester']; ?></td>
      <?php
      foreach ($isi_mapel as $key_mapel) {
        if ($key_jadwal['kd_mapel']==$key_mapel['kd_mapel']) {
          echo "<td>".$key_mapel['nm_mapel']."</td>";
        }
      } ?>
      <td><?= $key_jadwal['kd_kelas']; ?></td>
      <td><?= $key_jadwal['hari']; ?></td>
      <td><?= $key_jadwal['ruang']; ?></td>
      <td>
        <a href="<?= base_url().'dashboard/master_nilai/'.$key_jadwal['semester'].'/'.$key_jadwal['kd_kelas'].'/'.$key_jadwal['kd_jadwal']; ?>" type="button" class="btn btn-info">Berikan nilai!</a>
      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
