<h4 class="text-center" style="text-align: center;">LAPORAN DATA USER</h4>
<table id="cetak_table" class="table table-bordered table-condensed">
  <thead>
    <tr class="info">
      <th>No.</th>
      <th>ID User</th>
      <th>Level</th>
      <th>Login Terakhir</th>
      <th>Session ID</th>
      <th>IP Address</th>
      <th>Browser</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $no = 1;
      foreach ($data_lap as $key_lap) { ?>
        <tr>
          <td><?= $no++;?></td>
          <td><?= $key_lap['id_user']; ?></td>
          <td><?= $key_lap['level']; ?></td>
          <td><?= $key_lap['last_log']; ?></td>
          <td style="text-align: left; padding-left:2px;"><?= $key_lap['sess_id']; ?></td>
          <td><?= $key_lap['ip_add']; ?></td>
          <td style="text-align: left; padding-left:2px;"><?= $key_lap['browser']; ?></td>
        </tr>
    <?php }
     ?>
  </tbody>
</table>
