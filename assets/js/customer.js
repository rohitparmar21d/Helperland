$(document).ready(function () {
    
    var base_url = "http://localhost/Helperland/";
    var reqIdforreschedule;
    var reqIdfordetailmodal;
    
    
    
    
    history();
    dashboard();
    function history()
    {
        /*listing service history */
        $.ajax({
            type: "POST",
            url: base_url + "?controller=Helperland&function=service_history",
            success: function (response) 
            {
                   $(".history").html(response);
                   $(".rateyo").rateYo({
                    starWidth: "20px",
                    readOnly: true
                   });
            }
        });
        
    }
    
    function dashboard()
    {
        /* listing dashboard*/
    $.ajax({
        type: "POST",
        url: base_url + "?controller=Helperland&function=dboard",
        success: function (response) 
        {
               $(".dboard").html(response);
               $(".rateyo").rateYo({
                starWidth: "20px",
                readOnly: true
               });
               $(".dboard tr .td").click(function (e) 
               { 
                    $("#servicedetailmodal").modal("show");
                    reqIdfordetailmodal=e.target.id;
                    $.ajax({
                        type: "POST",
                        url:  base_url + "?controller=Helperland&function=SDmodal",
                        data: {
                        "requId" : reqIdfordetailmodal
                        },
                        success: function (response) {
                            $(".SD").html(response);
                            $(".btn-reschedule").click(function () { 
                                $("#servicedetailmodal").modal("hide");
                                
                            });
                            $(".btn-cancel").click(function () { 
                                $("#servicedetailmodal").modal("hide");
                                
                            });
                        }
                });
               });
        }
    });
    
    }
    

   

    /*service history modals */
    $(".history").click(function (e) { 
        var reqId=e.target.id;
        $.ajax({
            type: "POST",
            url: base_url + "?controller=Helperland&function=rate_sp",
            data: {
                "reqId" : reqId
            },
            success: function (response) {
                $(".ratesp").html(response);
                $(".rate_modal_head").rateYo({
                    starWidth: "20px",
                    readOnly: true
                   });
                 $(".r1").rateYo({
                     starWidth: "20px"
                    });
               
            }
        });
    });

    /*dashboard modal */
    $(".dboard").click(function (e) { 
        reqIdforreschedule=e.target.id;
    });
    $(".ft").click(function (e) { 
        reqIdforreschedule=e.target.id;
        
    });
    $(".btn-update").click(function () { 
        var rescheduledate=$(".rescheduledate").val();
        var rescheduletime=$(".rescheduletime").val();
        $.ajax({
            type: "POST",
            url:  base_url + "?controller=Helperland&function=reschedule",
            data: {
                "reqId" : reqIdforreschedule,
                "rescheduledate":rescheduledate,
                "rescheduletime":rescheduletime
            },
            
            success: function (response) {
                dashboard();
                $("#reschedule_modal").modal("hide");
                Swal.fire({
                    icon: 'success',
                    title: 'Done',
                    text: 'Service rescheduled successfully',
                    
                  })
                
            }
        }); 
        
    });

    $(".btn-cancelnow").click(function () { 
        var comment=$(".why-cancel").val();
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, cancel it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: base_url + "?controller=Helperland&function=cancel",
                    data: {
                        "reqId" : reqIdforreschedule,
                        "comment":comment
                    },
                    success: function (response) {
                        history();
                        dashboard();
                        $("#cancel_bookingrequest_modal").modal("hide");
                        Swal.fire({
                            icon: 'success',
                            title: 'Cancelled',
                            text: 'Service cancelled successfully',
                            
                          })
                    }
                    
                });
            }
          })
        
        
    });
    

    
});