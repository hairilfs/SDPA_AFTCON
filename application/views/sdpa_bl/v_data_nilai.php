<?php
$last = end($this->uri->segments);
$sem = $this->uri->segment(3);
$kel = $this->uri->segment(4);
?>
<div class="x_title">
  <h2>Data Penilaian</h2>
  <div class="clearfix"></div>
</div>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-latihan"><i class="fa fa-plus"></i> Latihan</button>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-kuis"><i class="fa fa-plus"></i> Kuis</button>

<?php
// echo "<pre>";
// print_r($data_kuis);
// echo "</pre>";
  foreach ($data_latihan as $key_data_latihan) {}
  foreach ($data_kuis as $key_data_kuis) {}
  foreach ($data_uts as $key_data_uts) {}
  foreach ($data_uas as $key_data_uas) {}
  foreach ($data_term as $key_data_term) {}
  foreach ($data_hasil_akhir as $key_data_hasil_akhir) {}

  if(isset($key_data_latihan['nilai']) OR isset($key_data_kuis['nilai'])) {
    echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#add-term'><i class='fa fa-plus'></i> Term</button>";
  } else {
    echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#add-term' disabled><i class='fa fa-plus'></i> Term</button>";
  }

  if(isset($key_data_uts['nilai']) OR !isset($key_data_term['nilai'])) {
    echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#add-uts' disabled><i class='fa fa-plus'></i> UTS</button>";
  } else {
    echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#add-uts'><i class='fa fa-plus'></i> UTS</button>";
  }

  if(isset($key_data_uas['nilai']) OR !isset($key_data_uts['nilai'])) {
    echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#add-uas' disabled><i class='fa fa-plus'></i> UAS</button>";
  } else {
    echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#add-uas'><i class='fa fa-plus'></i> UAS</button>";
  }

  if(isset($key_data_term['nilai']) AND isset($key_data_uts['nilai']) AND isset($key_data_uas['nilai']) AND !isset($key_data_hasil_akhir['nilai'])) {
    echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#add-nilai-akhir'><i class='fa fa-plus'></i> Nilai Akhir</button>";
  } else if(isset($key_data_term['nilai']) AND isset($key_data_uts['nilai']) AND isset($key_data_uas['nilai']) AND isset($key_data_hasil_akhir['nilai'])) {
    echo "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#add-nilai-akhir' disabled><i class='fa fa-plus'></i> Nilai Akhir</button>";
  }
?>
<a href="<?= base_url();?>dashboard/cetak_nilai_jadwal/<?= $sem."/".$kel."/".$last;?>" target="_blank"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> Cetak Nilai</button></a>

<br>
<div class="table-responsive">
<table class="table table-bordered table-hover table-compact">
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

          foreach ($data_ket_latihan as $key_data_ket_latihan) {
            if($key_data_ket_latihan['kd_ket_latihan']==$kodeurut) {
                $tooltip_ket_lat = $key_data_ket_latihan['keterangan_latihan'];
            }
          }

          if($key_data_latihan['kd_lat']==$kodeurut AND $last==$key_data_latihan['kd_jadwal']) {
            echo "<th>Latihan ".$urut++." <a href='javascript:;'><i class='fa fa-question-circle fa-lg' data-toggle='tooltip' data-placement='top' title='$tooltip_ket_lat'></i></a></th>";
          }
        }

        $urut2 = 1;
        foreach ($data_kuis as $key_data_kuis) {
          $cek_isi_kuis = isset($key_data_kuis['kd_kuis']) ? $key_data_kuis['kd_kuis'] : '';
          $kode2 = "QZ000";
          $kodeurut2 = $kode2.$urut2;

          foreach ($data_ket_kuis as $key_data_ket_kuis) {
            if($key_data_ket_kuis['kd_ket_kuis']==$kodeurut2) {
                $tooltip_ket_kuis = $key_data_ket_kuis['keterangan_kuis'];
            }
          }

          if($key_data_kuis['kd_kuis']==$kodeurut2 AND $last==$key_data_kuis['kd_jadwal']) {
            echo "<th>Kuis ".$urut2++." <a href='javascript:;'><i class='fa fa-question-circle fa-lg' data-toggle='tooltip' data-placement='top' title='$tooltip_ket_kuis'></i></a></th>";
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
            echo "<th>Term ".$urut5++." <a href='javascript:;'><i class='fa fa-question-circle fa-lg' data-toggle='tooltip' data-placement='top' title='$ket_term'></i></a></th>";
            echo "<th>NDW ".$urut6++." <a href='javascript:;'><i class='fa fa-question-circle fa-lg' data-toggle='tooltip' data-placement='top' title='$ket_term'></i></a></th>";
          }
        }

        $urut4 = 1;
        foreach ($data_uts as $key_data_uts) {
          $cek_isi_uts = isset($key_data_uts['kd_uts']) ? $key_data_uts['kd_uts'] : '';
          $kode4 = "UT000";
          $kodeurut4 = $kode4.$urut4;
          if($key_data_uts['kd_uts']==$kodeurut4 AND $last==$key_data_uts['kd_jadwal']) {
            echo "<th>UTS ".$urut4++."</th>";
          }
        }

        $urut3 = 1;
        foreach ($data_uas as $key_data_uas) {
          $cek_isi_uas = isset($key_data_uas['kd_uas']) ? $key_data_uas['kd_uas'] : '';
          $kode3 = "UA000";
          $kodeurut3 = $kode3.$urut3;
          if($key_data_uas['kd_uas']==$kodeurut3 AND $last==$key_data_uas['kd_jadwal']) {
            echo "<th>UAS ".$urut3++."</th>";
          }
        }

        $urut7 = 1;
        $urut8 = 1;
        foreach ($data_hasil_akhir as $key_data_hasil_akhir) {
          $cek_isi_hasil_akhir = isset($key_data_hasil_akhir['kd_hasil_akhir']) ? $key_data_hasil_akhir['kd_hasil_akhir'] : '';
          $kode7 = "HA000";
          $kodeurut7 = $kode7.$urut7;
          if($key_data_hasil_akhir['kd_hasil_akhir']==$kodeurut7 AND $last==$key_data_hasil_akhir['kd_jadwal']) {
            echo "<th>Nilai Akhir </th>";
            echo "<th>NDW Akhir </th>";
            $urut7++;
            $urut8++;
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
            echo "<td>".$key_siswa['Nama']."</td>";
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
        $urut8 = 1;
        foreach ($data_hasil_akhir as $key_data_hasil_akhir) {
          $kode7 = "HA000";
          $kodeurut7 = $kode7.$urut7;
          if($key_data_hasil_akhir['kd_hasil_akhir']==$kodeurut7 AND $key_peserta['nis']==$key_data_hasil_akhir['nis'] AND $key_data_hasil_akhir['kd_jadwal']==$last) {
            $rol7 = isset($key_data_hasil_akhir['nilai']) ? $key_data_hasil_akhir['nilai'] : '0';
            $rol8 = isset($key_data_hasil_akhir['ndw']) ? $key_data_hasil_akhir['ndw'] : '0';
            echo "<td>".$rol7."</td>";
            echo "<td>".$rol8."</td>";
            $urut7++;
            $urut8++;
          }
        }
        ?>
      </tr>
      <?php
    }
    ?>
  </tbody>
</table>
</div>

<!-- MODAL TAMBAH LATIHAN -->
<div class="modal fade bs-example-modal" id="add-latihan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Tambah Nilai Latihan</h4>
      </div>
      <form class="" action="<?= base_url().'dashboard/isi_latihan/'.$sem.'/'.$key_peserta['kd_kelas'].'/'.$last; ?>" method="post">
        <div class="modal-body">
          <div style="padding-bottom:7%;"><input type="text" name="keterangan" class="form-control col-md-7 col-xs-12" placeholder=" Keterangan..." required></div>
          <table class="table table-bordered table-hover table-compact">
            <thead>
              <tr>
                <th>No.</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Latihan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($isi_peserta as $key_peserta) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $key_peserta['nis']; ?></td>
                  <?php
                  foreach ($isi_siswa as $key_siswa) {
                    if ($key_peserta['nis']==$key_siswa['NIS']) {
                      echo "<td>".$key_siswa['Nama']."</td>";
                    }
                  }
                  ?>
                  <td><input type="number" name="<?= $key_peserta['nis'];?>" value="0" min="10" max="100" class="form-control"></td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success" name="save">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- MODAL TAMBAH KUIS -->
<div class="modal fade bs-example-modal" id="add-kuis" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Tambah Nilai Kuis</h4>
      </div>
      <form class="" action="<?= base_url().'dashboard/isi_kuis/'.$sem.'/'.$key_peserta['kd_kelas'].'/'.$last; ?>" method="post">
        <div class="modal-body">
          <div style="padding-bottom:7%;"><input type="text" name="keterangan" class="form-control col-md-7 col-xs-12" placeholder=" Keterangan..." required></div>
          <table class="table table-bordered table-hover table-compact">
            <thead>
              <tr>
                <th>No.</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kuis</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($isi_peserta as $key_peserta) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $key_peserta['nis']; ?></td>
                  <?php
                  foreach ($isi_siswa as $key_siswa) {
                    if ($key_peserta['nis']==$key_siswa['NIS']) {
                      echo "<td>".$key_siswa['Nama']."</td>";
                    }
                  }
                  ?>
                  <td><input type="number" name="<?= $key_peserta['nis'];?>" value="0" min="10" max="100" class="form-control"></td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success" name="save">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- MODAL TAMBAH TERM -->
<div class="modal fade bs-example-modal" id="add-term" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Tambah Term</h4>
      </div>
      <form class="" action="<?= base_url().'dashboard/isi_term/'.$sem.'/'.$key_peserta['kd_kelas'].'/'.$last; ?>" method="POST">
        <div class="modal-body">
          <table class="table table-bordered table-hover table-compact">
            <tbody>

                <?php
                  foreach ($data_LatihanTerm as $key_data_LatihanTerm) {?>
                      <input type="checkbox" name="select[]" class="icheckbox_flat-green"
                      value="<?php
                                foreach ($isi_peserta as $key_peserta) {
                                    $urut = 1;
                                    foreach ($data_latihan as $key_data_latihan) {
                                        $kode = 'LT000';
                                        $kodeurut = $kode.$urut;
                                        if($key_data_latihan['kd_lat']==$key_data_LatihanTerm['kd_lat'] AND $key_peserta['nis']==$key_data_latihan['nis'] AND $key_data_latihan['kd_jadwal']==$last) {
                                          $rol = isset($key_data_latihan['nilai']) ? $key_data_latihan['nilai'] : '0';

                                          echo $key_peserta['nis'].'/'.$rol.'!'.$key_data_latihan['kd_lat'].',';
                                          $urut++;
                                        }
                                    }
                                }
                            ?>"

                            <?php
                                  foreach ($data_latihan as $key_data_latihan) {
                                      $kode = 'LT000';
                                      $kodeurut = $kode.$urut;
                                      if($key_data_latihan['kd_lat']==$key_data_LatihanTerm['kd_lat'] AND $key_data_latihan['Trm'] == '1' AND $key_data_latihan['kd_jadwal']==$last) {


                                        echo "disabled ";
                                        $urut++;
                                      }
                                  }

                            ?>

                            />

                            <?= $key_data_LatihanTerm['kd_lat']; ?>
                <?php
                  }
                ?>
                <br/>

                <?php
                  foreach ($data_KuisTerm as $key_data_KuisTerm) { ?>
                      <input type="checkbox" name="select[]" class="icheckbox_flat-green"
                      value="<?php
                                foreach ($isi_peserta as $key_peserta) {
                                    $urut = 1;
                                    foreach ($data_kuis as $key_data_kuis) {
                                      $kode = "QZ000";
                                      $kodeurut = $kode.$urut;
                                      if($key_data_kuis['kd_kuis']==$key_data_KuisTerm['kd_kuis'] AND $key_peserta['nis']==$key_data_kuis['nis'] AND $key_data_kuis['kd_jadwal']==$last) {
                                        $rol = isset($key_data_kuis['nilai']) ? $key_data_kuis['nilai'] : '0';
                                        echo $key_peserta['nis'].'/'.$rol.'!'.$key_data_kuis['kd_kuis'].',';
                                        $urut++;
                                      }
                                    }
                                }

                            ?>"

                            <?php
                                foreach ($data_kuis as $key_data_kuis) {
                                    $kode = 'QZ000';
                                    $kodeurut = $kode.$urut;
                                    if($key_data_kuis['kd_kuis']==$key_data_KuisTerm['kd_kuis'] AND $key_data_kuis['Trm'] == '1' AND $key_data_kuis['kd_jadwal']==$last) {


                                      echo "disabled ";
                                      $urut++;
                                    }
                                }
                            ?>

                            />
                            <?= $key_data_KuisTerm['kd_kuis']; ?>
                <?php
                  }
                ?>
                <br/>
            </tbody>
          </table>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success" name="save">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- MODAL TAMBAH UAS -->
<div class="modal fade bs-example-modal" id="add-uas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Tambah Nilai UAS</h4>
      </div>
      <form class="" action="<?= base_url().'dashboard/isi_uas/'.$sem.'/'.$key_peserta['kd_kelas'].'/'.$last; ?>" method="post">
        <div class="modal-body">
          <table class="table table-bordered table-hover table-compact">
            <thead>
              <tr>
                <th>No.</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>UAS</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($isi_peserta as $key_peserta) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $key_peserta['nis']; ?></td>
                  <?php
                  foreach ($isi_siswa as $key_siswa) {
                    if ($key_peserta['nis']==$key_siswa['NIS']) {
                      echo "<td>".$key_siswa['Nama']."</td>";
                    }
                  }
                  ?>
                  <td><input type="number" name="<?= $key_peserta['nis'];?>" value="0" min="10" max="100" class="form-control"></td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success" name="save">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- MODAL TAMBAH UTS -->
<div class="modal fade bs-example-modal" id="add-uts" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Tambah Nilai UTS</h4>
      </div>
      <form class="" action="<?= base_url().'dashboard/isi_uts/'.$sem.'/'.$key_peserta['kd_kelas'].'/'.$last; ?>" method="post">
        <div class="modal-body">
          <table class="table table-bordered table-hover table-compact">
            <thead>
              <tr>
                <th>No.</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>UTS</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($isi_peserta as $key_peserta) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $key_peserta['nis']; ?></td>
                  <?php
                  foreach ($isi_siswa as $key_siswa) {
                    if ($key_peserta['nis']==$key_siswa['NIS']) {
                      echo "<td>".$key_siswa['Nama']."</td>";
                    }
                  }
                  ?>
                  <td><input type="number" name="<?= $key_peserta['nis'];?>" value="0" min="10" max="100" class="form-control"></td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success" name="save">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- MODAL TAMBAH NILAI AKHIR -->
<div class="modal fade bs-example-modal" id="add-nilai-akhir" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Nilai Akhir</h4>
      </div>
      <form class="" action="<?= base_url().'dashboard/isi_hasil_akhir/'.$sem.'/'.$key_peserta['kd_kelas'].'/'.$last; ?>" method="post">
        <div class="modal-body">
          Yakin ingin membuat nilai akhir sekarang ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Lain Kali</button>
          <button type="submit" class="btn btn-success" name="save">Ya</button>
        </div>
      </form>
    </div>
  </div>
</div>
