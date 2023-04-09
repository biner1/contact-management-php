<nav class="navbar navbar-expand-sm navbar-light bg-light shaow-sm ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse px-5" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item d-flex">
                <img src="asset/image/phone-book.png" alt="" width='50'>
                <a class="nav-link text-dark font-weight-bold" href="index.php">Contact Manager</a>
            </li>
        </ul>
        
        <ul class="navbar-nav">
            <li class=' nav-item'>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"
                        style='background-color: #fff !important; color: black !important;'>

                        <img src="asset/image/user.png" alt="" style='width: 30px'>
                        <?= $_SESSION['username'] ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="contacts.php?export=csv">
                            Exort CSV</a>

                        <a class="dropdown-item" href="logout.php">
                            <img src="asset/image/off.png" alt="" style='width: 20px'>
                            Logout</a>
                    </div>
                </div>

            </li>
        </ul>
    </div>
</nav>