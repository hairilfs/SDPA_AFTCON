<div class="x_title">
  <h2>Laporan Nilai Siswa - <?php echo $cekw ?></h2>
  <div class="clearfix"></div>
</div>
<div class="dashboard-widget-content">
  <ul class="list-unstyled timeline widget">
    <?php
    foreach ($data_jadwal as $key_jadwal) {
      foreach ($data_mapel as $key_mapel) {
        if ($key_jadwal['kd_mapel']==$key_mapel['kd_mapel']) { ?>

          <?php
              foreach ($data_guru2 as $key_guru2) {
                if ($key_guru2['employee_id']==$key_jadwal['employee_id']) {
                  $nmguru = $key_guru2['nama_guru'];
                }
              }
          ?>

          <li>
            <div class="block">
              <div class="block_content">
                <h2 class="title" style="font-weight: bold;">
                  <a href="#" data-toggle="modal" data-target="#see-<?= $key_jadwal['kd_jadwal']; ?>"><?= $key_mapel['nm_mapel']; ?> - <?= $key_jadwal['kd_jadwal']; ?> - <?= $nmguru; ?></a>
                </h2>
              </div>
            </div>
          </li>

          <!-- MODAL LIHAT DETAIL -->
          <div class="modal fade bs-example-modal-lg" id="see-<?= $key_jadwal['kd_jadwal']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">  
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel2"> <?= $key_mapel['nm_mapel']; ?> - <?= $key_jadwal['kd_jadwal'] ?> - <?= $nmguru; ?></h4>
                </div>
                <div class="modal-body">
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
                              
                                if($key_data_latihan['kd_lat']==$kodeurut && $key_data_latihan['kd_jadwal']==$key_jadwal['kd_jadwal'] && $key_data_latihan['kd_jadwal']==$key_data_ket_latihan['kd_jadwal']) {
                                  echo "<th>Latihan".$urut++." <a href='javascript:;'><i class='fa fa-question-circle fa-lg' data-toggle='tooltip' data-placement='top' title='$tooltip_ket_lat'></i></a></th>";
                                }

                              }
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
                              
                                  if($key_data_kuis['kd_kuis']==$kodeurut2 && $key_data_kuis['kd_jadwal']==$key_jadwal['kd_jadwal'] && $key_data_kuis['kd_jadwal']==$key_data_ket_kuis['kd_jadwal']) {
                                    echo "<th>Kuis ".$urut2++." <a href='javascript:;'><i class='fa fa-question-circle fa-lg' data-toggle='tooltip' data-placement='top' title='$tooltip_ket_kuis'></i></a></th>";
                                }
                              }
                            }
                          }

                          $urut5 = 1;
                          $urut6 = 1;
                          foreach ($data_term as $key_data_term) {
                            $cek_isi_term = isset($key_data_term['kd_term']) ? $key_data_term['kd_term'] : '';
                            $kode5 = "TR000";
                            $kodeurut5 = $kode5.$urut5;

                            $ket_term = $key_data_term['ket'];
                            if($key_data_term['kd_term']==$kodeurut5 AND $key_data_term['kd_jadwal']==$key_jadwal['kd_jadwal']) {
                              echo "<th>Term ".$urut5++." <a href='javascript:;'><i class='fa fa-question-circle fa-lg' data-toggle='tooltip' data-placement='top' title='$ket_term'></i></a></th>";
                              echo "<th>NDW ".$urut6++." <a href='javascript:;'><i class='fa fa-question-circle fa-lg' data-toggle='tooltip' data-placement='top' title='$ket_term'></i></a></th>";
                            }
                          }

                          $urut4 = 1;
                          foreach ($data_uts as $key_data_uts) {
                            $cek_isi_uts = isset($key_data_uts['kd_uts']) ? $key_data_uts['kd_uts'] : '';
                            $kode4 = "UT000";
                            $kodeurut4 = $kode4.$urut4;
                            if($key_data_uts['kd_uts']==$kodeurut4 && $key_data_uts['kd_jadwal']==$key_jadwal['kd_jadwal']) {
                              echo "<th>UTS ".$urut4++."</th>";
                            }
                          }

                          $urut3 = 1;
                          foreach ($data_uas as $key_data_uas) {
                            $cek_isi_uas = isset($key_data_uas['kd_uas']) ? $key_data_uas['kd_uas'] : '';
                            $kode3 = "UA000";
                            $kodeurut3 = $kode3.$urut3;
                            if($key_data_uas['kd_uas']==$kodeurut3 && $key_data_uas['kd_jadwal']==$key_jadwal['kd_jadwal']) {
                              echo "<th>UAS ".$urut3++."</th>";
                            }
                          }

                          $urut7 = 1;
                          $urut8 = 1;
                          foreach ($data_hasil_akhir as $key_data_hasil_akhir) {
                            $cek_isi_hasil_akhir = isset($key_data_hasil_akhir['kd_term']) ? $key_data_hasil_akhir['kd_term'] : '';
                            $kode7 = "HA000";
                            $kodeurut7 = $kode7.$urut7;

                            $ket_hasil_akhir = $key_data_hasil_akhir['ndw'];
                            if($key_data_hasil_akhir['kd_hasil_akhir']==$kodeurut7 AND $key_data_hasil_akhir['kd_jadwal']==$key_jadwal['kd_jadwal']) {
                              echo "<th>Nilai Akhir </th>";
                              echo "<th>NDW Akhir</th>";
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
                              if($key_data_latihan['kd_lat']==$kodeurut AND $key_peserta['nis']==$key_data_latihan['nis'] && $key_data_latihan['kd_jadwal']==$key_jadwal['kd_jadwal']) {
                                $rol = isset($key_data_latihan['nilai']) ? $key_data_latihan['nilai'] : '0';
                                echo "<td>".$rol."</td>";
                                $urut++;
                              }
                            }

                            $urut2 = 1;
                            foreach ($data_kuis as $key_data_kuis) {
                              $kode2 = "QZ000";
                              $kodeurut2 = $kode2.$urut2;
                              if($key_data_kuis['kd_kuis']==$kodeurut2 AND $key_peserta['nis']==$key_data_kuis['nis'] && $key_data_kuis['kd_jadwal']==$key_jadwal['kd_jadwal']) {
                                $rol2 = isset($key_data_kuis['nilai']) ? $key_data_kuis['nilai'] : '0';
                                echo "<td>".$rol2."</td>";
                                $urut2++;
                              }
                            }

                            $urut5 = 1;
                            foreach ($data_term as $key_data_term) {
                              $kode5 = "TR000";
                              $kodeurut5 = $kode5.$urut5;
                              if($key_data_term['kd_term']==$kodeurut5 AND $key_peserta['nis']==$key_data_term['nis'] AND $key_data_term['kd_jadwal']==$key_jadwal['kd_jadwal']) {
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
                              if($key_data_uts['kd_uts']==$kodeurut4 AND $key_peserta['nis']==$key_data_uts['nis'] && $key_data_uts['kd_jadwal']==$key_jadwal['kd_jadwal']) {
                                $rol4 = isset($key_data_uts['nilai']) ? $key_data_uts['nilai'] : '0';
                                echo "<td>".$rol4."</td>";
                                $urut4++;
                              }
                            }

                            $urut3 = 1;
                            foreach ($data_uas as $key_data_uas) {
                              $kode3 = "UA000";
                              $kodeurut3 = $kode3.$urut3;
                              if($key_data_uas['kd_uas']==$kodeurut3 AND $key_peserta['nis']==$key_data_uas['nis'] && $key_data_uas['kd_jadwal']==$key_jadwal['kd_jadwal']) {
                                $rol3 = isset($key_data_uas['nilai']) ? $key_data_uas['nilai'] : '0';
                                echo "<td>".$rol3."</td>";
                                $urut3++;
                              }
                            }

                            $urut6 = 1;
                            $urut7 = 1;
                            foreach ($data_hasil_akhir as $key_data_hasil_akhir) {
                              $kode6 = "HA000";
                              $kodeurut6 = $kode6.$urut6;
                              if($key_data_hasil_akhir['kd_hasil_akhir']==$kodeurut6 AND $key_peserta['nis']==$key_data_hasil_akhir['nis'] AND $key_data_hasil_akhir['kd_jadwal']==$key_jadwal['kd_jadwal']) {
                                $rol6 = isset($key_data_hasil_akhir['nilai']) ? $key_data_hasil_akhir['nilai'] : '0';
                                echo "<td>".$rol6."</td>";
                                echo "<td>".$key_data_hasil_akhir['ndw']."</td>";
                                $urut6++;
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
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success" data-dismiss="modal">OK</button>
                </div>
              </div>
            </div>
          </div>

          <?php  }
        }
      }
      ?>
    </ul>
  </div>
