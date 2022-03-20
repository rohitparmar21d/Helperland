<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
     ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/sweetalert2.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="./assets/css/admin.css">
    </head>
    <body>
        <!--header-->
        <section class="section-1">
            <nav class="navbar navbar-expand-lg navbar-light navb">
                <a class="navbar-brand" href="homepage.php">Helperland</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto  bnav">
                        <a class="nav-link manu text-white" href="#"><img src="./assets/Image/admin-user.png" alt=""><span><?php echo $_SESSION["name"]; ?></span></a>
                        <a class="nav-link manu logout" href="#"><img src="./assets/Image/logout.png" alt=""></a>
                    </ul>
                </div>
            </nav>
        </section>
        <section class="section-1-1">
            <nav class="navbar navbar-expand-lg navbar-light navs bg-primary">
                <a class="navbar-brand" href="#">Helperland</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <a class="nav-link manu1" href="#">James Smith</a>
                        <a class="nav-link manu1" href="#">Logout</a>
                    </ul>
                </div>
            </nav>
        </section>
        <!---header ened-->
    
        <!--section-2 left-sidebar -->
        <section class="row main-item">
            <nav class="vertical-nav  mr-0" id="sidebar"> 
                <button class="  navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContents" aria-controls="navbarSupportedContents" aria-expanded="false" aria-label="Toggle navigation" id="toggles">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContents">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-servicerequest-tab" data-toggle="pill" href="#v-pills-servicerequest" role="tab" aria-controls="v-pills-servicerequest" aria-selected="true">Service Request</a>
                            <a class="nav-link" id="v-pills-usermanagement-tab" data-toggle="pill" href="#v-pills-usermanagement" role="tab" aria-controls="v-pills-usermanagement" aria-selected="false">User Management</a>
                        </div>
                </div>
            </nav>
            <div class="ml-0 data">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-servicerequest" role="tabpanel" aria-labelledby="v-pills-servicerequest-tab">
                        <div class="blocks row">
                                <h2 class="mr-auto">Service Requests</h2>
                        </div>
                        <form>
                            <div class="form-row p1">
                                <select  class="form-control serviceid">
                                    <option  selected="true" disabled="disabled"  >Service Id</option> 
                                    <option value='1'>John Smith</option> 
                                    <option value='2'>Lyum watson</option> 
                                    <option value='3'>John Smith</option> 
                                    <option value='4'>Lyum watson</option> 
                                    <option value='5'>John Smith</option> 
                                    <option value='6'>Vijay Mourya</option> 
                                    <option value='7'>Lyum watson</option> 
                                </select>
                                <select  class=" form-control postalcode">
                                    <option  selected="true" disabled="disabled" >Postal Code</option> 
                                    <option value='1'>Call Center</option> 
                                    <option value='2'>Service provider</option> 
                                    <option value='3'>Customer </option> 
                                </select>
                                <div class="form-group email ">
                                    <input type="email" class="form-control  email" id="email" placeholder="Email">
                                </div>
                                <div class="form-group zips ">
                                    <input type="number" class="form-control  zips" id="zipcode" placeholder="Postal Code">
                                </div>
                                <select  class="form-control selcust">
                                    <option  selected="true" disabled="disabled"  >Select Customer</option> 
                                    <option value='1'>John Smith</option> 
                                    <option value='2'>Lyum watson</option> 
                                    <option value='3'>John Smith</option> 
                                    <option value='4'>Lyum watson</option> 
                                    <option value='5'>John Smith</option> 
                                    <option value='6'>Vijay Mourya</option> 
                                    <option value='7'>Lyum watson</option> 
                                </select>
                                <select  class="form-control sp">
                                    <option  selected="true" disabled="disabled"  >Select Service Provider</option> 
                                    <option value='1'>John Smith</option> 
                                    <option value='2'>Lyum watson</option> 
                                    <option value='3'>John Smith</option> 
                                    <option value='4'>Lyum watson</option> 
                                    <option value='5'>John Smith</option> 
                                    <option value='6'>Vijay Mourya</option> 
                                    <option value='7'>Lyum watson</option> 
                                </select>
                                <select  class="form-control status">
                                    <option  selected="true" disabled="disabled"  >Select Status</option> 
                                    <option value='1'>John Smith</option> 
                                    <option value='2'>Lyum watson</option> 
                                    <option value='3'>John Smith</option> 
                                    <option value='4'>Lyum watson</option> 
                                    <option value='5'>John Smith</option> 
                                    <option value='6'>Vijay Mourya</option> 
                                    <option value='7'>Lyum watson</option> 
                                </select>
                                <select  class="form-control sppaymentstatus">
                                    <option  selected="true" disabled="disabled"  >SP Payment Status</option> 
                                    <option value='1'>John Smith</option> 
                                    <option value='2'>Lyum watson</option> 
                                    <option value='3'>John Smith</option> 
                                    <option value='4'>Lyum watson</option> 
                                    <option value='5'>John Smith</option> 
                                    <option value='6'>Vijay Mourya</option> 
                                    <option value='7'>Lyum watson</option> 
                                </select>
                            </div>  
                            <div class="form-row p2">  
                                <select  class="form-control statusforpay">
                                    <option  selected="true" disabled="disabled"  >Select Status</option> 
                                    <option value='1'>John Smith</option> 
                                    <option value='2'>Lyum watson</option> 
                                    <option value='3'>John Smith</option> 
                                    <option value='4'>Lyum watson</option> 
                                    <option value='5'>John Smith</option> 
                                    <option value='6'>Vijay Mourya</option> 
                                    <option value='7'>Lyum watson</option> 
                                </select> 
                                <div class="haspet">
                                    <input type="checkbox" class="checkbox pet" id="pet">
                                    <label class="checkbox-text" for="pet">Has Issues</label>
                                </div>
                                <input class="input-element fromdate form-group form-control" type="date" id="formdate" name="formdate" data placeholder="From Date">
                                <input class="input-element todate form-group form-control" type="date" id="formdate" name="formdate" data placeholder="From Date">
                                <button type="submit" class="btn  search" >Search</button>
                                <button class="btn  reset" type="reset" id="reset">Clear</button>
                            </div>
                            
                        </form>
            
                        <div class="table_usermanagement">
                            <table class="table table-hover" id="tblusermanagement">
                                <thead id="headings">
                                    <tr>
                                        <th scope="col">Service Id</th>
                                        <th scope="col">Service Date</th>
                                        <th scope="col"> Customer Details</th>
                                        <th scope="col">Service Provider</th>
                                        <th scope="col">Gross Amount</th>
                                        <th scope="col">Net Amount</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Payment Status </th>
                                        <th scope="col " >Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2323</td>
                                        <td>
                                            <p><img src="./assets/Image/calendar2.png"> 09/04/2018</p>
                                            <p><img src="./assets/Image/layer-14.png"> 12:00 - 18:00</p>
                                        </td>
                                        <td>
                                            <!-- <p>David Bough</p>
                                            <p><img src="./assets/Image/layer-719.png"> Musterstrabe 5,</p>
                                            <p>12345</p>
                                            <p> Bonn</p> -->
                                        </td>
                                        <td>David Bough</td>
                                        <td>6565456465654</td>
                                        <td>45545</td>
                                        <td>6565456465654</td>
                                        <td class="action"><button class="btn active">Active</button></td>
                                        <td class="action"><button class="btn active">Active</button></td>
                                        <td class="action">
                                            <a class="dropdown-toggle Actions " href="#" id="navbarDropdowns" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu tooltiptext" aria-labelledby="navbarDropdowns">
                                                <a class="dropdown-item" href="#">Edit </a>
                                                <a class="dropdown-item" href="#">Deactivate</a>
                                            </div>
                                        </td>          
                                    </tr>
                                    <tr>
                                        <td>2323</td>
                                        <td>
                                            <p><img src="./assets/Image/calendar2.png"> 09/04/2018</p>
                                            <p><img src="./assets/Image/layer-14.png"> 12:00 - 18:00</p>
                                        </td>
                                        <td>
                                            <!-- <p>David Bough</p>
                                            <p><img src="./assets/Image/layer-719.png"> Musterstrabe 5,</p>
                                            <p>12345</p>
                                            <p> Bonn</p> -->
                                        </td>
                                        <td>David Bough</td>
                                        <td>Berlin</td>
                                        <td></td>
                                        <td>6565456465654</td>
                                        <td class="action"><button class="btn inactive">Inactive</button></td>
                                        <td class="action"><button class="btn inactive">Inactive</button></td>
                                        <td class="action">
                                            <a class="dropdown-toggle Actions " href="#" id="navbarDropdowns" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu tooltiptext" aria-labelledby="navbarDropdowns">
                                                <a class="dropdown-item" href="#">Edit </a>
                                                <a class="dropdown-item" href="#">Deactivate</a>
                                                <a class="dropdown-item" href="#">Service History</a>
                                            </div>
                                        </td> 
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-usermanagement" role="tabpanel" aria-labelledby="v-pills-usermanagement-tab">
                        <div class="blocks row">
                                <h2 class="mr-auto">User Management</h2>
                                <div class="adduser">
                                    <button class="btn adduserbtn"><i class="fa fa-plus-circle plus" aria-hidden="true"></i>Add New User</button>
                                </div>
                        </div>
                        <form>
                            <div class="form-row r1">
                                <select id='selUser' class="form-control">
                                    <option  selected="true" disabled="disabled"  >User name</option> 
                                    <option value='1'>John Smith</option> 
                                    <option value='2'>Lyum watson</option> 
                                    <option value='3'>John Smith</option> 
                                    <option value='4'>Lyum watson</option> 
                                    <option value='5'>John Smith</option> 
                                    <option value='6'>Vijay Mourya</option> 
                                    <option value='7'>Lyum watson</option> 
                                </select>
                                <select id='selUserRole' class=" form-control">
                                    <option  selected="true" disabled="disabled" >UserType</option> 
                                    <option value='1'>Call Center</option> 
                                    <option value='2'>Service provider</option> 
                                    <option value='3'>Customer </option> 
                                </select>
                                <div class="input-group mobiles ">
                                    <div class="input-group-prepend" id="mobilenum">
                                        <div class="input-group-text" >+49</div>
                                    </div>
                                    <input type="tel" class="form-control" id="phone" placeholder="Phone Number">
                                </div> 
                                <div class="form-group zips ">
                                    <input type="number" class="form-control  zips" id="zipcode" placeholder="Postal Code">
                                </div>
                                <div class="form-group email ">
                                    <input type="email" class="form-control  email" id="email" placeholder="Email">
                                </div>
                                <input class="input-element fromdate form-group form-control" type="date" id="formdate" name="formdate" data placeholder="From Date">
                                <input class="input-element todate form-group form-control" type="date" id="formdate" name="formdate" data placeholder="From Date">
                            </div>  
                            <div class="form-row r2">            
                                <button type="submit" class="btn  search" >Search</button>
                                <button class="btn  reset" type="reset" id="reset">Clear</button>
                            </div>
                            
                        </form>
            
                        <div class="table_usermanagement">
                            <table class="table table-hover" id="tblusermanagement">
                                <thead id="headings">
                                    <tr>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Role </th>
                                        <th scope="col"> Date of Registration</th>
                                        <th scope="col">User Type</th>
                                        <th scope="col">Phone </th>
                                        <th scope="col">Postal Code</th>
                                        <th scope="col" class="action">Status </th>
                                        <th scope="col " class="action" >Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Lyum watson </td>
                                        <td>Call Center</td>
                                        <td><img class="calender" src="./assets/Image/calendar2.png">12/13/2020</td>
                                        <td>123456</td>
                                        <td>6565456465654</td>
                                        <td>45545</td>
                                        <td class="action"><button class="btn active">Active</button></td>
                                        <td class="action">
                                            <a class="dropdown-toggle Actions " href="#" id="navbarDropdowns" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu tooltiptext" aria-labelledby="navbarDropdowns">
                                                <a class="dropdown-item" href="#">Edit </a>
                                                <a class="dropdown-item" href="#">Deactivate</a>
                                            </div>
                                        </td>          
                                    </tr>
                                    <tr>
                                        <td>John Smith  </td>
                                        <td>Customer</td>
                                        <td></td>
                                        <td>123456</td>
                                        <td>Berlin</td>
                                        <td></td>
                                        <td class="action"><button class="btn inactive">Inactive</button></td>
                                        <td class="action">
                                            <a class="dropdown-toggle Actions " href="#" id="navbarDropdowns" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu tooltiptext" aria-labelledby="navbarDropdowns">
                                                <a class="dropdown-item" href="#">Edit </a>
                                                <a class="dropdown-item" href="#">Deactivate</a>
                                                <a class="dropdown-item" href="#">Service History</a>
                                            </div>
                                        </td> 
                                    </tr>
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
                <p class="allright">©2018 Helperland. All rights reserved.</p>
            </div>
        </section>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="./assets/js/sweetalert2.all.min.js"></script>
        <script src="./assets/js/Script.js"></script>
        <script src="./assets/js/admin.js"></script>
    </body>
</html>