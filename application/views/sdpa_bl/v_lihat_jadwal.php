<div class="x_title">
  <h2>Master Jadwal</h2>
  <div class="clearfix"></div>
</div>
<?php echo $this->session->flashdata('pesan'); ?>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-jadwal"><i class="fa fa-plus"></i> Tambah Data</button>
<a href="<?= base_url();?>dashboard/cetak_laporan/jadwal" target="_blank"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</button></a>
<table id="example" class="table table-striped responsive-utilities jambo_table">
  <thead>
    <tr class="headings">
      <th>No.</th>
      <th>Kode Jadwal</th>
      <th>Tahun Ajar</th>
      <th>Semester</th>
      <th>Kode Mapel</th>
      <th>Emp. ID</th>
      <th>Kode Kelas</th>
      <th>Hari</th>
      <th>Ruang</th>
      <th class="no-link last" style='text-align:center;'>
        <span class="nobr">Action</span>
      </th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach ($isi as $key) {
      ?>
      <tr class="even pointer">
        <td><?= $no++ ?></td>
        <td><?= $key['kd_jadwal']; ?></td>
        <td><?= $key['thn_ajar']; ?></td>
        <td><?= $key['semester']; ?></td  >
        <td><?= $key['kd_mapel']; ?></td>
        <td><?= $key['employee_id']; ?></td>
        <td><?= $key['kd_kelas']; ?></td>
        <td><?= $key['hari']; ?></td>
        <td><?= $key['ruang']; ?></td>

        <td align="center">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detil-jadwal<?= $key['kd_jadwal']; ?>"><i class="fa fa-th-list"></i> Detil</button>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-jadwal<?= $key['kd_jadwal']; ?>"><i class="fa fa-edit"></i> Ubah</button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-jadwal<?= $key['kd_jadwal']; ?>"><i class="fa fa-trash"></i> Hapus</button>
        </td>
      </tr>

      <!-- HAPUS JADWAL -->
      <div class="modal fade bs-example-modal" id="delete-jadwal<?= $key['kd_jadwal']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Hapus Data Jadwal</h4>
            </div>
            <div class="modal-body">
              <p align="center">Apakah anda yakin ingin menghapus data <?= $key['kd_jadwal']; ?>?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <a href="<?= base_url().'dashboard/do_delete_jadwal/'.$key['kd_jadwal']; ?>" type="button" class="btn btn-danger">Ya, Hapus</a>
            </div>
          </div>
        </div>
      </div>

      <!-- EDIT JADWAL -->
      <div class="modal fade" id="edit-jadwal<?= $key['kd_jadwal']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title" id="myModalLabel">Ubah Data Jadwal</h3>
            </div>
            <form class="form-horizontal form-label-left" action="<?= base_url(); ?>dashboard/do_edit_jadwal" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1_edit" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Data 1</a>
                            </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <!-- tab panel ke 1 -->
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1_edit" aria-labelledby="home-tab">
                              <div class="row">
                                  <div class="form-group" style="padding-bottom:6%;">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Kode Jadwal</label>
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                      <input name="kd_jadwal" type="text" class="form-control" value="<?= $key['kd_jadwal']; ?>" readonly>
                                    </div>
                                  </div>
                                  <div class="form-group" style="padding-bottom:6%;">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Tahun Ajar</label>
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                      <select name="thn_ajar" class="form-control" value="<?= $key['thn_ajar']; ?>">
                                              <?php
                                                  for ($i=2010; $i<=2020 ; $i++) { $b = $i+1; $a = $i."/".$b;
                                              ?>
                                                  <option value="<?= $a; ?>" <?php if ($key['thn_ajar']== $a) echo "selected";?>><?= $a; ?></option>
                                              <?php
                                                  }
                                              ?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group" style="padding-bottom:6%;">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Semester</label>
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                      <select name="semester" class="form-control" >
                                        <option value="Gasal"<?php if ($key['semester']=="Gasal")  echo " selected";?>>Gasal</option>
                                        <option value="Genap"<?php if ($key['semester']=="Genap")  echo " selected";?>>Genap</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group" style="padding-bottom:6%;">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Kode Mapel</label>
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                      <select name="kd_mapel"  class="select2_single form-control">
                                          <?php foreach ($isi2 as $key2): ?>
                                            <option value="<?= $key2['kd_mapel'];?>" <?php if($key2['kd_mapel']==$key['kd_mapel']) echo "selected"; ?>><?= $key2['kd_mapel'].' - '.$key2['nm_mapel'];?></option>
                                          <?php endforeach; ?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group" style="padding-bottom:6%;">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Emp. ID</label>
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                      <select name="employee_id" class="form-control">
                                          <?php

                                              foreach ($isi3 as $key3) {
                                          ?>
                                                  <option value="<?= $key3['employee_id'] ?>" <?php if($key3['employee_id'] == $key['employee_id']) echo "selected"; ?>><?= $key3['employee_id']?> - <?= $key3['nama_guru']?></option>
                                          <?php
                                              }
                                          ?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group" style="padding-bottom:6%;">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Kode Kelas</label>
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                      <select name="kd_kelas" class="form-control">
                                          <option>Pilih Kode Kelas</option>

                                          <?php

                                              foreach ($isi4 as $key4) {
                                          ?>
                                                  <option value="<?= $key4['kd_kelas'] ?>" <?php if($key4['kd_kelas'] == $key['kd_kelas']) echo "selected"; ?>><?= $key4['kd_kelas']?> - <?= $key4['nm_kelas']?></option>
                                          <?php
                                              }
                                          ?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group" style="padding-bottom:6%;">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Hari</label>
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                      <select name="hari" class="form-control" >
                                        <option value="Senin"<?php if ($key['hari']=="Senin")  echo " selected";?>>Senin</option>
                                        <option value="Selasa"<?php if ($key['hari']=="Selasa")  echo " selected";?>>Selasa</option>
                                        <option value="Rabu"<?php if ($key['hari']=="Rabu")  echo " selected";?>>Rabu</option>
                                        <option value="Kamis"<?php if ($key['hari']=="Kamis")  echo " selected";?>>Kamis</option>
                                        <option value="Jum'at"<?php if ($key['hari']=="Jum'at")  echo " selected";?>>Jum'at</option>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group" style="padding-bottom:6%;">
                                    <label class="control-label col-md-4 col-sm-3 col-xs-12">Ruang</label>
                                    <div class="col-md-8 col-sm-9 col-xs-12">
                                      <input name="ruang" type="text" class="form-control" value="<?= $key['ruang']; ?>"required>
                                    </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- DETIL JADWAL -->
      <div class="modal fade" id="detil-jadwal<?= $key['kd_jadwal']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- modal header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h3 class="modal-title" id="myModalLabel2">Detil Data Jadwal</h3>
            </div>
            <!-- modal body -->
            <div class="modal-body">
              <div class="dashboard-widget-content">
                <ul class="list-unstyled timeline widget">
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title" style="font-weight: bold;">Kode Jadwal</h2>
                        <p class="excerpt"><?= $key['kd_jadwal']; ?></p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title" style="font-weight: bold;">Tahun Ajar</h2>
                        <p class="excerpt"><?= $key['thn_ajar']; ?></p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title" style="font-weight: bold;">Semester</h2>
                        <p class="excerpt"><?= $key['semester']; ?></p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title" style="font-weight: bold;">Kode Mapel</h2>
                        <?php
                            foreach ($isi2 as $key2){
                                if($key2['kd_mapel']==$key['kd_mapel']){
                        ?>
                                    <p class="excerpt"><?= $key['kd_mapel'].' - '.$key2['nm_mapel'];?></p>
                        <?php
                                }
                            }
                        ?>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title" style="font-weight: bold;">Emp. ID</h2>
                        <?php
                            foreach ($isi3 as $key3){
                                if($key3['employee_id'] == $key['employee_id']){
                        ?>
                                    <p class="excerpt"><?= $key['employee_id'].' - '.$key3['nama_guru'];?></p>
                        <?php
                                }
                            }
                        ?>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title" style="font-weight: bold;">Kode Kelas</h2>
                        <?php
                            foreach ($isi4 as $key4){
                                if($key4['kd_kelas'] == $key['kd_kelas']){
                        ?>
                                    <p class="excerpt"><?= $key['kd_kelas'].' - '.$key4['nm_kelas'];?></p>
                        <?php
                                }
                            }
                        ?>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title" style="font-weight: bold;">Hari</h2>
                        <p class="excerpt"><?= $key['hari']; ?></p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title" style="font-weight: bold;">Ruang</h2>
                        <p class="excerpt"><?= $key['ruang']; ?></p>
                      </div>
                    </div>
                  </li>

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

    <?php
    }
    ?>

  </tbody>
</table>

<!-- TAMBAH JADWAL -->
<div class="modal fade" id="add-jadwal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- modal header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h3 class="modal-title" id="myModalLabel2">Tambah Data Jadwal</h3>
      </div>
      <form class="form-horizontal form-label-left" action="<?= base_url(); ?>dashboard/do_insert_jadwal" method="post" enctype="multipart/form-data">
        <!-- modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Kode Jadwal</label>
            <div class="col-md-8 col-sm-9 col-xs-12">
              <input name="kd_jadwal" type="text" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Tahun Ajar</label>
            <div class="col-md-8 col-sm-9 col-xs-12">
              <select name="thn_ajar" class="form-control" required>
                  <option value="" disabled selected hidden>Pilih Tahun Ajar</option>

                  <?php
                      for ($i=2010; $i<=2020 ; $i++) {
                  ?>
                      <option value="<?= $i; ?>/<?= $i+1; ?>"><?= $i; ?>/<?= $i+1; ?></option>
                  <?php
                      }
                  ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Semester</label>
            <div class="col-md-8 col-sm-9 col-xs-12">
              <select name="semester" class="form-control" required>
                <option value="" disabled selected hidden>Pilih Semester</option>
                <option value="Gasal">Gasal</option>
                <option value="Genap">Genap</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Kode Mapel</label>
            <div class="col-md-8 col-sm-9 col-xs-12">
              <select name="kd_mapel"  class="select2_single form-control" required>
              <option value="" disabled selected hidden>Pilih Kode Mapel</option>
              <?php foreach ($isi2 as $key2): ?>
                <option value="<?= $key2['kd_mapel'];?>"><?= $key2['kd_mapel'].' - '.$key2['nm_mapel'];?></option>
              <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Emp. ID</label>
            <div class="col-md-8 col-sm-9 col-xs-12">
              <select name="employee_id" class="form-control" required>
                  <option value="" disabled selected hidden>Pilih Employee ID</option>

                  <?php

                      foreach ($isi3 as $key3) {
                  ?>
                          <option value="<?= $key3['employee_id'] ?>"><?= $key3['employee_id']?> - <?= $key3['nama_guru']?></option>
                  <?php
                      }
                  ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Kode Kelas</label>
            <div class="col-md-8 col-sm-9 col-xs-12">
              <select name="kd_kelas" class="form-control" required>
                  <option value="" disabled selected hidden>Pilih Kode Kelas</option>

                  <?php

                      foreach ($isi4 as $key4) {
                  ?>
                          <option value="<?= $key4['kd_kelas'] ?>"><?= $key4['kd_kelas']?> - <?= $key4['nm_kelas']?></option>
                  <?php
                      }
                  ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Hari</label>
            <div class="col-md-8 col-sm-9 col-xs-12">
              <select name="hari" class="form-control" required>
                <option value="" disabled selected hidden>Pilih Hari</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jum'at">Jum'at</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12">Ruang</label>
            <div class="col-md-8 col-sm-9 col-xs-12">
              <input name="ruang" type="text" class="form-control" required>
            </div>
          </div>
        </div>
        <!-- modal footer -->
        <div class="modal-footer ">
          <div class="pull-right">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
