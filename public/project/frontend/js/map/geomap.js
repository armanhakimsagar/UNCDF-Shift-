/*
Author: Zahidul Hossein Ripon
Project: MSI
Description: Plot Bangladesh GEO location using .json files
*/

$(document).ready(function(){
        var map;
            function initMap(){
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 23.684994, lng: 90.356331}, 
        });

        // NOTE: This uses cross-domain XHR, and may not work on older browsers.
        
        map.data.loadGeoJson('/project/frontend/js/map/data/division/Alldivision.geojson');
		// Set the stroke width, and fill color for each polygon
        // Color each letter gray. Change the color when the isColorful property
        // is set to true. Division
		map.data.setStyle(function(feature) {
		var SD_NAME = feature.getProperty('Div_name');
		//var color = "gray";
		if (SD_NAME == "Barisal") {
		  color = "#984848";
		}else if (SD_NAME == "Dhaka") {
		  color = "#FFFF00";
		}else if (SD_NAME == "Chittagong") {
		  color = "#EE82EE";
		}else if (SD_NAME == "Khulna") {
		  color = "#40E0D0";
		}else if (SD_NAME == "Rajshahi") {
		  color = "#E05858";
		}else if (SD_NAME == "Rangpur") {
		  color = "#606868";
		}else if (SD_NAME == "Sylhet") {
		  color = "#00FF7F";
		}else if (SD_NAME == "Mymensingh") {
		  color = "#EE82EE";
		}
                
		
		return {
		  fillColor: color,
		  strokeColor: color,
		  strokeWeight: 1
		}
	  });
          

        // When the user clicks, set 'isColorful', changing the color of the letters.
        map.data.addListener('click', function(event) {
//            goDistrictBylayer(event.feature.getProperty('Div_name'),event.latLng.lat(),event.latLng.lng());	
        });

        // When the user hovers, tempt them to click by outlining the letters.
        // Call revertStyle() to remove all overrides. This will use the style rules
        // defined in the function passed to setStyle()
        map.data.addListener('mouseover', function(event) {
          map.data.revertStyle();
          map.data.overrideStyle(event.feature, {strokeWeight: 3});
        });

        map.data.addListener('mouseout', function(event) {
          map.data.revertStyle();
        });
      }
	  
	function goDistrictBylayer(div_name,vlat,vlng)
        {
            //console.log(div_name);
            //Ajax Call
            //var evenId;
            //evenId =  $('.evnetName').val();
            $.ajax({
                    url: "/getdivisionresult",
                    type: "GET",
                    data: "div_name="+div_name,
                    //dataType: "JSON",
                    success:function(response){
                    //alert(response);    
                    //console.log(response);
                    var JSONObject = JSON.parse(response);
                    //console.log(JSONObject);
                    
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 8,
                        center: {lat: vlat, lng: vlng},  
                        });


                    for(var i = 0; i < JSONObject.length; i++) {
                        var obj = JSONObject[i];
                        //console.log(obj.json_filename);
                        // START                        
                        map.data.loadGeoJson('/map/data/district/'+obj.json_filename);                                                
                        //END
                    }
                    
                    map.data.setStyle(function(feature) {                        
                        var color = "green";
                        return 	{
                                fillColor: color,
                                strokeColor: color,
                                strokeWeight: 1
                                }
                        });


                        map.data.addListener('click', function(event) {                                
                            goUpazilaBylayer(event.feature.getProperty('Division'),event.feature.getProperty('District'),event.latLng.lat(),event.latLng.lng());	
                            //alert("Latitude: " + event.latLng.lat() + " " + ", longitude: " + event.latLng.lng());
                        });
                        
                         map.data.addListener('click', function(event) {
                            
                        });

                        map.data.addListener('mouseover', function(event) {
                          map.data.revertStyle();
                          map.data.overrideStyle(event.feature, {strokeWeight: 3});
                        });

                        map.data.addListener('mouseout', function(event) {
                          map.data.revertStyle();
                        });
                    
                    }
            });
            
            
        }
        
        
        function goUpazilaBylayer(div_name,dis_name,vlat,vlng)
        {
            console.log(div_name);
            //return;
            //Ajax Call
            //var evenId;
            //evenId =  $('.evnetName').val();
            $.ajax({
                    url: "/getdistrictresult",
                    type: "GET",
                    data: "dis_name="+dis_name,
                    //dataType: "JSON",
                    success:function(response){
                    //alert(response);    
                    //console.log(response);
                    //return 0;
                    var JSONObject = JSON.parse(response);
                    //console.log(JSONObject);
                    
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 8,
                        center: {lat: vlat, lng: vlng}, 
                        });


                    for(var i = 0; i < JSONObject.length; i++) {
                        var obj = JSONObject[i];
                        console.log(obj.json_filename);
                        // START                        
                        map.data.loadGeoJson('/map/data/upazila/'+div_name+'/'+obj.json_filename);                                                
                        //END
                    }
                    
                    map.data.setStyle(function(feature) {                        
                        var color = "green";
                        return 	{
                                fillColor: color,
                                strokeColor: color,
                                strokeWeight: 1
                                }
                        });


                        map.data.addListener('click', function(event) {                                
                            //alert(event.feature.getProperty('Upazila'));	
                        });
                                               

                        map.data.addListener('mouseover', function(event) {
                          map.data.revertStyle();
                          map.data.overrideStyle(event.feature, {strokeWeight: 3});
                        });

                        map.data.addListener('mouseout', function(event) {
                          map.data.revertStyle();
                        });
                    
                    }
            });
            
            
        }
                
});

