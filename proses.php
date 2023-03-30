<?php

require_once "helper.php";

$mode = $_GET['mode'];
$today = new Pameran();
switch ($mode) {
  case 'excel':
    $today->excel();
    break;
  case 'suvenir':
    $today->pickSouvenir();
    break;
  case 'adminlogin':
    $today->adminLogin();
    break;
  case 'tabelvisitor':
    $today->tabelVisitor();
    break;
    
  default:
    $today->add();
    break;
}

class Pameran {
  function add() {
    $dt = $_POST;
    AFhelper::cekEmptyFields(array(
      $dt["nama"] => "Full name",
      $dt["email"] => "Email"
    ));
    $sql = "INSERT INTO pameran_tamu(
      email, nama, perusahaan, tipe_industri, no_telp, jabatan, 
      provinsi, kota, kecamatan, alamat, no_hp) VALUES (
      '$dt[email]', '$dt[nama]', '$dt[perusahaan]', '$dt[tipe_industri]', '$dt[no_telp]', '$dt[jabatan]', 
      '$dt[provinsi]', '$dt[kota]', '$dt[kecamatan]', '$dt[alamat]', '$dt[no_hp]')
      ON DUPLICATE KEY UPDATE
      nama = '$dt[nama]'";
    $hasil = AFhelper::dbSaveCek($sql, null,);  
    if($hasil[0]) {
      setcookie("fjgemail", $dt["email"], [
        'expires' => time() + 86400,
        'secure' => false,
        'httponly' => true,
        'samesite' => 'None',
      ]); // 1 hari
      AFhelper::kirimJson(null,  "Registration successfully saved, thank you.");
    } else {
      AFhelper::kirimJson(null, 'Sorry, something went wrong', 0);
    }  
  }

  function excel() {
    if($_GET['key'] == "a007ea18d8284a42b8e0FJG320fac2c0051") {
      $sql = "SELECT nama AS NAME, email AS EMAIL, no_hp AS PHONE, perusahaan AS COMPANY_NAME, jabatan AS POSITION, tanggal_submit AS VISIT_TIME
        FROM pameran_tamu";
      $hasil = AFhelper::dbSelectAll($sql);
      // $nilai = array();
      // foreach ($hasil as $r) {
        // $r->foto = $r->foto ? __DIR__."/propic/".$r->foto."@@@image" : "";
        // array_push($nilai, $r);
      // }
      AFhelper::writeExcel($hasil, "Visitor_List");
    } else {
      AFhelper::kirimJson(null, 'Wrong Key', 0);
    }
  }

  function tabelVisitor() {
    $sql = "SELECT nama AS NAME, email AS EMAIL, no_hp AS PHONE, perusahaan AS COMPANY_NAME, jabatan AS POSITION, tanggal_submit AS VISIT_TIME
      FROM pameran_tamu";
    $hasil = AFhelper::dbSelectAll($sql);
    AFhelper::kirimJson($hasil);
  }

  function pickSouvenir() {
    AFhelper::cekEmptyFields(array(
      $_GET['email'] => 'Email'
    ));
    $sql = "SELECT * FROM pameran_suvenir WHERE suvenir_jumlah < suvenir_kuota";
    $arr_suvenir = AFhelper::dbSelectAll($sql);
    if($arr_suvenir) {
      $sql = "SELECT * FROM pameran_tamu WHERE email = '$_GET[email]'";
      $tamu = AFhelper::dbSelectOne($sql);
      if($tamu) {
        $tamu->foto = $tamu->foto ? $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"].dirname($_SERVER["PHP_SELF"])."/propic/".$tamu->foto : "";
        $random = array_rand($arr_suvenir);
        $this->updateSuvenir($arr_suvenir[$random]->suvenir_id, $tamu->email);
        AFhelper::kirimJson(array('profil' => $tamu, 'suvenir' => $arr_suvenir[$random]), 'The souvenir you get is a '.$arr_suvenir[$random]->suvenir_nama);
      } else {
        AFhelper::kirimJson(null, 'Email is not exist', 0);
      }
    } else {
      AFhelper::kirimJson(null, 'Souvenirs are out', 0);
    }
  }

  function updateSuvenir($id, $email) {
    $sql = "UPDATE pameran_suvenir 
      SET suvenir_jumlah = suvenir_jumlah+1 
      WHERE suvenir_id = '$id';
      UPDATE pameran_tamu
      SET suvenir_id = '$id'
      WHERE email = '$email';";
    AFhelper::dbSaveCekMulti($sql);
  }

  function adminLogin() {
    $dt = $_POST;
    AFhelper::cekEmptyFields(array(
      $dt["username"] => "Username",
      $dt["password"] => "Password"
    ));
    if($dt["username"] == "admin") {
      if($dt["password"] == "fr4tekindo!") {
        setcookie("fjgadmin", $dt["username"], [
          'expires' => time() + 86400,
          'secure' => false,
          'httponly' => true,
          'samesite' => 'None',
        ]); // 1 hari
        AFhelper::kirimJson(null,  "Login Success");
      } else {
        AFhelper::kirimJson(null, 'Password wrong', 0);
      }
    } else {
      AFhelper::kirimJson(null, 'Username not found', 0);
    }  
  }

}

