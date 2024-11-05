<link rel="stylesheet" href="css/style.css">
<nav class="navbar">
    <div>
        <h1 class="text-xl">furever online management system</h1>
    </div>
    <div class="linksDiv">
        <ul class="flex gap-8">
            <li><a href="home.php">Home</a></li>
            <li><a href="account.php">Account</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </div>
    <div>
        <div class="flexDiv items-center">
            <div><small><?php echo $_SESSION['user'] ?></small></div>
        <button onclick="openMenu()" class="btnMenu">
            <img src="public/img16.png" alt="" class="img">
        </button>
        </div>
        <div class="menu-container show-pop  hide-pop" id="menuPop">
            <ul class="menu-ul small-l">
                <li><a href="home.php">Home</a></li>
                <li><a href="">My account</a></li>
                <li><a href="index.php">Signin</a></li>
                <li><a href="">Signup</a></li>
                <br>
                <br>
                <li><a href="admin-login.php">Admin</a></li>
                <br>
                <li><a href="index.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<script src="js/app.js"></script>