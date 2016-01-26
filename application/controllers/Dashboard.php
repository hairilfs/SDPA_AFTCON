<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  function __construct() {
    parent::__construct();

    $this->load->model('m_sdpa');
    $this->auth->cek_auth();
    $this->load->helper(array('form', 'url'));
  }


  function index() {
    $asd = $this->session->userdata('u_id');
    $ambil_akun = $this->m_sdpa->ambil_user($asd);

    $this->load->library('user_agent');

    $stat = $this->session->userdata('lvl');

    if ($stat=="admin"){
      $this->template->load('vtemplate','sdpa_bl/hello');

    } elseif ($stat == "guru") {
      $data = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
      $data2 = $this->m_sdpa->get_data("guru", "where employee_id in (select b.Employee_id from walikelas b) and employee_id = '$asd'");
      $this->template->load('vtemplate_guru','sdpa_bl/hello_guru', array('isi' => $data, 'isi2' => $data2));

    } else {
      echo "user";
      echo "<a href='".base_url()."index.php/dashboard/logout"."'> logout</a>";

    }
  }

  function login() {
    $session = $this->session->userdata('isLogin');

    if($session == FALSE) {

      $this->load->view('sdpa_bl/login.php');

    } else {

      redirect('dashboard');

    }
  }

  function logout() {

    $this->session->sess_destroy();
    redirect('login','refresh');

  }

  public function cetak_laporan($table="") {
    $data = $this->m_sdpa->get_data($table);
    $file_lap = "";
    $datanya = array();
    switch ($table) {
      case 'guru':
      $file_lap = "guru";
      $datanya = array('data_lap' => $data);
      break;
      case 'siswa':
      $file_lap = "siswa";
      $datanya = array('data_lap' => $data);
      break;
      case 'kelas':
      $file_lap = "kelas";
      $datanya = array('data_lap' => $data);
      break;
      case 'walikelas':
      $file_lap = "walikelas";
      $data_gur = $this->m_sdpa->get_data("guru");
      $data_kel = $this->m_sdpa->get_data("kelas");
      $datanya = array('data_lap' => $data, 'data_gur' => $data_gur, 'data_kel' => $data_kel);
      break;
      case 'peserta':
      $file_lap = "peserta";
      $data_sis = $this->m_sdpa->get_data("siswa");
      $datanya = array('data_lap' => $data, 'data_sis' => $data_sis);
      break;
      case 'mapel':
      $file_lap = "mapel";
      $datanya = array('data_lap' => $data);
      break;
      case 'jadwal':
      $file_lap = "jadwal";
      $data_map = $this->m_sdpa->get_data("mapel");
      $data_gur = $this->m_sdpa->get_data("guru");
      $datanya = array('data_lap' => $data, 'data_map' => $data_map, 'data_gur' => $data_gur);
      break;
      case 'user':
      $file_lap = "user";
      $datanya = array('data_lap' => $data);
      break;
      default:
      $file_lap = "";
      break;
    }
    $this->template->load('vtemplate_laporan','sdpa_bl_lap/v_lap_'.$file_lap, $datanya);
  }

  public function cetak_isi_kelas($kd="") {
    $data_kelas = $this->m_sdpa->get_data("kelas","where kd_kelas='$kd'");
    $data_walkel = $this->m_sdpa->get_data("walikelas","where Kd_kelas='$kd'");
    $data_peserta = $this->m_sdpa->get_data("peserta","where kd_kelas='$kd'");
    $data_siswa = $this->m_sdpa->get_data("siswa");
    $data_guru = $this->m_sdpa->get_data("guru");
    $datanya = array(
      'data_kelas'    => $data_kelas,   'data_wali'   => $data_walkel,
      'data_peserta'  => $data_peserta, 'data_siswa'  => $data_siswa,
      'data_guru'     => $data_guru
    );

    $this->template->load('vtemplate_laporan','sdpa_bl_lap/v_lap_isi_kelas', $datanya);
  }

  public function cetak_detil($table="", $id="") {
    $file_lap = "";
    switch ($table) {
      case 'guru':
      $file_lap = "guru";
      $data = $this->m_sdpa->get_data($table, "where employee_id='$id' ");
      break;
      case 'siswa':
      $file_lap = "siswa";
      $data = $this->m_sdpa->get_data($table, "where NIS='$id' ");
      break;
      default:
      $file_lap = "";
      break;
    }
    $this->template->load('vtemplate_laporan','sdpa_bl_lap/v_lap_detil_'.$file_lap, array('data_lap' => $data));
  }

  public function cetak_nilai_jadwal($semester,$kelas,$jadwal) { //abcde
    if(isset($kelas) AND isset($jadwal)) {
      $asd = $this->session->userdata('u_id');
      $data_guru = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
      $data_peserta = $this->m_sdpa->get_data("peserta", "where kd_kelas = '$kelas' ");
      $data_siswa = $this->m_sdpa->get_data("siswa");
      $data_latihan = $this->m_sdpa->get_data("latihan");
      $data_mapel = $this->m_sdpa->get_data("mapel");
      $data_kuis = $this->m_sdpa->get_data("kuis");
      $data_kelas = $this->m_sdpa->get_data("kelas");
      $data_jadwal = $this->m_sdpa->get_data("jadwal", "where kd_jadwal='$jadwal' ");
      $data_uas = $this->m_sdpa->get_data("uas", "where kd_jadwal='$jadwal'  and semester='$semester' ");
      $data_uts = $this->m_sdpa->get_data("uts", "where kd_jadwal='$jadwal'  and semester='$semester' ");
      $data_term = $this->m_sdpa->get_data("term", "where kd_jadwal='$jadwal' and semester='$semester' ");
      $data_term_dist = $this->m_sdpa->get_distinct_term("term", "where kd_jadwal='$jadwal' ");
      $data_ket_latihan = $this->m_sdpa->get_data("ket_latihan", "where semester='$semester' AND kd_jadwal='$jadwal' ");
      $data_ket_kuis = $this->m_sdpa->get_data("ket_kuis", "where semester='$semester' AND kd_jadwal='$jadwal' ");
      $data_LatihanTerm = $this->m_sdpa->getLatihanTerm("latihan", "where semester='$semester' and kd_jadwal='$jadwal' ");
      $data_KuisTerm = $this->m_sdpa->getKuisTerm("kuis", "where semester='$semester' and kd_jadwal='$jadwal' ");
      $data_hasil_akhir = $this->m_sdpa->get_data("hasil_akhir", "where semester='$semester' and kd_jadwal='$jadwal' ");

      $all_data = array('data_latihan'      => $data_latihan,     'data_guru'     => $data_guru,      'term_distinct'     => $data_term_dist,
                        'isi_peserta'       => $data_peserta,     'isi_siswa'     => $data_siswa,     'data_kuis'         => $data_kuis,
                        'data_uas'          => $data_uas,         'data_term'     => $data_term,      'data_uts'          => $data_uts,
                        'data_ket_latihan'  => $data_ket_latihan, 'data_ket_kuis' => $data_ket_kuis,  'data_LatihanTerm'  => $data_LatihanTerm,
                        'data_KuisTerm'     => $data_KuisTerm,    'data_mapel'    => $data_mapel,     'data_jadwal'      => $data_jadwal,
                        'data_kelas'        => $data_kelas,       'data_hasil_akhir' => $data_hasil_akhir
                      );

      $this->template->load('vtemplate_laporan','sdpa_bl_lap/v_lap_nilai_mapel', $all_data);
    } else {
      redirect("dashboard");
    }
  }

  public function cetak_nilai_rapor($nis,$semester,$thn1,$thn2) { //abcde
    if(isset($nis) AND isset($semester) AND isset($thn1) AND isset($thn2)) {
      $tahun_ajar = $thn1.'/'.$thn2;
      $asd = $this->session->userdata('u_id');
      $data_guru = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
      $data_peserta = $this->m_sdpa->get_data("peserta", "where nis = '$nis' and thn_ajar='$tahun_ajar'");
      $DP = $data_peserta[0]['kd_kelas'];
      $data_siswa = $this->m_sdpa->get_data("siswa", "where nis = '$nis' ");
      $data_latihan = $this->m_sdpa->get_data("latihan");
      $data_mapel = $this->m_sdpa->get_data("mapel");
      $data_kuis = $this->m_sdpa->get_data("kuis");
      $data_kelas = $this->m_sdpa->get_data("kelas" , "where kd_kelas='$DP'");
      $data_jadwal = $this->m_sdpa->get_data("jadwal", "where kd_jadwal='$jadwal' ");
      $data_uas = $this->m_sdpa->get_data("uas", "where kd_jadwal='$jadwal'  and semester='$semester' ");
      $data_uts = $this->m_sdpa->get_data("uts", "where kd_jadwal='$jadwal'  and semester='$semester' ");
      $data_term = $this->m_sdpa->get_data("term", "where kd_jadwal='$jadwal' and semester='$semester' ");
      $data_term_dist = $this->m_sdpa->get_distinct_term("term", "where kd_jadwal='$jadwal' ");
      $data_ket_latihan = $this->m_sdpa->get_data("ket_latihan", "where semester='$semester' AND kd_jadwal='$jadwal' ");
      $data_ket_kuis = $this->m_sdpa->get_data("ket_kuis", "where semester='$semester' AND kd_jadwal='$jadwal' ");
      $data_LatihanTerm = $this->m_sdpa->getLatihanTerm("latihan", "where semester='$semester' and kd_jadwal='$jadwal' ");
      $data_KuisTerm = $this->m_sdpa->getKuisTerm("kuis", "where semester='$semester' and kd_jadwal='$jadwal' ");
      $data_hasil_akhir = $this->m_sdpa->get_data("hasil_akhir", "where semester='$semester' and kd_jadwal='$jadwal' ");

      $all_data = array('data_latihan'      => $data_latihan,     'data_guru'     => $data_guru,      'term_distinct'     => $data_term_dist,
                        'isi_peserta'       => $data_peserta,     'isi_siswa'     => $data_siswa,     'data_kuis'         => $data_kuis,
                        'data_uas'          => $data_uas,         'data_term'     => $data_term,      'data_uts'          => $data_uts,
                        'data_ket_latihan'  => $data_ket_latihan, 'data_ket_kuis' => $data_ket_kuis,  'data_LatihanTerm'  => $data_LatihanTerm,
                        'data_KuisTerm'     => $data_KuisTerm,    'data_mapel'    => $data_mapel,     'data_jadwal'      => $data_jadwal,
                        'data_kelas'        => $data_kelas,       'data_hasil_akhir' => $data_hasil_akhir
                      );

      $this->template->load('vtemplate_laporan','sdpa_bl_lap/v_lap_nilai_rapor', $all_data);
    } else {
      redirect("dashboard");
    }
  }

  public function master_guru() {

    $data = $this->m_sdpa->get_data("guru");
    $this->template->load('vtemplate','sdpa_bl/v_lihat_guru', array('isi' => $data));

  }

  public function master_profile_guru() {
    $asd = $this->session->userdata('u_id');
    $data = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
    $data2 = $this->m_sdpa->get_data("guru", "where employee_id in (select b.Employee_id from walikelas b) and employee_id = '$asd'");
    $this->template->load('vtemplate_guru','sdpa_bl/v_profile_guru', array('isi' => $data, 'isi2' => $data2));

  }

  public function master_akun_guru() {
    $asd = $this->session->userdata('u_id');
    $data = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
    $data2 = $this->m_sdpa->get_data("guru", "where employee_id in (select b.Employee_id from walikelas b) and employee_id = '$asd'");
    $this->template->load('vtemplate_guru','sdpa_bl/v_akun_guru', array('isi' => $data, 'isi2' => $data2));

  }

  public function master_kelas() {

    $data = $this->m_sdpa->get_data("kelas");
    $this->template->load('vtemplate','sdpa_bl/v_lihat_kelas', array('isi' => $data));

  }

  public function master_mapel() {

    $data = $this->m_sdpa->get_data("mapel");
    $this->template->load('vtemplate','sdpa_bl/v_lihat_mapel', array('isi' => $data));

  }

  public function master_peserta() {

    $data = $this->m_sdpa->get_data("peserta");
    $data2 = $this->m_sdpa->get_data("kelas");
    $data3 = $this->m_sdpa->get_data("siswa");
    $this->template->load('vtemplate','sdpa_bl/v_lihat_peserta', array('isi' => $data, 'isi2' => $data2, 'isi3' => $data3));

  }

  public function master_jadwal() {

    $data = $this->m_sdpa->get_data("jadwal");
    $data2 = $this->m_sdpa->get_data("mapel");
    $data3 = $this->m_sdpa-> get_data("guru");
    $data4 = $this->m_sdpa->get_data("kelas");
    $this->template->load('vtemplate','sdpa_bl/v_lihat_jadwal', array('isi' => $data, 'isi2' => $data2, 'isi3' => $data3, 'isi4' => $data4));

  }

  public function master_jadwal_guru() {

    $asd    = $this->session->userdata('u_id');
    $data   = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
    $data4  = $this->m_sdpa->get_data_jadwal_guru("where a.employee_id=b.employee_id AND a.kd_mapel=c.kd_mapel AND a.kd_kelas=d.kd_kelas AND a.employee_id = '$asd' ");
    $data2  = $this->m_sdpa->get_data("guru", "where employee_id in (select b.Employee_id from walikelas b) and employee_id = '$asd'");
    $this->template->load('vtemplate_guru','sdpa_bl/v_lihat_jadwal_guru', array('isi' => $data, 'isi4' => $data4, 'isi2' => $data2));

  }

  public function list_rapor_siswa() {

    $asd          = $this->session->userdata('u_id');
    $tahun        = isset($_POST['thn_ajar']) ? $_POST['thn_ajar'] : '' ;
    $semester     = isset($_POST['semester']) ? $_POST['semester'] : '' ;

    $data   = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
    $data4  = $this->m_sdpa->get_data_jadwal_guru("where a.employee_id=b.employee_id AND a.kd_mapel=c.kd_mapel AND a.kd_kelas=d.kd_kelas AND a.employee_id = '$asd' ");
    $data2  = $this->m_sdpa->get_data("guru", "where employee_id in (select b.Employee_id from walikelas b) and employee_id = '$asd'");
    $data3  = $this->m_sdpa->getWalikelasDataSiswa("where a.employee_id=e.Employee_id and b.kd_kelas=d.kd_kelas and c.NIS=d.nis and d.kd_kelas=e.Kd_kelas and e.Employee_id='$asd' ");
    $data5  = $this->m_sdpa->getWalikelasRaportSiswa("where a.employee_id=e.Employee_id and b.kd_kelas=d.kd_kelas and c.NIS=d.nis and d.kd_kelas=e.Kd_kelas and f.kd_jadwal=h.kd_jadwal and g.kd_mapel=h.kd_mapel and f.nis=c.nis and f.tahun='$tahun' and f.semester='$semester' and e.Employee_id='$asd' ");

    $this->template->load('vtemplate_guru','sdpa_bl/v_lihat_siswa_rapor', array('isi' => $data, 'isi4' => $data4, 'isi3' => $data3, 'isi2' => $data2, 'isi5' => $data5));

  }

  public function master_walikelas_data_siswa() {

    $asd    = $this->session->userdata('u_id');
    $data   = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
    $data4  = $this->m_sdpa->get_data_jadwal_guru("where a.employee_id=b.employee_id AND a.kd_mapel=c.kd_mapel AND a.kd_kelas=d.kd_kelas AND a.employee_id = '$asd' ");
    $data2  = $this->m_sdpa->get_data("guru", "where employee_id in (select b.Employee_id from walikelas b) and employee_id = '$asd'");
    $data3  = $this->m_sdpa->getWalikelasDataSiswa("where a.employee_id=e.Employee_id and b.kd_kelas=d.kd_kelas and c.NIS=d.nis and d.kd_kelas=e.Kd_kelas and e.Employee_id='$asd' ");

    $this->template->load('vtemplate_guru','sdpa_bl/v_lihat_siswa_walikelas', array('isi' => $data, 'isi4' => $data4, 'isi3' => $data3, 'isi2' => $data2));

  }

  public function pilih_tahun() {
    $asd = $this->session->userdata('u_id');
    $data = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
    $data2 = $this->m_sdpa->get_data("guru", "where employee_id in (select b.Employee_id from walikelas b) and employee_id = '$asd'");
    $this->template->load('vtemplate_guru','sdpa_bl/v_penilaian_guru', array('isi' => $data, 'isi2' => $data2));
  }

  public function pilih_tahun_lap() {

    $this->template->load('vtemplate','sdpa_bl/v_pilih_tahun_lap', array());
  }

  public function laporan($item="") {
    $thn = $_GET['thn_ajar'];
    $sms = $_GET['semester'];
    $data_item = $this->m_sdpa->get_data($item, "where thn_ajar= '$thn' and semester='$sms' ");
    $data_peserta = $this->m_sdpa->get_data("peserta", "where thn_ajar= '$thn' ");
    $data_siswa = $this->m_sdpa->get_data("siswa");
    $this->template->load('vtemplate','sdpa_bl/v_lap_kelas', array('data_item' => $data_item, 'data_peserta' => $data_peserta, 'data_siswa' => $data_siswa));
  }

  public function tahun_wali() {
    $asd    = $this->session->userdata('u_id');
    $data   = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
    $data2  = $this->m_sdpa->get_data("guru", "where employee_id in (select b.Employee_id from walikelas b) and employee_id = '$asd'");
    $this->template->load('vtemplate_guru','sdpa_bl/v_tahun_wali', array('isi' => $data, 'isi2' => $data2));
  }
  
  public function tahun_rapor() {
      $asd    = $this->session->userdata('u_id');
      $data   = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
      $data2  = $this->m_sdpa->get_data("guru", "where employee_id in (select b.Employee_id from walikelas b) and employee_id = '$asd'");
      $this->template->load('vtemplate_guru','sdpa_bl/v_pilthrap', array('isi' => $data, 'isi2' => $data2));
  }

  public function rapor_siswa() {
    $kd_jdw_now   = "";
    $tahun        = isset($_POST['thn_ajar']) ? $_POST['thn_ajar'] : '' ;
    $semester     = isset($_POST['semester']) ? $_POST['semester'] : '' ;
    $asd          = $this->session->userdata('u_id');
    $data_guru    = $this->m_sdpa->get_data("guru", "where employee_id in (select b.Employee_id from walikelas b) and employee_id = '$asd'");
    $data_walkel  = $this->m_sdpa->get_data("walikelas", "where Employee_id='$asd' ");

    foreach ($data_walkel as $key_walkel) {
      if ($key_walkel['Employee_id']==$asd) {
        $kelas = $key_walkel['Kd_kelas'];
      }
    }

    $data_peserta = $this->m_sdpa->get_data("peserta", "where kd_kelas = '$kelas' order by nis");
    $data_jadwal  = $this->m_sdpa->get_data("jadwal", "where thn_ajar='$tahun' and semester='$semester' and kd_kelas='$kelas' ");

    foreach ($data_jadwal as $key_jadwal) {
        if ($kd_jdw_now == "") {
          $kd_jdw_now = "'".$key_jadwal['kd_jadwal']."'";
        } else {
          $kd_jdw_now = $kd_jdw_now.","."'".$key_jadwal['kd_jadwal']."'";
        }
    }

    $data_ket_latihan = $this->m_sdpa->get_data("ket_latihan", "where semester='$semester' AND tahun='$tahun' ");
    $data_ket_kuis= $this->m_sdpa->get_data("ket_kuis", "where semester='$semester' AND tahun='$tahun' ");
    $data_mapel   = $this->m_sdpa->get_data("mapel");
    $data_siswa   = $this->m_sdpa->get_data("siswa");
    $data_guru2   = $this->m_sdpa->get_data("guru");
    $data_latihan = $this->m_sdpa->get_data("latihan", "where kd_jadwal in ($kd_jdw_now) order by kd_lat");
    $data_kuis    = $this->m_sdpa->get_data("kuis", "where kd_jadwal in ($kd_jdw_now) order by kd_kuis");
    $data_term    = $this->m_sdpa->get_data("term", "where kd_jadwal in ($kd_jdw_now) order by kd_term ");
    $data_uas     = $this->m_sdpa->get_data("uas", "where kd_jadwal in ($kd_jdw_now) order by kd_uas");
    $data_uts     = $this->m_sdpa->get_data("uts", "where kd_jadwal in ($kd_jdw_now) order by kd_uts");
    $data_hasil_akhir = $this->m_sdpa->get_data("hasil_akhir", "where kd_jadwal in ($kd_jdw_now) order by kd_hasil_akhir");

    $this->template->load('vtemplate_guru','sdpa_bl/v_report_siswa', array(
      'data_latihan' => $data_latihan, 'isi' => $data_guru,'isi_peserta' => $data_peserta,
      'isi_siswa' => $data_siswa, 'data_kuis' => $data_kuis, 'data_uas' => $data_uas,
      'data_uts' => $data_uts, 'data_jadwal' => $data_jadwal, 'data_mapel' => $data_mapel,
      'cekw' => $kelas." - ".$semester." - ".$tahun.$kd_jdw_now, 'data_guru2' => $data_guru2,
      'isi2' => $data_guru, 'data_ket_latihan' => $data_ket_latihan, 'data_ket_kuis' => $data_ket_kuis, 'data_term' => $data_term,
      'data_hasil_akhir' => $data_hasil_akhir
    ));
  }

  public function report_siswa() {
    $kd_jdw_now   = "";
    $tahun        = isset($_POST['thn_ajar']) ? $_POST['thn_ajar'] : '' ;
    $semester     = isset($_POST['semester']) ? $_POST['semester'] : '' ;
    $asd          = $this->session->userdata('u_id');
    $data_guru    = $this->m_sdpa->get_data("guru", "where employee_id in (select b.Employee_id from walikelas b) and employee_id = '$asd'");
    $data_walkel  = $this->m_sdpa->get_data("walikelas", "where Employee_id='$asd' ");

    foreach ($data_walkel as $key_walkel) {
      if ($key_walkel['Employee_id']==$asd) {
        $kelas = $key_walkel['Kd_kelas'];
      }
    }

    $data_peserta = $this->m_sdpa->get_data("peserta", "where kd_kelas = '$kelas' order by nis");
    $data_jadwal  = $this->m_sdpa->get_data("jadwal", "where thn_ajar='$tahun' and semester='$semester' and kd_kelas='$kelas' ");

    foreach ($data_jadwal as $key_jadwal) {
        if ($kd_jdw_now == "") {
          $kd_jdw_now = "'".$key_jadwal['kd_jadwal']."'";
        } else {
          $kd_jdw_now = $kd_jdw_now.","."'".$key_jadwal['kd_jadwal']."'";
        }
    }

    $data_ket_latihan = $this->m_sdpa->get_data("ket_latihan", "where semester='$semester' AND tahun='$tahun' ");
    $data_ket_kuis= $this->m_sdpa->get_data("ket_kuis", "where semester='$semester' AND tahun='$tahun' ");
    $data_mapel   = $this->m_sdpa->get_data("mapel");
    $data_siswa   = $this->m_sdpa->get_data("siswa");
    $data_guru2   = $this->m_sdpa->get_data("guru");
    $data_latihan = $this->m_sdpa->get_data("latihan", "where kd_jadwal in ($kd_jdw_now) order by kd_lat");
    $data_kuis    = $this->m_sdpa->get_data("kuis", "where kd_jadwal in ($kd_jdw_now) order by kd_kuis");
    $data_term    = $this->m_sdpa->get_data("term", "where kd_jadwal in ($kd_jdw_now) order by kd_term ");
    $data_uas     = $this->m_sdpa->get_data("uas", "where kd_jadwal in ($kd_jdw_now) order by kd_uas");
    $data_uts     = $this->m_sdpa->get_data("uts", "where kd_jadwal in ($kd_jdw_now) order by kd_uts");
    $data_hasil_akhir = $this->m_sdpa->get_data("hasil_akhir", "where kd_jadwal in ($kd_jdw_now) order by kd_hasil_akhir");

    $this->template->load('vtemplate_guru','sdpa_bl/v_report_siswa', array(
      'data_latihan' => $data_latihan, 'isi' => $data_guru,'isi_peserta' => $data_peserta,
      'isi_siswa' => $data_siswa, 'data_kuis' => $data_kuis, 'data_uas' => $data_uas,
      'data_uts' => $data_uts, 'data_jadwal' => $data_jadwal, 'data_mapel' => $data_mapel,
      'cekw' => $kelas." - ".$semester." - ".$tahun.$kd_jdw_now, 'data_guru2' => $data_guru2,
      'isi2' => $data_guru, 'data_ket_latihan' => $data_ket_latihan, 'data_ket_kuis' => $data_ket_kuis, 'data_term' => $data_term,
      'data_hasil_akhir' => $data_hasil_akhir
    ));
  }

  public function daftar_jadwal($tahun='', $semester='') {
    $asd = $this->session->userdata('u_id');
    $tahun     = isset($_GET['thn_ajar']) ? $_GET['thn_ajar'] : '' ;
    $semester  = isset($_GET['semester']) ? $_GET['semester'] : '' ;

    $data  = $this->m_sdpa->get_data("jadwal", "where thn_ajar='$tahun' and semester='$semester' and employee_id='$asd' ");
    $data2 = $this->m_sdpa->get_data("mapel");
    $data3 = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
    $data4 = $this->m_sdpa->get_data("guru", "where employee_id in (select b.Employee_id from walikelas b) and employee_id = '$asd'");

    $this->template->load('vtemplate_guru','sdpa_bl/v_daftar_jadwal', array('isi_jadwal' => $data, 'isi_mapel' => $data2, 'isi' => $data3, 'isi2' => $data4));
  }

  public function master_nilai($semester,$kelas,$jadwal) { //abcde

    if(isset($kelas) AND isset($jadwal)) {
        $asd = $this->session->userdata('u_id');
        $data_guru = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
        $data_peserta = $this->m_sdpa->get_data("peserta", "where kd_kelas = '$kelas' ");
        $data_siswa = $this->m_sdpa->get_data("siswa");
        $data_latihan = $this->m_sdpa->get_data("latihan","where kd_jadwal='$jadwal' and semester='$semester' ");
        $data_kuis = $this->m_sdpa->get_data("kuis","where kd_jadwal='$jadwal' and semester='$semester' ");
        $data_uas = $this->m_sdpa->get_data("uas", "where kd_jadwal='$jadwal' and semester='$semester' ");
        $data_uts = $this->m_sdpa->get_data("uts", "where kd_jadwal='$jadwal' and semester='$semester' ");
        $data_term = $this->m_sdpa->get_data("term", "where kd_jadwal='$jadwal' and semester='$semester' ");
        $data2 = $this->m_sdpa->get_data("guru", "where employee_id in (select b.Employee_id from walikelas b) and employee_id = '$asd'");
        $data_ket_latihan = $this->m_sdpa->get_data("ket_latihan", "where semester='$semester' AND kd_jadwal='$jadwal' ");
        $data_ket_kuis = $this->m_sdpa->get_data("ket_kuis", "where semester='$semester' AND kd_jadwal='$jadwal' ");
        $data_LatihanTerm = $this->m_sdpa->getLatihanTerm("latihan", "where semester='$semester' and kd_jadwal='$jadwal' ");
        $data_KuisTerm = $this->m_sdpa->getKuisTerm("kuis", "where semester='$semester' and kd_jadwal='$jadwal' ");
        $data_hasil_akhir = $this->m_sdpa->get_data("hasil_akhir", "where semester='$semester' and kd_jadwal='$jadwal' ");

        $this->template->load('vtemplate_guru','sdpa_bl/v_data_nilai', array('data_latihan' => $data_latihan, 'a'=> $jadwal, 'isi' => $data_guru,
        'isi_peserta' => $data_peserta, 'isi_siswa' => $data_siswa, 'data_kuis' => $data_kuis, 'data_uas' => $data_uas, 'data_term' => $data_term,
        'data_uts' => $data_uts, 'isi2' => $data2, 'data_ket_latihan' => $data_ket_latihan, 'data_ket_kuis' => $data_ket_kuis,
        'data_LatihanTerm' => $data_LatihanTerm, 'data_KuisTerm' => $data_KuisTerm, 'data_hasil_akhir' => $data_hasil_akhir));
    } else {
        redirect("dashboard");
    }
  }

  // ISI LATIHAN
  public function isi_latihan($semester, $kelas, $jadwal) {
    $asd = $this->session->userdata('u_id');
    $data_guru = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
    $data_peserta = $this->m_sdpa->get_data("peserta", "where kd_kelas = '$kelas' ");
    $data_siswa = $this->m_sdpa->get_data("siswa");
    // $data_latihan = $this->m_sdpa->get_data_latihan();

    $query = $this->db->query("select * from latihan where kd_jadwal='$jadwal' and semester='$semester' ");
    $maxdat = $this->m_sdpa->cek_max_lat("where kd_jadwal='$jadwal' ");
    foreach ($maxdat as $keymax) {
    }
    $isimax = $keymax['maxlat'];
    if($query->num_rows() > 0 ) {
      $a = substr($isimax, -1);
      $b = substr($isimax,0,5); //LT0001
      $c = $a+1;
      $kd_latihan = $b.$c;
    } else {
      $kd_latihan = "LT0001";
    }

    $tahun_skrng = date("Y");
    $tahun_depan = date("Y")+1;
    $tahun_yg_dicari = $tahun_skrng."/".$tahun_depan;
    foreach ($data_peserta as $key_p) {
      $as = $key_p['nis'];
      $nilai_latihan = array(
        'kd_lat' => $kd_latihan,
        'kd_jadwal'=> $jadwal,
        'nis' => $key_p['nis'],
        'nilai' => $_POST[$as],
        'tahun' => $tahun_yg_dicari,
        'semester' => $semester
      );
      $this->m_sdpa->insert_data("latihan", $nilai_latihan);
    }

    $data_keterangan = array(
      'kd_ket_latihan' => $kd_latihan,
      'kd_jadwal'=> $jadwal,
      'tahun' => $tahun_yg_dicari,
      'semester' => $semester,
      'keterangan_latihan' => $_POST['keterangan']
    );

    $this->m_sdpa->insert_data("ket_latihan", $data_keterangan);

    redirect("dashboard/master_nilai/$semester/$kelas/$jadwal");
  }

  // ISI KUIS
  public function isi_kuis($semester, $kelas, $jadwal) {
    $asd = $this->session->userdata('u_id');
    $data_guru = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
    $data_peserta = $this->m_sdpa->get_data("peserta", "where kd_kelas = '$kelas' ");
    $data_siswa = $this->m_sdpa->get_data("siswa");

    $query = $this->db->query("select * from kuis where kd_jadwal='$jadwal' and semester='$semester' ");
    $maxdat = $this->m_sdpa->cek_max_kuis("where kd_jadwal='$jadwal' ");
    foreach ($maxdat as $keymax) {
    }
    $isimax = $keymax['maxkuis'];
    if($query->num_rows() > 0 ) {
      $a = substr($isimax, -1);
      $b = substr($isimax,0,5); //QZ0001
      $c = $a+1;
      $kd_kuis = $b.$c;
    } else {
      $kd_kuis = "QZ0001";
    }

    $tahun_skrng = date("Y");
    $tahun_depan = date("Y")+1;
    $tahun_yg_dicari = $tahun_skrng."/".$tahun_depan;
    foreach ($data_peserta as $key_p) {
      $as = $key_p['nis'];
      $nilai_kuis = array(
        'kd_kuis' => $kd_kuis,
        'kd_jadwal'=> $jadwal,
        'nis' => $key_p['nis'],
        'nilai' => $_POST[$as],
        'tahun' => $tahun_yg_dicari,
        'semester' => $semester
      );
      $this->m_sdpa->insert_data('kuis', $nilai_kuis);
    }

    $data_keterangan = array(
      'kd_ket_kuis' => $kd_kuis,
      'kd_jadwal'=> $jadwal,
      'tahun' => $tahun_yg_dicari,
      'semester' => $semester,
      'keterangan_kuis' => $_POST['keterangan']
    );

    $this->m_sdpa->insert_data('ket_kuis', $data_keterangan);

    redirect("dashboard/master_nilai/$semester/$kelas/$jadwal");
  }

  // ISI TERM
  public function isi_term($semester, $kelas, $jadwal) {
    $asd = $this->session->userdata('u_id');
    $data_guru = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
    $data_peserta = $this->m_sdpa->get_data("peserta", "where kd_kelas = '$kelas' ");
    $data_siswa = $this->m_sdpa->get_data("siswa");

    $query = $this->db->query("select * from term where kd_jadwal='$jadwal'");
    $maxdat = $this->m_sdpa->cek_max_term("where kd_jadwal='$jadwal' ");
    $data_latihan = $this->m_sdpa->get_data("latihan","where kd_jadwal = '$jadwal' and semester='$semester'");
    $data_kuis = $this->m_sdpa->get_data("kuis","where kd_jadwal = '$jadwal' and semester='$semester'");

    foreach ($maxdat as $keymax) {}

    $isimax = $keymax['maxterm'];
    if($query->num_rows() > 0) {
      $a = substr($isimax, -1);
      $b = substr($isimax,0,5);
      $c = $a+1;
      $kd_term = $b.$c;
    } else {
      $kd_term = "TR0001";
    }

    $tahun_skrng = date("Y");
    $tahun_depan = date("Y")+1;
    $tahun_yg_dicari = $tahun_skrng."/".$tahun_depan;
    foreach ($data_peserta as $key_p) {
        $as = $key_p['nis'];

        $select= $_POST['select'];

        $hitung = count($select);
        //$p = 0;
        $l = 0;
        $s = "";

        for($i=0;$i<$hitung;$i++){

          $x = explode(",", $select[$i]);
          $y = count($x)-1;

          for ($j=0; $j<$y ; $j++) {

            $n[$j] = substr($x[$j], 0,7);
            $m[$j] = substr($x[$j], 8,3);
            $o[$j] = substr($x[$j], 11,7); //tandain

            $gg = $o[$j];
            if($n[$j] == $key_p['nis']) {
              //$p = $p+1;
              $l = $l+$m[$j];
              $hasil_nilai = $l/$hitung;

              if($hasil_nilai < 70 ) {
                $ndw = 'N';
              } else if ($hasil_nilai < 80) {
                $ndw = 'D';
              } else {
                $ndw = 'W';
              }
            }

            foreach ($data_latihan as $key_data_latihan) {
                if($o[$j]==$key_data_latihan['kd_lat']) {
                  $gg = $o[$j];

                  $data_update_lat= array(
                    'trm' => '1'
                  );

                  $this->m_sdpa->update_data('latihan', $data_update_lat, array('kd_lat' => $key_data_latihan['kd_lat'], 'kd_jadwal' => $jadwal));
                }
            }

            foreach ($data_kuis as $key_data_kuis) {
                if($o[$j]==$key_data_kuis['kd_kuis']) {
                  $gg = $o[$j];

                  $data_update_lat= array(
                    'trm' => '1'
                  );

                  $this->m_sdpa->update_data('kuis', $data_update_lat, array('kd_kuis' => $key_data_kuis['kd_kuis'], 'kd_jadwal' => $jadwal));
                }
            }
          }

          if($s == "") {
            $s = $gg;
          } else {
            $s = $s."-".$gg;
          }

        }

        $nilai_term = array(
          'kd_term' => $kd_term,
          'kd_jadwal'=> $jadwal,
          'nis' => $key_p['nis'],
          'nilai' => $_POST[$as],
          'tahun' => $tahun_yg_dicari,
          'semester' => $semester,
          'nilai' => $hasil_nilai,
          'ket' => $s,
          'ndw' => $ndw
        );
        $this->m_sdpa->insert_data('term', $nilai_term);

      }

    redirect("dashboard/master_nilai/$semester/$kelas/$jadwal");
  }

    // ISI UAS
    public function isi_uas($semester, $kelas, $jadwal) {
      $asd = $this->session->userdata('u_id');
      $data_guru = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
      $data_peserta = $this->m_sdpa->get_data("peserta", "where kd_kelas = '$kelas' ");
      $data_siswa = $this->m_sdpa->get_data("siswa");

      $query = $this->db->query("select * from uas where kd_jadwal='$jadwal' and semester='$semester' ");
      $maxdat = $this->m_sdpa->cek_max_uas("where kd_jadwal='$jadwal' ");
      foreach ($maxdat as $keymax) {
      }
      $isimax = $keymax['maxuas'];
      if($query->num_rows() > 0 ) {
        $a = substr($isimax, -1);
        $b = substr($isimax,0,5); //QZ0001
        $c = $a+1;
        $kd_uas = $b.$c;
      } else {
        $kd_uas = "UA0001";
      }

      $tahun_skrng = date("Y");
      $tahun_depan = date("Y")+1;
      $tahun_yg_dicari = $tahun_skrng."/".$tahun_depan;
      foreach ($data_peserta as $key_p) {
        $as = $key_p['nis'];
        $nilai_uas = array(
          'kd_uas' => $kd_uas,
          'kd_jadwal'=> $jadwal,
          'nis' => $key_p['nis'],
          'nilai' => $_POST[$as],
          'tahun' => $tahun_yg_dicari,
          'semester' => $semester
        );
        $this->m_sdpa->insert_data('uas', $nilai_uas);
      }
      redirect("dashboard/master_nilai/$semester/$kelas/$jadwal");
    }

    // ISI UTS
    public function isi_uts($semester, $kelas, $jadwal) {
      $asd = $this->session->userdata('u_id');
      $data_guru = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
      $data_peserta = $this->m_sdpa->get_data("peserta", "where kd_kelas = '$kelas' ");
      $data_siswa = $this->m_sdpa->get_data("siswa");

      $query = $this->db->query("select * from uts where kd_jadwal='$jadwal'");
      $maxdat = $this->m_sdpa->cek_max_uts("where kd_jadwal='$jadwal' ");
      foreach ($maxdat as $keymax) {
      }
      $isimax = $keymax['maxuts'];
      if($query->num_rows() > 0 ) {
        $a = substr($isimax, -1);
        $b = substr($isimax,0,5); //QZ0001
        $c = $a+1;
        $kd_uts = $b.$c;
      } else {
        $kd_uts = "UT0001";
      }

      $tahun_skrng = date("Y");
      $tahun_depan = date("Y")+1;
      $tahun_yg_dicari = $tahun_skrng."/".$tahun_depan;
      foreach ($data_peserta as $key_p) {
        $as = $key_p['nis'];
        $nilai_uts = array(
          'kd_uts' => $kd_uts,
          'kd_jadwal'=> $jadwal,
          'nis' => $key_p['nis'],
          'nilai' => $_POST[$as],
          'tahun' => $tahun_yg_dicari,
          'semester' => $semester
        );
        $this->m_sdpa->insert_data('uts', $nilai_uts);
      }
      redirect("dashboard/master_nilai/$semester/$kelas/$jadwal");
    }

    // ISI HASIL AKHIR
    public function isi_hasil_akhir($semester, $kelas, $jadwal) {
      $asd = $this->session->userdata('u_id');
      $data_guru = $this->m_sdpa->get_data("guru", "where employee_id = '$asd' ");
      $data_peserta = $this->m_sdpa->get_data("peserta", "where kd_kelas = '$kelas' ");
      $data_siswa = $this->m_sdpa->get_data("siswa");
      $data_term = $this->m_sdpa->get_data("term","where kd_jadwal = '$jadwal' and semester='$semester'");
      $data_uts = $this->m_sdpa->get_data("uts","where kd_jadwal = '$jadwal' and semester='$semester'");
      $data_uas = $this->m_sdpa->get_data("uas","where kd_jadwal = '$jadwal' and semester='$semester'");

      $query = $this->db->query("select * from hasil_akhir where kd_jadwal='$jadwal'");
      $maxdat = $this->m_sdpa->cek_max_hasil_akhir("where kd_jadwal='$jadwal' ");
      foreach ($maxdat as $keymax) {}
      $isimax = $keymax['maxhasilakhir'];
      if($query->num_rows() > 0 ) {
        $a = substr($isimax, -1);
        $b = substr($isimax,0,5); //QZ0001
        $c = $a+1;
        $kd_hasil_akhir = $b.$c;
      } else {
        $kd_hasil_akhir = "HA0001";
      }

      $tahun_skrng = date("Y");
      $tahun_depan = date("Y")+1;
      $tahun_yg_dicari = $tahun_skrng."/".$tahun_depan;
      foreach ($data_peserta as $key_p) {

        $a_term = 0;
        $no_term = 1;
        foreach ($data_term as $key_data_term) {
            if($key_p['nis'] == $key_data_term['nis']) {
                $a_term = $a_term+$key_data_term['nilai'];
                $b_term = $a_term/$no_term;
                $no_term++;
            }
        }

        foreach ($data_uts as $key_data_uts) {
            if($key_p['nis'] == $key_data_uts['nis']) {
                $a_uts = $key_data_uts['nilai'];
            }
        }

        foreach ($data_uas as $key_data_uas) {
            if($key_p['nis'] == $key_data_uas['nis']) {
                $a_uas = $key_data_uas['nilai'];
            }
        }

        $a_hasil_akhir = ($b_term+$a_uts+$a_uas)/3;

        if($a_hasil_akhir < 70) {
          $ndw = 'N';
        } else if ($a_hasil_akhir < 80) {
          $ndw = 'D';
        } else {
          $ndw = 'W';
        }

        $as = $key_p['nis'];
        $nilai_hasil_akhir = array(
          'kd_hasil_akhir' => $kd_hasil_akhir,
          'kd_jadwal'=> $jadwal,
          'nis' => $key_p['nis'],
          'nilai' => $a_hasil_akhir,
          'tahun' => $tahun_yg_dicari,
          'semester' => $semester,
          'ndw' => $ndw
        );

        $this->m_sdpa->insert_data('hasil_akhir', $nilai_hasil_akhir);
      }
      redirect("dashboard/master_nilai/$semester/$kelas/$jadwal");
    }

    // CRUD GURU
    public function do_insert_guru() {

      $this->load->library('upload');
      $nmfile                   = "file_".time();
      $config['upload_path']    = './assets/uploads/';
      $config['allowed_types']  = 'gif|jpg|png';
      $config['max_size']       = 2048;
      $config['max_width']      = 1024;
      $config['max_height']     = 768;
      $config['file_name']      = $nmfile;

      $this->upload->initialize($config);
      $this->upload->do_upload('foto');

      $gbr  = $this->upload->data();
      $foto = base_url()."assets/uploads/".$gbr['file_name'];

      $data_insert = array(
        'employee_id'       => $_POST['employee_id'],   'NIP'               => $_POST['nip'],
        'NUPTK'             => $_POST['nuptk'],         'nama_guru'         => $_POST['nama'],
        'tempat_lahir'      => $_POST['tmpt_lhr'],      'tanggal_lahir'     => $_POST['tgl_lhr'],
        'jenis_kelamin'     => $_POST['jenkel'],        'alamat'            => $_POST['alamat'],
        'agama'             => $_POST['agama'],         'kewarganegaraan'   => $_POST['kwngrn'],
        'warga_negara'      => $_POST['wrg_ngr'],       'status_anak'       => $_POST['stat_anak'],
        'anak_ke'           => $_POST['anak_ke'],       'status_pernikahan' => $_POST['stat_nikah'],
        'tahun_menikah'     => $_POST['thn_mnkh'],      'telp_rumah'        => $_POST['telp_rmh'],
        'no_hp'             => $_POST['no_hp'],         'email'             => $_POST['email'],
        'jml_saudara'       => $_POST['jml_sdr'],       'thn_mulai_tugas'   => $_POST['thn_tgs'],
        'no_sk_dinas'       => $_POST['no_sk_dns'],     'tgl_sk_dinas'      => $_POST['tgl_sk_dns'],
        'bdg_studi_ajar'    => $_POST['b_studi_ajar'],  'mutasi_dari'       => $_POST['mutasi_dari'],
        'no_sk_mutasi'      => $_POST['no_sk_mutasi'],  'stat_karyawan'     => $_POST['stat_kar'],
        'gol_darah'         => $_POST['gol_dar'],       'foto'              => $foto, //$_POST['foto'],
        'tempat_bekerja'    => $_POST['tmpt_krj'],      'jabatan'           => $_POST['jbtn'],
        'pangkat_golongan'  => $_POST['pgkt_gol'],      'stat_pegawai'      => $_POST['stat_pegawai'],
        'mengajar_dikelas'  => $_POST['mgjr_kls'],      'tugas_tambahan'    => $_POST['tgs_tmbhn'],
        'tgkt_jnjg_pddkn'   => $_POST['pddk_terakhir'], 'thn_msk_pddkn'     => $_POST['thn_msk_pddk'],
        'thn_lulus_pddkn'   => $_POST['thn_lls_pddk'],  'nama_bapak'        => $_POST['nm_bpk'],
        'nama_ibu'          => $_POST['nm_ibu'],        'nama_suami'        => $_POST['nm_sm'],
        'nama_istri'        => $_POST['nm_is'],         'tinggi_badan'      => $_POST['tg_bdn'],
        'berat_badan'       => $_POST['brt_bdn'],       'wajah'             => $_POST['wajah'],
        'rambut'            => $_POST['rambut'],        'pykt_derita'       => $_POST['riw_pykt'],
        'keahlian'          => $_POST['keahlian']
      );

      $res = $this->m_sdpa->insert_data('guru', $data_insert);
      if ($res == 1) {
        $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button><p align="center">Tambah data SUKSES!</p></div>';
      } elseif($res==1062) {
        $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Tambah data GAGAL! Employee_id sudah ada!</div>';
      } else {
        $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Tambah data GAGAL! '.$res.'</div>';
        // $notif = "<h2 class='jumbotron'> Tambah kelas GAGAL! </h2>";
      }
      $this->session->set_flashdata('pesan', $notif);
      redirect("dashboard/master_guru");
    }

    public function do_edit_guru() {
      $this->load->library('upload');
      $nmfile                   = "file_".time();
      $config['upload_path']    = './assets/uploads/';
      $config['allowed_types']  = 'gif|jpg|png';
      $config['max_size']       = 2048;
      $config['max_width']      = 1024;
      $config['max_height']     = 768;
      $config['file_name']      = $nmfile;

      $this->upload->initialize($config);
      $this->upload->do_upload('fotox');

      $gbr  = $this->upload->data();
      $foto = base_url()."assets/uploads/".$gbr['file_name'];

      /*$employee_id = $_POST['employee_id'];
      $data = $this->m_sdpa->get_data_guru("where employee_id='$employee_id'");


      if($_FILES['fotox']['size']!=0) {
      $foto = base_url()."assets/uploads/".$gbr['file_name'];
    } else {
    foreach ($data as $key_data) {
    $foto = $key_data['foto'];
  }
}*/

if($_FILES['fotox']['size']!=0) {
  $data_update = array(
    'employee_id'       => $_POST['employee_id'],   'NIP'               => $_POST['nip'],
    'NUPTK'             => $_POST['nuptk'],         'nama_guru'         => $_POST['nama'],
    'tempat_lahir'      => $_POST['tmpt_lhr'],      'tanggal_lahir'     => $_POST['tgl_lhr'],
    'jenis_kelamin'     => $_POST['jenkel'],        'alamat'            => $_POST['alamat'],
    'agama'             => $_POST['agama'],         'kewarganegaraan'   => $_POST['kwngrn'],
    'warga_negara'      => $_POST['wrg_ngr'],       'status_anak'       => $_POST['stat_anak'],
    'anak_ke'           => $_POST['anak_ke'],       'status_pernikahan' => $_POST['stat_nikah'],
    'tahun_menikah'     => $_POST['thn_mnkh'],      'telp_rumah'        => $_POST['telp_rmh'],
    'no_hp'             => $_POST['no_hp'],         'email'             => $_POST['email'],
    'jml_saudara'       => $_POST['jml_sdr'],       'thn_mulai_tugas'   => $_POST['thn_tgs'],
    'no_sk_dinas'       => $_POST['no_sk_dns'],     'tgl_sk_dinas'      => $_POST['tgl_sk_dns'],
    'bdg_studi_ajar'    => $_POST['b_studi_ajar'],  'mutasi_dari'       => $_POST['mutasi_dari'],
    'no_sk_mutasi'      => $_POST['no_sk_mutasi'],  'stat_karyawan'     => $_POST['stat_kar'],
    'gol_darah'         => $_POST['gol_dar'],       'foto'              => $foto,
    'tempat_bekerja'    => $_POST['tmpt_krj'],      'jabatan'           => $_POST['jbtn'],
    'pangkat_golongan'  => $_POST['pgkt_gol'],      'stat_pegawai'      => $_POST['stat_pegawai'],
    'mengajar_dikelas'  => $_POST['mgjr_kls'],      'tugas_tambahan'    => $_POST['tgs_tmbhn'],
    'tgkt_jnjg_pddkn'   => $_POST['pddk_terakhir'], 'thn_msk_pddkn'     => $_POST['thn_msk_pddk'],
    'thn_lulus_pddkn'   => $_POST['thn_lls_pddk'],  'nama_bapak'        => $_POST['nm_bpk'],
    'nama_ibu'          => $_POST['nm_ibu'],        'nama_suami'        => $_POST['nm_sm'],
    'nama_istri'        => $_POST['nm_is'],         'tinggi_badan'      => $_POST['tg_bdn'],
    'berat_badan'       => $_POST['brt_bdn'],       'wajah'             => $_POST['wajah'],
    'rambut'            => $_POST['rambut'],        'pykt_derita'       => $_POST['riw_pykt'],
    'keahlian'          => $_POST['keahlian']
  );
} else {
  $data_update = array(
    'employee_id'       => $_POST['employee_id'],   'NIP'               => $_POST['nip'],
    'NUPTK'             => $_POST['nuptk'],         'nama_guru'         => $_POST['nama'],
    'tempat_lahir'      => $_POST['tmpt_lhr'],      'tanggal_lahir'     => $_POST['tgl_lhr'],
    'jenis_kelamin'     => $_POST['jenkel'],        'alamat'            => $_POST['alamat'],
    'agama'             => $_POST['agama'],         'kewarganegaraan'   => $_POST['kwngrn'],
    'warga_negara'      => $_POST['wrg_ngr'],       'status_anak'       => $_POST['stat_anak'],
    'anak_ke'           => $_POST['anak_ke'],       'status_pernikahan' => $_POST['stat_nikah'],
    'tahun_menikah'     => $_POST['thn_mnkh'],      'telp_rumah'        => $_POST['telp_rmh'],
    'no_hp'             => $_POST['no_hp'],         'email'             => $_POST['email'],
    'jml_saudara'       => $_POST['jml_sdr'],       'thn_mulai_tugas'   => $_POST['thn_tgs'],
    'no_sk_dinas'       => $_POST['no_sk_dns'],     'tgl_sk_dinas'      => $_POST['tgl_sk_dns'],
    'bdg_studi_ajar'    => $_POST['b_studi_ajar'],  'mutasi_dari'       => $_POST['mutasi_dari'],
    'no_sk_mutasi'      => $_POST['no_sk_mutasi'],  'stat_karyawan'     => $_POST['stat_kar'],
    'gol_darah'         => $_POST['gol_dar'],
    'tempat_bekerja'    => $_POST['tmpt_krj'],      'jabatan'           => $_POST['jbtn'],
    'pangkat_golongan'  => $_POST['pgkt_gol'],      'stat_pegawai'      => $_POST['stat_pegawai'],
    'mengajar_dikelas'  => $_POST['mgjr_kls'],      'tugas_tambahan'    => $_POST['tgs_tmbhn'],
    'tgkt_jnjg_pddkn'   => $_POST['pddk_terakhir'], 'thn_msk_pddkn'     => $_POST['thn_msk_pddk'],
    'thn_lulus_pddkn'   => $_POST['thn_lls_pddk'],  'nama_bapak'        => $_POST['nm_bpk'],
    'nama_ibu'          => $_POST['nm_ibu'],        'nama_suami'        => $_POST['nm_sm'],
    'nama_istri'        => $_POST['nm_is'],         'tinggi_badan'      => $_POST['tg_bdn'],
    'berat_badan'       => $_POST['brt_bdn'],       'wajah'             => $_POST['wajah'],
    'rambut'            => $_POST['rambut'],        'pykt_derita'       => $_POST['riw_pykt'],
    'keahlian'          => $_POST['keahlian']
  );
}

$res = $this->m_sdpa->update_data('guru', $data_update, array('employee_id' => $_POST['employee_id']) );

if ($res >= 1) {
  $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
  </button><p align="center">Ubah data SUKSES!</p></div>';
} else {
  $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
  </button><p align="center">Ubah data GAGAL!</p></div>';
}
$this->session->set_flashdata('pesan', $notif);
redirect("dashboard/master_guru");
}

public function do_edit_akun_guru() {
  $asd = $this->session->userdata('u_id');
  $q = $this->m_sdpa->get_pass_guru("where id_user = '$asd' ");
  foreach($q as $row)  {

    $a = $row['password'];
  }

  $nowpass   = md5($_POST['nowpass']);
  $newpass   = $_POST['newpass'];
  $renewpass = $_POST['renewpass'];
  $wew = md5($_POST['renewpass']);
  $data_update = array(
    'password'  => $wew
  );

  if($a == $nowpass) {
    if ($newpass == $renewpass) {
      $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button><p align="center">Ubah password SUKSES!</p></div>';
      $res = $this->m_sdpa->update_data('user', $data_update, array('id_user' => $asd) );

    } else {
      $notif = '<div class="alert alert-warning alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button><p align="center">Pengulangan password tidak sama, ubah password GAGAL!</p></div>';
    }
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Password saat ini tidak sama, ubah password GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_akun_guru");

}

public function do_delete_guru($employee_id)
{
  $res = $this->m_sdpa->delete_data('guru', array('employee_id' => $employee_id));

  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Hapus data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Hapus data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_guru");
}

// CRUD KELAS
public function do_insert_kelas() {

  $data_insert = array(
    'kd_kelas'  => $_POST['kd_kelas'],
    'nm_kelas'  => $_POST['nm_kelas'],
    'kapasitas' => $_POST['kapasitas']
  );

  $res = $this->m_sdpa->insert_data('kelas', $data_insert);

  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Tambah data SUKSES!</p></div>';
    // $notif = "<h2 class='jumbotron'> Tambah kelas SUKSES! </h2>";
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>Tambah data GAGAL!</div>';
    // $notif = "<h2 class='jumbotron'> Tambah kelas GAGAL! </h2>";
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_kelas");

}

public function do_edit_kelas() {
  $data_update= array(
    'kd_kelas'  => $_POST['kd_kelas'],
    'nm_kelas'  => $_POST['nm_kelas'],
    'kapasitas' => $_POST['kapasitas']
  );

  $res = $this->m_sdpa->update_data('kelas', $data_update, array('kd_kelas' => $_POST['kd_kelas']) );

  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Ubah data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Ubah data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_kelas");
}

public function do_delete_kelas($kd_kelas) {
  $res = $this->m_sdpa->delete_data('kelas', array('kd_kelas' => $kd_kelas));

  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Hapus data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Hapus data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_kelas");
}

// CRUD MAPEL
public function do_insert_mapel() {

  $data_insert = array(
    'kd_mapel'  => $_POST['kd_mapel'],
    'nm_mapel'  => $_POST['nm_mapel'],
    'kkm'       => $_POST['kkm']
  );

  $res = $this->m_sdpa->insert_data('mapel', $data_insert);
  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Tambah data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Tambah data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_mapel");
}

public function do_edit_mapel() {
  $data_update= array(
    'kd_mapel'  => $_POST['kd_mapel'],
    'nm_mapel'  => $_POST['nm_mapel'],
    'kkm'       => $_POST['kkm']
  );

  $res = $this->m_sdpa->update_data('mapel', $data_update, array('kd_mapel' => $_POST['kd_mapel']) );

  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Ubah data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Ubah data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_mapel");
}

public function do_delete_mapel($kd_mapel)
{
  $res = $this->m_sdpa->delete_data('mapel', array('kd_mapel' => $kd_mapel));

  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Hapus data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Hapus data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_mapel");
}

// CRUD PESERTA
public function do_insert_peserta() {

  $data_insert = array(
    'nis'       => $_POST['nis'],
    'kd_kelas'  => $_POST['kd_kelas'],
    'thn_ajar'  => $_POST['thn_ajar']
  );

  $res = $this->m_sdpa->insert_data('peserta', $data_insert);
  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Tambah data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Tambah data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_peserta");
}

public function do_edit_peserta($kd_peserta) {
  $data_update= array(
    'nis'       => $_POST['nis'],
    'kd_kelas'  => $_POST['kd_kelas'],
    'thn_ajar'  => $_POST['thn_ajar']
  );

  $res = $this->m_sdpa->update_data('peserta', $data_update, array('kd_peserta' => $kd_peserta));

  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Ubah data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Ubah data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_peserta");
}

public function do_delete_peserta($kd_peserta)
{
  $res = $this->m_sdpa->delete_data('peserta', array('kd_peserta' => $kd_peserta));

  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Hapus data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Hapus data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_peserta");
}

// CRUD JADWAL
public function do_insert_jadwal() {

  $data_insert = array(
    'kd_jadwal'   => $_POST['kd_jadwal'],
    'thn_ajar'    => $_POST['thn_ajar'],
    'semester'    => $_POST['semester'],
    'kd_mapel'    => $_POST['kd_mapel'],
    'employee_id' => $_POST['employee_id'],
    'kd_kelas'    => $_POST['kd_kelas'],
    'hari'        => $_POST['hari'],
    'ruang'       => $_POST['ruang']
  );

  $res = $this->m_sdpa->insert_data('jadwal', $data_insert);

  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Tambah data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Tambah data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_jadwal");
}

public function do_edit_jadwal() {
  $data_update= array(
    'thn_ajar'    => $_POST['thn_ajar'],
    'semester'    => $_POST['semester'],
    'kd_mapel'    => $_POST['kd_mapel'],
    'employee_id' => $_POST['employee_id'],
    'kd_kelas'    => $_POST['kd_kelas'],
    'hari'        => $_POST['hari'],
    'ruang'       => $_POST['ruang']
  );

  $res = $this->m_sdpa->update_data('jadwal', $data_update, array('kd_jadwal' => $_POST['kd_jadwal']) );

  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Ubah data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Ubah data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_jadwal");
}

public function do_delete_jadwal($kd_jadwal)
{
  $res = $this->m_sdpa->delete_data('jadwal', array('kd_jadwal' => $kd_jadwal));

  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Hapus data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Hapus data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_jadwal");
}

/* Walikelas */

public function master_walikelas() {

  $data = $this->m_sdpa->getWalikelas();
  $data2  = $this->m_sdpa->getUser("where a.employee_id not in (select b.Employee_id from walikelas b)");
  $data3 = $this->m_sdpa->get_data("kelas");
  $data4 = $this->m_sdpa-> get_data("guru");
  $this->template->load('vtemplate','sdpa_bl/v_lihat_walikelas', array('isi' => $data, 'isi2' => $data2, 'isi3' => $data3, 'isi4' => $data4));

}

public function do_insert_walikelas() {
  $tahun_ajar_wali= $_POST['tahun_ajar_wali'];
  $employee_id    = $_POST['employee_id'];
  $kd_kelas       = $_POST['kd_kelas'];

  $a= "N";
  $data3 = $this->m_sdpa->get_data("user", "where id_user = '$employee_id' ");
  if(isset($data3)) {
    $a = "Y";
  } else {
    $a = "N";
  }

  $data_insert= array(
    'Tahun_ajar_wali'   => $tahun_ajar_wali,
    'Employee_id'       => $employee_id,
    'Kd_kelas'          => $kd_kelas
  );

  $data_update= array(
    'walikelas' => $a
  );

  $res2 = $this->m_sdpa->update_data('user', $data_update, array('id_user' =>$employee_id));

  $res = $this->m_sdpa->insert_data('walikelas', $data_insert);

  if ($res >= 1 || $res2 >=1 ) {

    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Tambah data SUKSES!</p></div>';
    // $notif = "<h2 class='jumbotron'> Tambah kelas SUKSES! </h2>";
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>Tambah data GAGAL!</div>';
    // $notif = "<h2 class='jumbotron'> Tambah kelas GAGAL! </h2>";
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_walikelas");
}

public function do_edit_walikelas() {
  $kd_walikelas     = $_POST['kd_walikelas'];
  $tahun_ajar_wali  = $_POST['tahun_ajar_wali'];
  $employee_id      = $_POST['employee_id'];
  $nip        = $_POST['nip'];
  $kd_kelas   = $_POST['kd_kelas'];

  $data_update= array(
    'Tahun_ajar_wali'   => $tahun_ajar_wali,
    'Employee_id'       => $employee_id,
    'NIP'       => $nip,
    'Kd_kelas'  => $kd_kelas
  );

  $res = $this->m_sdpa->update_data('walikelas', $data_update, array('Kd_walikelas' =>$kd_walikelas));

  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Ubah data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Ubah data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_walikelas");

}

public function do_delete_walikelas($kd_walikelas) {
  $res = $this->m_sdpa->delete_data('walikelas', array('Kd_walikelas' => $kd_walikelas));

  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Hapus data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Hapus data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_walikelas");
}

public function master_siswa() {

  $data = $this->m_sdpa->get_data("siswa");
  $this->template->load('vtemplate','sdpa_bl/v_lihat_siswa', array('isi' => $data));

}

public function do_insert_siswa() {
  $this->load->library('upload');
  $nmfile     = "file_".time();
  $config['upload_path']  = 'assets/uploads/';
  $config['allowed_types']= 'gif|jpg|png|jpeg|bmp';
  $config['max_size']     = '2048';
  $config['max_width']    = '1288';
  $config['max_height']   = '768';
  $config['file_name']    = $nmfile;

  $this->upload->initialize($config);
  $this->upload->do_upload('filefoto');

  $nis        = $_POST['nis'];
  $nisn       = $_POST['nisn'];
  $nama       = $_POST['nama'];
  $tempat_lahir     = $_POST['tempat_lahir'];
  $tanggal_lahir    = $_POST['tanggal_lahir'];
  $agama      = $_POST['agama'];
  $jenis_kelamin    = $_POST['jenis_kelamin'];
  $alamat           = $_POST['alamat'];
  $nama_ayah  = $_POST['nama_ayah'];
  $nama_ibu   = $_POST['nama_ibu'];
  $kewarganegaraan  = $_POST['kewarganegaraan'];
  $warga_negara     = $_POST['warga_negara'];
  $status_anak      = $_POST['status_anak'];
  $anak_ke    = $_POST['anak_ke'];
  $jumlah_saudara   = $_POST['jumlah_saudara'];
  $telepon_rumah    = $_POST['telepon_rumah'];
  $nomor_hp         = $_POST['nomor_hp'];
  $tinggi_badan     = $_POST['tinggi_badan'];
  $berat_badan      = $_POST['berat_badan'];
  $wajah            = $_POST['wajah'];
  $rambut           = $_POST['rambut'];
  $golongan_darah   = $_POST['golongan_darah'];
  $penyakit_riwayat = $_POST['penyakit_riwayat'];
  $asal_sekolah     = $_POST['asal_sekolah'];
  $prestasi   = $_POST['prestasi'];
  $gbr        = $this->upload->data();
  $foto       = $gbr['file_name'];

  $data_insert= array(
    'NIS'   => $nis,
    'NISN'  => $nisn,
    'Nama'  => $nama,
    'Tempat_lahir'    => $tempat_lahir,
    'Tanggal_lahir'   => $tanggal_lahir,
    'Agama' => $agama,
    'Jenis_kelamin'   => $jenis_kelamin,
    'Alamat'          => $alamat,
    'Nama_ayah'       => $nama_ayah,
    'Nama_ibu'        => $nama_ibu,
    'Kewarganegaraan' => $kewarganegaraan,
    'Warga_negara'    => $warga_negara,
    'Status_anak'     => $status_anak,
    'Anak_ke'         => $anak_ke,
    'Jumlah_saudara'  => $jumlah_saudara,
    'Telepon_rumah'   => $telepon_rumah,
    'Nomor_hp'        => $nomor_hp,
    'Tinggi_badan'    => $tinggi_badan,
    'Berat_badan'     => $berat_badan,
    'Wajah' => $wajah,
    'Rambut'=> $rambut,
    'Golongan_darah'  => $golongan_darah,
    'Penyakit_riwayat'=> $penyakit_riwayat,
    'Asal_sekolah'    => $asal_sekolah,
    'Prestasi'        => $prestasi,
    'Foto'  => $foto
  );

  $res = $this->m_sdpa->insert_data('siswa', $data_insert);

  if ($res >= 1) {
        $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button><p align="center">Tambah data SUKSES!</p></div>';
        // $notif = "<h2 class='jumbotron'> Tambah kelas SUKSES! </h2>";
      } else {
        $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Tambah data GAGAL!</div>';
        // $notif = "<h2 class='jumbotron'> Tambah kelas GAGAL! </h2>";
      }
      $this->session->set_flashdata('pesan', $notif);
      redirect("dashboard/master_siswa");
}

public function do_edit_siswa() {
  $this->load->library('upload');
  $nmfile     = "file_".time();
  $config['upload_path']  = 'assets/uploads/';
  $config['allowed_types']= 'gif|jpg|png|jpeg|bmp';
  $config['max_size']     = '2048';
  $config['max_width']    = '1288';
  $config['max_height']   = '768';
  $config['file_name']    = $nmfile;

  $this->upload->initialize($config);
  $this->upload->do_upload('filefoto');

  $nis        = $_POST['nis'];
  $nisn       = $_POST['nisn'];
  $nama       = $_POST['nama'];
  $tempat_lahir     = $_POST['tempat_lahir'];
  $tanggal_lahir    = $_POST['tanggal_lahir'];
  $agama      = $_POST['agama'];
  $jenis_kelamin    = $_POST['jenis_kelamin'];
  $alamat           = $_POST['alamat'];
  $nama_ayah  = $_POST['nama_ayah'];
  $nama_ibu   = $_POST['nama_ibu'];
  $kewarganegaraan  = $_POST['kewarganegaraan'];
  $warga_negara     = $_POST['warga_negara'];
  $status_anak      = $_POST['status_anak'];
  $anak_ke    = $_POST['anak_ke'];
  $jumlah_saudara   = $_POST['jumlah_saudara'];
  $telepon_rumah    = $_POST['telepon_rumah'];
  $nomor_hp         = $_POST['nomor_hp'];
  $tinggi_badan     = $_POST['tinggi_badan'];
  $berat_badan      = $_POST['berat_badan'];
  $wajah            = $_POST['wajah'];
  $rambut           = $_POST['rambut'];
  $golongan_darah   = $_POST['golongan_darah'];
  $penyakit_riwayat = $_POST['penyakit_riwayat'];
  $asal_sekolah     = $_POST['asal_sekolah'];
  $prestasi   = $_POST['prestasi'];
  $gbr        = $this->upload->data();
  $foto       = $gbr['file_name'];

  if($_FILES['filefoto']['size']!=0) {
    $data_update= array(
      'NISN'  => $nisn,
      'Nama'  => $nama,
      'Tempat_lahir'    => $tempat_lahir,
      'Tanggal_lahir'   => $tanggal_lahir,
      'Agama' => $agama,
      'Jenis_kelamin'   => $jenis_kelamin,
      'Alamat'          => $alamat,
      'Nama_ayah'       => $nama_ayah,
      'Nama_ibu'        => $nama_ibu,
      'Kewarganegaraan' => $kewarganegaraan,
      'Warga_negara'    => $warga_negara,
      'Status_anak'     => $status_anak,
      'Anak_ke'         => $anak_ke,
      'Jumlah_saudara'  => $jumlah_saudara,
      'Telepon_rumah'   => $telepon_rumah,
      'Nomor_hp'        => $nomor_hp,
      'Tinggi_badan'    => $tinggi_badan,
      'Berat_badan'     => $berat_badan,
      'Wajah' => $wajah,
      'Rambut'=> $rambut,
      'Golongan_darah'  => $golongan_darah,
      'Penyakit_riwayat'=> $penyakit_riwayat,
      'Asal_sekolah'    => $asal_sekolah,
      'Prestasi'        => $prestasi,
      'Foto'  => $foto
    );
  } else {
    $data_update= array(
      'NISN'  => $nisn,
      'Nama'  => $nama,
      'Tempat_lahir'    => $tempat_lahir,
      'Tanggal_lahir'   => $tanggal_lahir,
      'Agama' => $agama,
      'Jenis_kelamin'   => $jenis_kelamin,
      'Alamat'          => $alamat,
      'Nama_ayah'       => $nama_ayah,
      'Nama_ibu'        => $nama_ibu,
      'Kewarganegaraan' => $kewarganegaraan,
      'Warga_negara'    => $warga_negara,
      'Status_anak'     => $status_anak,
      'Anak_ke'         => $anak_ke,
      'Jumlah_saudara'  => $jumlah_saudara,
      'Telepon_rumah'   => $telepon_rumah,
      'Nomor_hp'        => $nomor_hp,
      'Tinggi_badan'    => $tinggi_badan,
      'Berat_badan'     => $berat_badan,
      'Wajah' => $wajah,
      'Rambut'=> $rambut,
      'Golongan_darah'  => $golongan_darah,
      'Penyakit_riwayat'=> $penyakit_riwayat,
      'Asal_sekolah'    => $asal_sekolah,
      'Prestasi'        => $prestasi
    );
  }
  $res = $this->m_sdpa->update_data('siswa', $data_update, array('NIS' =>$nis));


  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Ubah data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Ubah data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_siswa");
}

public function do_delete_siswa($nis) {
  $res = $this->m_sdpa->delete_data('siswa', array('NIS' => $nis));

  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Hapus data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Hapus data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_siswa");
}

/* User */

public function master_user() {

  $data  = $this->m_sdpa->getUser("where a.employee_id not in (select b.id_user from user b)");
  $data2 = $this->m_sdpa->getUser2("where a.id_user = b.employee_id and (level = 'guru')");
  $data3 = $this->m_sdpa->get_data("walikelas");
  $this->template->load('vtemplate','sdpa_bl/v_lihat_user', array('isi' => $data, 'isi2' => $data2, 'isi3' => $data3));

}

public function do_insert_user() {
  $data3 = $this->m_sdpa->get_data("walikelas");

  $user = isset($_POST['user']) ? $_POST['user'] : '';
  $a = "N";

  foreach ($data3 as $key3) {

    $x = isset($key3['Employee_id']) ? $key3['Employee_id'] : '';

    if($x == $user) {
      $a= "Y";
    } else {
      $a= "N";
    }
  }

  $level      = $_POST['level'];
  $password   = md5($_POST['password']);

  $data_insert= array(
    'id_user'   => $user,
    'level'     => $level,
    'password'  => $password,
    'walikelas' => $a
  );

  $res = $this->m_sdpa->insert_data('user', $data_insert);

  if ($res >= 1) {
        $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button><p align="center">Tambah data SUKSES!</p></div>';
        // $notif = "<h2 class='jumbotron'> Tambah kelas SUKSES! </h2>";
      } else {
        $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>Tambah data GAGAL!</div>';
        // $notif = "<h2 class='jumbotron'> Tambah kelas GAGAL! </h2>";
      }
      $this->session->set_flashdata('pesan', $notif);
      redirect("dashboard/master_user");
}

public function do_edit_user() {
  $id_user        = $_POST['user'];
  $level          = $_POST['level'];
  $password       = md5($_POST['password']);

  $data_update= array(
    'level'  => $level,
    'password'  => $password
  );

  $res = $this->m_sdpa->update_data('user', $data_update, array('id_user' =>$id_user));

  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Ubah data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Ubah data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_user");

}

public function do_delete_user($id_user) {
  $res = $this->m_sdpa->delete_data('user', array('id_user' => $id_user));

  if ($res >= 1) {
    $notif = '<div class="alert alert-info alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Hapus data SUKSES!</p></div>';
  } else {
    $notif = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button><p align="center">Hapus data GAGAL!</p></div>';
  }
  $this->session->set_flashdata('pesan', $notif);
  redirect("dashboard/master_user");
}

}
