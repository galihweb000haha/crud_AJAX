<?php
include 'koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM artikel");
$i = 1;

if(mysqli_num_rows($result) > 0){
    echo "<ul>";
    while($row = mysqli_fetch_assoc($result)){
        
        
        $title = $row['judul_artikel'];        
        $delete = "<button class='delete' id=".$row['id_artikel'];
        $delete .= ">delete</button>";
        $update = "<button class='update' id=".$row['id_artikel'];  
        $update .= " judul = '".$row['judul_artikel']."'";
        $update .= " isi = '".$row['isi_artikel']."'";
        $update .= ">update</button>";
        // $update = "<button class='update'>update</button>";
        // var_dump($update);die;
        echo $i. ". ";
        $i++;
        echo $title;
        echo $delete;
        echo $update;
        echo "<br>";
        
        
        
        
    }
    echo "</ul>";
    
}   