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
                        <div class="container-fluid row" id="rightsidebar"> 
                            <div class="col">
                                <table id="content-table" class="table table-hover">
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
                                            <td>2323</td>
                                            <td>
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
                            <div class="mr-auto "><h3 class="serhist">Service History</h3></div>
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
                    <div class="tab-pane fade" id="v-pills-schedule" role="tabpanel" aria-labelledby="v-pills-schedule-tab">..svdvb.</div>
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