$(document).ready(function () {
    
    var base_url = "http://localhost/Helperland/";

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
        }
    });

    /* rating*/
    $(".rateyo").rateYo();
});