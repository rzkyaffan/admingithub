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

  // add functions

  function tambah($data){
    global $db;
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $NIS = htmlspecialchars($data["NIS"]);

    $query = "INSERT INTO murid VALUES('', '$nama', '$kelas', '$NIS')";

    mysqli_query($db , $query);

    return mysqli_affected_rows($db);
  }

// edit functions

  function edit ($data){
    global $db;
    
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $NIS = htmlspecialchars($data["NIS"]);

    $query = "UPDATE murid SET
    nama_siswa = '$nama',
    kelas = '$kelas',
    NIS = '$NIS'

    WHERE id = $id";
    
    mysqli_query($db , $query);
    return mysqli_affected_rows($db);

}

// delete functions

function delete(){
  global $db;
  global $id;
  mysqli_query($db,"DELETE FROM murid WHERE id = $id");
  return mysqli_affected_rows($db);
}

// search function
function search($keyword){
  $query = "SELECT * FROM murid WHERE 
  nama_siswa LIKE '%$keyword%' OR 
  kelas LIKE '%$keyword%' OR 
  NIS LIKE '%$keyword%'";
  return query($query);
}
?>








