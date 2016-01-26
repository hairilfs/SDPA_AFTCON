<div class="x_title">
  <h2>Master Mata Pelajaran</h2>
  <div class="clearfix"></div>
</div>
<?php echo $this->session->flashdata('pesan'); ?>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-MAPEL"><i class="fa fa-plus"></i> Tambah Data</button>
<a href="<?= base_url();?>dashboard/cetak_laporan/mapel" target="_blank"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</button></a>
<table id="example" class="table table-striped responsive-utilities jambo_table">
  <thead>
    <tr class="headings">
      <th>No. </th>
      <th>Kode Mata Pelajaran </th>
      <th>Nama Mata Pelajaran </th>
      <th>Standar Nilai </th>
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
        <td><?= $key['kd_mapel']; ?></td>
        <td><?= $key['nm_mapel']; ?></td>
        <td><?= $key['kkm']; ?></td>
        <td align="center">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detil-MAPEL<?= $key['kd_mapel']; ?>"><i class="fa fa-th-list"></i> Detil</button>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-MAPEL<?= $key['kd_mapel']; ?>"><i class="fa fa-edit"></i> Ubah</button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-MAPEL<?= $key['kd_mapel']; ?>"><i class="fa fa-trash"></i> Hapus</button>
        </td>
      </tr>

      <!-- HAPUS MAPEL -->
      <div class="modal fade" id="delete-MAPEL<?= $key['kd_mapel']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h3 class="modal-title" id="myModalLabel2">Hapus Data Mata Pelajaran</h3>
            </div>
            <div class="modal-body">
              <p align="center">Apakah anda yakin ingin menghapus data <?= $key['nm_mapel']; ?>?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <a href="<?= base_url().'dashboard/do_delete_mapel/'.$key['kd_mapel']; ?>" type="button" class="btn btn-danger">Ya, Hapus</a>
            </div>
          </div>
        </div>
      </div>

      <!-- UBAH MAPEL -->
      <div class="modal fade" id="edit-MAPEL<?= $key['kd_mapel']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- modal header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h3 class="modal-title" id="myModalLabel2">Ubah Data Mata Pelajaran</h3>
            </div>
            <form class="form-horizontal form-label-left" action="<?= base_url(); ?>dashboard/do_edit_mapel" method="post">
              <!-- modal body -->
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
                                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Kode Mata Pelajaran</label>
                                  <div class="col-md-8 col-sm-9 col-xs-12">
                                    <input name="kd_mapel" type="text" class="form-control" value="<?= $key['kd_mapel']; ?>" readonly>
                                  </div>
                                </div>
                                <div class="form-group" style="padding-bottom:6%;">
                                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Mata Pelajaran</label>
                                  <div class="col-md-8 col-sm-9 col-xs-12">
                                    <input name="nm_mapel" type="text" class="form-control" value="<?= $key['nm_mapel']; ?>" required>
                                  </div>
                                </div>
                                <div class="form-group" style="padding-bottom:6%;">
                                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Standar Nilai</label>
                                  <div class="col-md-8 col-sm-9 col-xs-12">
                                    <input name="kkm" type="number" class="form-control" value="<?= $key['kkm']; ?>" required>
                                  </div>
                                </div>
                            </div>
                        </div>
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

      <!-- DETIL MAPEL -->
      <div class="modal fade" id="detil-MAPEL<?= $key['kd_mapel']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- modal header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h3 class="modal-title" id="myModalLabel2">Detil Data Mata Pelajaran</h3>
            </div>
            <!-- modal body -->
            <div class="modal-body">
              <div class="dashboard-widget-content">
                <ul class="list-unstyled timeline widget">
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title" style="font-weight: bold;">Kode Mata Pelajaran</h2>
                        <p class="excerpt"><?= $key['kd_mapel']; ?></p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title" style="font-weight: bold;">Nama Mata Pelajaran</h2>
                        <p class="excerpt"><?= $key['nm_mapel']; ?></p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title" style="font-weight: bold;">Standar Nilai</h2>
                        <p class="excerpt"><?= $key['kkm']; ?></p>
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

<!-- TAMBAH MAPEL -->
<div class="modal fade" id="add-MAPEL" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- modal header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h3 class="modal-title" id="myModalLabel2">Tambah Data Mata Pelajaran</h3>
      </div>
      <form class="form-horizontal form-label-left" action="<?= base_url(); ?>dashboard/do_insert_mapel" method="post" enctype="multipart/form-data">
        <!-- modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Mata Pelajaran</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input name="kd_mapel" type="text" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Mata Pelajaran</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input name="nm_mapel" type="text" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Standar Nilai</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input name="kkm" type="number" class="form-control" placeholder=" Contoh: 70" required>
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
