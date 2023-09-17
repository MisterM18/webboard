<?php
if (!isset($_SESSION['id'])) {

?>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><i class="bi bi-house-door-fill"></i>Home</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="login.php" style="color: #fff;"><i class="bi bi-pencil-square"></i>Login</a>
                </li>
            </ul>
        </div>
    </nav><?php } else { ?>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><i class="bi bi-house-door-fill"></i>Home</a>
            <ul class="navbar-nav">
                <div class="dropdown">
                    <a class="btn btn-outline-secondary dropdown-toggle btn-sm" type="button" id="Button1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-lines-fill"></i>
                        <?php echo $_SESSION['username']; ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="Button1">
                        <li><a href="logout.php" class="dropdown-item">
                                <i class="bi bi-power">Logout</i>
                            </a></li>
                    </ul>
                </div>
            </ul>
        </div>
    </nav>

<?php } ?>