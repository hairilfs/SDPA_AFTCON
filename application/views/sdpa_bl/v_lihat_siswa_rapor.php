<?php foreach ($isi3 as $key9) {} ?> 
    
<div class="x_title">
  <h2>Daftar Siswa - Kelas <?= $key9['nm_kelas']; ?> - <?= $key9['kd_kelas']; ?></h2>
  <div class="clearfix"></div>
</div>

<table id="example" class="table table-bordered responsive-utilities jambo_table">
    <thead>
        <tr class="headings">
            <!-- <th>
                <input type="checkbox" class="tableflat">
            </th> -->

            <th style="text-align:center">No. </th>
            <th style="text-align:center">NIS </th>
            <th style="text-align:center">Nama </th>
            <th style="text-align:center">Jenis Kelamin </th>
            <th style="text-align:center">Agama </th>

            <th class="no-link last" style='text-align:center;'>
                <span class="nobr">Action</span>
            </th>
        </tr>
    </thead>

    <tbody>
        <?php
            $no = 1;
            foreach ($isi3 as $key) { 
        ?>  

        <tr class="even pointer">
            <!-- <td class="a-center ">
                <input type="checkbox" class="tableflat">
            </td> -->

            <td style="text-align:center"><?= $no++ ?></td>
            <td style="text-align:center"><?= $key['NIS']; ?></td>
            <td><?= $key['Nama']; ?></td>
            <td style="text-align:center"><?= $key['Jenis_kelamin']; ?></td>
            <td style="text-align:center"><?= $key['Agama']; ?></td>

            <td align="center" style="padding: 6px;">
                <button type='button' class='btn btn-success' data-toggle='modal' data-target='.lihat-rapor<?= $key['NIS']; ?>'><i class='fa fa-search'></i> Rapor Siswa</button>
            </td>
        </tr>
    <?php   
        } 
    ?>
    </tbody>
</table>

<?php
    
    foreach ($isi3 as $key2) { 
?>  
      <div class="modal fade bs-example-modal lihat-rapor<?= $key2['NIS']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel2">Raport Nilai - <?= $key2['Nama']; ?></h4>
            </div>
            <div class="modal-body">
              <table class="table table-bordered table-hover table-compact">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Mata Pelajaran</th>
                      <th>Nilai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                        $rerata[$key2['NIS']]   = 0;
                        ${'no_'.$key2['NIS']}   = 1;

                        foreach ($isi5 as $key5) { 
                          if ($key5['NIS']==$key2['NIS']) {
                      ?>  
                              <td><?= ${'no_'.$key2['NIS']}++; ?></td>
                              <td><?= $key5['nm_mapel']; ?></td>
                              <td><?= $key5['nilai']; ?></td>
                            </tr>
                      <?php
                            $rerata[$key2['NIS']] = $rerata[$key2['NIS']]+$key5['nilai'];

                            $rerata_f = $rerata[$key2['NIS']];
                          }
                        }
                      ?>

                      <tr>
                        <td colspan="2">Rata-Rata</td>
                        <td>
                          <?= round($rerata_f/(${'no_'.$key2['NIS']}-1),2); ?>
                        </td>
                      </tr>

                  </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-success" name="save">Simpan</button>
            </div>
          </div>
        </div>
      </div>
<?php
    }
?>