$(document).ready(function () {
    
    var base_url = "http://localhost/Helperland/";
    
    adminservicerequest();
    usermanagement();
   
   function adminservicerequest()
   {
       /* list Service request */
        $.ajax({
            type: "POST",
            url: base_url + "?controller=Helperland&function=adminservicesrequests",
            success: function (response) {
                $(".adminservicerequest").html(response);
            }
        });
   }

   function usermanagement()
   {
       /* list User List*/
       $.ajax({
        type: "POST",
        url: base_url + "?controller=Helperland&function=usermanagement",
        success: function (response) {
            $(".usermanagement").html(response);
        }
    });
   }
   /*  Active user*/
   $(document).on ('click', '.letactive', function (e) { 
        e.preventDefault();
        $('.loading').removeClass("d-none");
        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Active'
          }).then((result) => {
            if (result.isConfirmed) {
                
                 $.ajax({
                    type: "POST",
                    url:base_url + "?controller=Helperland&function=activeuser",
                    data: { "userid" : this.id },
                    success: function (response) {
                        $('.loading').addClass("d-none");
                        usermanagement();
                        Swal.fire({
                            icon: 'success',
                            title: 'Activated',
                            text:'Activated successfully.',
                            showConfirmButton: false,
                            timer: 1500
                            })

                    }
                });
            }
          })
   });
   /* Deactive User*/ 
   $(document).on ('click', '.letdeactive', function (e) { 
       e.preventDefault();
       $('.loading').removeClass("d-none");
       Swal.fire({
        title: 'Are you sure?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Deactive'
      }).then((result) => {
        if (result.isConfirmed) {
            
             $.ajax({
                type: "POST",
                url:base_url + "?controller=Helperland&function=deactiveuser",
                data: { "userid" : this.id },
                success: function (response) {
                    $('.loading').addClass("d-none");
                    usermanagement();
                    Swal.fire({
                        icon: 'success',
                        title: 'Activated',
                        text:'Deactivated successfully.',
                        showConfirmButton: false,
                        timer: 1500
                        })

                }
            });
        }
      })
   });
   /* Approve SP*/
   $(document).on ('click', '.letapprove', function (e) { 
       e.preventDefault();
       $('.loading').removeClass("d-none");
       $.ajax({
        type: "POST",
        url:base_url + "?controller=Helperland&function=approvesp",
        data: { "userid" : this.id },
        success: function (response) {
            $('.loading').addClass("d-none");
            usermanagement();
            Swal.fire({
                icon: 'success',
                title: 'Approved',
                showConfirmButton: false,
                timer: 1500
                })
        }
    });
   });

   /* Cancel Request From Admin Panel*/
   $(document).on ('click', '.cancelrq', function (e) { 
    e.preventDefault();
    $('.loading').removeClass("d-none");
    Swal.fire({
     title: 'Are you sure?',
     icon: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Yes, Cancel it'
   }).then((result) => {
     if (result.isConfirmed) {
         
          $.ajax({
             type: "POST",
             url:base_url + "?controller=Helperland&function=cancelfromadmin",
             data: { "reqid" : this.id },
             success: function (response) {
                 $('.loading').addClass("d-none");
                 adminservicerequest();;
                 Swal.fire({
                     icon: 'success',
                     text:'Request Cancelled  successfully.',
                     showConfirmButton: false,
                     timer: 1500
                     })

             }
         });
     }
   })
});

//  $(document).on ('click', '.editreschedule', function (e) { 
//     e.preventDefault();
//     $("#editreschedule").modal("show");
// });

});