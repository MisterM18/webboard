<?php session_start();
if(isset($_SESSION['id'])){
    header("location:index.php");
    die();
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2 style="text-align: center; color: #fff;">Webboard</h2>
        <?php include "nav.php"; ?>
        <br>
        <div class="row">

            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <?php
                    if(isset($_SESSION['add_login'])){
                        if($_SESSION['add_login']=="error"){
                            echo "<div class= 'alert alert-danger'>
                                    ชื่อบัญชีซ้ำหรือฐานข้อมูลมีปัญหา</div>";
                        }else if($_SESSION['add_login']=="success") {
                        echo "<div class= 'alert alert-success'>
                                    เพิ่มบัญชีเรียบร้อยแล้ว</div>";
                        }
                        unset($_SESSION['add_login']);
                    }
                
                ?>
                <div class="card border-primary">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form action="register_save.php" method="post">
                            <div class="row">
                                <label class="col-lg-3 form-label">Username</label>
                                <div class="col-lg-9"><input type="text" name="login" class="form-control " required>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-lg-3 form-label">Password</label>
                                <div class="col-lg-9"> <input type="password" name="pwd" class="form-control " required>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-lg-3 form-label">Name&Surname</label>
                                <div class="col-lg-9"> <input type="text" name="namelastname" class="form-control"
                                        required></div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-lg-3 form-label">Geneal</label>
                                <div class="col-lg-9">
                                    <div class="form-check">
                                        <input type="radio" name="gender" value="m" class="form-check-input" required>
                                        <label class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="gender" value="f" class="form-check-input" required>
                                        <label class="form-check-label">Female</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="gender" value="o" class="form-check-input" required>
                                        <label class="form-check-label">Other</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-lg-3 form-label">Email</label>
                                <div class="col-lg-9"> <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9"> <button type="submit" class="btn btn-primary btn-sm "><i
                                            class="bi bi-save"></i> Register</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>

    </div>
</body>

</html>