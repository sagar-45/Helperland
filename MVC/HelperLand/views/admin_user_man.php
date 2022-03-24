<?php 
  if(!isset($_SESSION['UserTypeId']) || $_SESSION['UserTypeId']!=3)
  {
    header('LOCATION:http://localhost/HelperLand/?controller=Home&&function=index');
  }
  else{
?>
<!DOCTYPE html>
<html>

<head>
    <title>Helperland</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="./assets/css/admin_header.css" />
    <link rel="stylesheet" type="text/css" href="./assets/css/admin_user_man.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
</head>

<body onload="load_admin_userManagement(),create_option('select_username',1,2)">
    <div class="preloader"></div>
    <?php
        require_once("admin_header.php");
    ?>
    <section class="page_content">
        <div class="list-group">
            <a class="list-group-item" href="<?= $base_url.'?controller=Home&&function=admin_serviceRequests' ?>">Service Requests</a>
            <a class="list-group-item active">User Management</a>
        </div>
        <div class="table_content">
            <div class="text_button">
                <span class="title">User Management </span>
                <button class="btn add_user">
                    <img src="./assets/images/add.png">
                    <span>Add New User</span>
                </button> 
            </div>
            <div class="filter">
                <select class="select_username">
                    <option value="-1" disabled selected>Select UserName</option>
                </select>
                <select class="select_usertype">
                    <option selected disabled value="-1">Select User Type</option>
                    <option value="1">Customer</option>
                    <option value="2">Service provider</option>
                </select>
                <input type="text" class="postal_code" placeholder="Postal Code"/>
                <input type="email" class="email" placeholder="Email"/>
                <div class="date">
                    <img src="./assets/images/admin_calendar.png">
                    <input type="text" placeholder="From Date" class="start_date"/>
                </div>
                <div class="date">
                    <img src="./assets/images/admin_calendar.png">
                    <input type="text" placeholder="To Date" class="end_date"/>
                </div>
                <button class="btn search" onclick="load_admin_userManagement()">Search</button>
                <button class="btn clear" onclick="clear_filter()">Clear</button>
            </div>
            <div class="alert alert-success fade show" role="alert">
            </div>
            <div class="table_data">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">
                            User Name
                        </th>
                        <th scope="col">
                            Role
                        </th>
                        <th scope="col">
                            Date of Registration
                        </th>
                        <th scope="col">
                            User Type
                        </th>
                        <th scope="col">
                            Phone 
                        </th>
                        <th scope="col">
                            Postal code
                        </th>
                        <th scope="col">
                            Status
                        </th>
                        <th scope="col">
                            Actions
                        </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <p class="right_r">©2018 Helperland. All rights reserved.</p>
        </div>
    </section>
    <script src="./assets/js/helperland.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</body>
</html>
<?php
  }
?>