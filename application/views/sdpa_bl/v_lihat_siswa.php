<div class="x_title">
  <h2>Master Siswa</h2>
  <div class="clearfix"></div>
</div>
<?php echo $this->session->flashdata('pesan'); ?>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-sis"><i class="fa fa-plus"></i> Tambah Data</button>
<a href="<?= base_url();?>dashboard/cetak_laporan/siswa" target="_blank"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</button></a>
<table id="example" class="table table-striped responsive-utilities jambo_table">
    <thead>
        <tr class="headings">
            <th>
                <input type="checkbox" class="tableflat">
            </th>

            <th style="text-align:center">No. </th>
            <th style="text-align:center">NIS </th>
            <th style="text-align:center">Nama </th>
            <th style="text-align:center">Jenis Kelamin </th>
            <th style="text-align:center">Tempat, Tgl Lahir</th>
            <th style="text-align:center">Agama </th>

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
            <td style="text-align:center"><?= $key['NIS']; ?></td>
            <td><?= $key['Nama']; ?></td>
            <td style="text-align:center"><?= $key['Jenis_kelamin']; ?></td>
            <td style="text-align:center"><?= $key['Tempat_lahir'].", ".$key['Tanggal_lahir']; ?></td>
            <td style="text-align:center"><?= $key['Agama']; ?></td>

            <td align="center">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#detail-sis<?= $key['NIS']; ?>"><i class="fa fa-th-list"></i> Detail</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit-sis<?= $key['NIS']; ?>"><i class="fa fa-edit"></i> Edit</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".delete-sis<?= $key['NIS']; ?>"><i class="fa fa-trash"></i> Delete</a>
            </td>
        </tr>

        <!-- Delete -->
        <!-- modal -->
        <div class="modal fade delete-sis<?= $key['NIS']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>

                        <h4 class="modal-title" id="myModalLabel2">Hapus Data Siswa : <?= $key['Nama']; ?></h4>
                    </div>

                    <div class="modal-body">
                        <form class="form-horizontal form-label-left" action="<?= base_url()."dashboard/do_delete_siswa/".$key['NIS']; ?>" method="post">
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

        <!-- edit siswa -->
        <div class="modal fade bs-example-modal-lg" id="edit-sis<?= $key['NIS']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- modal header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h3 class="modal-title" id="myModalLabel2">Ubah Data Siswa</h3>
                    </div>

                    <form class="form-horizontal form-label-left" action="<?= base_url(); ?>dashboard/do_edit_siswa" method="post" enctype="multipart/form-data">
                        <!-- modal body -->
                        <div class="modal-body">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1_edit<?= $key['NIS']; ?>" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Data 1</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content2_edit<?= $key['NIS']; ?>" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Data 2</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <!-- tab panel ke 1 -->
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1_edit<?= $key['NIS']; ?>" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <input name="nis" type="hidden" class="form-control" value="<?= $key['NIS']; ?>">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">NISN</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input name="nisn" type="text" class="form-control" value="<?= $key['NISN']; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input name="nama" type="text" class="form-control" value="<?= $key['Nama']; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tmpt Lahir</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input name="tempat_lahir" type="text" class="form-control" value="<?= $key['Tempat_lahir']; ?>" placeholder=" Contoh: Jakarta" required>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tgl Lahir</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input name="tanggal_lahir" type="date" class="form-control" value="<?= $key['Tanggal_lahir']; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Agama</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select name="agama" class="form-control"  value="<?= $key['Agama']; ?>" required>
                                                            <option value="Islam" <?php if($key['Agama'] == 'Islam') echo 'selected="selected"'; ?>>Islam</option>
                                                            <option value="Kristen" <?php if($key['Agama'] == 'Kristen') echo 'selected="selected"'; ?>>Kristen Protestan</option>
                                                            <option value="Katolik" <?php if($key['Agama'] == 'Katolik') echo 'selected="selected"'; ?>>Kristen Katolik</option>
                                                            <option value="Budha" <?php if($key['Agama'] == 'Budha') echo 'selected="selected"'; ?>>Budha</option>
                                                            <option value="Hindu" <?php if($key['Agama'] == 'Hindu') echo 'selected="selected"'; ?>>Hindu</option>
                                                            <option value="konghuchu" <?php if($key['Agama'] == 'konghuchu') echo 'selected="selected"'; ?>>Kong Hu Chu</option>
                                                            <option value="Lainnya"<?php if ($key['Agama']=="Lainnya")  echo 'selected=selected';?>>Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jns Kelamin</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select name="jenis_kelamin" class="form-control" required>
                                                            <option value="Laki-Laki" <?php if($key['Jenis_kelamin'] == 'Laki-Laki') echo 'selected="selected"'; ?>>Laki-Laki</option>
                                                            <option value="Perempuan" <?php if($key['Jenis_kelamin'] == 'Perempuan') echo 'selected="selected"'; ?>>Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input name="filefoto" type="file" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Ayah</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input name="nama_ayah" type="text" class="form-control" value="<?= $key['Nama_ayah']; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Ibu</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input name="nama_ibu" type="text" class="form-control" value="<?= $key['Nama_ibu']; ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Kwn</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input name="kewarganegaraan" type="text" class="form-control" value="<?= $key['Kewarganegaraan']; ?>" placeholder=' Contoh: Indonesia' required>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Warga</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select name="warga_negara" class="form-control" required>
                                                            <option value="WNI" <?php if($key['Warga_negara'] == 'WNI') echo 'selected="selected"'; ?>>Warga Negara Indonesia (WNI)</option>
                                                            <option value="WNA" <?php if($key['Warga_negara'] == 'WNA') echo 'selected="selected"'; ?>>Warga Negara Asing (WNA)</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Anak</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select name="status_anak" class="form-control" required>
                                                            <option value="Kandung" <?php if($key['Status_anak'] == 'Kandung') echo 'selected="selected"'; ?>>Kandung</option>
                                                            <option value="Angkat" <?php if($key['Status_anak'] == 'Angkat') echo 'selected="selected"'; ?>>Angkat</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <textarea name="alamat" type="text" class="form-control" required><?= $key['Alamat']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            </div>

                                            <!-- tab panel ke 2 -->
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content2_edit<?= $key['NIS']; ?>" aria-labelledby="profile-tab">
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Tinggi</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input name="tinggi_badan" type="text" class="form-control" value="<?= $key['Tinggi_badan']; ?>" placeholder=" Contoh: 170">
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Berat</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input name="berat_badan" type="text" class="form-control" value="<?= $key['Berat_badan']; ?>" placeholder=" Contoh: 60">
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Anak Ke</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input name="anak_ke" type="number" class="form-control" value="<?= $key['Anak_ke']; ?>" placeholder=" Contoh: 1" required>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Jml Saudara</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input name="jumlah_saudara" type="number" class="form-control" value="<?= $key['Jumlah_saudara']; ?>" placeholder=" Contoh: 1" required>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Gol Darah</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select name="golongan_darah" class="form-control" required>
                                                            <option value="A" <?php if($key['Golongan_darah'] == 'A') echo 'selected="selected"'; ?>>A</option>
                                                            <option value="B" <?php if($key['Golongan_darah'] == 'B') echo 'selected="selected"'; ?>>B</option>
                                                            <option value="AB" <?php if($key['Golongan_darah'] == 'AB') echo 'selected="selected"'; ?>>AB</option>
                                                            <option value="O" <?php if($key['Golongan_darah'] == 'O') echo 'selected="selected"'; ?>>O</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Telp Rumah</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input name="telepon_rumah" type="text" class="form-control" value="<?= $key['Telepon_rumah']; ?>" placeholder=" Contoh: 0217338556">
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">No. HP</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input name="nomor_hp" type="text" class="form-control" value="<?= $key['Nomor_hp']; ?>" placeholder=" Contoh: 087736317753">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Wajah</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select name="wajah" class="form-control" value="<?= $key['wajah']; ?>">
                                                            <option value="Bulat" <?php if($key['Wajah'] == 'Bulat') echo 'selected="selected"'; ?>>Bulat</option>
                                                            <option value="Lonjong" <?php if($key['Wajah'] == 'Lonjong') echo 'selected="selected"'; ?>>Lonjong</option>
                                                            <option value="Kotak" <?php if($key['Wajah'] == 'Kotak') echo 'selected="selected"'; ?>>Kotak</option>
                                                            <option value="Lainnya" <?php if($key['Wajah'] == 'Lainnya') echo 'selected="selected"'; ?>>Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Rambut</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <select name="rambut" class="form-control" value="<?= $key['rambut']; ?>">
                                                            <option value="Ikal" <?php if($key['Rambut'] == 'Ikal') echo 'selected="selected"'; ?>>Ikal</option>
                                                            <option value="Keriting" <?php if($key['Rambut'] == 'Keriting') echo 'selected="selected"'; ?>>Keriting</option>
                                                            <option value="Lurus" <?php if($key['Rambut'] == 'Lurus') echo 'selected="selected"'; ?>>Lurus</option>
                                                            <option value="Lainnya" <?php if($key['Rambut'] == 'Lainnya') echo 'selected="selected"'; ?>>Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:8%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">AsalSekolah</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <input name="asal_sekolah" type="text" class="form-control" value="<?= $key['Asal_sekolah']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding-bottom:23%;">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Prestasi</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <textarea name="prestasi" type="text" class="form-control" placeholder=" Contoh: Juara 1 Olimpiade Bahasa Jerman"><?= $key['Prestasi']; ?></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Penyakit</label>

                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                        <textarea name="penyakit_riwayat" type="text" class="form-control" placeholder=" Contoh: Diabetes Tipe 1, Demam Berdarah"><?= $key['Penyakit_riwayat']; ?></textarea>
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
        <!-- /modals -->

        <!-- detail-->
        <!-- Small modal -->
        <div class="modal fade bs-example-modal-sm" id="detail-sis<?= $key['NIS']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>

                        <h4 class="modal-title" id="myModalLabel2">Detail Data Siswa : <?= $key['Nama']; ?></h4>
                    </div>

                    <div class="modal-body">
                        <div role="tabpanel">
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <img src="<?= base_url(); ?>assets/uploads/<?= $key['Foto']; ?>" style="width:100%;hight:100%;">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:left;border-left:1px solid #e5e5e5;margin-top:10%;">
                                        <div class="form-group" style="padding-bottom:4%;">
                                            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">NIS</div>
                                            <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                            <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['NIS']; ?></div>
                                        </div>

                                        <div class="form-group" style="padding-bottom:4%;">
                                            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">NISN</div>
                                            <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                            <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['NISN']; ?></div>
                                        </div>

                                        <div class="form-group" style="padding-bottom:4%;">
                                            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Nama</div>
                                            <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                            <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Nama']; ?></div>
                                        </div>

                                        <div class="form-group" style="padding-bottom:4%;">
                                            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">TTL </div>
                                            <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                            <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Tempat_lahir']; ?>, <?= $key['Tanggal_lahir']; ?></div>
                                        </div>

                                        <div class="form-group" style="padding-bottom:4%;">
                                            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Agama</div>
                                            <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                            <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Agama']; ?></div>
                                        </div>

                                        <div class="form-group" style="padding-bottom:4%;">
                                            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">J.Kelamin</div>
                                            <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                            <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Jenis_kelamin']; ?></div>
                                        </div>

                                        <div class="form-group" style="padding-bottom:4%;">
                                            <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Alamat</div>
                                            <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                            <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Alamat']; ?></div>
                                        </div><br><br><br>
                                        <div class="form-group" style="padding-bottom:4%;">
                                          <a href="<?= base_url();?>dashboard/cetak_detil/siswa/<?= $key['NIS']; ?>" target="_blank"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> Cetak Detil Siswa</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 col-sm-12 col-xs-12" style="border:1px solid #e5e5e5;">
                                <div class="dashboard-widget-content">
                                    <ul class="list-unstyled timeline widget">
                                        <li>
                                            <div class="block">
                                                <div class="block_content">
                                                    <h2 class="title">&nbsp;</h2>
                                                    <div class="form-group" style="padding-bottom:4%;">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Nama Ayah</div>
                                                        <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Nama_ayah']; ?></div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:4%;">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Nama Ibu</div>
                                                        <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Nama_ibu']; ?></div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:4%;">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Kewarganegaraan</div>
                                                        <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Kewarganegaraan']; ?></div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:4%;">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Warga Negara</div>
                                                        <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Warga_negara']; ?></div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:4%;">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Status Anak</div>
                                                        <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Status_anak']; ?></div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:4%;">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Anak Ke</div>
                                                        <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Anak_ke']; ?></div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:4%;">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Jml. Saudara</div>
                                                        <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Jumlah_saudara']; ?></div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:4%;">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Telepon Rumah</div>
                                                        <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Telepon_rumah']; ?></div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:4%;">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Nomor HP</div>
                                                        <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Nomor_hp']; ?></div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:4%;">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Tinggi Badan</div>
                                                        <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Tinggi_badan']; ?></div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:4%;">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Berat Badan</div>
                                                        <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Berat_badan']; ?></div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:4%;">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Wajah</div>
                                                        <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Wajah']; ?></div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:4%;">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Rambut</div>
                                                        <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Rambut']; ?></div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:4%;">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Gol.Darah</div>
                                                        <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Golongan_darah']; ?></div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:4%;">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Rwt. Penyakit</div>
                                                        <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Penyakit_riwayat']; ?></div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:4%;">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Asal Sekolah</div>
                                                        <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Asal_sekolah']; ?></div>
                                                    </div>

                                                    <div class="form-group" style="padding-bottom:4%;">
                                                        <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;">Prestasi</div>
                                                        <div class="col-md-1 col-sm-4 col-xs-4"><b>:</b></div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7"><?= $key['Prestasi']; ?></div>
                                                    </div>

                                                    <h2 class="title">&nbsp;</h2>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>&nbsp;
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

<div class="modal fade bs-example-modal-lg" id="add-sis" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- modal header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h3 class="modal-title" id="myModalLabel2">Tambah data siswa</h3>
            </div>

            <form class="form-horizontal form-label-left" action="<?= base_url(); ?>dashboard/do_insert_siswa" method="post" enctype="multipart/form-data">

                <!-- modal body -->
                <div class="modal-body">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1_add" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Data 1</a></li>
                            <li role="presentation" class=""><a href="#tab_content2_add" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Data 2</a></li>
                        </ul>

                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1_add" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">NIS</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="nis" type="text" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">NISN</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="nisn" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="nama" type="text" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tempat Lahir</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="tempat_lahir" type="text" class="form-control" placeholder=" Contoh: Jakarta" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="tanggal_lahir" type="date" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Agama</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select name="agama" class="form-control" required>
                                                    <option>Pilih Agama</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Kristen">Kristen Protestan</option>
                                                    <option value="Katolik">Kristen Katolik</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="konghuchu">Kong Hu Chu</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select name="jenis_kelamin" class="form-control" required>
                                                    <option>Pilih Jenis Kelamin</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="filefoto" type="file" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Ayah</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="nama_ayah" type="text" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Ibu</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="nama_ibu" type="text" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Kewarga negaraan</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="kewarganegaraan" type="text" class="form-control" placeholder=" Contoh: Indonesia" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Warga Negara</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select name="warga_negara" class="form-control" required>
                                                    <option>Pilih Warga Negara</option>
                                                    <option value="WNI">Warga Negara Indonesia (WNI)</option>
                                                    <option value="WNA">Warga Negara Asing (WNA)</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Anak</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select name="status_anak" class="form-control" required>
                                                    <option>Pilih Status Anak</option>
                                                    <option value="Kandung">Kandung</option>
                                                    <option value="Angkat">Angkat</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea name="alamat" type="text" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade in" id="tab_content2_add" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Tinggi Badan</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="tinggi_badan" type="number" class="form-control" placeholder=" Contoh: 170">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Berat Badan</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="berat_badan" type="text" class="form-control" placeholder=" Contoh: 60">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Anak Ke</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="anak_ke" type="number" class="form-control" placeholder=" Contoh: 1" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Saudara</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="jumlah_saudara" type="number" class="form-control" placeholder=" Contoh: 1" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Gologan Darah</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select name="golongan_darah" class="form-control" required>
                                                    <option>Pilih Golongan Darah</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="AB">AB</option>
                                                    <option value="O">O</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Telepon Rumah</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="telepon_rumah" type="text" class="form-control" placeholder=" Contoh: 0217338556">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor HP</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="nomor_hp" type="text" class="form-control" placeholder=" Contoh: 087736317753">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Wajah</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select name="wajah" class="form-control" required>
                                                    <option>Pilih Wajah</option>
                                                    <option value="Bulat">Bulat</option>
                                                    <option value="Lonjong">Lonjong</option>
                                                    <option value="Kotak">Kotak</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Rambut</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <select name="rambut" class="form-control" required>
                                                    <option>Pilih Rambut</option>
                                                    <option value="Ikal">Ikal</option>
                                                    <option value="Keriting">Keriting</option>
                                                    <option value="Lurus">Lurus</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Asal Sekolah</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input name="asal_sekolah" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Prestasi</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea name="prestasi" type="text" class="form-control" placeholder=" Contoh: Juara 1 Olimpiade Bahasa Jerman"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Penyakit Riwayat</label>

                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea name="penyakit_riwayat" type="text" class="form-control" placeholder=" Contoh: Diabetes Tipe 1, Demam Berdarah"></textarea>
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
