$(document).ready(function () {
    
    var base_url = "http://localhost/Helperland/";

    /*listing service history */
    $.ajax({
        type: "POST",
        url: base_url + "?controller=Helperland&function=service_history",
        success: function (response) 
        {
               $(".history").html(response);
        }
    });
    /* listing dashboard*/
});