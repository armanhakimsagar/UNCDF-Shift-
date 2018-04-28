/*
Author: Zahidul Hossein Ripon & Farhad Ali & Mainul & Debashis & Fahamina 
Project: MSI
Description: Plot Bangladesh GEO location using .json files
*/

var dis_id = '';
var activity_type = '';
var subActorsActivity = '';
var subtarget = '';
var actorsTypeMains = '';
var peopleImpact = '';
var impactactorsTypeMains = '';
var targetMain = '';
var first_date_viol = '';
var end_date_viol = '';
       
function firstpageload(){
        var map;
    //var globalcolorcode='#fed559';
        window.initMap = function(){
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
                    //data: "div_name="+div_name,
                    //dataType: "JSON",
                    success:function(response){
                    
                    //ajax for display information result
                    var JSONObject = JSON.parse(response);
                   /*var mapPlotJSON = JSONObject[0];
                   var countJSon = JSONObject[1];*/
                 // console.log(countJSon);
                    
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 7,
                         center: {lat: 23.684994, lng: 90.356331},
                         disableDefaultUI: true,
                        });


                    for(var i = 0; i < JSONObject.length; i++) {
                        var obj = JSONObject[i];                      
                        map.data.loadGeoJson('/map/data/district/'+obj.json_filename);                                                
                    }





                    
                    var color;
                    map.data.setStyle(function(feature) {
                    var Dist_id = feature.getProperty('DistCode');
                    if(Dist_id.toString().length==1)
                    {
                    Dist_id="0"+Dist_id;    
                    }
                    
                 //color=mysetcolorfunction(Dist_id);

                    return {

                        fillColor: "#ff0000",
                        //fillColor: color,
                        fillOpacity: .9,
                        strokeColor: "#FFFFFF",
                        strokeWeight: 1
                    }
                  });                                         

                        map.mapTypes.set('styled_map', styledMapType);  // For map location level off
                        map.setMapTypeId('styled_map');                 // For map location level off
        
                        map.data.addListener('click', function(event) {                                
                            goUpazilaBylayer(event.feature.getProperty('Division'),event.feature.getProperty('District'),event.latLng.lat(),event.latLng.lng(),event.feature.getProperty('DistCode'));                            
                        });
                        
                         map.data.addListener('click', function(event) {
                            
                        });

                         map.data.addListener('mouseover', function(event) {
                          map.data.revertStyle();
                          map.data.overrideStyle(event.feature, {strokeWeight: 3});
                        
                          //function initialize 
 
                          
                          var dis_id = event.feature.getProperty('DistCode'); 
                          //console.log(event.feature);
                         // console.log(targetMain);             
                            var disinfowindow = new google.maps.InfoWindow({
                                  content: districtdataDisplay(dis_id),
                                  
                              });

                        });

                        map.data.addListener('mouseout', function(event) {
                          map.data.revertStyle();
                        });
                    
                    }
            });
        
      }
    

}
firstpageload();  



function mysetcolorfunction(Dist_id)
{
    var test=$.ajax({
                    url:"heatmapcolor",
                    type:"GET",
                    async: false,
                    data:{dis_id:Dist_id},
                    dataType: 'text/html',
                    success:function(colorcode){                                

                    }
                });
            return test.responseText; 
}      
function mysetcolorfunctionupazila(Dist_id,Up_id)
{
    var test=$.ajax({
                    url:"heatmapcolorup",
                    type:"GET",
                    async: false,
                    data:{dis_id:Dist_id,up_id:Up_id},
                    dataType: 'text/html',
                    success:function(colorcode){                                

                    }
                });
            return test.responseText; 
}


function districtdataDisplay(id){
                             $.ajax({
                                url:"districthoverwiseresult",
                                type:"GET",
                                data:{dis_id: id},
                                dataType:"JSON",
                                success:function(districtdata){
                                    //console.log(districtdata);

                                    $("#mapHoverResult").html(districtdata);
                                    
                                }
                            });
                            }

function districtdataDisplay(id)

                            {
                             $.ajax({
                                url:"districthoverwiseresult",
                                type:"GET",
                                data:{dis_id: id},
                                dataType:"JSON",
                                success:function(districtdata){
                                    //console.log(districtdata);

                                    $("#mapHoverResult").html(districtdata);
                                    
                                }
                            });
                            }

	    

function goDistrictBylayer(div_name,vlat,vlng,div_id=null)
        {
            /*$.ajax({
                url     : "filter_violence_data_click",
                type    : "GET",
                dataType: "JSON",
                data    : {div_id:div_id},
                success : function(databack){
                    $(".map_reportPanel").html(databack);
                   //alert('ok boss');
                   
                }
            });*/
            

            $.ajax({
                    url: "/getdivisionresult",
                    type: "GET",
                    data: "div_name="+div_name,
                    //dataType: "JSON",
                    success:function(response){
                   //ajax for display information result
                    var JSONObject = JSON.parse(response);
                    //console.log(JSONObject);
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
                    
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 8,
                        center: {lat: vlat, lng: vlng},
                        disableDefaultUI: true,
                        });


                    for(var i = 0; i < JSONObject.length; i++) {
                        var obj = JSONObject[i];
                        //console.log(obj.json_filename);
                        // START                        
                        map.data.loadGeoJson('/map/data/district/'+obj.json_filename);                                                
                        //END
                    }
                    
                    var color;
                    map.data.setStyle(function(feature) {                        
                    var Dist_id = feature.getProperty('DistCode');
                    if(Dist_id.toString().length==1)
                    {
                    Dist_id="0"+Dist_id;    
                    }
                    
                    color=mysetcolorfunction(Dist_id);

                        return {

                           //fillColor: "#ff0000",
                           fillColor: color,

                           fillOpacity: .9,
                           strokeColor: "#FFFFFF",
                           strokeWeight: 1
                        }
                        });

                        map.mapTypes.set('styled_map', styledMapType);  // For map location level off
                        map.setMapTypeId('styled_map');                 // For map location level off
                        
                        map.data.addListener('click', function(event) {                                
                            goUpazilaBylayer(event.feature.getProperty('Division'),event.feature.getProperty('District'),event.latLng.lat(),event.latLng.lng(),event.feature.getProperty('DistCode'));    
                          // console.log(event.feature);
                            //alert("Latitude: " + event.latLng.lat() + " " + ", longitude: " + event.latLng.lng());
                        });
                        
                         map.data.addListener('click', function(event) {
                            
                        });

                        map.data.addListener('mouseover', function(event) {
                          map.data.revertStyle();
                          map.data.overrideStyle(event.feature, {strokeWeight: 3});
                        
                          //function initialize 
                          //collect filter data 

                       
                          var dis_id = event.feature.getProperty('DistCode'); 
                          //console.log(event.feature);             
                            var disinfowindow = new google.maps.InfoWindow({
                                  content: districtdataDisplay(dis_id),
                                  
                              });

                        });

                        map.data.addListener('mouseout', function(event) {
                          map.data.revertStyle();
                        });
                    
                    }
            });

            //district hover wise result display                                                                
        }
        
        
        function goUpazilaBylayer(div_name,dis_name,vlat,vlng,dis_id)
        {
            //console.log(div_name);
            //return;
            //Ajax Call
            //var evenId;
            //evenId =  $('.evnetName').val();
             $.ajax({
                url     : "filter_violence_data_click",
                type    : "GET",
                dataType: "JSON",
                data    : {dis_id:dis_id},
                success : function(databack){
                    $(".map_reportPanel").html(databack);
                   //alert('ok boss');
                   
                }
            });



            $.ajax({
                    url: "/getdistrictresult",
                    type: "GET",
                    data: "dis_name="+dis_name,
                    //dataType: "JSON",
                    success:function(response){

                    var JSONObject = JSON.parse(response);
                    //console.log(JSONObject);
                    
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
                    
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 9,
                        center: {lat: vlat, lng: vlng}, 
                        disableDefaultUI: true,
                        });


                    for(var i = 0; i < JSONObject.length; i++) {
                        var obj = JSONObject[i];
                        console.log(obj.json_filename);
                        // START                        
                        map.data.loadGeoJson('/map/data/upazila/'+div_name+'/'+obj.json_filename);                                                
                        //END
                    }
                    
                   var color;
                    map.data.setStyle(function(feature) {                        
                    var Up_id = feature.getProperty('ID_4');
                    var Dis_id = feature.getProperty('ID_3');
                    if(Up_id.toString().length==1)
                    {
                    Up_id="0"+Up_id;    
                    }
                    
                    color=mysetcolorfunctionupazila(Dis_id,Up_id);

                        return {

                           //fillColor: "#ff0000",
                           fillColor: color,

                           fillOpacity: .9,
                           strokeColor: "#FFFFFF",
                           strokeWeight: 1
                        }
                        });

                        map.mapTypes.set('styled_map', styledMapType);  // For map location level off
                        map.setMapTypeId('styled_map');                 // For map location level off
                        
                        //var infoWindow = new google.maps.InfoWindow();
                        //var content = '<table class="table table-bordered"><tbody><tr><td style="font-weight: bold;font-size: 15px;color: #00b3ee;">A man was found slaughtered in a shop by unknown perpetrator in Shariatpur.</td></tr><tr><td> Date :  15  /  9  /  2017</td></tr><tr><td> Total Killed:  1</td></tr><tr><td> Total Injured:  0</td></tr><tr><td> Total Arrested:  0</td></tr><tr><td> Location:  Zanjira Upazila </td></tr><tr><td> Link: <a target="_blank" href="http://epaper.newagebd.net/16-09-2017/12">http://epaper.newagebd.net/16-09-2017/12</a></td></tr></tbody></table>';
                        map.data.addListener('click', function(event) {                                

                            var up_id = event.feature.getProperty('ID_4');
                            var dis_id = event.feature.getProperty('ID_3');
                            //alert(up_id);  

                            //infoWindow.setPosition(event.latLng);
                            //infoWindow.setContent(content);
                            //infoWindow.open(map);  

                        });
                                               

                        map.data.addListener('mouseover', function(event) {
                          map.data.revertStyle();
                          map.data.overrideStyle(event.feature, {strokeWeight: 3});
                          
                          var up_id = event.feature.getProperty('ID_4');
                          var dis_id = event.feature.getProperty('ID_3');
                          //console.log(event.feature);

                        $.ajax({
                                url:"upzilahoverwiseresult",
                                type:"GET",
                                data:{dis_id:dis_id,up_id:up_id},
                                dataType:"JSON",
                                success:function(districtdata){
                                    //console.log(districtdata);

                                    $("#mapHoverResult").html(districtdata);
                                    
                                }

                        });

                        });
                         

                        map.data.addListener('mouseout', function(event) {
                          map.data.revertStyle();
                        });
                    
                    }
            });
            
            
        }
        

function mapFilterviolence_submit()
{
  // console.log('OK');
 //console.log($('#map_filter_form').serialize());

    div_id = $("#div_id").val();
    dis_id = $("#dis_id").val();

    activity_types_main = $("#activity_types_main").val(); 
    activity_type = [];
    $("input[name='activity_type[]']:checked").each( function () {
        activity_type.push($(this).val());
    });

    actorsTypeMains = $("#actorsTypeMains").val();

    subActorsActivity = [];
    $("input[name='subActorsActivity[]']:checked").each( function () {
        subActorsActivity.push($(this).val());
    });

    targetMain   = $("#targetMain").val();
    subtarget = [];
    $("input[name='subtarget[]']:checked").each( function () {
        subtarget.push($(this).val());
    });
   
         
    peopleImpact = $("#peopleImpact").val();
    impactactorsTypeMains = $("#impactactorsTypeMains").val();

    first_date_viol   = $("#first_date_viol").val();
    end_date_viol   = $("#end_date_viol").val();
    
    //console.log(activity_types_main);

    if(dis_id !=''  && div_id !='' ){

       $.ajax({
                url:"disNameLatLong",
                type:"GET",
                dataType:"JSON",
                data:{dis_id:dis_id,div_id:div_id},
                success:function(response)
                {                                        
                     mapajaxresult();
                     var div_name = response.divName.loc_name_en;

                    console.log(response);

                    var dis_name = response.disName.loc_name_en;
                    var lat_lon = response.disName.latitude_longitude;
                    var newlat_lon = lat_lon.split(',');
                    var vlat = parseInt(newlat_lon[0]);
                    var vlng = parseInt(newlat_lon[1]);
                    goUpazilaBylayer(div_name,dis_name,vlat,vlng);
                }

            });
    }else if(div_id !=''){
        
        
        $.ajax({
                url:"divNameLatLong",
                type:"GET",
                dataType:"JSON",
                data:{dis_id:dis_id,div_id:div_id},
                success:function(response){
                    mapajaxresult();
                    //console.log(response);
                    var div_name = response.loc_name_en;
                    var lat_lon = response.latitude_longitude;
                    var newlat_lon = lat_lon.split(',');
                    var vlat = parseInt(newlat_lon[0]);
                    var vlng = parseInt(newlat_lon[1]);

                    
                   goDistrictBylayer(div_name,vlat,vlng);

                   
                }

        });
    }else{
        
       mapajaxresult();   
         

/*
$( "#mapplace" ).empty();
$('<div class="mainDiv" id="mainDiv"><div class="map" id="map"><div class="hover_map_and_sidebar"></div></div></div>').appendTo('#mapplace');
      */   

    }
   
}

function mapajaxresult()
{
   
    $.ajax({
            url     : "/filter_violence_data_send",
            type    : "GET",
            dataType: "json",
            data    : $('#map_filter_form').serialize(),
            success : function(response)
            {
                $(".map_reportPanel").html(response);
               // alert(response.total);    
            }
        });
}

//division data display

function divisiondataDisplay(id)
{
    $.ajax({
            url:"hoverwiseresult",
            type:"GET",
            data:{div_id:id},
            dataType:"JSON",
            success:function(dataresult)
            {
                $("#mapHoverResult").html(dataresult);
            }
        });

}