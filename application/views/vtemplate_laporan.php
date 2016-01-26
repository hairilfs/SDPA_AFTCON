<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Cetak Laporan</title>

  <link href="<?= base_url(); ?>assets/fonts/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
  <style media="screen">
  body{
    margin-top: 50px;
  }
  </style>

  <style media="print">
    * {
      font-family: sans-serif;
      font-size: 10pt;

    }
    #kopsurat td {
      border: none;
    }
    #cetak_table, th, td{
      font-size: 8pt;
      border: 1px solid black;
      border-collapse: collapse;
      /*padding: 4px;*/
    }
    #cetak_table {
      width: 100%;
      text-align: center;
    }

    #ket td{
      border: none;
      font-size: 8pt;
      border-collapse: collapse;
    }

    #ketb {
      font-size: 8pt;
    }
    .tab_info td {
      /*width: 100%;*/
      border: none;
      table-layout: auto;
    }

    .kiri {
      float: left;
    }

    .kanan {
      float: right;
    }
  </style>
</head>

<body>
  <div class="container" id="printArea">
      <table id="kopsurat" border="0">
        <tr>
          <td rowspan="3">
            <img src="<?= base_url(); ?>assets/images/LOGOUBL.png" alt="budiluhur" width="80px"/>
          </td>
          <td>&nbsp;&nbsp;</td>
          <td><strong>BUDI LUHUR</strong></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;</td>
          <td><b>KINDERGARTEN & ELEMENTARY SCHOOL</b></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;</td>
          <td><small>
            Jl. Jombang Raya No. 77 - PONDOK AREN - TANGERANG SELATAN - BANTEN <br>
            Tlp. 021-730 0077 Fax. 021-730 0077</small>
          </td>
        </tr>
      </table>
      <hr>

      <?= $contents ?>

    </div>
    <div class="container">
      <button class="btn btn-info" type="button" name="button" onclick="printDiv('printArea')"><i class="fa fa-print"></i> Cetak Laporan</button>
      <button class="btn btn-danger" type="button" name="button" onclick="window.close();"><i class="fa fa-close"></i> Tutup Laporan</button>
      <br><br>
    </div>
    <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;
    }
    </script>
  </body>
  </html>
