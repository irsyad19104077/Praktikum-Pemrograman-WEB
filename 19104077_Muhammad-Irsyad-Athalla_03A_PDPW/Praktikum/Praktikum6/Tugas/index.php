<?php
    include "koneksi.php";
    session_start();
    $kelas = ['SE-03-A','SE-03-B'];
    $sql = "SELECT * FROM data";
    $data = $conn->query($sql);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>CRUD PHP 2</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
        // melihat gambar 
        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>
    <style>
        img {
            width: 150px
        }
    </style>
  </head>
  <body>
   

    <div class="container">
        <h1 class="text-center mt-5 mb-5">Form Mahasiswa</h1>
        <div class="row">
            <div class="col-lg-6 mb-5">
                <h4>Input Data</h4>
                <?php include "read_message.php" ?>
            </div>
                <form action="simpan.php" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" placeholder="Nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" class="form-control" required>
                            <option value="">Pilih</option>
                            <?php foreach($kelas as $kl) : ?>
                            <option value="<?= $kl; ?>"><?= $kl; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" placeholder="Alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <!-- form input gambar -->
                    <form action="simpan.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Masukkan Foto</label>
                            <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1" accept="image/*" onchange="showPreview(event);" required>
                            <br><br>
                            <!-- melihat gambar -->
                            <div class="preview">
                                <img id="file-ip-1-preview">
                            </div>
                        </div>
                    </form>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
            <div class="col-lg-6">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Data Mahasiswa</span>
                    
                </h4>

                <?php foreach($data as $dt) : ?>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                            
                                <h4><?= $dt['nama']; ?></h4>
                            </div>
                            <div class="col-md-6">
                                <!-- kode untuk menghapus data-->
                                <a class="float-right ml-3 text-danger"href="hapus_data.php?mahasiswa_id=
                                <?php echo $dt['id']?>" type="button" class="close">
                                <span class="fa fa-trash"></span>
                            </a>
                            <!-- kode untuk mengedit data-->
                            <a class="float-right ml-3 text-success"
                            href="update_form.php?mahasiswa_id=
                            <?php echo $dt['id']?>" type="button" class="close">
                            <span class="fa fa-edit"></span>
                            
                            </a>
                                <p class="text-right"><?= $dt['kelas']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><?= $dt['alamat']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <img src="uploads/.jpg" alt="">
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


  </body>
</html>