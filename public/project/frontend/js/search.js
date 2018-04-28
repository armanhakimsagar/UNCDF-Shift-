/*function myFunction(){
	alert("Hello! I am an alert box!!");
}*/



function SearchFunction() {
    var serach_text = $("#search_input").val();
    if (serach_text && serach_text != "") {
        $.ajax({
            type: "GET",
            url: "get_search_data",
            data: {
                serach_text_param: serach_text
            },
            dataType: "html",
            success: function (response) {
                $("#view_search_container").show();
                $("#view_search").html(response);
            }, error: function (request, status, error) {

            }

        });
    }

}