<h4 class="text-center" style="text-align: center;">LAPORAN DATA WALI KELAS</h4>
<table id="cetak_table" class="table table-bordered table-condensed">
  <thead>
    <tr class="info">
      <th>No.</th>
      <th>Tahun Ajar</th>
      <th>Emp. ID</th>
      <th>Nama Guru</th>
      <th>Kd. Kelas</th>
      <th>Kelas</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($data_lap as $key_lap) { ?>
        <tr>
          <td><?= $no++;?></td>
          <td><?= $key_lap['Tahun_ajar_wali']; ?></td>
          <?php
            foreach ($data_gur as $key_gur) {
              if ($key_gur['employee_id']==$key_lap['Employee_id']) {
                echo "<td>".$key_gur['employee_id']."</td><td style='text-align: left; padding-left:2px;''>".$key_gur['nama_guru']."</td>";
              }
            }
            foreach ($data_kel as $key_kel) {
              if ($key_kel['kd_kelas']==$key_lap['Kd_kelas']) {
                echo "<td>".$key_kel['kd_kelas']."</td><td>".$key_kel['nm_kelas']."</td>";
              }
            }
          ?>
          <!-- <td><?= $key_lap['Kd_kelas']; ?></td> -->
        </tr>
    <?php }
     ?>
  </tbody>
</table>
