<?php
$last = end($this->uri->segments);
$sem = $this->uri->segment(3);
$kel = $this->uri->segment(4);
$jmllat = 0;
?>
<h4 class="text-center" style="text-align: center;">LAPORAN DATA NILAI</h4>
<div class="infotable">
  <div class="kiri">
    <table class="tab_info">
      <tr>
        <td>Nama Guru</td>
        <td>&nbsp; : &nbsp;</td>
        <td width="">
          <?php
          foreach ($data_guru as $key_guru) {
            echo $key_guru['nama_guru'];
          }
          ?>
        </td>
      </tr>
      <tr>
        <td>Mata Pelajaran</td>
        <td>&nbsp; : &nbsp;</td>
        <td>
          <?php
          foreach ($data_jadwal as $key_jadwal) {
            foreach ($data_mapel as $key_mapel) {
              if ($key_mapel['kd_mapel']==$key_jadwal['kd_mapel']) {
                echo $key_mapel['nm_mapel'];
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
        <td>Kelas</td>
        <td>&nbsp; : &nbsp;</td>
        <td>
          <?php
          foreach ($data_jadwal as $key_jadwal) {
            foreach ($data_kelas as $key_kelas) {
              if ($key_kelas['kd_kelas']==$key_jadwal['kd_kelas']) {
                echo $key_kelas['nm_kelas'];
              }
            }
          }
          ?>
        </td>
      </tr>
      <tr>
        <td>Tahun Ajaran</td>
        <td>&nbsp; : &nbsp;</td>
        <td>
          <?php
          foreach ($data_jadwal as $key_jadwal) {
            echo $key_jadwal['semester']." - ".$key_jadwal['thn_ajar'];
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
      <?php
      $urut = 1;
      foreach ($data_latihan as $key_data_latihan) {
        $cek_isi_lat = isset($key_data_latihan['kd_lat']) ? $key_data_latihan['kd_lat'] : '';
        $kode = "LT000";
        $kodeurut = $kode.$urut;

        if($key_data_latihan['kd_lat']==$kodeurut AND $last==$key_data_latihan['kd_jadwal']) {
          echo "<th>Lt. ".$urut++."</th>";
        }
      }

      $urut2 = 1;
      foreach ($data_kuis as $key_data_kuis) {
        $cek_isi_kuis = isset($key_data_kuis['kd_kuis']) ? $key_data_kuis['kd_kuis'] : '';
        $kode2 = "QZ000";
        $kodeurut2 = $kode2.$urut2;

        if($key_data_kuis['kd_kuis']==$kodeurut2 AND $last==$key_data_kuis['kd_jadwal']) {
          echo "<th>Qz. ".$urut2++."</th>";
        }
      }

      $urut5 = 1;
      $urut6 = 1;
      foreach ($data_term as $key_data_term) {
        $cek_isi_term = isset($key_data_term['kd_term']) ? $key_data_term['kd_term'] : '';
        $kode5 = "TR000";
        $kodeurut5 = $kode5.$urut5;

        $ket_term = $key_data_term['ket'];
        if($key_data_term['kd_term']==$kodeurut5 AND $last==$key_data_term['kd_jadwal']) {
          echo "<th>Tr. ".$urut5++."</th>";
          echo "<th>NDW</th>";
        }
      }

      $urut4 = 1;
      foreach ($data_uts as $key_data_uts) {
        $cek_isi_uts = isset($key_data_uts['kd_uts']) ? $key_data_uts['kd_uts'] : '';
        $kode4 = "UT000";
        $kodeurut4 = $kode4.$urut4;
        if($key_data_uts['kd_uts']==$kodeurut4 AND $last==$key_data_uts['kd_jadwal']) {
          echo "<th>UTS</th>";  $urut4++;
        }
      }

      $urut3 = 1;
      foreach ($data_uas as $key_data_uas) {
        $cek_isi_uas = isset($key_data_uas['kd_uas']) ? $key_data_uas['kd_uas'] : '';
        $kode3 = "UA000";
        $kodeurut3 = $kode3.$urut3;
        if($key_data_uas['kd_uas']==$kodeurut3 AND $last==$key_data_uas['kd_jadwal']) {
          echo "<th>UAS</th>"; $urut3++;
        }
      }

      $urut7 = 1;
      // $urut8 = 1;
      foreach ($data_hasil_akhir as $key_data_hasil_akhir) {
        $cek_isi_hasil_akhir = isset($key_data_hasil_akhir['kd_hasil_akhir']) ? $key_data_hasil_akhir['kd_hasil_akhir'] : '';
        $kode7 = "HA000";
        $kodeurut7 = $kode7.$urut7;
        if($key_data_hasil_akhir['kd_hasil_akhir']==$kodeurut7 AND $last==$key_data_hasil_akhir['kd_jadwal']) {
          echo "<th>NA</th>";
          echo "<th>NDW</th>";
          $urut7++;
          // $urut8++;
        }
      }

      ?>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach ($isi_peserta as $key_peserta) { ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $key_peserta['nis'] ?></td>
        <?php
        foreach ($isi_siswa as $key_siswa) {
          if ($key_peserta['nis']==$key_siswa['NIS']) {
            echo "<td style='text-align: left; padding-left:3px;'>".$key_siswa['Nama']."</td>";
          }
        }

        $urut = 1;
        foreach ($data_latihan as $key_data_latihan) {
          $kode = "LT000";
          $kodeurut = $kode.$urut;
          if($key_data_latihan['kd_lat']==$kodeurut AND $key_peserta['nis']==$key_data_latihan['nis'] AND $key_data_latihan['kd_jadwal']==$last) {
            $rol = isset($key_data_latihan['nilai']) ? $key_data_latihan['nilai'] : '0';
            echo "<td>".$rol."</td>";
            $urut++;
          }
        }

        $urut2 = 1;
        foreach ($data_kuis as $key_data_kuis) {
          $kode2 = "QZ000";
          $kodeurut2 = $kode2.$urut2;
          if($key_data_kuis['kd_kuis']==$kodeurut2 AND $key_peserta['nis']==$key_data_kuis['nis'] AND $key_data_kuis['kd_jadwal']==$last) {
            $rol2 = isset($key_data_kuis['nilai']) ? $key_data_kuis['nilai'] : '0';
            echo "<td>".$rol2."</td>";
            $urut2++;
          }
        }

        $urut5 = 1;
        foreach ($data_term as $key_data_term) {
          $kode5 = "TR000";
          $kodeurut5 = $kode5.$urut5;
          if($key_data_term['kd_term']==$kodeurut5 AND $key_peserta['nis']==$key_data_term['nis'] AND $key_data_term['kd_jadwal']==$last) {
            $rol5 = isset($key_data_term['nilai']) ? $key_data_term['nilai'] : '0';
            echo "<td>".$rol5."</td>";
            echo "<td>".$key_data_term['ndw']."</td>";
            $urut5++;
          }
        }

        $urut4 = 1;
        foreach ($data_uts as $key_data_uts) {
          $kode4 = "UT000";
          $kodeurut4 = $kode4.$urut4;
          if($key_data_uts['kd_uts']==$kodeurut4 AND $key_peserta['nis']==$key_data_uts['nis'] AND $key_data_uts['kd_jadwal']==$last) {
            $rol4 = isset($key_data_uts['nilai']) ? $key_data_uts['nilai'] : '0';
            echo "<td>".$rol4."</td>";
            $urut4++;
          }
        }

        $urut3 = 1;
        foreach ($data_uas as $key_data_uas) {
          $kode3 = "UA000";
          $kodeurut3 = $kode3.$urut3;
          if($key_data_uas['kd_uas']==$kodeurut3 AND $key_peserta['nis']==$key_data_uas['nis'] AND $key_data_uas['kd_jadwal']==$last) {
            $rol3 = isset($key_data_uas['nilai']) ? $key_data_uas['nilai'] : '0';
            echo "<td>".$rol3."</td>";
            $urut3++;
          }
        }

        $urut7 = 1;
        // $urut8 = 1;
        foreach ($data_hasil_akhir as $key_data_hasil_akhir) {
          $kode7 = "HA000";
          $kodeurut7 = $kode7.$urut7;
          if($key_data_hasil_akhir['kd_hasil_akhir']==$kodeurut7 AND $key_peserta['nis']==$key_data_hasil_akhir['nis'] AND $key_data_hasil_akhir['kd_jadwal']==$last) {
            $rol7 = isset($key_data_hasil_akhir['nilai']) ? $key_data_hasil_akhir['nilai'] : '0';
            $rol8 = isset($key_data_hasil_akhir['ndw']) ? $key_data_hasil_akhir['ndw'] : '0';
            echo "<td>".$rol7."</td>";
            echo "<td>".$rol8."</td>";
            $urut7++;
            // $urut8++;
          }
        }

        ?>
      </tr>
      <?php
    }
    ?>
  </tbody>
</table><br>
<table id="ket">
<?php
$nokuis = 1;
$nolat = 1;
$noterm = 1;
foreach ($data_ket_latihan as $key_data_ket_latihan) {
  if($key_data_ket_latihan['kd_jadwal']==$last) {
    echo "<tr><td>Lt. ".$nolat."</td><td> : </td><td>".$key_data_ket_latihan['keterangan_latihan']."</td>";
    $nolat++;
  }
}

foreach ($data_ket_kuis as $key_data_ket_kuis) {
  if($key_data_ket_kuis['kd_jadwal']==$last) {
    echo "<tr><td>Qz. ".$nokuis."</td><td> : </td><td>".$key_data_ket_kuis['keterangan_kuis']."</td>";
    $nokuis++;
  }
}

foreach ($term_distinct as $key_term) {
  // if ($key_term['kd_jadwal']==$last) {
  echo "<tr><td>Tr. ".$noterm."</td><td> : </td><td>".$key_term['ket']."</td>";
  $noterm++;
  // }
}
?>
</table>

<hr>
<small><i id="ketb">Lt. = Latihan || Qz. = Kuis || Tr. = Term || NA = Nilai Akhir</i></small>
