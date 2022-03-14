<?php 
  if(!isset($_SESSION['UserTypeId']) || $_SESSION['UserTypeId']!=2)
  {
    header('LOCATION:http://localhost/HelperLand/?controller=Home&&function=index');
  }
  else{
?>
<!DOCTYPE html>
<html>

<head>
    <title>Helperland</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" type="text/css" href="./assets/css/header4.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/footer2.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/sp_mySetting.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/media.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
</head>

<body id="my_settings" onload="get_sp_data(<?php echo $_SESSION['userId'] ?>)">
    <div class="preloader"></div>
    <?php
    require_once('header4.php');
    ?>
    </section>
    <div class="welcome">
        <p>Welcome,<b><?php echo $_SESSION['UserName'] ?></b></p>
    </div>
    <div class="hr-line"></div>
    <div class="mid-dash">
        <section id="list">
            <div class="list-group">
                <a class="list-group-item">Dashboard</a>
                <a class="list-group-item" href="<?= $base_url . '?controller=Home&&function=sp_newService' ?>">New Service Requests</a>
                <a class="list-group-item" href="<?= $base_url . '?controller=Home&&function=sp_upComingService' ?>">Upcoming Services</a>
                <a class="list-group-item">Service Schedule</a>
                <a class="list-group-item" href="<?= $base_url . '?controller=Home&&function=sp_serviceHistory' ?>">Service History</a>
                <a class="list-group-item" href="<?= $base_url . '?controller=Home&&function=sp_myRating' ?>">My Ratings</a>
                <a class="list-group-item" href="<?= $base_url . '?controller=Home&&function=sp_blockCustomer' ?>">Block Customer</a>
            </div>
        </section>
        <div class="table_page">
            <ul class="nav nav-tabs" role="tab-list">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#my_all_details">
                        <span>My Details</span>
                        <i class="bi bi-card-text mobile_view_icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#change_password">
                        <span>Change Password</span>
                        <i class="bi bi-key mobile_view_icon"></i>
                    </a>
                </li>
            </ul>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            </div>
            <div class="tab-content">
                <div id="my_all_details" class="tab-pane show active">
                <div class="title">My Details
                        <hr>
                    </div>
                    <div id="my_details">
                        <div class="acc_status_lable"><span class='lable'>Account Status: </span><span class="acc_status">Active</span></div>
                        <div class="basic_details">
                            <img class="selcted_avatar_img " src="./assets/images/avatar-hat.png" />
                            <p class="div_header lable">Basic Details</p>
                            <hr>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                                <div class="nationality_select">
                                    <p>Nationality</p>
                                    <select class="nationality">
                                        <option value="german" selected>German</option>
                                        <option value="indian">Indian</option>
                                    </select>
                                </div>
                            </div>
                            <div class="gender">
                                <p>Gender</p>
                                <input type="radio" id="1" value="1" name="gender"><label for="1">Male</label>
                                <input type="radio" id="0" value="0" name="gender"><label for="0">Female</label>
                                <span><input type="radio" id="2" value="2" name="gender"><label for="2">Rather not to say</label></span>
                            </div>
                            <div class="avatar">
                                <p>Select Avatar</p>
                                <img class="car" src="./assets/images/avatar-car.png" onclick="change_avatar(this.className)" />
                                <img class="female" src="./assets/images/avatar-female.png" onclick="change_avatar(this.className)" />
                                <img class="hat" src="./assets/images/avatar-hat.png" onclick="change_avatar(this.className)" />
                                <img class="iron" src="./assets/images/avatar-iron.png" onclick="change_avatar(this.className)" />
                                <img class="male" src="./assets/images/avatar-male.png" onclick="change_avatar(this.className)" />
                                <img class="ship" src="./assets/images/avatar-ship.png" onclick="change_avatar(this.className)" />
                            </div>
                        </div>
                    </div>
                    <div id="edit_address">
                        <p class="div_header lable">My Address</p>
                        <hr>
                        <p class="alert alert-danger alert-dismissible fade show" role="alert">
                        </p>
                        <div class="streetName">
                            <p>Street name</p>
                            <input type="text" placeholder="Street name">
                        </div>
                        <div class="houseNumber">
                            <p>House number</p>
                            <input type="text" placeholder="House number">
                        </div>
                        <div class="postalcode">
                            <p>Postal code</p>
                            <input type="text" placeholder="Postal code">
                        </div>
                        <div class="city">
                            <p>City</p>
                            <input type="text" placeholder="City">
                            <hr>
                        </div>
                    </div>
                    <button class="btn profile_save" onclick="change_sp_profile_data(<?php echo $_SESSION['userId'] ?>)">Save</button>
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
    require_once("footer2.php");
    ?>
    <script src="./assets/js/helperland.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
<?php 
  }
  ?>