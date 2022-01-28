<?php
$id = $_GET["id"];
require 'connect.php';

$sql = "SELECT * FROM `questions` WHERE id = $id";

$result = $conn -> query($sql);
$question = $result -> fetch_assoc();

$sql2 = "SELECT * FROM `answer` WHERE questions_id = $id";
$answers = $conn -> query($sql2);
 
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


    <section class="w-75 m-auto">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card  my-4">
                        <div class="card-body mb-4">
                            <h5 class="card-title"><?php echo $question["title"];?></h5>
                            <p class="card-text">
                                <?php echo $question["description"];?>
                            </p>
                            <p class="card-text">
                                With supporting text below as a natural lead-in to additional content.
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam quod quas ut delectus
                                recusandae optio voluptas possimus pariatur fugit aliquid asperiores sed odio, a
                                corporis incidunt maxime nihil, commodi quae?

                                With supporting text below as a natural lead-in to additional content.
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam quod quas ut delectus
                                recusandae optio voluptas possimus pariatur fugit aliquid asperiores sed odio, a
                                corporis incidunt maxime nihil, commodi quae?

                            </p>
                            <p class="card-text">
                                With supporting text below as a natural lead-in to additional content.
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam quod quas ut delectus
                                recusandae optio voluptas possimus pariatur fugit aliquid asperiores sed odio, a

                                corporis incidunt maxime nihil, commodi quae?
                                With supporting text below as a natural lead-in to additional content.
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam quod quas ut delectus
                                recusandae optio voluptas possimus pariatur fugit aliquid asperiores sed odio, a
                                corporis incidunt maxime nihil, commodi quae?

                            </p>

                        </div>
                        <h3 class="m-3">Comments</h3>
                        <?php while($answer = $answers -> fetch_assoc()){ ?>
                        <div class="card  ms-5 me-3 mb-2">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <?php
                                $user_id = $answer['user_id'];
                                $sql = "SELECT * FROM `users` WHERE user_id = '$user_id'";
                                $user = $conn -> query($sql) ->fetch_assoc() ;
                                echo $user["name"]
                                ?>
                                </h6>
                                <p class="card-text">
                                    <?php echo $answer['answer'] ?>
                                </p>

                            </div>
                        </div>
                        <?php }?>
                        <div class="card  ms-5 me-3 mb-2">
                            <div class="card-body">
                                <h6 class="card-title">User Name</h6>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam quod quas ut
                                    delectus
                                    recusandae optio voluptas possimus pariatur fugit aliquid asperiores sed odio, a
                                    corporis incidunt maxime nihil, commodi quae?
                                </p>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="store_answer.php" method="post">
                        <input class="d-none" type="text" name="post_id" value="<?php echo $id ?>">
                        <input class="d-none" type="text" name="user_id" value="1">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                name="comment" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Comments</label>
                        </div>
                        <button type="submit" class="btn btn-primary my-3">Comment</button>
                    </form>
                </div>
            </div>


        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>