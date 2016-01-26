<div class="x_title">
  <h2>Master Wali Kelas</h2>
  <div class="clearfix"></div>
</div>
<?php echo $this->session->flashdata('pesan'); ?>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-wakel"><i class="fa fa-plus"></i> Tambah Data</button>
<a href="<?= base_url();?>dashboard/cetak_laporan/walikelas" target="_blank"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</button></a>
<table id="example" class="table table-striped responsive-utilities jambo_table">
    <thead>
        <tr class="headings">
            <th>
                <input type="checkbox" class="tableflat">
            </th>

            <th style="text-align:center">No. </th>
            <th style="text-align:center">Tahun Ajar Wali </th>
            <th style="text-align:center">Employee ID </th>
            <th style="text-align:center">Kode Kelas </th>

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
            <td class="a-center ">
                <input type="checkbox" class="tableflat">
            </td>

            <td style="text-align:center"><?= $no++ ?></td>
            <td style="text-align:center"><?= $key['Tahun_ajar_wali']; ?></td>
            <td style="text-align:center"><?= $key['Employee_id']; ?> - <?php foreach ($isi4 as $key_isi4) { if($key['Employee_id'] == $key_isi4['employee_id']) { echo $key_isi4['nama_guru'];}} ?></td>
            <td style="text-align:center"><?= $key['Kd_kelas']; ?> - <?php foreach ($isi3 as $key_isi3) { if($key['Kd_kelas'] == $key_isi3['kd_kelas']) { echo $key_isi3['nm_kelas'];}} ?></td>

            <td align="center">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit-wakel<?= $key['Kd_walikelas']; ?>"><i class="fa fa-edit"></i> Edit</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".delete-wakel<?= $key['Kd_walikelas']; ?>"><i class="fa fa-trash"></i> Delete</a>
            </td>
        </tr>

        <!-- Delete -->
        <!-- modal -->
        <div class="modal fade delete-wakel<?= $key['Kd_walikelas']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>

                        <h4 class="modal-title" id="myModalLabel2">Hapus Data Wali Kelas : <?= $key['NIP']; ?></h4>
                    </div>

                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" action="<?= base_url()."dashboard/do_delete_walikelas/".$key['Kd_walikelas']; ?>" method="post">
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
        <div class="modal fade bs-example-modal-lg" id="edit-wakel<?= $key['Kd_walikelas']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>

                        <h4 class="modal-title" id="myModalLabel2">Edit Data Wali Kelas</h4>
                    </div>

                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" action="<?= base_url(); ?>dashboard/do_edit_walikelas" method="post" enctype="multipart/form-data">
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
                                                    <input name="kd_walikelas" type="hidden" class="form-control" value="<?= $key['Kd_walikelas']; ?>">
                                                    <div class="form-group" style="padding-bottom:8%;">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Ajar</label>

                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select name="tahun_ajar_wali" class="form-control" value="<?= $key['Tahun_ajar_wali']; ?>">
                                                                <option value="" disabled hidden>Pilih Tahun Ajar</option>
                                                                    <?php
                                                                        for ($i=2010; $i<=2020 ; $i++) { $b = $i+1; $a = $i."/".$b;
                                                                    ?>
                                                                        <option value="<?= $a; ?>" <?php if ($key['Tahun_ajar_wali']== $a) echo "selected";?>><?= $a; ?></option>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:8%;">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee ID</label>

                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select name="employee_id" class="form-control">
                                                                <option value="" disabled hidden>Pilih Employee ID</option>

                                                                <?php

                                                                    foreach ($isi2 as $key2) {
                                                                        if ($key2['employee_id'] == $key['Employee_id']) {
                                                                ?>
                                                                        <option value="<?= $key2['employee_id']; ?>" selected><?= $key2['employee_id']?> - <?= $key2['nama_guru']?></option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group" style="padding-bottom:8%;">
                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Kelas</label>

                                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                                            <select name="kd_kelas" class="form-control" value="<?= $key['Kd_kelas']; ?>">
                                                                <option value="" disabled hidden>Pilih Kelas</option>

                                                                <?php

                                                                    foreach ($isi3 as $key3) {
                                                                ?>
                                                                        <option value="<?= $key3['kd_kelas'] ?>" <?php if ($key3['kd_kelas']==$key['Kd_kelas'])  echo " selected";?>><?= $key3['kd_kelas'] ?> - <?= $key3['nm_kelas'] ?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </select>
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
                <h3 class="modal-title" id="myModalLabel2">Tambah data Wali kelas</h3>
            </div>

            <form class="form-horizontal form-label-left" action="<?= base_url(); ?>dashboard/do_insert_walikelas" method="post">

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
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Ajar Wali</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select name="tahun_ajar_wali" class="form-control" required>
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

                                        <div class="form-group" style="padding-bottom:8%;">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee ID</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select name="employee_id" class="form-control" required>
                                                    <option value="" disabled selected hidden>Pilih Employee ID</option>

                                                    <?php

                                                        foreach ($isi2 as $key2) {
                                                    ?>
                                                            <option value="<?= $key2['employee_id'] ?>"><?= $key2['employee_id']?> - <?= $key2['nama_guru']?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Kelas</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select name="kd_kelas" class="form-control" required>
                                                    <option value="" disabled selected hidden>Pilih Kelas</option>

                                                    <?php

                                                        foreach ($isi3 as $key3) {
                                                    ?>
                                                            <option value="<?= $key3['kd_kelas'] ?>"><?= $key3['kd_kelas'] ?> - <?= $key3['nm_kelas'] ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
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
