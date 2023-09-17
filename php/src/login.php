<?php session_start();
if (isset($_SESSION['id'])) {
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
    <title>Login</title>
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
    <script>
    function password_Show_hide() {
        let x = document.getElementById("password");
        let show_eye = document.getElementById("show_eye");
        let hide_eye = document.getElementById("hide_eye");
        hide_eye.classList.remove("d-none");
        if (x.type == "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
    </script>

<body style="align-items: center;" >
    <div class="container">
        <h2 style="text-align: center; color: #fff;">Webboard</h2>
        <?php include "nav.php"; ?>
        <br>

                <?php
                if (isset($_SESSION['error'])) {
                    echo "<div class='alert alert-danger'>Username Or Password not correct</div>";
                    unset($_SESSION['error']);
                }
                ?>
                <center>
                <div class="card" >
                    <br>
                    <h2 style="color: #fff;">Welcome</h2>
                    <div class="card-body">
                        <form action="verify.php" method="post">
                        <div class="input-box">
                                <span class="icon " style="color:#fff;" >
                                <ion-icon name="person-circle"></ion-icon>
                                </span>
                                <input type="Username" name="login" required>
                                 <label>Username</label>
                        </div>
                        <div class="input-box">
                            <span class="icon"></span>
                            <input type="password" name="pwd" required>
                            <label>Password</label>
                        </div>
                            <!-- <span class="input-group-text" onclick="password_Show_hide();">
                                        <i class="bi bi-eye-fill" id="show_eye"></i>
                                        <i class="bi bi-eye-slash-fill d-none " id="hide_eye"></i>
                                 </span> -->
                                 <button type="submit" class="btn">Login</button>
                        </form>
                    </div>
                    <div align="center" style="color:#fff;">
                         Don't have an account? <a href="register.php">Register</a>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
    </center>
</body>

</html>