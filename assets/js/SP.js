$(document).ready(function () {

    var base_url = "http://localhost/Helperland/";
    var includepet=0;
    $(".details").click(function () { 
        $(".details").addClass("active");
        $(".password").removeClass("active");
        $(".details-body").show();
        $(".password-body").hide();
    });
    $(".password").click(function () { 
        $(".details").removeClass("active");
        $(".password").addClass("active");
        $(".details-body").hide();
        $(".password-body").show();
    });
    /*addresses tAb open*/
    $(".mysettingbtn").click(function (e) { 
        e.preventDefault();
           $(".leftsidebar .nav-link").removeClass("active");
           $(".tab-content .tab-pane").removeClass("show active");
           $("#v-pills-notification").addClass("show active");
    });

    $("#pet").click(function () { 
        if(this.checked == true){

            includepet = 1;

           }else{
            
            includepet = 0;

        } 
        newrequest();
    });


    newrequest();
    upcoming();
    sphistory();
    sprate();
    function newrequest()
    {
        /*list new requests*/
        $.ajax({
            type: "POST",
            data:{"pet" : includepet},
            url: base_url + "?controller=Helperland&function=newservicesrequests",
            success: function (response)
            {
                $(".newrequest").html(response);
            }
        });
    }
     
    function upcoming()
    {
        /* list upcoming request */
        $.ajax({
            type: "POST",
            url: base_url + "?controller=Helperland&function=upcoming",
            success: function (response)
            {
                $(".upcoming").html(response);
            }
        });
    }
    function sphistory()
    {
        /* list SP History */
        $.ajax({
            type: "POST",
            url: base_url + "?controller=Helperland&function=sphistory",
            success: function (response)
            {
                $(".sphistory").html(response);
            }
        });
    }
    function sprate()
    {
        /*list SP rate */
        $.ajax({
            type: "POST",
            url: base_url + "?controller=Helperland&function=sprate",
            success: function (response) 
            {
                $(".sprate").html(response);
                $(".rateyo").rateYo({
                    starWidth: "16px",
                    ratedFill: "#FFD600",
                    readOnly: true,
                });
            }
        });
    }
    
    $(document).on ('click', '.accept-btn', function (e) { 
        e.stopPropagation();
        $(".loading").removeClass("d-none");
        $.ajax({
            type: "POST",
            url:base_url + "?controller=Helperland&function=acceptrequest",
            data: {
                "reqId" : this.id,
            },
            success: function (response) {
                newrequest();
                upcoming();
                $(".loading").addClass("d-none");
                if(response==1)
                {
                    Swal.fire({
                        icon: 'warning',
                        text: "You are already assigned another request At this time "
                        })
                }
                else
                {
                    Swal.fire({
                        icon: 'success',
                        title: "Accepted",
                        text: 'The request Assigned to ',
                        showConfirmButton: false,
                        timer: 1000
                        })
                }
            }
        });
    });
   
    
    $(document).on ('click', '.cancel-btn', function (e) {  
        e.stopPropagation();
        $(".loading").removeClass("d-none");
        $.ajax({
            type: "POST",
            url:base_url + "?controller=Helperland&function=cancelrequest",
            data: {
                "reqId" : this.id,
            },
            success: function (response) {
                $(".loading").addClass("d-none");
                newrequest();
                upcoming();
                
                if(response==1)
                {
                    Swal.fire({
                        icon: 'warning',
                        title: "Can not cancel"
                        })
                }
                else
                {
                    Swal.fire({
                        icon: 'success',
                        title: "Cancelled",
                        text: 'Request cancelled',
                        showConfirmButton: false,
                        timer: 1000
                        })
                }
                }
                
        });
        
    });
    
    $(document).on ('click', '.complete-btn', function (e) {  
        e.stopPropagation();
        $.ajax({
            type: "POST",
            url:base_url + "?controller=Helperland&function=completerequest",
            data: {
                "reqId" : this.id,
            },
            success: function (response) {
                newrequest();
                upcoming();
                Swal.fire({
                    icon: 'success',
                    text: 'Marked as Completed',
                    showConfirmButton: false,
                    timer: 1000
                    })
            }
        });
        
    });

    $(".password-save").click(function () { 
        var oldpassword = $("input[name='oldpassword']").val();
        var newpassword = $("input[name='newpassword']").val();
        var confirmpassword = $("input[name='confirmpassword']").val();

        if(oldpassword == "" || newpassword == "" || confirmpassword == "")
        {
            $(".password_error").html("fill all details.");
        }
        else
        {
            $(".password_error").html("");
            $.ajax({
                type: "POST",
                url: "http://localhost/Helperland/?controller=Helperland&function=update_password",
                data: {
                        "oldpassword" : oldpassword,
                        "newpassword" : newpassword,
                        "confirmpassword" : confirmpassword,
                      },
                success: function (response) {
                    if(response==1)
                    {
                        Swal.fire({
                            icon: "warning",
                            text: 'Password And Confirm Password Must be Same',
                            
                          })
                    }
                    else if(response==2)
                    {
                        Swal.fire({
                            icon: "warning",
                            text: 'You entered wrong Old Password',
                            
                          })
                    }
                    else
                    {
                        Swal.fire({
                            icon: "success",
                            title: "Done",
                            text: 'Password Updated Successfully',
                            
                          }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = base_url + "?controller=Helperland&function=logout";
                            }
                              
                          });
                    }
                    
                }
            });
        }
    });

});