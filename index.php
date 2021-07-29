<!DOCTYPE html>
<html>

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{% static 'blog/main.css' %}">


    <title >
       Note App
    </title>

</head>

<body>
    <div class="container ">
        <center>
        <h1 class ="m-1 jumbotron ">
        Notes App</h1>
</center>
        
        <a class="m-1 btn btn-dark" href='new.php'>Add Note </a> <br />
        <div class="card-columns p-1">
        <?php

        require_once('includes/db.php');
        $query = "select * from notes";
        $notes = mysqli_query($conn, $query);
        while ($note = mysqli_fetch_assoc($notes)) {

        ?>
            
                
                <div class="p-1 card 
                <?php
                if ($note["important"]) {
                    echo "border-danger";
                } else {
                    echo "border-primary";
                }
                ?>">
                    <div class="card-header card-title">
                        <h5>
                            <?php echo $note["title"]; ?>
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?php echo $note["content"]; ?>
                        </p>
                    
                        <a class="btn btn-danger m-1 float-right" href="delete.php?id=<?php echo $note["id"]; ?> ">Delete</a>
                        <a class="btn btn-warning m-1 float-right" href="update.php?id=<?php echo $note["id"]; ?> ">Update</a>

                    </div>
                </div>
            

        <?php
        }
        mysqli_free_result($notes);
        ?>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
<?php
require_once('includes/footer.php');
