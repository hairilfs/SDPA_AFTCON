<?php echo $this->session->flashdata('pesan'); ?>
<br />
<form id="demo-form2" class="form-horizontal form-label-left" action="<?= base_url(); ?>dashboard/do_edit_akun_guru" method="post">
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password saat ini</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="password" name="nowpass" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pasword baru</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="password" name="newpass"  required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>
  <div class="form-group">
    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ulangi password baru</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <input type="password" name="renewpass" required="required" class="form-control col-md-7 col-xs-12">
    </div>
  </div>

  <div class="ln_solid"></div>
  <div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      <button type="reset" class="btn btn-warning">Batal</button>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
