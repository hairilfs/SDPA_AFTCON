<div class="x_title">
  <h2>Pilih Tahun Ajaran & Semester</h2>
  <div class="clearfix"></div>
</div>
  <form class="form-horizontal form-label-left" method="get" action="<?= base_url(); ?>dashboard/laporan/kelas">
    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tahun Ajaran</label>
      <div class="col-md-2 col-sm-9 col-xs-12">
        <select name="thn_ajar" class="form-control col-md-3">
          <option value="2015/2016">2015/2016</option>
          <option value="2016/2017">2016/2017</option>
          <option value="2017/2018">2017/2018</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12">Semester</label>
      <div class="col-md-2 col-sm-9 col-xs-12">
        <select name="semester" class="form-control">
          <option value="Gasal">GASAL</option>
          <option value="Genap">GENAP</option>
        </select>
      </div>
    </div>

    <div class="ln_solid"></div>
    <div class="form-group">
      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
        <button type="submit" class="btn btn-success">Ok</button>
      </div>
    </div>
  </form>
