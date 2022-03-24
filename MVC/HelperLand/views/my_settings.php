<?php
if (!isset($_SESSION['UserTypeId']) || $_SESSION['UserTypeId'] != 1) {
    header('LOCATION:http://localhost/HelperLand/?controller=Home&&function=index');
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Helperland</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link rel="stylesheet" type="text/css" href="./assets/css/header3.css" />
        <link rel="stylesheet" type="text/css" href="./assets/css/footer2.css" />
        <link rel="stylesheet" type="text/css" href="./assets/css/my_settings.css" />
        <link rel="stylesheet" type="text/css" href="./assets/css/media.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    </head>
    <?php
    $status1 = 3;
    $status2 = 4;
    ?>

    <body id="my_settings" onload="load_my_data(<?php echo $_SESSION['userId'] ?>)">
        <div class="preloader"></div>
        <?php
        require_once('header3.php');
        ?>
        </section>
        <div class="welcome">
            <p>Welcome,<b><?php echo $_SESSION['UserName'] ?></b></p>
        </div>
        <div class="hr"></div>
        <div class="modal fade" id="edit_address" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Edit Address</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
                    </div>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span></span>
                    </div>
                    <div class="details">
                        <div class="street_name">
                            <p>Street Name</p>
                            <input type="text" placeholder="Street Name">
                        </div>
                        <div class="house_number">
                            <p>House Number</p>
                            <input type="text" placeholder="House Number">
                        </div>
                        <div class="postal_code">
                            <p>Postal Code</p>
                            <input type="text" placeholder="Postal Code">
                        </div>
                        <div class="city">
                            <p>City</p>
                            <input type="text" placeholder="City">
                        </div>
                        <div class="mobile_number">
                            <p>Mobile number</p>
                            <div class="input-group mobile flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">+49</span>
                                <input type="number" placeholder="Mobile number" />
                            </div>
                        </div>
                    </div>
                    <button class="btn edit" onclick="change_address(<?php echo $_SESSION['userId'] ?>)">Edit</button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="delete_address" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Delete Address</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
                    </div>
                    <p>Are you sure you want to delete this address?</p>
                    <button class="btn delete_address_btn " onclick="delete_address_confirm(this.id,<?php echo $_SESSION['userId'] ?>)">Delete</button>
                </div>
            </div>
        </div>
        <div class="mid-dash">
            <section id="list">
                <div class="list-group">
                    <a class="list-group-item" href="<?= $base_url . '?controller=Home&&function=customer_dashboard' ?>">Dashboard</a>
                    <a class="list-group-item">Service History</a>
                    <a class="list-group-item">Service Schedule</a>
                    <a class="list-group-item">Favourite Pros</a>
                    <a class="list-group-item">Invoices</a>
                    <a class="list-group-item">Notification</a>
                </div>
            </section>
            <div class="table_page">
                <ul class="nav nav-tabs" role="tab-list">
                    <li class="nav-item">
                        <a class="nav-link My_details active" data-bs-toggle="tab" href="#my_details">
                            <span>My Details</span>
                            <i class="bi bi-card-text mobile_view_icon"></i>
                        </a>
                    </li>
                    <li class="nav-item" onclick="get_my_address(<?php echo $_SESSION['userId'] ?>)">
                        <a class="nav-link My_addresses" data-bs-toggle="tab" href="#my_addresses">
                            <span>My Addresses</span>
                            <i class="bi bi-geo-alt mobile_view_icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link change_password" data-bs-toggle="tab" href="#change_password">
                            <span>Change Password</span>
                            <i class="bi bi-key mobile_view_icon"></i>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="my_details" class="tab-pane show active">
                        <div class="title">My details
                            <hr>
                        </div>
                        <div class="alert alert-danger fade show" role="alert">
                        </div>
                        <div class="details">
                            <div class="first_name">
                                <p>First Name</p>
                                <input type="text" placeholder="First Name">
                            </div>
                            <div class="last_name">
                                <p>Last Name</p>
                                <input type="text" placeholder="Last Name">
                            </div>
                            <div class="email-address">
                                <p>E-mail address</p>
                                <input type="text" disabled>
                            </div>
                            <br />
                            <div class="mobile_number">
                                <p>Mobile number</p>
                                <div class="input-group mobile flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">+49</span>
                                    <input type="text" onkeypress="isNumber(event)" placeholder="Mobile number" />
                                </div>
                            </div>
                            <div class="dob">
                                <p>Date of Birth</p>
                                <select class="date">
                                    <?php
                                    for ($i = 1; $i <= 31; $i++) {
                                        echo "<option value='" . $i . "'>" . $i . "</option>";
                                    }
                                    ?>
                                </select>
                                <select class="month">
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <select class="year">
                                    <?php
                                    $year = date("Y") - 18;
                                    for ($i = $year; $i >= 1960; $i--) {
                                        echo "<option value='" . $i . "'>" . $i . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <p>My Preferred Language</p>
                        <select class="language">
                            <option>English</option>
                            <option>German</option>
                        </select>
                        <br />
                        <button class="btn profile_save" onclick="change_my_profile_data(<?php echo $_SESSION['userId'] ?>)">Save</button>
                    </div>
                    <div id="my_addresses" class="tab-pane">
                        <div class="title">My Addersses
                            <hr>
                        </div>
                        <div class="alert alert-success fade show" role="alert">
                            <span></span>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Addresses</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div id="change_password" class="tab-pane">
                        <div class="title">Change Password
                            <hr>
                        </div>
                        <div class="alert alert-danger fade show" role="alert">
                        </div>
                        <div class="passwords">
                            <p>Old Password</p>
                            <input type="password" class="old_pass" placeholder="Old Password" />
                            <p>New Password</p>
                            <input type="password" class="new_pass" placeholder="New Password" />
                            <p>Confirm Password</p>
                            <input type="password" class="confirm_pass" placeholder="Confirm Password" /><br>
                            <button class="btn" onclick="change_password(<?php echo $_SESSION['userId'] ?>)">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once('footer2.php')
        ?>
        <script src="./assets/js/helperland.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    </body>

    </html>
<?php
}
?>
