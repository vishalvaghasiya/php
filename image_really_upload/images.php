<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>Document</title>
    <style>
        img{
            margin: 10px;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <?php
                    require './config/db.php';
                    $query = "SELECT * FROM _images";
                    $result = mysqli_query($con , $query);
                    if(mysqli_num_rows($result) > 0){
                        $rowElementCount = ceil(mysqli_num_rows($result)/ 3);
                        $rowsCount = 3;
                        for($j = 1 ; $j <= $rowsCount ; $j++){
                            $output = '<div class="col-md-4">';


                            for($i = 0 ; $i < $rowElementCount ; $i++){
                                $row = mysqli_fetch_assoc($result);
                                $output .= '<div class="col-md-12">
                                        <img class="img-rounded img-thumbnail" src="./storage/'.$row['path'].'" alt="'.$row['_id'].'">
                                    </div>';
                            }

                            $output .= '</div>';
                            echo $output;
                        }
                    }
                ?>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
</html>