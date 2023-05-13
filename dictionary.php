<!DOCTYPE html>

<?php 
include('function/db.php');
include('include/bootstrap.php');


$char = '';  
if(isset($_GET["char"]))  
{  
     $char = $_GET["char"];  
     $char = preg_replace('#[^a-z]#i', '', $char);  
     $query = "SELECT * from dictionary 
     WHERE word LIKE '$char%' or description LIKE '$char%' ";  
}  
else if(isset($_GET['search'])){
    $search = $_GET['search'];
    $query = "SELECT * FROM dictionary WHERE word LIKE '%$search%'";
    $result = mysqli_query($con, $query);
    //display the results
 }
else  
{  
     $query = "SELECT * from dictionary ORDER BY word_id";  
}  
$result = mysqli_query($con, $query); 

?>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>KAMAYA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/upload.css">
    <link rel="stylesheet" href="css/dictionary.css">
    <link rel="stylesheet" href="css/botnav.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>
<style>
tr:hover {
    background: #B6CECE;

}

td a {
    display: block;
    cursor: pointer;
}


a {
    cursor: pointer;
    all: unset;
}
</style>

<body>
    <div class="loader">
        <div></div>
    </div>

    <div class="container">
        <div class="container center">
            <div class="row">
                <div class="col-md-12 center">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <center>
                                <form method="GET" action="dictionary.php">
                                    <div class="search">
                                  
                                            <input type="text" name="search" class="searchTerm"
                                                placeholder="What are you looking for?">
                                            <button type="submit" class="searchButton">
                                                <i class="fa fa-search"></i>
                                            </button>
                                    </div>
                                    </form>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div align="center">
                <?php  
                          $character = range('A', 'Z');  
                          echo '<ul class="pagination">';  
                          echo '<li><a href="dictionary.php?char=">All</a></li>';
                          foreach($character as $alphabet)  
                          {  
                               echo '<li><a href="dictionary.php?char='.$alphabet.'">'.$alphabet.'</a></li>';  
                          }  
                          echo '</ul>';  
                     ?>
            </div>

            <form name="upload" method="post" action="function/process.php" enctype="multipart/form-data"
                accept-charset="utf-8">

                <div class="card cardWordlist">
                    <div class="card-body">

                        <table id="dictionary-table" class="table">
                            <thead class="table" style='font-size:15px'>
                                <tr>
                                    <th align="center">Word</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>
                                <tr>

                                    <td><a href="word.php?word=<?php echo $row['word_id']?>"
                                            style=''><?php echo $row['word']?> <br>
                                            <small> <?php echo $row['description']?> </small>
                                        </a>
                                    </td>
                                </tr>

                                <?php  
                               }  
                          }  
                          else  
                          {  
                          ?>
                                <tr>
                                    <td colspan="3" align="center">Data not Found</td>
                                </tr>
                                <?php  
                          }  
                          ?>
                        </table>


                    </div>
                </div>

                
                <!--additional fields-->
                <div class="row">
                    <div class="col-md-12">

                        <input type="submit" value="Translate" class="btn btn-primary" id="submitbtn">

                    </div>
                </div>
            </form>
        </div>
        <center>
        <a href='dictionary.php' style='border-radius: 20px;' type="button" id="btnup"
                class="btn btn-dark btn-lg"><i class="fas fa-arrow-left"></i></a>
        </center>
 


    </div>
    <?php include('include/navbar.php') ?>

    <script src="js/navbar.js"></script>

</body>

</html>

<script>
$(window).on('load', function() {
    $(".loader").fadeOut(1000);
    $(".content").fadeIn(1000);
});
</script>