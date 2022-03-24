<?php $base_url = "http://localhost/HelperLand/"; ?>
<section id="header">
    <nav class="navbar navbar-expand-md fixed-top">
        <a class="navbar-brand">
            <span>helperland</span>
        </a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item profile">
                    <a class="nav-link">
                        <div>
                            <img src="./assets/images/admin-user.png" alt="" class="img-fluid user-img">
                            <span class="username"><?php echo $_SESSION['UserName'] ?></span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="logout()">
                        <img src="./assets/images/logout.png" class="img-fluid logout">
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</section>