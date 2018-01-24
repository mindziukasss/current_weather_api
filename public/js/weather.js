$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function() {


    $('form').on('submit', function(e) {
        e.preventDefault();
        var api_key = $('#api_key').val();
        var city = $('#city').val();

        $.ajax({
            type: "POST",
            url: '/current_weather',
            data: {lowm:api_key, city:city},
            success: function( msg ) {
                if (msg === '')
                    alert('Error!!! Your city name is invalid !!!');
                else{
                    appendData(msg);
                }
            },
            error: function () {
                alert('Error!!! Your aip key is invalid !!!');

            }
        });
    });
    var tabs = $("div#tabs").tabs();

    $('.btn').click(function () {
        tabs.show();
    });

    function appendData(data) {
        var num_tabs = $("div#tabs ul li").length + 1;

        $("div#tabs ul").append(
            "<li><a href='#tab" + num_tabs + "'>" + $('#city').val() + "</a></li>"

        );
        $("div#tabs").append(
            "<div id='tab" + num_tabs + "'>" + data + "</div>"

        );
        $("div#tabs").tabs("refresh");



    }
    $('.ui-icon').click(function () {
        tabs.hide("refresh");
    });

});