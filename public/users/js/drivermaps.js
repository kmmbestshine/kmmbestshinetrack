function initmap(){
                    var posOptions = {
                enableHighAccuracy: true,
                timeout: 20000,
                maximumAge: 0
                };
               
                //global var datas;
                
                 var datas=[];
                var mapapps=angular.module("mapapp",[]);
                mapapps.controller("mapcontroller",function($http,$scope){
                   console.log("hi");
                   $scope.dataapp=[];
                     $http.get('http://stjosephspallalakuppam.in/users/driverslocation').then(function (resp) {
                         //console.log(resp);
                        datas=resp.data.data;
                        $scope.dataapp=resp.data.data;
                        
                     });
                
                
                //mapcontroller($http){
//                  $.ajax({
//                      url:'http://localhost:8000/api/application/get/driverslocation',
//                      type:'get',
//                      success:function(data){
//                          console.log("hi");
//                      }
//                  });     
                //}
                var lat=13.0334232;
                var long=80.1890735;
                var myLatlng = new google.maps.LatLng(lat, long);
                //$scope.geolocation="";
                var mapOptions = {
                center: myLatlng,
                zoom: 16,
                mapTypeId: google.maps.MapTypeId.ROADMAP
                };          
                var map = new google.maps.Map(document.getElementById("maps"), mapOptions); 
                //var map = map;   
                google.maps.event.addListenerOnce(map, 'idle', function(){
                
                console.log($scope.dataapp);
                for (var i=0;i <= $scope.dataapp.length;i++){
                    var icon = {
                url: "http://stjosephspallalakuppam.in/users/img/bus1.png", // url
                scaledSize: new google.maps.Size(40,40 ), // scaled size
                origin: new google.maps.Point(0,0), // origin
                anchor: new google.maps.Point(0, 0) // anchor
                };
                    var lat=$scope.dataapp[i]['latitude'];
                    var long=$scope.dataapp[i]['longitude'];
                //var long=80.1922;
                var myLatlngs = new google.maps.LatLng(lat, long);
                var marker = new google.maps.Marker({
                map: map,
                animation: google.maps.Animation.DROP,
                position: myLatlngs,
                icon:icon
                });      
                //var geo_location="";
//                var geocoder = new google.maps.Geocoder;
//                geocoder.geocode({'location': myLatlngs},function(results, status) {
//             
                var contstring="<div style='color: #1a2119;font-size: 15px;font-family: serif;'><span><span style='color:black;font-weight:bold;'>Driver Name:</span>"+$scope.dataapp[i]['driver_name']+"</span><br><span><span style='color:black;font-weight:bold;'>Driver Mobile:</span>"+$scope.dataapp[i].driver_mobile+"</span><br></div>";
                var infoWindow = new google.maps.InfoWindow({
                content: contstring
                });
                infoWindow.open(map, marker);
//                 });

            }
           
                });
                    });
                    }