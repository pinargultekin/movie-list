<?php
require_once("./php/component.php");
require_once("./php/operation.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-control" content="no-cache">
    <title>Movies</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container">
        <div id="nav-head">
            <img id="movie-icon" src="./images/clapperboard.svg" />
            <div class="overlay"></div>
            <h6 id="icon-header">Movie List</h6>
        </div>
    </div>

    <div class="main-cont">
        <form action="" method="post" class="input-table">
            <div class="row">
                <div class="col-12" id="id-sec">
                    <?php inputElement("<i class='fas fa-id-badge'></i>", "ID", "movie_id", "") ?>
                </div>
                <div class="col-12" id="name-sec">
                    <?php inputElement("<i class='fas fa-film'></i>", "Movie Name", "movie_name", ""); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <?php inputElement("<i class='far fa-calendar-alt'></i>", "Year", "movie_year", ""); ?>
                </div>
                <div class="col-6">
                    <?php inputElement("<i class='fas fa-star-half-alt'></i>", "Rate 1-10", "movie_rate", ""); ?>
                </div>
            </div>
            <div class="row button-group justify-content-center">
                <?php buttonElement("btn-create", "btn", "<i class='fas fa-plus'></i>", "create", "data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                <?php buttonElement("btn-read", "btn", "<i class='fas fa-sync'></i>", "read", "data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                <?php buttonElement("btn-update", "btn", "<i class='fas fa-pen-alt'></i>", "update", "data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                <?php buttonElement("btn-delete", "btn", "<i class='fas fa-trash-alt'></i>", "delete", "data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
            </div>
        </form>

        <div class="row table-data">
            <table class="table1">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Movie Name</th>
                        <th>Year</th>
                        <th>Rate</th>
                        <th>Edit</th>
                        <!-- <th>Delete</th> -->
                    </tr>
                </thead>
                <tbody id="tbody" class="text-center">
                    <?php
                    if (isset($_POST['read'])) {
                        $result = getData();

                        if ($result) {

                            while ($row = mysqli_fetch_assoc($result)) { ?>

                                <tr>
                                    <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                    <td data-id="<?php echo $row['id']; ?>"><?php echo $row['movie_name']; ?></td>
                                    <td data-id="<?php echo $row['id']; ?>"><?php echo $row['movie_year']; ?></td>
                                    <td data-id="<?php echo $row['id']; ?>"><?php echo $row['movie_rate'] . " / 10"; ?></td>
                                    <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"></i></td>
                                    <!-- <td><i class="fas fa-trash-alt btndelete" data-id="<?php echo $row['id']; ?>"></i></td> -->
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="./php/main.js"></script>
</body>

</html>