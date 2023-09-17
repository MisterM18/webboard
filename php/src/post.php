<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <h1 style="text-align: center; " class="mt-3">Webboard</h1>
        <br>
        <?php include "nav.php"; ?>
        <br>
        <?php
         $host = 'db';
         $user = 'root';
         $pass = 'MYSQL_ROOT_PASSWORD';
         $db = 'webboard';
         $conn = new mysqli($host, $user, $pass, $db);
        $sql = "SELECT t1.title,t1.content,t2.login,t1.post_date
            FROM post as t1 INNER JOIN user as t2 ON (t1.user_id=t2.id) where t1.id=$_GET[id]";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card border-primary'>";
                echo "<div class='card-header bg-primary text-white'>" . $row['title'] . "</div>";
                echo "<div class='card-body'>" . $row['content'] . "<br><br>" . $row['login'] . " - " . $row['post_date'] . "</div>";
                echo "</div>";
            }
        }
        ?>
        <br>
        <?php
        $sql = "SELECT t1.content,t2.login,t1.post_date FROM comment as t1 
            INNER JOIN user as t2 On(t1.user_id = t2.id) where t1.post_id=$_GET[id]
            ORDER BY t1.post_date ";
        $result = $conn->query($sql);
        $i = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card border-info'>";
                echo "<div class='card-header bg-info text-white'>ความคิดเห็นที่ $i</div>";
                echo "<div class='card-body'>" . $row['content'] . "<br><br>" . $row['login'] . " - " . $row['post_date'] . "</div>";
                echo "</div><br>";
                $i += 1;
            }
        }
        $conn->close();

        ?>
        <br>
        <?php if (isset($_SESSION['id'])) { ?>
        <div class="card text-dark bg-white border-success ">
            <div class="card-header bg-success text-white">แสดงความคิดเห็น</div>
            <div class="card-body">
                <form action="post_save.php" method="post">
                    <input type="hidden" name="post_id" value="<?= $_GET['id']; ?>">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-lg-10">
                            <textarea name="comment" class="form-control" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <center>
                                <button type="submit" class="btn btn-success btn-sm text-white">
                                    <i class="bi bi-box-arrow-up-right me-1"></i>ส่งข้อความ</button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
</body>

</html>