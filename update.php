<?php
require_once("includes/db.php");
require_once("includes/functions.php");

$id = $_GET["id"];
if (isset($id)) {

    $query = "select * from notes where id = '$id' limit 1";
    $result = mysqli_query($conn, $query);
    $note = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    if ($note) {
        $title = $note["title"];
        $content = $note["content"];
        $important = $note["important"];
    } else {
        die("Failed!");
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = prep_input($_POST["title"]);
    $content = prep_input($_POST["content"]);
    $important = prep_input($_POST["important"]);
    if ($important) {
        $important = 1;
    } else {
        $important = 0;
    }

    $query = "UPDATE notes SET title = '$title', content = '$content', important = '$important' WHERE id = '$id'";
    //echo $query;
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "failed";
    }
}
?>
<!DOCTYPE html>
<html>

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{% static 'blog/main.css' %}">
    <title>
        Note Update
    </title>

</head>

<body>
    <div class="mt-3 container">
        <form action="" method="post">
            <div class="form-group">
                <label for="text">Title</label>
                <input class="form-control" type="text" name="title" value=<?php echo "\"" . $title . "\"" ?> />
            </div>
            <div class="form-group">

                <label for="text">Content</label>
                <input class="form-control" type="textbox" name="content" value=<?php echo "\"" . $content . "\"" ?> />
            </div>
            <div class="form-group">

                <label>Important?</label>
                <input class="" type="checkbox" name="important" <?php if ($note["important"]) {
                                                                        echo "checked";
                                                                    } ?>>
            </div>
            <input class="btn btn-primary" type="submit" value="Submit">

        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
<?php
require_once("includes/footer.php");

?>