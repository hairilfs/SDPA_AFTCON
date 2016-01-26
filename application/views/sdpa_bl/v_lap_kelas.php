<div class="x_title">
  <h2>Laporan Kelas </h2>
  <div class="clearfix"></div>
</div>
<div class="dashboard-widget-content">
  <ul class="list-unstyled timeline widget">
    <?php foreach ($data_item as $key_item): ?>

      <li>
        <div class="block">
          <div class="block_content">
            <h2 class="title" style="font-weight: bold;">
              <a href="#" data-toggle="modal" data-target="#see-<?= $key_item['kd_kelas']; ?>"><?= $key_item['kd_kelas']." - ".$key_item['nm_kelas']; ?></a>
            </h2>
          </div>
        </div>
      </li>

      <div class="modal fade bs-example-modal-lg" id="see-<?= $key_item['kd_kelas']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Kelas <?= $key_item['nm_kelas'];?></h4>
            </div>
            <div class="modal-body">
              <div class="table-responsive">

                <table class="table table-bordered table-hover table-compact">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>NIS</th>
                      <th>Nama Siswa</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $ang = 1; foreach ($data_peserta as $key_peserta): ?>
                      <?php foreach ($data_siswa as $key_siswa): ?>
                        <?php

                        if ($key_peserta['kd_kelas']==$key_item['kd_kelas']) {
                          if ($key_siswa['NIS']==$key_peserta['nis']) { ?>
                            <tr>
                              <td><?= $ang++; ?></td>
                              <td><?= $key_siswa['NIS'];?></td>
                              <td><?= $key_siswa['Nama'];?></td>
                            </tr>
                            <?php }
                          }
                          ?>
                        <?php endforeach; ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="modal-footer">
                <a href="<?= base_url();?>dashboard/cetak_isi_kelas/<?= $key_item['kd_kelas'];?>" target="_blank">
                  <button type="button" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Laporan </button>
                </a>
                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
              </div>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
    </ul>
  </div>
