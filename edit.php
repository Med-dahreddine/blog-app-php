<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
            <h1 class="text-center">Dashboard</h1>
            <hr class="hr_height">
            </div>
        </div>
        <div class="row">
        <div class="col-md-5 mx-auto">
            <?php
            include "init.php";
            $model  = new Model();
            $id = $_REQUEST['id'];
            $row = $model->edit($id);
            
            if(isset($_POST['update'])){
                if(isset($_POST['titre']) && isset($_POST['paragraphe'])){
                    if(!empty($_POST['titre']) && !empty($_POST['paragraphe'])){
                        
                        $data['id'] = $id;
                        $data['titre'] =$_POST['titre'];
                        $data['paragraphe'] =$_POST['paragraphe'];
                        // $user_id = 1;
                        
                        $update = $model->update($data);
                        if($update){
                            echo "<script>alert('update successfully');</script>";
                            echo "<script>window.location.href = 'index.php';</script>";
                          }else{
                            echo "<script>alert('update failed');</script>";
                            echo "<script>window.location.href = 'index.php';</script>";
                          }
                    }else{
                        echo "<script>alert('empty');</script>";
                        header("location : edit.php?id=$id ");
                    }
                }
            }
            
        
            ?>
        
            <form action="" method="post">
                
                <div class="form-group">
                <label for="">Titre d'article:</label>
                <input type="text" name="titre" class="form-control" value="<?php echo $row['titre']; ?>">
                </div>
                
                <div class="form-group">
                <label for="">Article:</label>
                <!-- <input type="text" name="paragraphe" value="<?php echo $row['paragraphe']; ?>"  class="form-control" > -->
                <textarea name="paragraphe" id="" cols="30" rows="10" class="form-control"><?php echo $row['paragraphe']; ?></textarea>
                </div>


                
                <div class="form-group">
                <button type="submit" name="update"  class="btn btn-primary">Submit</button>
                </div>

            </form>
        </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>