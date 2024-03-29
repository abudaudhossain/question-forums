<?php 

require 'connect.php';

$sql = "SELECT * FROM `questions` WHERE user_id = 1";

$result = $conn -> query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/my_work_dir/php-crud-project/">Question forums</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="/my_work_dir/php-crud-project/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/my_work_dir/php-crud-project/myQuestion.php">My Question</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/my_work_dir/php-crud-project/addQuestion.php">Add Question</a>
                    </li>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <!-- ==========start all question sections ===========  -->
    <section class="w-75 m-auto">
        <?php if($_GET){?>
        <div class="alert alert-danger" role="alert"> item deleted
        </div>
        <?php } ?>
        <div class="container">

            <?php while($row = $result->fetch_assoc()){ ?>



            <div class="row">
                <div class="col">
                    <div class="card  my-4">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['title'] ?></h5>
                            <p class="card-text">
                                <?php echo $row['description'] ?>
                            </p>
                            <a href="/my_work_dir/php-crud-project/details.php?id=<?php echo $row['id'] ?>"
                                class="btn btn-primary">Details</a>

                            <a href="/my_work_dir/php-crud-project/QueUpdate.php?id=<?php echo $row['id'] ?>"
                                class="btn btn-success">Update</a>
                            <a href="/my_work_dir/php-crud-project/delete.php?id=<?php echo $row['id'] ?>"
                                onclick="return confirm('are you sure?')" class="btn btn-danger"> Delete</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>

        </div>
    </section>
    <!-- ==========end all question sections ===========  -->

    <script>

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>