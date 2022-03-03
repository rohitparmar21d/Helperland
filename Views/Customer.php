<?php include('./header.php'); 

$base_url = "http://localhost/Helperland/";
?>

<link rel="stylesheet" href="./assets/css/Customer.css">


<title>Customer</title>
</head>

<body>
    <header>
        <?php include('./navbar.php'); ?>
    </header>
    <!--Service detail Modal-->
    <div class="modal fade" id="servicedetailmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" id="mod" role="document">
            <div class="modal-content SD">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Service Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body ">
                    <div class="register-inputs  me-0 ms-0">
                        <div class="row">
                            <div>
                                <span class="service-datetime">05/10/2021&nbsp;8:00 - 11:30</span>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <span class="service-detail">Duration: </span>
                            </div>
                            <div class="service-detail-text">
                                <span> 3.5 Hrs</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div>
                                <span class="service-detail">Service Id: </span>
                            </div>
                            <div class="service-detail-text">
                                <span> 123</span>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <span class="service-detail">Extras: </span>
                            </div>
                            <div class="service-detail-text">
                                <span> Inside cabinets</span>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <span class="service-detail">Net Amount: </span>
                            </div>
                            <div class="service-detail-euro">
                                <span> &euro; 87.5</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div>
                                <span class="service-detail">Service Address: </span>
                            </div>
                            <div class="service-detail-text">
                                <span> rajnagar-5, 360003 Rajkot</span>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <span class="service-detail">Billing Address: </span>
                            </div>
                            <div class="service-detail-text">
                                <span> rajnagar-5, 360003 Rajkot</span>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <span class="service-detail">Phone: </span>
                            </div>
                            <div class="service-detail-text">
                                <span> 9849389349</span>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <span class="service-detail">Email: </span>
                            </div>
                            <div class="service-detail-text">
                                <span> ksfds12@gmail.com</span>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div>
                                <span class="service-detail">Comments: </span>
                            </div>
                            <div class="service-detail-text">
                                <span> service is good.</span>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <span><i class="fas fa-times-circle"></i> </span>
                            </div>
                            <div class="service-detail-text">
                                <span> I don't have pets at home</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ft">
                    <button name="submit" class="btn btn-reschedule" data-toggle="modal" data-bs-target="#reschedule_modal"><i class="fas fa-history"></i>&nbsp; Reschedule</button>
                    <button name="submit" class="btn btn-cancel" data-toggle="modal" data-target="#cancel_bookingrequest_modal"><i class="fas fa-times"></i>&nbsp; Cancel</button>
                </div> -->
            </div>
        </div>
    </div>
    <!--reschedule modal-->
    <div class="modal fade" id="reschedule_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Reschedule Service Request</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="register-inputs me-0 ms-0">
                        <label class="cancel-question "><b>Select New Date and Time</b></label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input class="input-element rescheduledate" type="date" id="formdate" name="formdate" data placeholder="From Date">                   
                            </div>
                            <div class="col-sm-6">
                                <select name="booktime" class="rescheduletime" id="booktime">
                                    <option value=0>00:00</option>
                                    <option value="3:00">3:00 PM</option>
                                    <option value="4:00">4:00 PM</option>
                                    <option value="5:00">5:00 PM</option>
                                    <option value="6:00">6:00 PM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-update">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!--cancel-->
    <div class="modal fade" id="cancel_bookingrequest_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle"><b>Cancel Service Request</b></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="register-inputs me-0 ms-0">
                        <label class="cancel-question temp"><b>Why you want to cancel the service request?</b></label>
                        <textarea class="why-cancel" name="whycancel"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="submit" class="btn btn-cancelnow">Cancel Now</button>
                </div>
            </div>
        </div>
    </div>

    <!--Rate SP-->
    <div class="modal fade" id="ratesp_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ratesp">
                <!-- <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">
                        <div class="d-flex align-items-center justify-content-left">
                            <div>
                                <img class="round-border" src="./assets/Image/forma-1-copy-19.png" alt="cap">
                            </div>
                            <div class="ps-2">
                                <p class="sp-details">Lyum Watson</p>
                                <p class="sp-details">
                                    <img src="./assets/Image/star1.png" alt="star">
                                    <img src="./assets/Image/star1.png" alt="star">
                                    <img src="./assets/Image/star1.png" alt="star">
                                    <img src="./assets/Image/star1.png" alt="star">
                                    <img src="./assets/Image/star2.png" alt="star">
                                    <span>3.67</span>
                                </p>
                            </div>
                        </div>
                    </h3>y
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="register-inputs me-0 ms-0">
                        <label class="rate-service-text">Rate your service provider</label>
                        <div class="row">
                            <div class="col-sm-5">
                                <label class="subtext">On time arrival</label>
                            </div>
                            <div class="col-sm-7">
                            <img src="./assets/Image/star1.png" alt="star">
                                    <img src="./assets/Image/star1.png" alt="star">
                                    <img src="./assets/Image/star1.png" alt="star">
                                    <img src="./assets/Image/star1.png" alt="star">
                                    <img src="./assets/Image/star2.png" alt="star">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label class="subtext">Friendly</label>
                            </div>
                            <div class="col-sm-7">
                            <img src="./assets/Image/star1.png" alt="star">
                                    <img src="./assets/Image/star1.png" alt="star">
                                    <img src="./assets/Image/star1.png" alt="star">
                                    <img src="./assets/Image/star1.png" alt="star">
                                    <img src="./assets/Image/star2.png" alt="star">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label class="subtext">Quality of service</label>
                            </div>
                            <div class="col-sm-7">
                            <img src="./assets/Image/star1.png" alt="star">
                                    <img src="./assets/Image/star1.png" alt="star">
                                    <img src="./assets/Image/star1.png" alt="star">
                                    <img src="./assets/Image/star1.png" alt="star">
                                    <img src="./assets/Image/star2.png" alt="star">
                            </div>
                        </div>
                        <div class="row">
                            <label class="subtext">Feedback on service provider</label>
                        </div>
                        <div class="row me-0 ms-0">
                            <textarea class="rate-feedback" name="feedback"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="submit" class="btn btn-ratesp-submit">Submit</button>
                </div> -->
            </div>
        </div>
    </div>

     <!--section-2-1--> 
     <section class="section-2-1">
     <div class="container">
        <h2 class="text-center">
         Welcome, <strong> <?php echo $_SESSION['name']; ?> !</strong>
        </h2> 
     </div>
    </section>
     <!--section-2-2-->
    <section class="section-2-2">
        <div class="row dashboard justify-content-center" id="dashboard">
            <!-- left nav -->
            <div class="col-3">
                <div class="nav flex-column nav-pills leftsidebar" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-dashboard-tab" data-toggle="pill" href="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="true">Dashboard</a>
                    <a class="nav-link" id="v-pills-history-tab" data-toggle="pill" href="#v-pills-history" role="tab" aria-controls="v-pills-history" aria-selected="false">Service History</a>
                    <a class="nav-link" id="v-pills-schedule-tab" data-toggle="pill" href="#v-pills-schedule" role="tab" aria-controls="v-pills-schedule" aria-selected="false">Service Schedule</a>
                    <a class="nav-link" id="v-pills-favpro-tab" data-toggle="pill" href="#v-pills-favpro" role="tab" aria-controls="v-pills-favpro" aria-selected="false">Favourite Pros</a>
                    <a class="nav-link" id="v-pills-invoice-tab" data-toggle="pill" href="#v-pills-invoice" role="tab" aria-controls="v-pills-invoice" aria-selected="false">Invoices</a>
                    <a class="nav-link" id="v-pills-notification-tab" data-toggle="pill" href="#v-pills-notification" role="tab" aria-controls="v-pills-notification" aria-selected="false">Notifications</a>
                </div>
            </div>
            <!-- ended nav -->
            <!-- content -->
            <div class="col-9" id="rightside">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
                        <div class="container-fluid row">
                            <div class="mr-auto "><h3 class="serhist">Current Service Requests</h3></div>
                            <button class="btn ml-auto export">Add New Service Request</button>
                        </div>
                        <div class="container-fluid row db" > 
                            <div class="col">
                                <table  class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Service Id </th>
                                            <th >Service Date </th>
                                            <th >Sevice Provider </th>
                                            <th >Payment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="dboard">
                                        <!--1st row start-->
                                        <!-- <tr class="t-row">
                                            <td id="hs">2323</td>
                                            <td id="hs">
                                                <p class="date"><img src="./assets/Image/calendar.png"> 31/03/2018</p>
                                                <p>12:00 - 18:00</p>
                                            </td>
                                            <td> 
                                                <div class="a flex-wrap row">
                                                    <div class=""><img src="./assets/Image/forma-1-copy-19.png"></div>
                                                   <div>
                                                        <p class="lum-watson">Lyum Watson</p>
                                                        <div class="rateyo" id= "rating"  data-rateyo-rating="3" > </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="euro d-flex justify-content-center">&euro; 63</p>
                                            </td>
                                            
                                            <td >
                                            <button  class="reschedule" >Resschedule</button>
                                                <button  class="cancel" >Cancel</button>
                                            </td>
                                        </tr>
                                        <tr class="t-row">
                                            <td id="hs">2323</td>
                                            <td id="hs">
                                                <p class="date"><img src="./assets/Image/calendar.png"> 31/03/2018</p>
                                                <p>12:00 - 18:00</p>
                                            </td>
                                            <td> 
                                                <div class="a flex-wrap row">
                                                    <div class=""><img src="./assets/Image/forma-1-copy-19.png"></div>
                                                   <div>
                                                        <p class="lum-watson">Lyum Watson</p>
                                                        <div class="rateyo" id= "rating"  data-rateyo-rating="3" > </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="euro d-flex justify-content-center">&euro; 63</p>
                                            </td>
                                            
                                            <td >
                                            <button  class="reschedule" >Resschedule</button>
                                                <button  class="cancel" >Cancel</button>
                                            </td>
                                        </tr> -->
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
                        <div class="container-fluid row">
                            <div class="mr-auto  "><h3 class="serhist">Service History</h3></div>
                            <button class="btn ml-auto export">Export</button>
                        </div>
                        <div class="container-fluid row" id="rightsidebar"> 
                            <div class="col">
                                <table id="content-table" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ServiceId</th>
                                            <th>Service Details </th>
                                            <th id="sd">Service Provider</th>
                                            <th id="cd">Payment</th>
                                            <th >Status</th>
                                            <th>Rate SP</th>
                                        </tr>
                                    </thead>
                                    <tbody class="history">
                                        <!--1st row start-->
                                        <!-- <tr class="t-row">
                                            <td><p>2323</p></td>
                                            <td>
                                                <p class="date"><img src="./assets/Image/calendar.png"> 31/03/2018</p>
                                                <p>12:00 - 18:00</p>
                                            </td>
                                            <td> 
                                                <div class="a flex-wrap row">
                                                    <div class=""><img src="./assets/Image/forma-1-copy-19.png"></div>
                                                   <div>
                                                        <p class="lum-watson">Lyum Watson</p>
                                                        <p>
                                                        <img src="./assets/Image/star1.png">
                                                        <img src="./assets/Image/star1.png">
                                                        <img src="./assets/Image/star1.png">
                                                        <img src="./assets/Image/star1.png">
                                                        <img src="./assets/Image/star2.png"> 
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="euro d-flex justify-content-center">&euro; 63</p>
                                            </td>
                                            <td><div class="status-completed text-center" disabled>Completed</div></td>
                                            <td ><button  class="rate-sp" >Rate SP</button></td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-schedule" role="tabpanel" aria-labelledby="v-pills-schedule-tab">
                        nbfgkjs
                    </div>
                    <div class="tab-pane fade" id="v-pills-favpro" role="tabpanel" aria-labelledby="v-pills-favpro-tab">..dds.</div>
                    <div class="tab-pane fade" id="v-pills-invoice" role="tabpanel" aria-labelledby="v-pills-invoice-tab">.ssd..</div>
                    <div class="tab-pane fade" id="v-pills-notification" role="tabpanel" aria-labelledby="v-pills-notification-tab">..ssa.</div>
                </div>
            </div>
            <!--content ended -->
        </div>
    </section>
    
    <?php include('./footer.php'); ?>
    
</body>
</html>