function setVisible(selector, visible) {
    document.querySelector(selector).style.display = visible ? 'block' : 'none';
}
function firstpageload(filterStatus = false) {
    if (filterStatus) {        
        mapReloadMethod(filterStatus);
    } else { 
        setVisible('#loading', true);
        var map;
        window.initMap = function () {
            // For map location level off start   
            $("#level_check").val("");
            var styledMapType = new google.maps.StyledMapType(
                    [
                        {
                            elementType: 'labels',
                            stylers: [{visibility: 'off'}],
                        },
                    ],
                    {name: 'Styled Map'});
            // For map location level off end    

            // Ajax District load
            $.ajax({
                url: "/getalldistrict",
                type: "GET",
                success: function (response) {
                    //ajax for display information result
                    var bangladesh = {lat: 23.684994, lng: 90.356331};
                    var JSONObject = JSON.parse(response);
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 7,
                        center: bangladesh,
                        disableDefaultUI: true,
                    });
                    for (var i = 0; i < JSONObject.length; i++) {
                        var obj = JSONObject[i];
                        map.data.loadGeoJson('/map/data/district/' + obj.json_filename);
                    }
                    var color;
                    var counter = 0;
                    var TotalJSLength     =       JSONObject.length;
                    var getPercentage   =   0;
                    map.data.setStyle(function (feature) {
                        counter++;
                        getPercentage   =   parseInt(((counter*100)/TotalJSLength));
                        
                        $("#progress_bar").html(0+"%");
                        $("#progress_bar").html(getPercentage+"%");
                        $("#progress_bar").css("width", getPercentage+"%");
                        if (counter == JSONObject.length) {
                            $("#progress_bar").html(0+"%");
                            $("#progress_bar").css("width", 0+"%");
                            setVisible('#loading', false);
                            getPercentage   =   0;
                        }
                        var Dist_id = feature.getProperty('DistCode');
                        if (Dist_id.toString().length == 1)
                        {
                            Dist_id = "0" + Dist_id;
                        }
                        var colorParam = {
                            dis_id: Dist_id,
                            filterStatus: filterStatus,
                            filter_data: $("#map_data_filtering").serialize(),
                        };
                        color = mysetcolorfunction(colorParam);
                        //console.log(color);
                        return {

                            //fillColor: "green",
                            fillColor: color,
                            fillOpacity: .9,
                            strokeColor: "#FFFFFF",
                            strokeWeight: 1,
                            title: "Ulala"
                        }
                    });

                    map.mapTypes.set('styled_map', styledMapType);  // For map location level off
                    map.setMapTypeId('styled_map');                 // For map location level off

                    map.data.addListener('click', function (event) {
                        //console.log(event.feature);
                        var UpazilaParam = {
                            div_name: event.feature.getProperty('Division'),
                            div_id: "",
                            dis_name: event.feature.getProperty('District'),
                            lat: event.latLng.lat(),
                            lon: event.latLng.lng(),
                            dis_id: event.feature.getProperty('DistCode'),
                        };

                        goUpazilaBylayerDown(UpazilaParam);


                    });

                    map.data.addListener('mouseover', function (event) {
                        
                        map.data.revertStyle();
                        //map.data.overrideStyle(event.feature, {strokeWeight: 3});
//
//                    //function initialize 
//
//
                        var dis_id = event.feature.getProperty('DistCode');
                        var disDisplayParam = {
                            dis_id: dis_id,
                            filter_data: $("#map_data_filtering").serialize(),
                        };

                        var disinfowindow = new google.maps.InfoWindow({
                            content: districtdataDisplay(disDisplayParam),

                        });

                    });

                    map.data.addListener('mouseout', function (event) {
                        map.data.revertStyle();
                    });

                }
            });

        }
}


}// end of map calling method

function addMarker(latlng, title, map) {
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: title
        });
    }

    function districtdataDisplay(param) {
        $.ajax({
            url: "districthoverwiseresult",
            type: "GET",
            data: param,
            dataType: "JSON",
            success: function (response) {
                $("#all_total").html(response.total_count);
                $("#all_total_percentage").html(response.percentage);
                $("#zone_name").html(response.loc_name);
            }
        });
    }

    function mysetcolorfunction(param) {
        var test = $.ajax({
            url: "/heatmapcolor",
            type: "GET",
            async: false,
            data: param,
            dataType: 'text/html',
            success: function (response) {
            }
        });
        return test.responseText;
    }    
    function goUpazilaBylayerDown(param) {
        $("#progress_bar").html(0+"%");
        $("#progress_bar").css("width", 0+"%");
            setVisible('#loading', true); 
        $.ajax({
            url: "/getdistrictresult",
            type: "GET",
            data: "dis_name=" + param.dis_name,
            //dataType: "JSON",
            success: function (response) {
                // For map location level off start 
                //push level checking values to view hidden files    
                $("#level_check").val(2);
                $("#div_name").val(param.div_name);
                $("#div_id").val(param.div_id);
                $("#dis_name").val(param.dis_name);
                $("#lat").val(param.lat);
                $("#lon").val(param.lon);
                $("#dis_id").val(param.dis_id);
            var styledMapType = new google.maps.StyledMapType(
                    [
                        {
                            elementType: 'labels',
                            stylers: [{visibility: 'off'}],
                        },
                    ],
                    {name: 'Styled Map'});
            // For map location level off end 
                var JSONObject = JSON.parse(response);
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 9,
                    center: {lat: param.lat, lng: param.lon},
                    disableDefaultUI: true,
                });

                for (var i = 0; i < JSONObject.length; i++) {
                    var obj = JSONObject[i];
                    // START                        
                    map.data.loadGeoJson('/map/data/upazila/' + param.div_name + '/' + obj.json_filename);
                    //END
                }
                var color;
                var counter = 0;               
                var TotalJSLength     =       JSONObject.length;
                var getPercentage   =   0;                
                map.data.setStyle(function (feature) {
                    counter++;
                    getPercentage   =   parseInt(((counter*100)/TotalJSLength)); 
                    $("#progress_bar").html(getPercentage+"%");
                    $("#progress_bar").css("width", getPercentage+"%");
                        //Loader Remove
                        if (counter == JSONObject.length) {
                            $("#progress_bar").html(0+"%");
                            $("#progress_bar").css("width", 0+"%");
                            setVisible('#loading', false);
                        }
                    var up_id = feature.getProperty('ID_4');
                    if (up_id < 10)
                    {
                        up_id = "0" + up_id;
                    }
                        var colorParam = {
                            up_id: up_id,
                            filter_data: $("#map_data_filtering").serialize(),
                        };
                        color = upazilaColorFunction(colorParam);
                        //console.log(color);
                        return {

                            //fillColor: "green",
                            fillColor: color,
                            fillOpacity: .9,
                            strokeColor: "#FFFFFF",
                            strokeWeight: 1,
                            title: "Ulala"
                        }
                    });
                
                map.data.addListener('mouseover', function (event) {
                        map.data.revertStyle();
                        //map.data.overrideStyle(event.feature, {strokeWeight: 3});
                        var up_id = event.feature.getProperty('ID_4');
                        var upazilaDisplayParam =   {
                            up_id   :up_id,
                            dis_id  :param.dis_id
                        };

                        var disinfowindow = new google.maps.InfoWindow({
                            content: upaziladataDisplay(upazilaDisplayParam),

                        });

                    });

                    map.data.addListener('mouseout', function (event) {
                        map.data.revertStyle();
                    });
            map.mapTypes.set('styled_map', styledMapType);  // For map location level off
            map.setMapTypeId('styled_map');                 // For map location level off    
            }// end of success
        });
    }
    
    function upaziladataDisplay(param) {
        var dataParam = {
                up_id       : param.up_id,
                dis_id      : param.dis_id,
                filter_data : $("#map_data_filtering").serialize(),
            };
        $.ajax({
            url: "upazila_hoverwise_result",
            type: "GET",
            data: dataParam,
            dataType: "JSON",
            success: function (response) {
                $("#all_total").html(response.total_count);
                $("#all_total_percentage").html(response.percentage);
                $("#zone_name").html(response.loc_name);
            }
        });
    }
    
    function upazilaColorFunction(param) {
        var test = $.ajax({
            url: "heat_map_color_upazila",
            type: "GET",
            async: false,
            data: param,
            dataType: 'text/html',
            success: function (response) {
            }
        });
        return test.responseText;
    }

function mapReloadMethod(filterStatus) {
    //Loader Display
        setVisible('#loading', true);
    $("select#location_type").val();
    $("select#location_type option[value='']").attr("selected", "selected");
    $("select#gender option[value='']").attr("selected", "selected");
    $("select#generation option[value='']").attr("selected", "selected");
    $("select#business_type option[value='']").attr("selected", "selected");
    $("#level_check").val("");
    // For map location level off start   
    var styledMapType = new google.maps.StyledMapType(
            [
                {
                    elementType: 'labels',
                    stylers: [{visibility: 'off'}],
                },
            ],
            {name: 'Styled Map'});
    // For map location level off end    

    // Ajax District load
    $.ajax({
        url: "/getalldistrict",
        type: "GET",
        success: function (response) {
            var getPercentage   =   0;
//            $("#progress_bar").hide();
            //ajax for display information result
            var bangladesh = {lat: 23.684994, lng: 90.356331};
            var JSONObject = JSON.parse(response);
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: bangladesh,
                disableDefaultUI: true,
            });

            var TotalJSLength     =       JSONObject.length;
            for (var i = 0; i < JSONObject.length; i++) {
                var obj = JSONObject[i];
                map.data.loadGeoJson('/map/data/district/' + obj.json_filename);
            }
            var color;
            var counter = 0;
            map.data.setStyle(function (feature) {
                counter++;
                getPercentage   =   parseInt(((counter*100)/TotalJSLength)); 
                $("#progress_bar").html(getPercentage+"%");
                $("#progress_bar").css("width", getPercentage+"%");
                    //Loader Remove
                if (counter == JSONObject.length) {
                    $("#progress_bar").html(0+"%");
                    $("#progress_bar").css("width", 0+"%");
                    setVisible('#loading', false);
                }
                var Dist_id = feature.getProperty('DistCode');
                if (Dist_id.toString().length == 1)
                {
                    Dist_id = "0" + Dist_id;
                }
                var colorParam = {
                    dis_id: Dist_id,
                    filterStatus: filterStatus,
                    filter_data: $("#map_data_filtering").serialize(),
                };
                color = mysetcolorfunction(colorParam);
                //console.log(color);
                return {

                    //fillColor: "green",
                    fillColor: color,
                    fillOpacity: .9,
                    strokeColor: "#FFFFFF",
                    strokeWeight: 1,
                    title: "Ulala"
                }
            });

            map.mapTypes.set('styled_map', styledMapType);  // For map location level off
            map.setMapTypeId('styled_map');                 // For map location level off

            map.data.addListener('click', function (event) {
                //console.log(event.feature);
                var UpazilaParam = {
                    div_name: event.feature.getProperty('Division'),
                    div_id: "",
                    dis_name: event.feature.getProperty('District'),
                    lat: event.latLng.lat(),
                    lon: event.latLng.lng(),
                    dis_id: event.feature.getProperty('DistCode'),
                };

                goUpazilaBylayer(UpazilaParam);


            });

            map.data.addListener('mouseover', function (event) {
                map.data.revertStyle();
                //map.data.overrideStyle(event.feature, {strokeWeight: 3});
//
//                    //function initialize 
//
//
                var dis_id = event.feature.getProperty('DistCode');
                var disDisplayParam = {
                            dis_id: dis_id,
                            filter_data: $("#map_data_filtering").serialize(),
                        };
                var disinfowindow = new google.maps.InfoWindow({
                    content: districtdataDisplay(disDisplayParam),

                });

            });

            map.data.addListener('mouseout', function (event) {
                map.data.revertStyle();
            });

        }
    });
}
firstpageload();