<?php 
  $db = mysqli_connect('localhost', 'root', '', 'siswa');
  $dbquery = mysqli_query($db ,'SELECT * FROM murid');
  function query($querysyntax){
    global $db;
    $result = mysqli_query($db, $querysyntax);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
      $rows[] = $row;
    }
    return $rows;
  }

  function tambah($data){
    global $db;
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $jurusan = htmlspecialchars($data["jurusan"]);

    $query = "INSERT INTO murid VALUES('', '$nama', '$kelas', '$jurusan')";

    mysqli_query($db , $query);

    return mysqli_affected_rows($db);
  }
?>

