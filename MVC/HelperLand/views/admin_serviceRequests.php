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
    <link rel="stylesheet" type="text/css" href="./assets/css/admin_serviceRequests.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
</head>

<body onload="load_data_of_admin_service_request(),create_option('select_customer',1),create_option('select_sp',2)">
    <div class="preloader"></div>
    <?php
        require_once("admin_header.php");
    ?>
    <div class="modal fade" id="failed_edit" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <span class="false"><img src="./assets/images/cross_error.png" /></span>
          <p class="text"></p>
          <button type="button" class="btn ok_book" data-bs-dismiss="modal">OK</button>
        </div>
      </div>
    </div>
    <div class="modal fade" id="cancle_request" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                        <div class="modal-header">
                            <h5>Cancle Service Request</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
                        </div>
                        <div class="reason">
                        Why you want to cancle the service request?
                        <textarea rows='3'></textarea>
                        </div>
                        <button class="btn cancle_btn" onclick="cancle_btn(this.id,<?php echo $_SESSION['userId'] ?>,<?php echo $_SESSION['UserTypeId'] ?>)">Cancle Now</button>
                </div>
        </div>
    </div>
    <div class="modal fade" id="reschedule_request" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5>Edit Service Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
                    </div>
                    <div class="alert alert-danger fade show" role="alert">
                    </div>
                    <div class="modal_body">
                        <div>
                            Date
                            <div class="date">
                            <img src="./assets/images/admin_calendar.png">
                            <input type="text" value="<?php echo date("d/m/Y"); ?>"/>
                            </div>
                        </div>
                        <div class="right">
                            Time
                            <select id="when_need">
                            <option value="08.00">8:00</option>
                            <option value="08.30">8:30</option>
                            <option value="09.00">9:00</option>
                            <option value="09.30">9:30</option>
                            <option value="10.00">10:00</option>
                            <option value="10.30">10:30</option>
                            <option value="11.00">11:00</option>
                            <option value="11.30">11:30</option>
                            <option value="12.00">12:00</option>
                            <option value="12.30">12:30</option>
                            <option value="13.00">13:00</option>
                            <option value="13.30">13:30</option>
                            <option value="14.00">14:00</option>
                            <option value="14.30">14:30</option>
                            <option value="15.00">15:00</option>
                            <option value="15.30">15:30</option>
                            <option value="16.00">16:00</option>
                            <option value="16.30">16:30</option>
                            <option value="17.00">17:00</option>
                            <option value="17.30">17:30</option>
                            <option value="18.00">18:00</option>
                            </select>
                        </div>
                        <p class="header_part">Service Address</p>
                        <div class="street_name">
                            <p>Street Name</p>
                            <input type="text" placeholder="Street Name">
                        </div>
                        <div class="house_number right">
                            <p>House Number</p>
                            <input type="text" placeholder="House Number">
                        </div>
                        <div class="postal_code">
                            <p>Postal Code</p>
                            <input type="text" placeholder="Postal Code">
                        </div>
                        <div class="city right">
                            <p>City</p>
                            <input type="text" placeholder="City">
                        </div>
                        <p class="header_part">Invoice Address</p>
                        <div class="street_name">
                            <p>Street Name</p>
                            <input type="text" placeholder="Street Name">
                        </div>
                        <div class="house_number right">
                            <p>House Number</p>
                            <input type="text" placeholder="House Number">
                        </div>
                        <div class="postal_code">
                            <p>Postal Code</p>
                            <input type="text" placeholder="Postal Code">
                        </div>
                        <div class="city right">
                            <p>City</p>
                            <input type="text" placeholder="City">
                        </div>
                        <p class="header_part">Why do you want reschedule service request?</p>
                        <textarea rows="3" placeholder="Why do you want reschedule service request?"></textarea>
                        <p class="header_part">Call Center EMP Notes</p>
                        <textarea rows="3" placeholder="Enter Notes"></textarea>
                    </div>
                    <button class="btn reschedule_btn" onclick="edit_sr_admin(this.id,<?php echo $_SESSION['userId'] ?>)">Update</button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="refund_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5>Refund Amount</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-labelledby="close"></button>
                    </div>
                    <div class="alert alert-danger fade show" role="alert">
                    </div>
                    <div class="modal_body">
                        <div class="all_amount">
                            <div class="paid_amount">
                                <span>Paid Amount</span><br>
                                <span class="figure">00.00 €</span>
                            </div>
                            <div class="refund_amount">
                                <span>Refunded Amount</span><br>
                                <span class="figure">00.00 €</span>
                            </div>
                            <div class="balance_amount">
                                <span>In Balance Amount</span><br>
                                <span class="figure">00.00 €</span>
                            </div>
                        </div>
                        <div class="calculate">
                            <div class="amount">
                                <p class="header_part">Amount</p>
                                <input >
                                <select>
                                    <option value="0">Percentage</option>
                                    <option value="1">Fixed</option>
                                </select>
                            </div>
                            <div class="calculation">
                                <p class="header_part">Calculate</p>
                                <button class="btn" onclick="calculate_amount()">Calculation</button>
                                <input disabled>
                            </div>
                        </div>
                        <p class="header_part">Why you want to refund amount?</p>
                        <textarea rows="3" class="reason" placeholder="Why you want to refund amount?"></textarea>
                        <p class="header_part">Call Center EMP Notes</p>
                        <textarea rows="3" class="notes" placeholder="Enter Notes"></textarea>
                    </div>
                    <button class="btn refund_btn" onclick="refund_amount(this.id)">Refund</button>
            </div>
        </div>
    </div>
    <section class="page_content">
        <div class="list-group">
            <a class="list-group-item active">Service Requests</a>
            <a class="list-group-item " href="<?= $base_url.'?controller=Home&&function=admin_user_man' ?>">User Management</a>
        </div>
        <div class="table_content">
            <p class="title">Service Requests</p>
            <div class="filter">
                <input type="text" class="service_id" placeholder="Service ID"/>
                <input type="text" class="postal_code" placeholder="Postal Code"/>
                <input type="email" class="email" placeholder="Email"/>
                <select class="select_customer">
                    <option value="-1" disabled selected>Select Customer</option>
                </select>
                <select class="select_sp">
                    <option value="-1" disabled selected>Select Service Provider</option>
                </select>
                <select class="select_status">
                    <option selected disabled value="-1">Select Status</option>
                    <option value="0">New</option>
                    <option value="1">Pending</option>
                    <option value="3">Completed</option>
                    <option value="4">Canceled</option>
                </select>
                <select class="select_sp_payment">
                    <option selected disabled value="-1">SP payment Status</option>
                    <option value="3">Settled</option>
                    <option value="0">Not Applicable</option>
                </select>
                <select class="select_p_status">
                    <option selected disabled value="-1">Select Status</option>
                </select>
                <input type="checkbox" id="issue"><label for="issue">Has issue</label>
                <div class="date">
                    <img src="./assets/images/admin_calendar.png">
                    <input type="text" placeholder="From Date" class="start_date"/>
                </div>
                <div class="date">
                    <img src="./assets/images/admin_calendar.png">
                    <input type="text" placeholder="To Date" class="end_date"/>
                </div>
                <button class="btn search" onclick="load_data_of_admin_service_request()">Search</button>
                <button class="btn clear" onclick="clear_filter()">Clear</button>
            </div>
            <div class="alert alert-success fade show" role="alert">
            </div>
            <div class="table_data">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">
                            Service ID
                        </th>
                        <th scope="col">
                            Service date
                        </th>
                        <th scope="col">
                            Customer details
                        </th>
                        <th scope="col">
                            Service Provider
                        </th>
                        <th scope="col">
                            Gross Amount
                        </th>
                        <th scope="col">
                            Net Amount
                        </th>
                        <th scope="col">
                            Discount
                        </th>
                        <th scope="col">
                            Status
                        </th>
                        <th scope="col">
                            Payment Status
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</body>

</html>
<?php
  }
?>