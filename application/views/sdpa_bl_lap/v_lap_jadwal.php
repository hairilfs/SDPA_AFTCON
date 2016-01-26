<h4 class="text-center" style="text-align: center;">LAPORAN DATA JADWAL</h4>
<table id="cetak_table" class="table table-bordered table-condensed">
  <thead>
    <tr class="info">
      <th>No.</th>
      <th>Jadwal</th>
      <th>Tahun Ajar</th>
      <th>Semester</th>
      <th>Mata Pelajaran</th>
      <th>Guru</th>
      <th>Kelas</th>
      <th>Hari</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($data_lap as $key_lap) { ?>
        <tr>
          <td><?= $no++;?></td>
          <td><?= $key_lap['kd_jadwal']; ?></td>
          <td><?= $key_lap['thn_ajar']; ?></td>
          <td><?= $key_lap['semester']; ?></td>
          <?php
            foreach ($data_map as $key_map) {
              if ($key_map['kd_mapel']==$key_lap['kd_mapel']) {
                echo "<td>".$key_map['nm_mapel']."</td>";
              }
            }
            foreach ($data_gur as $key_gur) {
              if ($key_gur['employee_id']==$key_lap['employee_id']) {
                echo "<td style='text-align: left; padding-left: 2px;'>".$key_gur['nama_guru']."</td>";
              }
            }
           ?>
          <td><?= $key_lap['ruang']; ?></td>
          <td><?= $key_lap['hari']; ?></td>
        </tr>
    <?php }
     ?>
  </tbody>
</table>
