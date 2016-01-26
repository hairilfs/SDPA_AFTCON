<?php foreach ($isi as $key): ?>

<?php endforeach; ?>
<div class="row">
  <div class="col-md-3 col-sm-3 col-xs-12 profile_left">

    <img width="250px" src="<?= $key['foto'];?>" class="img-thumbnail" alt="Avatar">

    <h3 style="text-align: center;"><?= $key['nama_guru']; ?></h3>
    <h4><i class="fa fa-key"></i> Emp. ID : <?= $key['employee_id'];; ?></h4>
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
