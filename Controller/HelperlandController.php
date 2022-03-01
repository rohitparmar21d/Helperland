<?php
class HelperlandController
{
    function __construct()
    {
        include('Models/Connection.php');
        $this->model = new Helperland();
        session_start();
        
    }
    public function HomePage()
    {
        include("./Views/homepage.php");
    }
    public function ContactUs()
    {
        if (isset($_POST)){
            $base_url = 'http://localhost/Helperland/Contact';
            $FirstName =  $_POST['FirstName'];
            $LastName =  $_POST['LastName'];
            $array = [
                'Name' => $FirstName . " " . $LastName,
                'Email' => $_POST['Email'],
                'Subject' => $_POST['Subject'],
                'PhoneNumber' => $_POST['PhoneNumber'],
                'Message' => $_POST['Message'],
                'CreatedOn' => date('Y-m-d H:i:s')
            ];
            $this->model->ContactUs('contactus', $array);
            header('Location: ' . $base_url);
        }
        else{
            echo 'Error Occurring in Data';
        }
    }

    public function cSignup()
    {
        if (isset($_POST))
        {    
            if(($_POST['Password']) != ($_POST['confirmPassword']))
            {
                $_SESSION['message'] = "Password and Confirm Password should be same";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }

           $check_email_duplicate_count =   $this->model->CheckEmail('user',$_POST['Email']);
           $check_mobile_duplicate_count =   $this->model->CheckMobile('user',$_POST['Mobile']);

            if($check_email_duplicate_count > 0)
            {
                $_SESSION['message'] = "Email Aleady taken";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }

            if($check_mobile_duplicate_count > 0)
            {
                $_SESSION['message'] = "Mobile Number Aleady taken";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
            $base_url = "http://localhost/Helperland/#LoginModal'";
            $array = [
                'FirstName' => $_POST['FirstName'],
                'LastName'=>$_POST['LastName'],
                'Email' => $_POST['Email'],
                'Password' =>$_POST['Password'],
                'Mobile' => $_POST['Mobile'],
                'UserTypeId' => 1,
            ];
            $this->model->Signup('user', $array);
            unset($_SESSION['message']);  
            header('Location: ' . $base_url);
        }
    }
    public function spSignup()
    {
        if (isset($_POST))
        {    
            if(($_POST['Password']) != ($_POST['confirmPassword']))
            {
                $_SESSION['message1'] = "Password and Confirm Password should be same";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
                
            }

           $check_email_duplicate_count =   $this->model->CheckEmail('user',$_POST['Email']);
           $check_mobile_duplicate_count =   $this->model->CheckMobile('user',$_POST['Mobile']);

            if($check_email_duplicate_count > 0)
            {
                $_SESSION['message1'] = "Email Aleady taken";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }

            if($check_mobile_duplicate_count > 0)
            {
                $_SESSION['message1'] = "Mobile Number Aleady taken";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }

            


            $base_url = "http://localhost/Helperland/#LoginModal'";
            $array = [
                'FirstName' => $_POST['FirstName'],
                'LastName'=>$_POST['LastName'],
                'Email' => $_POST['Email'],
                'Password' =>$_POST['Password'],
                'Mobile' => $_POST['Mobile'],
                'UserTypeId' => 2,
            ];
            $this->model->Signup('user', $array);
            unset($_SESSION['message1']);  
            header('Location: ' . $base_url);
        }
    }
    public function ForgotPassword()
    {
        if (isset($_POST))
        {
            $is_registerd_mail=   $this->model->CheckEmail('user',$_POST['forgotemail']);
            if($is_registerd_mail!=0)
            {
                $to_email = $_POST['forgotemail'];
                $subject = "RESET PASSWORD";
                $body = "click the link t0 reset password <br> http://localhost/Helperland/resetpassword.php";
                $headers = "From: rohit1parmar11@gmail.com";
                $_SESSION['regmail']=$_POST['forgotemail'];
                
                if (mail($to_email, $subject, $body, $headers)) {
                    $_SESSION['sentstatus'] = "1";
                } else {
                    $_SESSION['sentstatus'] = "2";
                }

                $base_url = "http://localhost/Helperland";
                header('Location: ' . $base_url);
               
            }
            else
            {
                $_SESSION['forgotmail'] = "Enter registerd mail";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
            
            
        }  
        
    }

    public function resetpass()
    {
        if (isset($_POST))
        {    
            if(($_POST['Password']) == ($_POST['confirmPassword']))
            {
                $new_password=$_POST['Password'];
                $email= $_SESSION['regmail'];
                $this->model->resetpass('user', $email,$new_password);
                unset($_SESSION['regmail']);
                $base_url = "http://localhost/Helperland";
                header('Location: ' . $base_url);
            } 
            else
            {
                $_SESSION['reset']="Password and Confirm Password should be same";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
           
        }
        
    }
    public function Login()
    {
        if (isset($_POST))
        {
            $customer = "http://localhost/Helperland/Customer";
            $sp = "http://localhost/Helperland/upcoming_service";
            if(($_POST['Email'] == "") || ($_POST['Password'] == "")){
                
                $base_url ="http://localhost/Helperland/#LoginModal'";
                header('Location:' . $base_url);
                
            } else{
                $email = $_POST['Email'];
                $Password = $_POST['Password'];
                $row = $this->model->userData($email,$Password);
                if($row == NULL)
                {
                    $_SESSION['login_wrong']="1";
                    $base_url ="http://localhost/Helperland/#LoginModal";
                    header('Location:' . $base_url);
                }
                else
                {
                    $usertypeid = $row['UserTypeId'];
                    $_SESSION['UserId'] = $row['UserId'];
                    $_SESSION['name'] = $row['FirstName'];
                    $_SESSION['loggedin'] = $usertypeid;
                    if($usertypeid == 1){
                    
                    header('Location:' . $customer);
                    }
                    if($usertypeid == 2){
                    
                    header('Location:' . $sp);
                    }
                    else{
                    echo "Admin";
                    }
                }
                
            }
        }
    }
    public function gotobookservicepage()
    {
        if(isset($_SESSION['loggedin']))
        {
            if($_SESSION['loggedin'] == 1)
            {
                $base_url ="http://localhost/Helperland/bookservice";
                header('Location:' . $base_url);
            }
            else
            {
                $_SESSION['login_alert']="0";
                $base_url ="http://localhost/Helperland/#LoginModal";
                header('Location:' . $base_url);
            }
        }
        else
        {
            $_SESSION['login_alert']="1";
            $base_url ="http://localhost/Helperland/#LoginModal";
            header('Location:' . $base_url);
        }
    }
    public function logout()
    {
        $base_url = "http://localhost/Helperland/";
        session_unset();
        session_destroy();
        header('Location:' . $base_url);

    }
    public function checkavail()
    {
       $zipcode =$_POST['zipcode'];
       $avail = $this->model->checkavail($zipcode);
       if($avail != 0)
       {
           echo 1;
       }
       else
       {
           echo 0;
       }
    }
    public function add_addresses()
    {
        $zipcode =$_POST['zipcode'];
        $userid = $_SESSION['UserId'];
        $list = $this->model->addresslist($zipcode,$userid);
         $i=0;
        foreach($list as $address)
        {
            ?>
            <label class="area-label">
                <input type="radio" class="area-radio" id="age<?php echo $i?>" name="age" value="<?php echo $address['AddressId'] ?>" >
                <span><b>Address:</b></span><?php echo " ".$address['AddressLine1']."  ".$address['AddressLine2'].", ".$address['City']."  ".$address['State']." - ".$address['PostalCode']." ";  ?><br>
                <span><b>Telephone number:</b></span><?php echo " ".$address['Mobile']." "; ?>
                </label>
        <?php
        $i++; }

    }
    public function insert_address()
    {
        
            $array = [
                'UserId' => $_SESSION['UserId'],
                'AddressLine1'=>$_POST['housenumber'],
                'AddressLine2' => $_POST['streetname'],
                'City' =>$_POST['city'],
                'PostalCode' => $_POST['postalcode'],
                'Mobile' => $_POST['phonenumber']
            ];
            $this->model->insert_address($array);

    
    }
    public function add_service_request()
    {
    
        $servicetimedate =$_POST['date']." ".$_POST['time'];
            $array = [
                'UserId' => $_SESSION['UserId'],
                'ServiceStartDate'=>$servicetimedate,
                'ZipCode' => $_POST['postalcode'],
                'ServiceHours' =>$_POST['servicehours'],
                'ExtraHours' => $_POST['extraservicehours'],
                'SubTotal' => $_POST['subtotal'],
                'TotalCost' => $_POST['totalpayment'],
                'Comments' => $_POST['comments'],
                'HasPets'=>$_POST['haspet'],
                'CreatedDate' =>date('Y-m-d H:i:s')
            ];
        
            $reqid = $this->model->add_service_request($array);
            $seladdid =$_POST['seladdid'];
            $reqAdd = [
                'reqid' =>$reqid,
                'addid' => $seladdid,
            ];
            $this->model->add_service_request_address($reqAdd);
            $SPList=$this->model->getSPById($_POST['postalcode']);

            foreach($SPList as $SPs)
            {
                $to_email = $SPs['Email'];
                $subject = "NEW SERVICE REQUEST";
                $body = "we got new service request for you, accept if you are available";
                $headers = "From: rohit1parmar11@gmail.com";
                mail($to_email, $subject, $body, $headers);
            }
    }
    public function service_history()
    {
        $list=$this->model->service_history($_SESSION['UserId']);
        function HourMinuteToDecimal($hour_minute) {
            $t = explode(':', $hour_minute);
            return $t[0] * 60 + $t[1];
        }
        function DecimalToHoursMins($mins)
        {
            $h=(int)($mins/60);
            $m=round($mins%60);
            if($h<10){$h="0".$h;}
            if($m<10){$m="0".$m;}
            return $h.":".$m;
        }
        if($list != NULL)
        {
            
            foreach($list as $history)
           {
            $SP = $this->model->getUserbyId($history['ServiceProviderId']);
            $dt=substr($history['ServiceStartDate'],0,10);
            $tm=substr($history['ServiceStartDate'],11,5);
            $totalmins=HourMinuteToDecimal($tm)+ (($history['ServiceHours']+$history['ExtraHours'])*60);
            $totime=DecimalToHoursMins($totalmins);
            $rates=$this->model->rateByreqId($history['ServiceRequestId']);
            if($rates == NULL)
            {
                $rates['Ratings']=0;
            }    
             ?>
            <tr class="t-row" >
                <td><p><?php echo $history['ServiceRequestId']; ?></p></td>
                <td>
                    <p class="date"><img src="./assets/Image/calendar.png"> <?php echo $dt; ?></p>
                    <p><?php echo $tm."-".$totime ?></p>
                </td>
                <td> 
                    <div class="a flex-wrap row"> 
                        <?php
                        if(isset($SP['FirstName']))
                        {
                        ?>
                            <div class=""><img src="./assets/Image/forma-1-copy-19.png"></div>
                            <div>
                                <p class="lum-watson"><?php if(isset($SP['FirstName'])){echo $SP['FirstName'];} ?> </p>
                                <div class="row">
                                    <div class="rateyo" id= "rating"  data-rateyo-rating=" <?php echo $rates['Ratings']; ?>"></div>
                                    <div><?php echo $rates['Ratings']; ?></div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </td>
                <td>
                    <p class="euro d-flex justify-content-center">&euro; <?php echo $history['TotalCost']; ?></p>
                </td>
                <td><?php 
                if(isset($history['Status']))
                {
                    if($history['Status']==2)
                    {?>
                        <div class="status-completed text-center" >Completed</div> <?php
                    }
                    else
                    {?>
                        <div class="status-cancelled text-center" >Cancelled</div>
                    <?php

                    }
                }
                ?>
                </td>
                <td><button type="button" id="<?php echo $history['ServiceRequestId']; ?>"  class="btn rate-sp" data-toggle="modal" data-target="#ratesp_modal" <?php if($history['Status']==3){ echo "disabled";} ?> >Rate SP</button></td>
            </tr>
            
            <?php
             
           }
        }
        else
        { ?>
          <div class="text-center"><h4>No history Found</h4></div>
        <?php
        }
        
    }
    public function dboard()
    {
        $list=$this->model->dboard($_SESSION['UserId']);
        function HourMinuteToDecimal($hour_minute) {
            $t = explode(':', $hour_minute);
            return $t[0] * 60 + $t[1];
        }
        function DecimalToHoursMins($mins)
        {
            $h=(int)($mins/60);
            $m=round($mins%60);
            if($h<10){$h="0".$h;}
            if($m<10){$m="0".$m;}
            return $h.":".$m;
        }
        if($list != NULL)
        {  
            
            foreach($list as $history)
            {
                $SP = $this->model->getUserbyId($history['ServiceProviderId']);
                $dt=substr($history['ServiceStartDate'],0,10);
                 $tm=substr($history['ServiceStartDate'],11,5);
                $totalmins=HourMinuteToDecimal($tm)+ (($history['ServiceHours']+$history['ExtraHours'])*60);
                $totime=DecimalToHoursMins($totalmins);
                $rates=$this->model->rate($history['ServiceProviderId']);
                $j=0;
                $totalrate=0;
                if($rates==NULL)
                {
                    $avrrate=0;
                }
                else
                {
                    foreach($rates as $rate)
                    {
                        $totalrate+=$rate['Ratings'];
                        $j++;
                    }
                    if($j == 0)
                    {
                        $avrrate=$totalrate;
                    }
                    else
                    {
                        $avrrate=$totalrate/$j;
                    }
                }
                ?>
                    <tr class="t-row tempo" id="<?php echo $history['ServiceRequestId']; ?>">
                        <td><p><?php echo $history['ServiceRequestId']; ?></p></td>
                        <td>
                            <p class="date"><img src="./assets/Image/calendar.png"> <?php echo $dt; ?></p>
                            <p><?php echo $tm."-".$totime ?></p>
                        </td>
                        <td> 
                            <div class="a flex-wrap row"> 
                                <?php
                                if(isset($SP['FirstName']))
                                {
                                   ?>
                                    <div class=""><img src="./assets/Image/forma-1-copy-19.png"></div>
                                    <div>
                                        <p class="lum-watson"><?php if(isset($SP['FirstName'])){echo $SP['FirstName'];} ?> </p>
                                        <div class="row">
                                            <div class="rateyo" id= "rating"  data-rateyo-rating=" <?php echo $avrrate; ?>"></div>
                                            <div><?php echo round($avrrate,1); ?></div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </td>
                        <td><p class="euro d-flex justify-content-center">&euro; <?php echo $history['TotalCost']; ?></p></td>
                        <td>
                            <button type="button" id="<?php echo $history['ServiceRequestId']; ?>" class="btn reschedule" data-toggle="modal" data-target="#reschedule_modal">Reschedule</button>
                            <button type="button" class="btn cancel"  id="<?php echo $history['ServiceRequestId']; ?>" data-toggle="modal" data-target="#cancel_bookingrequest_modal">Cancel</button>
                        </td>
                    </tr>
                <?php
            }
           
        }
        else
        { ?>
          <div class="text-center"><h4>No history Found</h4></div>
        <?php
        }


    }
    public function rate_sp() 
    { 
         $SR=$this->model->SRByreqId($_POST['reqId']);
         $SP=$this->model->getUserbyId($SR['ServiceProviderId']);
         $rates=$this->model->rate($SR['ServiceProviderId']);
         $j=0;
         $totalrate=0;
         if($rates==NULL)
         {
             $avrrate=0;
         }
         else
         {
             foreach($rates as $rate)
             {
                 $totalrate+=$rate['Ratings'];
                 $j++;
             }
             if($j == 0)
             {
                 $avrrate=$totalrate;
             }
             else
             {
                 $avrrate=$totalrate/$j;
             }
         }
        ?>
    
        <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLongTitle">
                <div class="d-flex align-items-center justify-content-left">
                    <div><img class="round-border" src="./assets/Image/forma-1-copy-19.png" alt="cap"></div>
                    <div class="ps-2">
                        <p class="sp-details"><?php echo $SP['FirstName']." ".$SP['LastName']; ?></p>
                        <p class="sp-details">
                            <div class="row">
                                <div class="rateyo rate_modal_head" id= "rating"  data-rateyo-rating=" <?php echo $avrrate; ?>"></div>
                                <span class="sp-details"><?php echo round($avrrate,1); ?></span>
                            </div>    
                        </p>
                    </div>
                </div>
            </h3>
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
                        <div class="on_time_arrrival" id= "rating"  data-rateyo-rating=""></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <label class="subtext">Friendly</label>
                    </div>
                    <div class="col-sm-7">
                        <div class="friendly" id= "rating"  data-rateyo-rating=""></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <label class="subtext">Quality of service</label>
                    </div>
                    <div class="col-sm-7">
                        <div class="quality" id= "rating"  data-rateyo-rating=""></div>
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
        </div> 

    <?php }

    public function reschedule()
    {
       $datetime=$_POST['rescheduledate']." ".$_POST['rescheduletime'];
       $this->model->reschedule($datetime,$_POST['reqId']);
       
    }
    public function cancel()
    {
        $this->model->cancel($_POST['comment'],$_POST['reqId']);
      
    }


}
?>