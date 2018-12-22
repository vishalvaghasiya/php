<?PHP

session_start();
if(!empty($_FILES['image']))
{

    $path = "../storage/";
    $storagePath = 'image/';

    $errorArray = array();
    $uploadedFileArray = array();

    $MIME = array(
        'image/jpg',
        'image/jpeg',
        'image/png'
    );

    $max_file_size = ((8 * 1024) * 1024) * 8;

    foreach($_FILES['image']['error'] as $key => $error){
        if($error){
            array_push($errorArray , $_FILES['image']['name'][$key].'has Upload error of Corrupted Somehow. Please Upload Again.');
        }
    }

    if(count($errorArray) == 0){
        foreach($_FILES['image']['size'] as $key => $size){
            if($size > $max_file_size){
                array_push($errorArray , $_FILES['image']['name'][$key].' Exceeds the Max File Size 8MB Allowed, Please Upload File having size 8MB or Less.');
            }
        }

        if(count($errorArray) == 0){

            foreach($_FILES['image']['type'] as $key => $type){
                if(!in_array($type , $MIME)){
                    array_push($errorArray , $_FILES['image']['name'][$key].' is unsupported file format.');
                }
            }

            if(count($errorArray) == 0){
                foreach($_FILES['image']['name'] as $key => $name){
                    $uniqueFileName = uniqid(rand());
                    $extension = explode('.' , $name);
                    $extension = $extension[1];
                    $extension = strtolower($extension);
                    $uniqueFileName = $uniqueFileName.'.'.$extension;

                    $filePath = $storagePath.$uniqueFileName;

                    if(move_uploaded_file($_FILES['image']['tmp_name'][$key], $path.$filePath)) {
                        array_push($uploadedFileArray , $filePath);
                    } else{
                        array_push($errorArray , $_FILES['image']['name'][$key].' Upload Failed Server Rejected the Upload.');
                    }

                }

                if(count($errorArray) == 0){
                    require '../config/db.php';
                    $query = "INSERT INTO _images ( _id , path) VALUES";
                    foreach($uploadedFileArray as $path){
                        $query .= "(DEFAULT , '".$path."'),";
                    }

                    $query = rtrim($query , ',');

                    mysqli_query($con , $query);

                    if(mysqli_affected_rows($con) > 0 && mysqli_affected_rows($con) == count($uploadedFileArray)){
                        header('Location:../images.php');
                    }
                }else{
                    redirectToErrorPage($errorArray);
                }
            }else{
                redirectToErrorPage($errorArray);
            }
        }else{
            redirectToErrorPage($errorArray);
        }
    }else{
        redirectToErrorPage($errorArray);
    }
}else{
    echo 'Please Upload your Files.';
}

function redirectToErrorPage($errors){
    $_SESSION['error'] = $errors;
    header('Location:../error.php');
}

?>