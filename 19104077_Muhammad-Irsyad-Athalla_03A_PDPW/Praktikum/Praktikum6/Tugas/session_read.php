<!DOCTYPE html>
<html>
<head>
	<title>Session</title>
</head>
<body>
    <!-- form untuk sesi, inputan akan dikirimkan/dilanjutkan ke file session_process.php -->
	<form action="session_process.php" method="post">
        <input type="text" name="kolom_input_session1" required /></br>
        <input type="text" name="kolom_input_session2" required /></br>
        <button type="submit">Simpan</button>
	</form>

    <a href="session_process.php?process=hapus_session1"><button>Hapus Session 1</button></a><br>
    <a href="session_process.php?process=hapus_session2"><button>Hapus Session 2</button></a><br>
    <a href="session_process.php?process=hapus_semua_session"><button>Hapus Session Semua</button></a><br>
    <!--n 3 tombol, yaitu untuk hapus session 1,hapus session 2 dan hapus semua session sekaligus -->

    <?php session_start() ?>
    Session yang tersimpan 1: <?php echo isset($_SESSION['session_tersimpan1'])?$_SESSION['session_tersimpan1']:'Session 1 Kosong' ?><br>
    Session yang tersimpan 2: <?php echo isset($_SESSION['session_tersimpan2'])?$_SESSION['session_tersimpan2']:'Session 2 Kosong' ?>

    <!-- file session_read.php akan digunakan untuk menginput data yang ada disimpan pada session dan membaca data session. -->
</body>
</html>