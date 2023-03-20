<?php

require_once("db.php");
require_once('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Helper\Dimension;

$con->set_charset("utf8mb4");

class AFhelper
{
    public static function cekEmptyFields($data = array()) {
      foreach ($data as $key => $value) {
        if($key == null) {
          AFhelper::kirimJson(null, $value." cannot be empty", 0);
          exit();
        }
      }
    }

    public static function kirimJson($data, string $msg = '', $status = 1)
    {
        $response = array(
            'status' => $status,
            'message' => $msg,
            'data' => $data
        );
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public static function dbSelectAll(string $sql)
    {
        global $con;
        $data = array();
        $result = $con->query($sql);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public static function dbSelectOne(string $sql)
    {
        global $con;
        $data = array();
        $result = $con->query($sql);
        $data = mysqli_fetch_object($result);
        return $data;
    }

    public static function dbSave(string $sql, $data = null, string $message = 'Success')
    {
        global $con;
        $result = $con->query($sql);
        if ($result) {
            return AFhelper::kirimJson($data, $message, 1);
        } else {
            return AFhelper::kirimJson($sql, $con->error, 0);
        }
    }

    public static function dbSaveCek(string $sql)
    {
        global $con;
        $hasil = array();
        $result = $con->query($sql);
        if ($result) {
            $hasil[0] = true;
        } else {
            $hasil[0] = false;
            $hasil[1] = $con->error;
            $hasil[2] = $sql;
        }
        return $hasil;
    }

    public static function dbSaveReturnID(string $sql)
    {
        global $con;
        $result = $con->query($sql);
        if ($result) {
            $hasil = $con->insert_id;
        } else {
            $hasil = 0;
        }
        return $hasil;
    }

    public static function dbSaveMulti(string $sql, $data = null, string $message = 'Sukses')
    {
        global $con;
        $result = $con->multi_query($sql);
        if ($result) {
            return AFhelper::kirimJson($data, $message, 1);
        } else {
            return AFhelper::kirimJson($sql, $con->error, 0);
        }
    }

    public static function dbSaveCekMulti(string $sql)
    {
        global $con;
        $hasil = array();
        $result = $con->multi_query($sql);
        if ($result) {
            $hasil[0] = true;
        } else {
            $hasil[0] = false;
            $hasil[1] = $con->error;
            $hasil[2] = $sql;
        }
        return $hasil;
    }

    public static function YMDtoDMY(string $text)
    {
        $tanggal = explode(" ", $text);
        $tgl = explode("-", $tanggal[0]);
        $new_tgl = $tgl[2]."/".$tgl[1]."/".$tgl[0]; 
        return $new_tgl;
    }

    public static function writeExcel(array $data, string $judul) {
      $kol = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ","BA","BB","BC","BD","BE","BF","BG","BH","BI","BJ","BK","BL","BM","BN","BO","BP","BQ","BR","BS","BT","BU","BV","BW","BX","BY","BZ","CA","CB","CC","CD","CE","CF","CG","CH","CI","CJ","CK","CL","CM","CN","CO","CP","CQ","CR","CS","CT","CU","CV","CW","CX","CY","CZ","DA","DB","DC","DD","DE","DF","DG","DH","DI","DJ","DK","DL","DM","DN","DO","DP","DQ","DR","DS","DT","DU","DV","DW","DX","DY","DZ");
		
      $spreadsheet = new Spreadsheet();
      // Set document properties
      $spreadsheet->getProperties()->setCreator('Ardi')
          ->setLastModifiedBy('Ardi')
          ->setTitle('Office 2007 XLSX')
          ->setSubject('Office 2007 XLSX')
          ->setDescription('')
          ->setKeywords('office 2007 openxml php')
          ->setCategory('Result file');

      $si = $spreadsheet->setActiveSheetIndex(0);

      // $si->setCellValue('A1', 'Ardi')
      //   ->setCellValue('B2', 'fianto');

      $bar = 1;
      $i = 0;
      foreach ($data[0] as $key => $value) {
        $si->setCellValue($kol[$i].$bar, strtoupper($key));
        $i++;
      }
      $bar++;
      foreach ($data as $item) {
        $i = 0;
        foreach ($item as $key => $value) {
          $val = explode("@@@", $value, 2);
          if($val[1] == "image") {
            $drawing = new Drawing();
            $drawing->setPath($val[0]);
            $drawing->setCoordinates($kol[$i].$bar);
            $drawing->setCoordinates2($kol[$i].$bar);
            $drawing->setOffsetX2(100);
            $drawing->setOffsetY2(100);
            $drawing->setWorksheet($spreadsheet->getActiveSheet());
            $spreadsheet->getActiveSheet()->getColumnDimension($kol[$i])->setWidth(100, Dimension::UOM_PIXELS);
            $spreadsheet->getActiveSheet()->getRowDimension($bar)->setRowHeight(100, Dimension::UOM_PIXELS);
          } else {
            $si->setCellValue($kol[$i].$bar, $val[0]);
          }
          $i++;
        }
        $bar++;
      }

      $i--;
      $bar--;

      $si->getStyle('A1:'.$kol[$i].'1')->getAlignment()->setHorizontal('center');
      $si->getStyle('A1:'.$kol[$i].'1')->getFont()->setBold(true);
      $si->getStyle('A1:'.$kol[$i].$bar)->getAlignment()->setVertical('center');
      $si->getStyle('A1:'.$kol[$i].$bar)->getBorders()->getAllBorders()->setBorderStyle('thin');
      for ($k=0; $k <= $i; $k++) { 
        $si->getColumnDimension($kol[$k])->setAutoSize(true);
      }
            
      // Rename worksheet
      $si->setTitle('Sheet1');
      // Set active sheet index to the first sheet, so Excel opens this as the first sheet
      $spreadsheet->setActiveSheetIndex(0);
      // Redirect output to a client’s web browser (Xlsx)
      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="'.$judul.'.xlsx"');
      header('Cache-Control: max-age=0');
      // If you're serving to IE 9, then the following may be needed
      header('Cache-Control: max-age=1');
      // If you're serving to IE over SSL, then the following may be needed
      header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
      header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
      header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
      header('Pragma: public'); // HTTP/1.0

      $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
      $writer->save('php://output');
      exit;
    }
    


}