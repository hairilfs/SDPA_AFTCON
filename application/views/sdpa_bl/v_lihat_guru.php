<div class="x_title">
    <h2>Master Guru</h2>
    <div class="clearfix"></div>
</div>
<?php echo $this->session->flashdata('pesan'); ?>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-sis"><i class="fa fa-plus"></i> Tambah Data</button>
<a href="<?= base_url();?>dashboard/cetak_laporan/guru" target="_blank"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> Cetak Laporan</button></a>
<table id="example" class="table table-striped responsive-utilities jambo_table">
  <thead>
    <tr class="headings">
      <th>No. </th>
      <th>Emp. ID </th>
      <th>Nama </th>
      <th>Tempat Lahir </th>
      <th>Tgl. Lahir </th>
      <th>Jenis Kelamin </th>
      <th>Agama </th>

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
        <td><?= $key['employee_id']; ?></td>
        <td><?= $key['nama_guru']; ?></td>
        <td><?= $key['tempat_lahir']; ?></td>
        <td><?= $key['tanggal_lahir']; ?></td>
        <td><?= $key['jenis_kelamin']; ?></td>
        <td><?= $key['agama']; ?></td>
        <td align="center">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detil-sis<?= $key['employee_id']; ?>"><i class="fa fa-th-list"></i> Detil</button>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit-sis<?= $key['employee_id']; ?>"><i class="fa fa-edit"></i> Ubah</button>
          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-sis<?= $key['employee_id']; ?>"><i class="fa fa-trash"></i> Hapus</button>
        </td>
      </tr>

      <!-- DELETE GURU -->
      <div class="modal fade" id="delete-sis<?= $key['employee_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h3 class="modal-title" id="myModalLabel2">Hapus Data Guru</h3>
            </div>
            <div class="modal-body">
              <p align="center">Apakah anda yakin ingin menghapus data <?= $key['nama_guru']; ?>?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <a href="<?= base_url().'dashboard/do_delete_guru/'.$key['employee_id']; ?>" type="button" class="btn btn-danger">Ya, Hapus</a>
            </div>
          </div>
        </div>
      </div>

      <!-- UBAH GURU -->
      <div class="modal fade bs-example-modal-lg" id="edit-sis<?= $key['employee_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- modal header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h3 class="modal-title" id="myModalLabel2">Ubah data guru</h3>
            </div>
            <form class="form-horizontal form-label-left" action="<?= base_url(); ?>dashboard/do_edit_guru" method="post" enctype="multipart/form-data">
              <!-- modal body -->
              <div class="modal-body">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                  <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#tab_content1_edit<?= $key['employee_id']; ?>" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Data 1</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content2_edit<?= $key['employee_id']; ?>" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Data 2</a>
                    </li>
                    <li role="presentation" class=""><a href="#tab_content3_edit<?= $key['employee_id']; ?>" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Data 3</a>
                    </li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <!-- tab panel ke 1 -->
                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1_edit<?= $key['employee_id']; ?>" aria-labelledby="home-tab">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Employee ID</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="employee_id" type="text" class="form-control" value="<?= $key['employee_id']; ?>" readonly>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">NIP</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="nip" type="text" class="form-control" value="<?= $key['NIP']; ?>" required>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">NUPTK</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="nuptk" type="text" class="form-control" value="<?= $key['NUPTK']; ?>" required>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="nama" type="text" class="form-control" value="<?= $key['nama_guru']; ?>" required>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Tempat Lahir</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="tmpt_lhr" type="text" class="form-control" value="<?= $key['tempat_lahir']; ?>" placeholder=' Contoh: Jakarta , Bandung' required>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Tanggal Lahir</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="tgl_lhr" type="date" class="form-control" value="<?= $key['tanggal_lahir']; ?>" required>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Jns. Kelamin</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <select name="jenkel" class="form-control" required>
                                <?php
                                if ($key['jenis_kelamin'] == "Laki-laki") {
                                  echo '<option value="Laki-laki" selected>Laki-laki</option>';
                                  echo '<option value="Perempuan">Perempuan</option>';
                                } else {
                                  echo '<option value="Laki-laki" >Laki-laki</option>';
                                  echo '<option value="Perempuan" selected>Perempuan</option>';
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Alamat</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <textarea name="alamat" class="form-control" rows="3" required><?= $key['alamat']; ?></textarea>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Agama</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <select name="agama" class="form-control" required>
                                <option value="Islam"<?php if ($key['agama']=="Islam")  echo " selected";?>>Islam</option>
                                <option value="Kristen"<?php if ($key['agama']=="Kristen")  echo " selected";?>>Kristen</option>
                                <option value="Katolik"<?php if ($key['agama']=="Katolik")  echo " selected";?>>Katolik</option>
                                <option value="Hindu"<?php if ($key['agama']=="Hindu")  echo " selected";?>>Hindu</option>
                                <option value="Budha"<?php if ($key['agama']=="Budha")  echo " selected";?>>Budha</option>
                                <option value="Lainnya"<?php if ($key['agama']=="Lainnya")  echo " selected";?>>Lainnya</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Kewarganegaraan</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="kwngrn" type="text" class="form-control" value="<?= $key['kewarganegaraan']; ?>" placeholder=' Contoh: Indonesia' required>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Warga Negara</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <select name="wrg_ngr" class="form-control" value="<?= $key['warga_negara']; ?>" required>
                                  <option value="WNI" <?php if($key['warga_negara'] == 'WNI') echo 'selected="selected"'; ?>>Warga Negara Indonesia (WNI)</option>
                                  <option value="WNA" <?php if($key['warga_negara'] == 'WNA') echo 'selected="selected"'; ?>>Warga Negara Asing (WNA)</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Status Anak</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <select name="stat_anak" class="form-control" required>
                                <option value="Kandung"<?php if ($key['status_anak']=="Kandung")  echo " selected";?>>Kandung</option>
                                <option value="Angkat"<?php if ($key['status_anak']=="Angkat")  echo " selected";?>>Angkat</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Anak Ke</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="anak_ke" type="number" class="form-control" value="<?= $key['anak_ke']; ?>" placeholder=" Contoh: 1" required>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Stat. Nikah</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <select name="stat_nikah" class="form-control" required>
                                <option value="Menikah"<?php if ($key['status_pernikahan']=="Menikah")  echo " selected";?>>Menikah</option>
                                <option value="Belum Menikah"<?php if ($key['status_pernikahan']=="Belum Menikah")  echo " selected";?>>Belum Menikah</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Thn. Menikah</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="thn_mnkh" type="number" class="form-control" value="<?= $key['tahun_menikah']; ?>" placeholder=" Contoh: 2015">
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Telp. Rumah</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="telp_rmh" type="text" class="form-control" value="<?= $key['telp_rumah']; ?>" placeholder=" Contoh: 0217338556">
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">No. HP</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="no_hp" type="text" class="form-control" value="<?= $key['no_hp']; ?>" placeholder=" Contoh: 087736317753" required>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!-- tab panel ke 2 -->
                    <div role="tabpanel" class="tab-pane fade" id="tab_content2_edit<?= $key['employee_id']; ?>" aria-labelledby="profile-tab">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Email</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="email" type="email" class="form-control" value="<?= $key['email']; ?>">
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Jml. Saudara</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="jml_sdr" type="number" class="form-control" value="<?= $key['jml_saudara']; ?>" placeholder=" Contoh: 1" required>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Thn.Tugas</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="thn_tgs" type="number" class="form-control" value="<?= $key['thn_mulai_tugas']; ?>" placeholder=" Contoh: 2015">
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">No. SK Dinas</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="no_sk_dns" type="text" class="form-control" value="<?= $key['no_sk_dinas']; ?>">
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Tgl. SK Dinas</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="tgl_sk_dns" type="text" class="form-control" value="<?= $key['tgl_sk_dinas']; ?>">
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">B. Studi Ajar</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="b_studi_ajar" type="text" class="form-control" value="<?= $key['bdg_studi_ajar']; ?>">
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Mutasi Dari</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="mutasi_dari" type="text" class="form-control" value="<?= $key['mutasi_dari']; ?>" >
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">No. SK Mutasi</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="no_sk_mutasi" type="text" class="form-control" value="<?= $key['no_sk_mutasi']; ?>">
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Stat. Karyawan</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <select name="stat_kar" class="form-control" value="<?= $key['stat_karyawan']; ?>">
                                  <option value="Tetap" <?php if($key['stat_karyawan'] == 'Tetap') echo 'selected="selected"'; ?>>Tetap</option>
                                  <option value="Honorer" <?php if($key['stat_karyawan'] == 'Honorer') echo 'selected="selected"'; ?>>Honorer</option>
                                  <option value="Kontrak" <?php if($key['stat_karyawan'] == 'Kontrak') echo 'selected="selected"'; ?>>Kontrak</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Gol. Darah</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <select name="gol_dar" class="form-control" required>
                                <option value="A"<?php if ($key['gol_darah']=="A")  echo " selected";?>>A</option>
                                <option value="B"<?php if ($key['gol_darah']=="B")  echo " selected";?>>B</option>
                                <option value="AB"<?php if ($key['gol_darah']=="AB")  echo " selected";?>>AB</option>
                                <option value="O"<?php if ($key['gol_darah']=="O")  echo " selected";?>>O</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Foto</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="fotox" type="file" class="form-control" required>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Tmpt. Bekerja</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="tmpt_krj" type="text" class="form-control" value="<?= $key['tempat_bekerja']; ?>">
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Jabatan</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="jbtn" type="text" class="form-control" value="<?= $key['jabatan']; ?>" required>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Pgkt. Golongan</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="pgkt_gol" type="text" class="form-control" value="<?= $key['pangkat_golongan']; ?>" required>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Stat. Pegawai</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <select name="stat_pegawai" class="form-control" value="<?= $key['stat_pegawai']; ?>" required>
                                  <option value="Tetap" <?php if($key['stat_pegawai'] == 'Tetap') echo 'selected="selected"'; ?>>Tetap</option>
                                  <option value="Honorer" <?php if($key['stat_pegawai'] == 'Honorer') echo 'selected="selected"'; ?>>Honorer</option>
                                  <option value="Kontrak" <?php if($key['stat_pegawai'] == 'Kontrak') echo 'selected="selected"'; ?>>Kontrak</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Mengajar Kelas</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="mgjr_kls" type="text" class="form-control" value="<?= $key['mengajar_dikelas']; ?>">
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Tgs. Tambahan</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="tgs_tmbhn" type="text" class="form-control" value="<?= $key['tugas_tambahan']; ?>">
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Keahlian</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="keahlian" type="text" class="form-control" placeholder=" Contoh: Drama, Edit Video, Photoshop" value="<?= $key['keahlian']; ?>">
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="tab_content3_edit<?= $key['employee_id']; ?>" aria-labelledby="profile-tab">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Pddk. Terakhir</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <select name="pddk_terakhir" class="form-control" required>
                                <option value="SD"<?php if ($key['tgkt_jnjg_pddkn']=="SD")  echo " selected";?>>SD</option>
                                <option value="SMP"<?php if ($key['tgkt_jnjg_pddkn']=="SMP")  echo " selected";?>>SMP</option>
                                <option value="SMA"<?php if ($key['tgkt_jnjg_pddkn']=="SMA")  echo " selected";?>>SMA</option>
                                <option value="D3"<?php if ($key['tgkt_jnjg_pddkn']=="D3")  echo " selected";?>>D3</option>
                                <option value="S1"<?php if ($key['tgkt_jnjg_pddkn']=="S1")  echo " selected";?>>S1</option>
                                <option value="S2"<?php if ($key['tgkt_jnjg_pddkn']=="S2")  echo " selected";?>>S2</option>
                                <option value="S3"<?php if ($key['tgkt_jnjg_pddkn']=="S3")  echo " selected";?>>S3</option>
                                <option value="Lainnya"<?php if ($key['tgkt_jnjg_pddkn']=="Lainnya")  echo " selected";?>>Lainnya</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Thn. Msk Pddkn</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="thn_msk_pddk" type="text" class="form-control" value="<?= $key['thn_msk_pddkn']; ?>" required>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Thn. Lulus Pddkn</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="thn_lls_pddk" type="text" class="form-control" value="<?= $key['thn_lulus_pddkn']; ?>" required>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Bapak</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="nm_bpk" type="text" class="form-control" value="<?= $key['nama_bapak']; ?>"required>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Ibu</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="nm_ibu" type="text" class="form-control" value="<?= $key['nama_ibu']; ?>"required>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Suami</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="nm_sm" type="text" class="form-control" value="<?= $key['nama_suami']; ?>">
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Nama Istri</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="nm_is" type="text" class="form-control" value="<?= $key['nama_istri']; ?>">
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Tinggi Badan</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="tg_bdn" type="number" class="form-control" value="<?= $key['tinggi_badan']; ?>" placeholder=" Contoh: 180">
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Berat Badan</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <input name="brt_bdn" type="number" class="form-control" value="<?= $key['berat_badan']; ?>" placeholder=" Contoh: 70">
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Wajah</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <select name="wajah" class="form-control" value="<?= $key['wajah']; ?>" required>
                                  <option value="Bulat" <?php if($key['wajah'] == 'Bulat') echo 'selected="selected"'; ?>>Bulat</option>
                                  <option value="Lonjong" <?php if($key['wajah'] == 'Lonjong') echo 'selected="selected"'; ?>>Lonjong</option>
                                  <option value="Kotak" <?php if($key['wajah'] == 'Kotak') echo 'selected="selected"'; ?>>Kotak</option>
                                  <option value="Lainnya" <?php if($key['wajah'] == 'Lainnya') echo 'selected="selected"'; ?>>Lainnya</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Rambut</label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                              <select name="rambut" class="form-control" value="<?= $key['rambut']; ?>" required>
                                  <option value="Ikal" <?php if($key['rambut'] == 'Ikal') echo 'selected="selected"'; ?>>Ikal</option>
                                  <option value="Keriting" <?php if($key['rambut'] == 'Keriting') echo 'selected="selected"'; ?>>Keriting</option>
                                  <option value="Lurus" <?php if($key['rambut'] == 'Lurus') echo 'selected="selected"'; ?>>Lurus</option>
                                  <option value="Lainnya" <?php if($key['rambut'] == 'Lainnya') echo 'selected="selected"'; ?>>Lainnya</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group" style="padding-bottom:8%;">
                            <label class="control-label col-md-4 col-sm-3 col-xs-12">Riw. Penyakit</label>
                            <div class="col-md-8 col-md-8sm-9 col-xs-12">
                              <textarea name="riw_pykt" type="text" class="form-control" placeholder=" Contoh: Diabetes Tipe 1, Demam Berdarah"><?= $key['pykt_derita']; ?></textarea>
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

      <!-- DETIL GURU -->
      <div class="modal fade bs-example-modal-lg" id="detil-sis<?= $key['employee_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <!-- modal header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h3 class="modal-title" id="myModalLabel2">Detil data guru</h3>
            </div>
            <!-- modal body -->
            <div class="modal-body">
              <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                  <img width="250px" src="<?= $key['foto'];?>" class="img-thumbnail" alt="Avatar">

                  <h3 style="text-align: center;"><?= $key['nama_guru']; ?></h3>
                  <h4><i class="fa fa-key"></i> Emp. ID : <?= $key['employee_id']; ?></h4>
                  <br>
                  <!-- start skills -->
                  <h4><u>Main Profile</u></h4>
                  <ul class="list-unstyled user_data">
                    <li><i class="fa fa-birthday-cake"></i> <?= $key['tempat_lahir'].", ".$key['tanggal_lahir']; ?></li>
                    <li><i class="fa fa-user"></i> <?= $key['jenis_kelamin']; ?></li>
                    <li><i class="fa fa-star"></i> <?= $key['agama']; ?></li>
                    <li><i class="fa fa-phone"></i> <?= $key['no_hp']; ?></li>
                    <li><i class="fa fa-envelope"></i> <?= $key['email']; ?></li>
                    <li><i class="fa fa-briefcase"></i> <?= $key['jabatan']; ?></li>
                  </ul>
                  <a href="<?= base_url();?>dashboard/cetak_detil/guru/<?= $key['employee_id']; ?>" target="_blank"><button type="button" class="btn btn-success"><i class="fa fa-print"></i> Cetak Detil Guru</button></a>
                  <!-- end of skills -->
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#tab_content1_detil<?= $key['employee_id']; ?>" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Data 1</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content2_detil<?= $key['employee_id']; ?>" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Data 2</a>
                      </li>
                      <li role="presentation" class=""><a href="#tab_content3_detil<?= $key['employee_id']; ?>" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Data 3</a>
                      </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="tab_content1_detil<?= $key['employee_id']; ?>" aria-labelledby="home-tab">
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="dashboard-widget-content">
                              <ul class="list-unstyled timeline widget">
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">NIP</h2>
                                      <p class="excerpt"><?= $key['NIP']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">NUPTK</h2>
                                      <p class="excerpt"><?= $key['NUPTK']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Alamat</h2>
                                      <p class="excerpt"><?= $key['alamat']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Kewarganegaraan</h2>
                                      <p class="excerpt"><?= $key['kewarganegaraan']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Warga Negara</h2>
                                      <p class="excerpt"><?= $key['warga_negara']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Status Anak</h2>
                                      <p class="excerpt"><?= $key['status_anak']; ?></p>
                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </div>

                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="dashboard-widget-content">
                              <ul class="list-unstyled timeline widget">
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Anak ke</h2>
                                      <p class="excerpt"><?= $key['anak_ke']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Status Nikah</h2>
                                      <p class="excerpt"><?= $key['status_pernikahan']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Tahun Nikah</h2>
                                      <p class="excerpt"><?= $key['tahun_menikah']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Telp. Rumah</h2>
                                      <p class="excerpt"><?= $key['telp_rumah']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Jumlah Saudara</h2>
                                      <p class="excerpt"><?= $key['jml_saudara']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Tahun Tugas</h2>
                                      <p class="excerpt"><?= $key['thn_mulai_tugas']; ?></p>
                                    </div>
                                  </div>
                                </li>

                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2_detil<?= $key['employee_id']; ?>" aria-labelledby="profile-tab">
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="dashboard-widget-content">
                              <ul class="list-unstyled timeline widget">
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">No. SK Dinas</h2>
                                      <p class="excerpt"><?= $key['no_sk_dinas']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Tgl. SK Dinas</h2>
                                      <p class="excerpt"><?= $key['tgl_sk_dinas']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Bidang Studi Ajar</h2>
                                      <p class="excerpt"><?= $key['bdg_studi_ajar']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Mutasi dari</h2>
                                      <p class="excerpt"><?= $key['mutasi_dari']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">No. SK Mutasi ke</h2>
                                      <p class="excerpt"><?= $key['no_sk_mutasi']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Status Karyawan</h2>
                                      <p class="excerpt"><?= $key['stat_karyawan']; ?></p>
                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </div>

                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="dashboard-widget-content">
                              <ul class="list-unstyled timeline widget">
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Golongan Darah</h2>
                                      <p class="excerpt"><?= $key['gol_darah']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Tempat Bekerja</h2>
                                      <p class="excerpt"><?= $key['tempat_bekerja']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Pangkat Golongan</h2>
                                      <p class="excerpt"><?= $key['pangkat_golongan']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Status Pegawai</h2>
                                      <p class="excerpt"><?= $key['stat_pegawai']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Mengajar di Kelas</h2>
                                      <p class="excerpt"><?= $key['mengajar_dikelas']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Tugas Tambahan</h2>
                                      <p class="excerpt"><?= $key['tugas_tambahan']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Keahlian</h2>
                                      <p class="excerpt"><?= $key['keahlian']; ?></p>
                                    </div>
                                  </div>
                                </li>

                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="tab_content3_detil<?= $key['employee_id']; ?>" aria-labelledby="profile-tab">
                        <div class="row">
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="dashboard-widget-content">
                              <ul class="list-unstyled timeline widget">
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Pendidikan Terakhir</h2>
                                      <p class="excerpt"><?= $key['tgkt_jnjg_pddkn']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Tahun Masuk Pendidikan</h2>
                                      <p class="excerpt"><?= $key['thn_msk_pddkn']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Tahun Lulus Pendidikan</h2>
                                      <p class="excerpt"><?= $key['thn_lulus_pddkn']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Nama Bapak</h2>
                                      <p class="excerpt"><?= $key['nama_bapak']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Nama Ibu</h2>
                                      <p class="excerpt"><?= $key['nama_ibu']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Nama Suami</h2>
                                      <p class="excerpt"><?= $key['nama_suami']; ?></p>
                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </div>

                          </div>

                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="dashboard-widget-content">
                              <ul class="list-unstyled timeline widget">
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Nama Istri</h2>
                                      <p class="excerpt"><?= $key['nama_istri']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Tinggi Badan</h2>
                                      <p class="excerpt"><?= $key['tinggi_badan']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Berat Badan</h2>
                                      <p class="excerpt"><?= $key['berat_badan']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Wajah</h2>
                                      <p class="excerpt"><?= $key['wajah']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Rambut</h2>
                                      <p class="excerpt"><?= $key['rambut']; ?></p>
                                    </div>
                                  </div>
                                </li>
                                <li>
                                  <div class="block">
                                    <div class="block_content">
                                      <h2 class="title" style="font-weight: bold;">Riwayat Penyakit</h2>
                                      <p class="excerpt"><?= $key['pykt_derita']; ?></p>
                                    </div>
                                  </div>
                                </li>

                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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

<!-- TAMBAH GURU -->
<div class="modal fade bs-example-modal-lg" id="add-sis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- modal header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h3 class="modal-title" id="myModalLabel2">Tambah data guru</h3>
      </div>
      <form class="form-horizontal form-label-left" action="<?= base_url(); ?>dashboard/do_insert_guru" method="post" enctype="multipart/form-data">
        <!-- modal body -->
        <div class="modal-body">
          <div class="" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
              <li role="presentation" class="active"><a href="#tab_content1_add" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
                <span data-toggle="tooltip" data-placement="top" title="<?= $key['nama_guru']; ?>">Data 1</span></a>
              </li>
              <li role="presentation" class=""><a href="#tab_content2_add" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Data 2</a>
              </li>
              <li role="presentation" class=""><a href="#tab_content3_add" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Data 3</a>
              </li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <!-- tab panel ke 1 -->
              <div role="tabpanel" class="tab-pane fade active in" id="tab_content1_add" aria-labelledby="home-tab">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee ID</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="employee_id" type="text" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">NIP</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="nip" type="text" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">NUPTK</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="nuptk" type="text" class="form-control">
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
                        <input name="tmpt_lhr" type="text" class="form-control" placeholder=' Contoh: Jakarta, Bandung' required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="tgl_lhr" type="date" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Jns. Kelamin</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="jenkel" class="form-control" required>
                          <option value="" disabled selected hidden>Pilih Jns. Kelamin</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea name="alamat" class="form-control" rows="3" required></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Agama</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="agama" class="form-control" required>
                          <option value="" disabled selected hidden>Pilih Agama</option>
                          <option value="Islam">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Budha">Budha</option>
                          <option value="Lainnya">Lainnya</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Kewarganegaraan</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="kwngrn" type="text" class="form-control" placeholder=' Contoh: Indonesia' required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Warga Negara</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="wrg_ngr" class="form-control" required>
                            <option value="" disabled selected hidden>Pilih Warga Negara</option>
                            <option value="WNI">Warga Negara Indonesia (WNI)</option>
                            <option value="WNA">Warga Negara Asing (WNA)</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Anak</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="stat_anak" class="form-control" required>
                          <option value="" disabled selected hidden>Pilih Status Anak</option>
                          <option value="Kandung">Kandung</option>
                          <option value="Angkat">Angkat</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Anak Ke</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="anak_ke" type="number" class="form-control" placeholder=" Contoh: 1" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Stat. Nikah</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="stat_nikah" class="form-control" required>
                          <option value="" disabled selected hidden>Pilih Stat. Nikah</option>
                          <option value="Menikah">Menikah</option>
                          <option value="Belum Menikah">Belum Menikah</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Thn. Menikah</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="thn_mnkh" type="number" class="form-control" placeholder=" Contoh: 2015">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Telp. Rumah</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="telp_rmh" type="text" class="form-control" placeholder=" Contoh: 0217338556">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">No. HP</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="no_hp" type="text" class="form-control" placeholder=" Contoh: 087736317753" required>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <!-- tab panel ke 2 -->
              <div role="tabpanel" class="tab-pane fade" id="tab_content2_add" aria-labelledby="profile-tab">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="email" type="email" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Jml. Saudara</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="jml_sdr" type="number" class="form-control" placeholder=" Contoh: 1" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Thn.Tugas</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="thn_tgs" type="number" class="form-control" placeholder=" Contoh: 2015" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">No. SK Dinas</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="no_sk_dns" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tgl. SK Dinas</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="tgl_sk_dns" type="date" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">B. Studi Ajar</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="b_studi_ajar" type="text" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Mutasi Dari</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="mutasi_dari" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">No. SK Mutasi</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="no_sk_mutasi" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Stat. Karyawan</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="stat_kar" class="form-control" required>
                            <option value="" disabled selected hidden>Pilih Stat. Karyawan</option>
                            <option value="Tetap">Tetap</option>
                            <option value="Honorer">Honorer</option>
                            <option value="Kontrak">Kontrak</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Gol. Darah</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="gol_dar" class="form-control" required>
                          <option value="" disabled selected hidden>Pilih Gol. Darah</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="AB">AB</option>
                          <option value="O">O</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="foto" type="file" class="" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tmpt. Bekerja</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="tmpt_krj" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Jabatan</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="jbtn" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Pgkt. Golongan</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="pgkt_gol" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Stat. Pegawai</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="stat_pegawai" class="form-control" required>
                            <option value="" disabled selected hidden>Pilih Stat. Pegawai</option>
                            <option value="Tetap">Tetap</option>
                            <option value="Honorer">Honorer</option>
                            <option value="Kontrak">Kontrak</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Mengajar Kelas</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="mgjr_kls" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tgs. Tambahan</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="tgs_tmbhn" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Keahlian</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="keahlian" type="text" class="form-control" placeholder=" Contoh: Drama, Edit Video, Photoshop">
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tab_content3_add" aria-labelledby="profile-tab">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Pddk. Terakhir</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="pddk_terakhir" class="form-control" required>
                          <option value="" disabled selected hidden>Pilih Pddk. Terakhir</option>
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SMA">SMA</option>
                          <option value="D3">D3</option>
                          <option value="S1">S1</option>
                          <option value="S2">S2</option>
                          <option value="S3">S3</option>
                          <option value="Lainnya">Lainnya</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Thn. Msk Pddkn</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="thn_msk_pddk" type="text" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Thn. Lulus Pddkn</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="thn_lls_pddk" type="text" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Bapak</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="nm_bpk" type="text" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Ibu</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="nm_ibu" type="text" class="form-control" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Suami</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="nm_sm" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Istri</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="nm_is" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tinggi Badan</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="tg_bdn" type="number" class="form-control" placeholder=" Contoh: 180">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Berat Badan</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input name="brt_bdn" type="number" class="form-control" placeholder=" Contoh: 70">
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Wajah</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <select name="wajah" class="form-control" required>
                            <option value="" disabled selected hidden>Pilih Wajah</option>
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
                            <option value="" disabled selected hidden>Pilih Rambut</option>
                            <option value="Ikal">Ikal</option>
                            <option value="Keriting">Keriting</option>
                            <option value="Lurus">Lurus</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Riw. Penyakit</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea name="riw_pykt" type="text" class="form-control" placeholder=" Contoh: Diabetes Tipe 1, Demam Berdarah"></textarea>
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
