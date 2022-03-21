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
});