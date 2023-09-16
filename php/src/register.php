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
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;" class="mt-3">Webboard Mong</h1>
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
                    <div class="card-header bg-primary text-white">เข้าสู่ระบบ</div>
                    <div class="card-body">
                        <form action="register_save.php" method="post">
                            <div class="row">
                                <label class="col-lg-3 form-label">ชื่อบัญชี :</label>
                                <div class="col-lg-9"><input type="text" name="login" class="form-control " required>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-lg-3 form-label">รหัสผ่าน :</label>
                                <div class="col-lg-9"> <input type="password" name="pwd" class="form-control " required>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label class="col-lg-3 form-label">ชื่อ-นามสกุล :</label>
                                <div class="col-lg-9"> <input type="text" name="namelastname" class="form-control"
                                        required></div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-lg-3 form-label">เพศ :</label>
                                <div class="col-lg-9">
                                    <div class="form-check">
                                        <input type="radio" name="gender" value="m" class="form-check-input" required>
                                        <label class="form-check-label">ชาย</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="gender" value="f" class="form-check-input" required>
                                        <label class="form-check-label">หญิง</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="gender" value="o" class="form-check-input" required>
                                        <label class="form-check-label">อื่นๆ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label class="col-lg-3 form-label">email :</label>
                                <div class="col-lg-9"> <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-9"> <button type="submit" class="btn btn-primary btn-sm "><i
                                            class="bi bi-save"></i> สมัครสมาชิก</button></div>
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