@extends('layout')

@section('content')

<div class="side-app">

    <!-- CONTAINER -->
    <div class="main-container container-fluid">

  <!-- PAGE-HEADER -->
  <div class="page-header">
    <h1 class="page-title">Specialists</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Mowet</a></li>
            <li class="breadcrumb-item active" aria-current="page">Specialists</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->


<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Specialist</h3>
            <a type="button" href="/createspecialist" class="btn btn-danger col-md-3" 
            style="margin-left: auto;margin-right:20px;margin-top:10px;margin-bottom:10px;color:white;"
            >Create Specialist</a>
        </div>
        <div class="row" style="margin: 0 10px;">
            <input type="hidden" id="tableLoaded" value="specialists"/>
            <h3 class="card-title" style="margin-top:20px;margin-block-end: 0rem;">Search by :</h3>
            {{-- <div class="col-md-3 mb-3">
                <label for="name" class="form-label">Test Name</label>
                <input type="text" class="form-control" id="nameInput" placeholder="Name">
            </div> --}}
            <div class="col-md-3 mb-3">
                <label for="name" class="form-label">Specialist Name</label>
                <input type="text" class="form-control" id="nameInput" placeholder="Specialist Name">
            </div>
            <div class="col-md-3 mb-3">
                <label for="date" class="form-label">From</label>
                <input type="date" class="form-control" id="dateFromInput" placeholder="Min Date">
            </div>
            <div class="col-md-3 mb-3">
                <label for="date" class="form-label">To</label>
                <input type="date" class="form-control" id="dateToInput" placeholder="Max Date">
            </div>
            
            
        </div>
        <div class="card-body">
            <!--<p>Use <code class="highlighter-rouge">.table-sspecialisted</code>to add zebra-sspecialisting to any table row within the <code class="highlighter-rouge">.tbody</code>.</p>-->
            <div class="table-responsive">
                <table id="responsive-datatable" class="table table-bordered text-nowrap border-bottom">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th id="view-column">View/Edit</th>
                            <th id="delete-column">Delete</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Field</th>


                            {{-- <th>Customer</th>
                            <th>Start Location</th>
                            <th>End Location</th> --}}
                           
                            <th>Date</th>
                            <th>Time</th>
                    
                            
                            {{-- <th id="map-column">Map</th> --}}
                            
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($specialists)>0)
                        
                        @foreach($specialists as $specialist)
<tr>
<td>{{$specialist['id']}}</td>
<td><a type="button" href="/specialist/{{$specialist['id']}}" class="btn btn-info" style="margin-left: auto;color:white;">View/Edit</a>
</td>
<td><a type="button" onclick="deleteItem('{{$specialist['id']}}','{{$specialist['name']}}','{{$specialist['phone']}}')"  class="btn btn-danger" style="margin-left: auto;color:white;" data-bs-toggle="modal" href="#modalDelete">Delete</a>
</td>
<td>{{$specialist['name']}}</td>
<td>{{$specialist['phone']}}</td>
<td>{{$specialist['field']}}</td>
    {{-- <td>{{$posaudit['user']['name']}}</td> --}}
{{-- <td>{{ $specialist['customer'] ? $specialist['customer']['name']  . ($specialist['customer']->trashed() ? ' (Deleted Customer)' : '') : 'Deleted Customer'}}
<td>{{$specialist['start_location']}}</td>
<td>{{$specialist['end_location']}}</td> --}}

<td>{{date('d-M-Y', strtotime($specialist['created_at']))}}</td>
<td>{{date('H:i', strtotime($specialist['created_at']))}}</td>




{{-- <td>
    <form method="POST" action="{{ route('editproduct') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <!-- Other form fields -->
        <button type="submit" class="btn btn-info">View</button>
    </form>
</td> --}}

</tr>
@endforeach

@else
                                    <!--<tr><td colspan="7" style="text-align: center">No sales so far</td></tr>-->
                                    <!--let datatables display no data available-->
                                    @endif

                        
                           
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    </div>
</div>

            <!-- Modal -->
            <div class="modal fade" id="largemodal">
                <div class="modal-dialog modal-lg " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Map</h5>
                            <h5 id="distance" class="modal-title"></h5>
                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                        </div>
                    
                        <div class="modal-body">
                            <div id="googleMapSpecialists" class="worldh world-map h-500" ></div>
                            {{-- <iframe id="mapEmbededForNow" style="width:100%;height:400px;" src = "https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4084493.7307095355!2d36.50569875426991!3d-1.3175850003645804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2ske!4v1715327211380!5m2!1sen!2ske"></iframe> --}}
                            <!--<div id="googleMap" style="width:100%;height:400px;"></div>-->
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            {{-- <button class="btn btn-primary">Save changes</button> --}}
                        </div>
                    </div>
                    
                </div>
            </div>

@endsection

<script>
    function deleteItem(id,name,seller){
        //alert(id);
        var itemDetails = document.getElementById("itemDetails");
        itemDetails.innerHTML = "Specialist Name: "+name+"<br/> Phone: "+seller;
        var confirmDeleteLink = document.getElementById('confirmDelete'); //or grab it by tagname etc
        confirmDeleteLink.href = "/deletespecialist/"+id;
    }
  </script>

{{-- <script>

function embedMap(lat,long){
        //alert(id);
        var mapEmbedFrame = document.getElementById("mapEmbededForNow");
        mapEmbedFrame.src = "https://maps.google.com/maps?q="+lat+","+long+"&hl=es;z=14&amp&output=embed";
        //var confirmDeleteLink = document.getElementById('confirmDelete'); //or grab it by tagname etc
        //confirmDeleteLink.href = "/deletesale/"+id;
    }
    
    function embedMap2() {
        //alert("we get here");
        var mapProp= {
      center:new google.maps.LatLng(-1.286389,
      36.817223),
      zoom:10,
    };
    var specialists= @json($specialists);
    

    if(specialists[0]['specialistitems'][0]['outlet']){
        alert("we get here specialist yeah");
    var mapProp= {
      center:new google.maps.LatLng(Number(specialists[0]['specialistitems'][0]['outlet']['lat']),
      Number(specialists[0]['specialistitems'][0]['outlet']['long'])),
      zoom:10,
    };
    }else{
        alert("we get here!!!!!");
        var mapProp= {
      center:new google.maps.LatLng(-1.286389,
      36.817223),
      zoom:10,
    };
    //alert("we are here");

    }
    document.addEventListener("DOMContentLoaded", function() {
      
    alert("before we get ahead of ourselves");
   var googleMapsDiv= document.getElementById("mapEmbededForNow");
   alert("we dont need the dom yeah");


    
    var map = new google.maps.Map(googleMapsDiv,mapProp);
    if(specialists.length>0){
        alert("we get here with the plans. wuuhuu");
    var bounds = new google.maps.LatLngBounds();

    console.log(specialists);
    
    specialists.forEach(specialist => {
        var lat1 = Number(specialist['specialistitems'][0]['outlet']['lat']);
        var long1 = Number(specialist['specialistitems'][0]['outlet']['long']);
        alert(lat1);
        alert(long1);

        // const myPosition = { lat: lat1, lng: long1 };
        //console.log(myPosition);

        // var markerElement = new google.maps.marker.AdvancedMarkerElement({
        //         position: myPosition,
        //         map: map,
        //         title: 'Visit Marker', // Add a title if needed
        //     });

            // Extend the bounds to include this marker's position
         //   bounds.extend(myPosition);

            // var infoContent = "<div><h3>"+visit['outlet']['name']+"</h3>"+
            //     "<p>Latitude: "+lat1+"</p>"+
            //     "<p>Longitude: "+long1+"</p>"+
            //     "<p>Seller: "+visit['user']['name']+"</p>"+
            // "</div>";

            // Create an InfoWindow
            // var infoWindow = new google.maps.InfoWindow({
            //     content: infoContent
            // });
            //
            // var infowindow = new google.maps.InfoWindow({
            //     content: "<div><h3>"+specialist['specialistitems'][0]['outlet']['name']+"</h3>"+
            //         "<p>Latitude: "+lat1+"</p>"+
            //         "<p>Longitude: "+long1+"</p>"+
            //         "</div>"
            // });

            // Add a click event listener to the marker to open the InfoWindow
            // marker.addListener('click', function() {
            //     infoWindow.open(map, marker);
            // });
            const myPosition = { lat: -25.344, lng: 131.031 };
            
        
        alert(specialist['specialistitems'][0]['outlet']['name']);
        var marker = new google.maps.Marker({position: myPosition,
            title: specialist['specialistitems'][0]['outlet']['name'],
        });
        // google.maps.event.addListener(marker, 'click', function() {
        //         infowindow.open(map,marker);
        //     });
        marker.setMap(map);
        
    });
    //map.fitBounds(bounds);
    var lat1 = specialists[0]['specialistitems'][0]['outlet']['lat'];
    var long1 = specialists[0]['specialistitems'][0]['outlet']['long'];
    }

    });

   // console.log(recentVisits);
    

    // console.log(myPosition);
    // const myPosition2 = { lat: Number(lat1), lng: Number(long1) };
    // console.log(myPosition2);
    // var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    // var marker = new google.maps.Marker({position: myPosition});
    // marker.setMap(map);
    // var marker2 = new google.maps.Marker({position: myPosition});
    // marker2.setMap(map);
    }

    

    </script>

<script src="https://maps.googleapis.com/maps/api/js?key=
AIzaSyALLsNWwOC09xsRAqrK0S7dINi6BpNc7iw&callback=embedMap2"></script> --}}

<script>
    var map;
    var distanceDiv;
    
    function myMap2() {
        var specialists= @json($specialists);

    if(specialists[0] != null){
    var mapProp= {
      center:new google.maps.LatLng(
        Number(specialists[0]['start_lat']),
        Number(specialists[0]['start_long'])),
        zoom:10,
    };
    // alert("working well");
    }else{
        var mapProp= {
      center:new google.maps.LatLng(-1.286389,
      36.817223),
      zoom:10,
    };
    //alert("we are here");

    }
    document.addEventListener("DOMContentLoaded", function() {
      
    
   var googleMapsDiv= document.getElementById("googleMapSpecialists");

   distanceDiv= document.getElementById("distance");


    
    map = new google.maps.Map(googleMapsDiv,mapProp);
    directionsService = new google.maps.DirectionsService();
    directionsRenderer = new google.maps.DirectionsRenderer();
    directionsRenderer.setMap(map);
    // alert("we get here");
    var waypoints = [];
 
    // if(specialists.length>0){
    // var bounds = new google.maps.LatLngBounds();
    
    // specialists[0]['specialistitems'].forEach(specialistitem => {
    //     var lat1 = Number(specialistitem['outlet']['lat']);
    //     var long1 = Number(specialistitem['outlet']['long']);
    
    //     waypoints.push({ location: { lat: lat1, lng: long1 }, stopover: true });

    //     const myPosition = { lat: lat1, lng: long1 };
    //     console.log(myPosition);

    //     // var markerElement = new google.maps.marker.AdvancedMarkerElement({
    //     //         position: myPosition,
    //     //         map: map,
    //     //         title: 'Visit Marker', // Add a title if needed
    //     //     });

    //         // Extend the bounds to include this marker's position
    //         bounds.extend(myPosition);

    //         // var infoContent = "<div><h3>"+visit['outlet']['name']+"</h3>"+
    //         //     "<p>Latitude: "+lat1+"</p>"+
    //         //     "<p>Longitude: "+long1+"</p>"+
    //         //     "<p>Seller: "+visit['user']['name']+"</p>"+
    //         // "</div>";

    //         // Create an InfoWindow
    //         // var infoWindow = new google.maps.InfoWindow({
    //         //     content: infoContent
    //         // });
    //         //
    //         var infowindow = new google.maps.InfoWindow({
    //             content: "<div><h3>"+specialistitem['outlet']['name']+"</h3>"+
    //                 // "<p>Seller: "+( specialistitem['outlet']['user']===null ? 'Deleted User': specialistitem['outlet']['user']['name'])+"</p>"+
    //                 "<p>Latitude: "+lat1+"</p>"+
    //                 "<p>Longitude: "+long1+"</p>"+
    //                 "</div>"
    //         });

    //         // Add a click event listener to the marker to open the InfoWindow
    //         // marker.addListener('click', function() {
    //         //     infoWindow.open(map, marker);
    //         // });
            
        
       
    //     // var marker = new google.maps.Marker({position: myPosition,
    //     //     title: specialistitem['outlet']['name'],
    //     // });
    //     // google.maps.event.addListener(marker, 'click', function() {
    //     //         infowindow.open(map,marker);
    //     //     });
    //     // marker.setMap(map);
        
    // });
    // map.fitBounds(bounds);
    
    //             const origin = waypoints.shift().location;
    //             const destination = waypoints.pop().location;

    //             const request = {
    //                 origin: origin,
    //                 destination: destination,
    //                 waypoints: waypoints,
    //                 optimizeWaypoints: true,
    //                 travelMode: 'DRIVING'
    //             };

    //             directionsService.route(request, function(result, status) {
    //                 if (status == 'OK') {
    //                     directionsRenderer.setDirections(result);
    //                     console.log('Route drawn with result:', result);
                       
    //                 } else {
    //                     console.error('Directions request failed due to ' + status);
    //                 }
    //             });









    // var lat1 = specialists[0]['specialistitems'][0]['outlet']['lat'];
    // var long1 = specialists[0]['specialistitems'][0]['outlet']['long'];
    // }

});
   // console.log(recentVisits);
    
    // const myPosition = { lat: -25.344, lng: 131.031 };
    // //console.log(myPosition);
    // const myPosition2 = { lat: Number(lat1), lng: Number(long1) };
    // //console.log(myPosition2);
    // var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    // var marker = new google.maps.Marker({position: myPosition});
    // marker.setMap(map);
    // var marker2 = new google.maps.Marker({position: myPosition2});
    // marker2.setMap(map);
    }

    var markers = [];
    var locations = [];

    function rewriteMap(specialist){
        
        //alert('we get here');
        //alert (specialist['specialistitems'][0]['outlet']['lat']);
        distanceDiv.innerText = "";

        
        //console.log(specialist);
        waypoints=[];
        if(markers==undefined){
            // console.log(markers);
            // alert("undefined");
        }else{
            // alert("defined");
            // console.log(markers);
            markers.forEach(marker => {
                marker.setMap(null);
            });
            locations = [];
            markers = [];

            if (directionsRenderer.getMap()) {
            directionsRenderer.set('directions', null); // Clear previous route
            }
        }
        
 

        waypoints.push({ location: { lat: Number(specialist.start_lat) , lng: Number(specialist.start_long) }, stopover: true });
                // Adding a new location
        locations.push({
            "lat": Number(specialist.start_lat),
            "long": Number(specialist.start_long),
            "date": Number(specialist.created_at)
        });
        var  count = 0;
        const totalLocations = specialist.locations.length;
        const step = Math.ceil(totalLocations / 20); // Calculate step size

        specialist.locations.forEach((location, index) => {
            if (index % step === 0) { // Push every 'step'-th location
                waypoints.push({
                    location: { lat: Number(location.lat), lng: Number(location.long) },
                    stopover: true
                });
                locations.push({
                "lat": Number(location.lat),
                "long": Number(location.long),
                "date": location.created_at
            });
            }
 
        });





        
       
        console.log('Map instance:', map);

       
        
        if(specialist.end_lat==null){
            // alert("endpoint undefined")
            // const origin = waypoints.shift().location;

            var bounds = new google.maps.LatLngBounds();
            addMarkers(map,locations,bounds);
            map.fitBounds(bounds);

        }else{
            waypoints.push({ location: { lat: Number(specialist.end_lat), lng: Number(
                specialist.end_long) }, stopover: true });
            locations.push({
                "lat": Number(specialist.end_lat),
                "long": Number(specialist.end_long),
                "date": specialist.updated_at

            });

            const origin = waypoints.shift().location;
            const destination = waypoints.pop().location;

            const request = {
                origin: origin,
                destination: destination,
                waypoints: waypoints,
                optimizeWaypoints: true,
                travelMode: 'DRIVING'
            };

            directionsService.route(request, function(result, status) {
            if (status == 'OK') {

                const route = result.routes[0];
                let totalDistance = 0;

                // Loop through each leg to calculate the total distance
                route.legs.forEach(leg => {
                    totalDistance += leg.distance.value; // distance.value is in meters
                });

                distanceDiv.innerText = ": Distance : "+totalDistance/1000+" km"+" : Fuel Estimate (Assuming KSh 70/km) in Litres: "+70*totalDistance/1000+" ";


                if (totalDistance < 50) {
                    
                    console.log('Route is less than 50 meters, not drawing directions.');
                    var bounds = new google.maps.LatLngBounds();
                    addMarkers(map,locations,bounds);
                    map.fitBounds(bounds);

                } else {

                    directionsRenderer.setDirections(result);
                    console.log('Route drawn with result:', result);
                    addMarkers(map,locations);

                }

            } else {
                console.error('Directions request failed due to ' + status);
                 var bounds = new google.maps.LatLngBounds();
                addMarkers(map,locations,bounds);
                map.fitBounds(bounds);
            }

        });

        }


        

        function addMarkers(map,markerpointsset,bounds) {
            var itemNumber = 1;

            //should be google.maps.Marker.MAX_ZINDEX + 1 but we're using 
            //google.maps.Marker.MAX_ZINDEX + itemNumber to overlay multiple on the same for now

            markerpointsset.forEach(item => {
                //alert('adding marker');
                var marker = new google.maps.Marker({
                    position: { lat: parseFloat(item.lat), lng: parseFloat(item.long) },
                    map: map,
                    label: String(itemNumber),
                    title: 'Marker',
                    zIndex: google.maps.Marker.MAX_ZINDEX + itemNumber
                });
                itemNumber++;

                if(bounds!=undefined){
                const waypointPosition = { lat: parseFloat(item.lat), lng: parseFloat(item.long) };
                console.log(waypointPosition);
                // Extend the bounds to include this marker's position
                bounds.extend(waypointPosition);
                }

                //marker.setMap(map);
                var date = new Date(item.date);
                var hours = date.getHours();
                var minutes = date.getMinutes();

                // Pad single digit minutes with a leading zero
                minutes = minutes < 10 ? '0' + minutes : minutes;

                var locationTime = hours + ':' + minutes;

                var day = date.getDate();
                var month = date.getMonth(); // Months are zero-based, so add 1
                var year = date.getFullYear();

                var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

                // Get month name from array
                var monthName = monthNames[month];

                var locationDate = day + '-' + monthName + '-' + year;

                var infoWindow = new google.maps.InfoWindow({
                    content: `
                        <div>
                            <p><strong>Latitude:</strong> ${item.lat}</p>
                            <p><strong>Longitude:</strong> ${item.long}</p>
                            <p><strong>Date:</strong> ${locationDate}</p>
                            <p><strong>Date:</strong> ${locationTime}</p>

                        </div>
                    `
                });

                marker.addListener('click', function () {
                    infoWindow.open(map, marker);
                });

                markers.push(marker);

               
            });
            
        }

        


        


    // document.addEventListener("DOMContentLoaded", function() {
    //     console.log('Map instance:', map);
    //     alert('we get here too');

    // // function rewriteMap(){
        
    // // }
    
    // });
    
    }
    

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=
    AIzaSyALLsNWwOC09xsRAqrK0S7dINi6BpNc7iw&callback=myMap2"></script>

