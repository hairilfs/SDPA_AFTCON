<h4 class="text-center" style="text-align: center;">LAPORAN DATA PESERTA</h4>
<table id="cetak_table" class="table table-bordered table-condensed">
  <thead>
    <tr class="info">
      <th>No.</th>
      <th>NIS</th>
      <th>Nama Siswa</th>
      <th>Kd. Kelas</th>
      <th>Thn. Ajar</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($data_lap as $key_lap) { ?>
        <tr>
          <td><?= $no++;?></td>
          <?php
            foreach ($data_sis as $key_sis) {
              if ($key_sis['NIS']==$key_lap['nis']) {
                echo "<td>".$key_sis['NIS']."</td><td style='text-align: left; padding-left:2px;'>".$key_sis['Nama']."</td>";
              }
            }
           ?>
          <td><?= $key_lap['kd_kelas']; ?></td>
          <td><?= $key_lap['thn_ajar']; ?></td>
        </tr>
    <?php }
     ?>
  </tbody>
</table>
