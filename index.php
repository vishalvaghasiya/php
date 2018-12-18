<?php
   require './config/db.php';
// //insert data

//    $query = "INSERT INTO _user VALUES (DEFAULT , 'VISHAL VAGHASIYA 1' , 'vishalvaghasiya1@gmail.com' ,'".md5('123')."') , (DEFAULT , 'VISHAL VAGHASIYA 2' , 'vishalvaghasiya2@gmail.com' ,'".md5('vish')."')";
//    mysqli_query($con , $query);
//    if(mysqli_affected_rows($con) > 0){
//        $id = mysqli_insert_id($con);
//        echo 'User Created with id of :'.$id;
//    }else{
//        echo mysqli_error($con);
//    }

//update   
    $sql = "UPDATE _user SET username='visha' WHERE _id=2";

    if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $con->error;
    }

// sql to delete a record
    $sql = "DELETE FROM _user WHERE _id=3";

    if ($con->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $con->error;
    }

    
//show database
   echo '<table>
   <th>Name</th>
   <th>Email</th>
  ';
$query = "SELECT username , email  FROM _user";
$result = mysqli_query($con , $query);
if(mysqli_num_rows($result) > 0){
   while($row = mysqli_fetch_assoc($result)){
       echo '<tr><td>'.$row['username'].'</td><td>'.$row['email'].'</td></tr>';
   }
}else{
   echo mysqli_error($con);
}
echo '</table>';

?>

