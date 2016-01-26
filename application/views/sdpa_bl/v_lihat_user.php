<div class="x_title">
  <h2>Master User</h2>
  <div class="clearfix"></div>
</div>
<?php echo $this->session->flashdata('pesan'); ?>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-wakel"><i class="fa fa-plus"></i> Tambah Data</button>
<a href="<?= base_url();?>dashboard/cetak_laporan/user" target="_blank"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</button></a>
<table id="example" class="table table-striped responsive-utilities jambo_table">
    <thead>
        <tr class="headings">
            <th>
                <input type="checkbox" class="tableflat">
            </th>
            <th style="text-align:center">No. </th>
            <th style="text-align:center">Employee ID </th>
            <th style="text-align:center">NIP </th>
            <th style="text-align:center">User </th>

            <th class="no-link last" style='text-align:center;'>
                <span class="nobr">Action</span>
            </th>
        </tr>
    </thead>

    <tbody>
        <?php
            $no = 1;
            foreach ($isi2 as $key2) {
        ?>

        <tr class="even pointer">
            <td class="a-center ">
                <input type="checkbox" class="tableflat">
            </td>

            <td style="text-align:center"><?= $no++ ?></td>
            <td style="text-align:center"><?= $key2['employee_id']; ?></td>
            <td style="text-align:center"><?= $key2['NIP']; ?></td>
            <td style="text-align:center"><?= $key2['nama_guru']; ?></td>

            <td align="center">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit-user<?= $key2['id_user']; ?>"><i class="fa fa-edit"></i> Edit</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".delete-user<?= $key2['id_user']; ?>"><i class="fa fa-trash"></i> Delete</a>
            </td>
        </tr>

        <!-- Delete -->
        <!-- modal -->
        <div class="modal fade delete-user<?= $key2['id_user']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>

                        <h4 class="modal-title" id="myModalLabel2">Hapus Data User : <?= $key2['id_user']; ?></h4>
                    </div>

                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" action="<?= base_url()."dashboard/do_delete_user/".$key2['id_user']; ?>" method="post">
                            <label>Yakin ingin menghapus data ini ?</LABEL>
                            <div class="modal-footer "></div>

                            <div class="pull-right">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Lanjutkan</button>
                            </div>
                            <br/><br/>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- /modal -->

        <!-- Update -->
        <!-- modal -->
        <div class="modal fade bs-example-modal-lg" id="edit-user<?= $key2['id_user']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>

                        <h4 class="modal-title" id="myModalLabel2">Edit Data User</h4> <?= $key2['nama_guru']." - ".$key2['NIP'] ?>
                    </div>

                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" action="<?= base_url(); ?>dashboard/do_edit_user" method="post" enctype="multipart/form-data">
                            <!-- modal body -->
                            <div class="modal-body">
                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab_content1_edit" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Data 1</a></li>
                                    </ul>

                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1_edit" aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input name="user" type="hidden" class="form-control" value="<?= $key2['id_user']; ?>">

                                                    <div class="form-group" style="padding-bottom:8%;">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Level</label>

                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select name="level" class="form-control" required>
                                                                <option value="" disabled hidden>Pilih Level</option>
                                                                <option value="admin" <?php if($key2['level'] == 'admin') echo 'selected="selected"'; ?>>Admin</option>
                                                                <option value="guru_kelas" <?php if($key2['level'] == 'guru_kelas') echo 'selected="selected"'; ?>>Guru Kelas</option>
                                                                <option value="guru_mapel" <?php if($key2['level'] == 'guru_mapel') echo 'selected="selected"'; ?>>Guru Mapel</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group" style="padding-bottom:8%;">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">New Password</label>

                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <input name="password" type="password" class="form-control" required>
                                                        </div>
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
        </div>
        <!-- /modals -->

    <?php
        }
    ?>

    </tbody>
</table>


<div class="modal fade bs-example-modal-lg" id="add-wakel" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- modal header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h3 class="modal-title" id="myModalLabel2">Tambah Data User</h3>
            </div>

            <form class="form-horizontal form-label-left" action="<?= base_url(); ?>dashboard/do_insert_user" method="post" enctype="multipart/form-data">

                <!-- modal body -->
                <div class="modal-body">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1_add" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Data 1</a></li>
                        </ul>

                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1_add" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">User</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select name="user" class="form-control" required>
                                                    <option value="" disabled selected hidden>Pilih User</option>

                                                    <?php

                                                        foreach ($isi as $key) {
                                                    ?>
                                                            <option value="<?= $key['employee_id'] ?>"><?= $key['nama_guru']?> - <?= $key['employee_id']?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Level</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select name="level" class="form-control" required>
                                                    <option value="" disabled selected hidden>Pilih Level</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="guru">Guru</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="password" type="password" class="form-control" required>
                                            </div>
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
