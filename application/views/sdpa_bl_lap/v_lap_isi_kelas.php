<h4 class="text-center" style="text-align: center;">LAPORAN DATA KELAS</h4>
<div class="infotable">
  <div class="kiri">
    <table class="tab_info">
      <tr>
        <td>Kelas</td>
        <td>&nbsp; : &nbsp;</td>
        <td width="">
          <?php
          foreach ($data_kelas as $key_kelas) {
            echo $key_kelas['nm_kelas'];
          }
          ?>
        </td>
      </tr>
      <tr>
        <td>Wali Kelas</td>
        <td>&nbsp; : &nbsp;</td>
        <td>
          <?php
          foreach ($data_wali as $key_wali) {
            foreach ($data_guru as $key_guru) {
              if ($key_guru['employee_id']==$key_wali['Employee_id']) {
                echo $key_guru['nama_guru'];
              }
            }
          }
          ?>
        </td>
      </tr>
    </table>
  </div>
  <div class="kanan">
    <table class="tab_info">
      <tr>
        <td>Tahun Ajaran</td>
        <td>&nbsp; : &nbsp;</td>
        <td>
          <?php
          foreach ($data_kelas as $key_kelas) {
            echo $key_kelas['thn_ajar'];
          }
          ?>
        </td>
      </tr>
      <tr>
        <td>Semester</td>
        <td>&nbsp; : &nbsp;</td>
        <td>
          <?php
          foreach ($data_kelas as $key_kelas) {
            echo $key_kelas['semester'];
          }
          ?>
        </td>
      </tr>
    </table>
  </div>
</div><br>
<table id="cetak_table" class="table table-bordered table-hover table-compact">
  <thead>
    <tr>
      <th>No.</th>
      <th>NIS</th>
      <th>Nama Siswa</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php $ang = 1; foreach ($data_peserta as $key_peserta): ?>
      <?php foreach ($data_siswa as $key_siswa): ?>
        <?php

        if ($key_peserta['kd_kelas']==$key_kelas['kd_kelas']) {
          if ($key_siswa['NIS']==$key_peserta['nis']) { ?>
            <tr>
              <td><?= $ang++; ?></td>
              <td><?= $key_siswa['NIS'];?></td>
              <td style='text-align: left; padding-left:3px;'><?= $key_siswa['Nama'];?></td>
              <td>&nbsp;&nbsp;</td>
              <td>&nbsp;&nbsp;</td>
              <td>&nbsp;&nbsp;</td>
              <td>&nbsp;&nbsp;</td>
              <td>&nbsp;&nbsp;</td>
            </tr>
            <?php }
          }
          ?>
        <?php endforeach; ?>
      <?php endforeach; ?>
  </tbody>
</table>
