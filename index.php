<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Blog</title>
  </head>
  <body>
    
  <div class="d-flex justify-content-end" > 
    <button type="submit" class="mt-5 mr-5 btn btn-primary" data-toggle="modal" data-target="#exampleModal"><b>Ajouter un article</b></button>
    <a href="logout.php" class="mt-5 mr-5 btn btn-primary"><b>Logout</b></a>
  </div>

  <!-- <div class="d-flex justify-content-end" > 
    <button type="submit" class="mt-5 mr-5 btn btn-primary"><b>Logout</b></button>
  </div> -->
     
    <!-- Modal -->
    <?php
            include "init.php";
            session_start();
            if(!$_SESSION['login']){
              header("location:login.php");
            }
            
            $model  = new Model();
            $insert = $model->insert();
            
    ?>
    
        
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter un article</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form -->
              <form action="" method="POST">
                <div class="form-group">
                  <label for="usr1">Titre d'article :</label>
                  <input type="text" class="form-control" id="usr1" name="titre">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Article :</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="paragraphe"></textarea>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" name="submit"><b>Submit</b></button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
            <h1 class="text-center"> My Dashboard</h1>
            <hr class="hr_height">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table  table-striped table-dark">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre d'article</th>
                        <th>Article</th>
                        <th>action</th>
                    <tr>
                    </thead>
                    <tbody>
                    
                    <?php
                    // include "init.php";
                    // $db = new Model();
                    $i=1;
                    $rows = $model->fetch();
                    // if(!empty($rows)){
                        foreach($rows as $row){
                    
                     ?>
                         <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['titre']; ?></td>
                            <td><?php echo $row['paragraphe']; ?></td>
                            <td>    
                                <a href="read.php?id=<?php echo $row['id']; ?>"class="badge badge-info">Read</a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="badge badge-danger">Delete</a>
                                <?php
                                ?>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="badge badge-success">Edit</a>
                            </td>
                        </tr>

                     <?php
                        }
                    // }
                     ?> 
                    </tbody>
                </table>
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