<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.101.0">
    <link rel="icon" type="image/png" href="favicon.png"/>
    <title>PT. Fratekindo</title>
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">
    <style>
      @media only screen and (max-width: 576px) {
        .huruf-dinamis, .huruf-subjudul, .warning-feedback {
          font-size: 12px;
        }
        .huruf-judul {
          font-size: 4.1vw;
        }
        .kotak-sub1 {
          padding-left: 50%;
        }
        .kotak-sub2 {
          padding-left: 50%;
        }
        .kotak-sub2 > img {
          width: 50%;
        }
      }
      @media only screen and (min-width: 576px) {
        .huruf-dinamis, .huruf-subjudul, .warning-feedback {
          font-size: 14px;
        }
        .huruf-judul {
          font-size: 21px;
        }
        .kotak-sub2, .kotak-sub1 {
          padding-left: 35%;
        }
        .kotak-sub2 > img {
          width: 30%;
        }
      }
      body {
        font-family: Arial;
        background-color: black;
        font-style: normal;
        font-weight: normal;
        margin: auto;
      }
      a {
        text-decoration: none;
      }
      .handphone {
        width: 576px;
        min-height: 100vh;
        background-image: url('./images/bgtop.png'), linear-gradient(to right, #5dc4f0, #6bbb97);
        background-size: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        background-repeat: no-repeat;
      }
      .handphone2 {
        width: 576px;
        min-height: 100vh;
        background-image: url('./images/bgtop2.png'), linear-gradient(to right, #5dc4f0, #6bbb97);
        background-size: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
        background-repeat: no-repeat;
      }
      .huruf-std {
        color: white;
        font-size: 14px;
        line-height: 115%;
        z-index: 3;
      }
      .huruf-dinamis {
        color: white;
        line-height: 115%;
        z-index: 3;
      }
      .form-label {
        color: white;
        font-size: 14px;
        margin-bottom: 3px;
      }
      .item-input {
        margin: 0px 5px 10px;
      }
      .tombol-submit {
        background-color: #25a36a;
        border: 1px solid white;
        border-radius: 20px;
        padding: 3px 25px 5px;
        margin: 30px 15px 50px;
      }
      .huruf-judul {
        color: #25a36a;
        font-weight: bold;
        margin-bottom: 5px;
        z-index: 3;
      }
      .huruf-subjudul {
        color: rgb(96, 94, 94);
        line-height: 110%;
        z-index: 3;
      }
      .kotak {
        display: flex;
        flex-direction: column;
        width: 100%;
        border: 2px solid white;
        border-radius: 15px;
        background-color: rgba(255,255,255,0.67);
        margin-top: 15px;
      }
      .kotak-sub1 {
        display: flex;
        flex-direction: column;
        margin: 25px 15px 0px;
      }
      .kotak-sub2 {
        position: relative;
        display: flex;
        flex-direction: column;
        padding-top: 15px;
        padding-bottom: 15px;
        padding-right: 15px;
        margin: 15px 15px 10px;
        background-color: #6bbb97;
        border-radius: 10px;
      }
      .kotak-sub2 > img {
        position: absolute;
        bottom: 0px;
        left: 0px;
        max-height: 191%;
        object-fit: contain;
        z-index: 2;
      }
      .kotak-list {
        padding: 0px 0px 25px 0px;
        margin: 0px 20px 0px 10px;
        display: grid;
        grid-template-columns: 50% 50%;
        column-gap: 10px;
        row-gap: 10px;
      }
      .kotak-item {
        border-radius: 7px;
        background-color: white;
        display: flex;
        flex-direction: column;
        height: 100%;
        /* cursor: pointer; */
      }
      .kotak-item-atas {
        border-radius: 7px 7px 0px 0px;
        width: 100%;
        padding-top: 50%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
      }
      .kotak-item-bawah {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        /* background-color: #25a36a; */
        background-color: white;
        border-radius: 0px 0px 7px 7px;
        padding: 10px;
        height: 100%;
      }
      .kotak-item-bawah > button {
        display: flex;
        justify-content: center;
        /* background-color: #82d0ad; */
        background-color: #25a36a;
        border: 0px solid white;
        border-radius: 20px;
        padding: 5px 10px;
        margin-top: 7px;
        width: 70px;
      }
      .tombol {
        background-color: #25a36a;
        border: 1px solid white;
        border-radius: 20px;
        padding: 0px 15px 3px 25px;
        margin: 0px 15px 15px;
      }
      .warning-feedback {
        width: 100%;
        margin-top: .25rem;
        color: yellow;
      }
      .form-control.is-warning {
        border-color: yellow;
      }
    </style>
  </head>
  <body>
    <div class="d-flex justify-content-center" id="dvLoad">
      <div class="handphone2">
        <img src="./images/fjg.png" style="width: 50%; min-width:200px; padding: 35px 0px 35px;"/>
        <div class="d-flex" style="text-align: left; padding: 10px 15px;">
          <span class="huruf-std" style="margin-bottom: 15px;">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
          </span>
          <img src="./images/50lectra.png" style="width: 80px; height: 80px; margin-left: 20px;"/>
        </div>
        <div class="container">
          <form id="frRegistrasi">
            <div class="item-input">
              <label class="form-label">Fullname <span style="color: yellow;">*</span></label>
              <input type="text" class="form-control" name="nama">
            </div>
            <div  class="item-input">
              <label class="form-label">Email <span style="color: yellow;">*</span></label>
              <input type="email" class="form-control" name="email">
            </div>
            <div  class="item-input">
              <label class="form-label">Phone</label>
              <input type="text" class="form-control" name="no_hp">
            </div>
            <div  class="item-input">
              <label class="form-label">Company Name</label>
              <input type="text" class="form-control" name="perusahaan">
            </div>
            <div  class="item-input">
              <label class="form-label">Position</label>
              <input type="text" class="form-control" name="jabatan">
            </div>
          </form>
        </div>
        <button class="tombol-submit align-self-center" type="button" onclick="saveData()">
          <span class="huruf-std">Submit</span>
        </button>
        <span class="huruf-std">&copy; PT. Fratekindo Jaya Gemilang</span>
        <span class="huruf-std" style="margin-bottom: 30px;">2023</span>
      </div>
    </div>
    
    <script src="assets/jquery/jquery-3.6.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/jquery/jquery.validate.min.js"></script>
    <script src="assets/sweetalert2/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
      function showMessageError(message) {
        Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'Error!',
          text: message,
        });
      }

      function showMessageSuccess(message = 'Your data has been saved.') {
        Swal.fire({
          position: 'top-end',
          icon: 'success',
          text: message,
          showConfirmButton: false,
          timer: 1333
        });
      }

      function saveData() {
        if($("#frRegistrasi").valid()) {
          var data = $( "#frRegistrasi" ).serialize();
          $.post("proses.php?mode=add", data, function(resp, stat){
            if(resp.status.toString() == "1") {
              showMessageSuccess(resp.message);
              $("#dvLoad").load('katalog.html'); 
            } else {
              showMessageError(resp.message);
            }
          });
        }
      }

      function loadKatalog() {
        <?php
          $cookie = $_COOKIE;
          if(isset($cookie['fjgemail'])) {
            ?>
              $("#dvLoad").load('katalog.html'); 
            <?php
          }
        ?>
      }

      $(document).ready(function () {
        loadKatalog();
        $("#frRegistrasi").validate({
          rules: {
            nama: {required: true},
            email: {required: true},
          },
          errorPlacement: function (error, element) {
            error.addClass('warning-feedback');
            element.after(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-warning');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-warning');
          }
        });
      });
      
    </script>
  </body>
</html>
