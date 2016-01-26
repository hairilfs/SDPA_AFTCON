<div class="x_title">
    <h2>Master Kelas</h2>
    <div class="clearfix"></div>
</div>
<?php echo $this->session->flashdata('pesan'); ?>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-kls"><i class="fa fa-plus"></i> Tambah Data</button>
<a href="<?= base_url();?>dashboard/cetak_laporan/kelas" target="_blank"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</button></a>
<table id="example" class="table table-striped responsive-utilities jambo_table">
  <thead>
    <tr class="headings">
      <th>No. </th>
      <th>Kode Kelas </th>
      <th>Nama Kelas </th>
      <th>Kapasitas </th>
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
        <td><?= $key['kd_kelas']; ?></td>
        <td><?= $key['nm_kelas']; ?></td>
        <td><?= $key['kapasitas']; ?></td>
        <td align="center">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detil-kls<?= $key['kd_kelas']; ?>"><i class="fa fa-th-list"></i> Detil</button>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-kls<?= $key['kd_kelas']; ?>"><i class="fa fa-edit"></i> Ubah</button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-kls<?= $key['kd_kelas']; ?>"><i class="fa fa-trash"></i> Hapus</button>
        </td>
      </tr>

      <!-- HAPUS KELAS -->
      <div class="modal fade" id="delete-kls<?= $key['kd_kelas']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h3 class="modal-title" id="myModalLabel2">Hapus Data Kelas</h3>
            </div>
            <div class="modal-body">
              <p align="center">Apakah anda yakin ingin menghapus data <?= $key['nm_kelas']; ?>?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <a href="<?= base_url().'dashboard/do_delete_kelas/'.$key['kd_kelas']; ?>" type="button" class="btn btn-danger">Ya, Hapus</a>
            </div>
          </div>
        </div>
      </div>

      <!-- EDIT KELAS -->
      <div class="modal fade" id="edit-kls<?= $key['kd_kelas']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- modal header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h3 class="modal-title" id="myModalLabel2">Ubah Data Kelas</h3>
            </div>
            <form class="form-horizontal form-label-left" action="<?= base_url(); ?>dashboard/do_edit_kelas" method="post">
              <!-- modal body -->
              <div class="modal-body">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1_edit<?= $key['kd_kelas']; ?>" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Data 1</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <!-- tab panel ke 1 -->
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1_edit<?= $key['kd_kelas']; ?>" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="form-group" style="padding-bottom:6%;">
                                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Kode Kelas</label>
                                  <div class="col-md-8 col-sm-9 col-xs-12">
                                    <input name="kd_kelas" type="text" class="form-control" value="<?= $key['kd_kelas']; ?>" readonly="">
                                  </div>
                                </div>
                                <div class="form-group" style="padding-bottom:6%;">
                                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Kelas</label>
                                  <div class="col-md-8 col-sm-9 col-xs-12">
                                    <input name="nm_kelas" type="text" class="form-control" value="<?= $key['nm_kelas']; ?>" required>
                                  </div>
                                </div>
                                <div class="form-group" style="padding-bottom:6%;">
                                  <label class="control-label col-md-4 col-sm-3 col-xs-12">Kapasitas</label>
                                  <div class="col-md-8 col-sm-9 col-xs-12">
                                    <input name="kapasitas" type="text" class="form-control" value="<?= $key['kapasitas']; ?>" required>
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

      <!-- detil kelas -->
      <div class="modal fade" id="detil-kls<?= $key['kd_kelas']; ?>" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- modal header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h3 class="modal-title" id="myModalLabel2">Detil Data Kelas</h3>
            </div>
            <!-- modal body -->
            <div class="modal-body">
              <div class="dashboard-widget-content">
                <ul class="list-unstyled timeline widget">
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title" style="font-weight: bold;">Kode Kelas</h2>
                        <p class="excerpt"><?= $key['kd_kelas']; ?></p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title" style="font-weight: bold;">Nama Kelas</h2>
                        <p class="excerpt"><?= $key['nm_kelas']; ?></p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title" style="font-weight: bold;">Kapasitas</h2>
                        <p class="excerpt"><?= $key['kapasitas']; ?></p>
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
<!-- TAMBAH KELAS -->
<div class="modal fade" id="add-kls" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- modal header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h3 class="modal-title" id="myModalLabel2">Tambah Data Kelas</h3>
      </div>
      <form class="form-horizontal form-label-left" action="<?= base_url(); ?>dashboard/do_insert_kelas" method="post" enctype="multipart/form-data">
        <!-- modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Kelas</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input name="kd_kelas" type="text" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Kelas</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input name="nm_kelas" type="text" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kapasitas</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <input name="kapasitas" type="number" class="form-control" required>
            </div>
          </div>
        </div>
        <!-- modal footer -->
        <div class="modal-footer">
          <div class="pull-right">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
