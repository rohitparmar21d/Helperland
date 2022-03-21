$(document).ready(function () {
    
    var base_url = "http://localhost/Helperland/";
    
    adminservicerequest();
   
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
});