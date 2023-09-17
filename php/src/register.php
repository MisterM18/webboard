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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <script src="scripts.js"></script>
</head>

<body>
    <div class="container" >
        <h2 style="text-align: center; color: #fff;">Webboard</h2>
        <?php include "nav.php"; ?>
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
                <br>
                <br><center>
       <div class="wrapper">
            <div class="form-box">
                <h2 style="color:#fff;"><center>Register</center></h2>
                <form action="register_save.php" method="post">
                    <div class="input-box">
                        <span class="icon" style="color:#fff;" >
                        <ion-icon name="person-circle"></ion-icon>
                        </span>
                        <input type="Username" name="login" required>
                        <label>Username</label>
                    </div>
                    <div class="input-box">
                        <span class="icon" style="color:#fff;">
                        <ion-icon name="mail"></ion-icon>
                        </span>
                        <input type="text" name ="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <!-- <span class="input-group-text" onclick="password_Show_hide();">
                                        <i class="bi bi-eye-fill" id="show_eye"></i>
                                        <i class="bi bi-eye-slash-fill d-none " id="hide_eye"></i>
                         </span> -->
                        <input type="password" name="pwd" required>
                        <label>Password</label>
                        
                    </div>
                    <div class="input-box">
                        <span class="icon"></span>
                        <input type="text" name="namelastname" required>
                        <label>Name & Surname</label>
                    </div>
                    <label class="col-lg-3 form-label" style="color:#fff;">Geneal</label>
                                <div class="col-lg-9">
                                    <div class="form-check" style="color:#fff;" >
                                        <input type="radio" name="gender" value="m" class="form-check-input" required>
                                        <label class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check" style="color:#fff;">
                                        <input type="radio" name="gender" value="f" class="form-check-input" required>
                                        <label class="form-check-label">Female</label>
                                    </div>
                                    <div class="form-check" style="color:#fff;">
                                        <input type="radio" name="gender" value="o" class="form-check-input" required>
                                        <label class="form-check-label">Other</label>
                                    </div>
                                </div>
                    <button type="submit" class="btn">Register

                    </button>
                </form>
            </div>
           
       </div>
       <center>
    </div>
</body>

</html>