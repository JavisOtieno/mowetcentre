@extends('layout')

@section('content')

@php
// Determine the row counts
// $outletsTableCount = count($outlets);
// $salesTableCount = count($sales);
$ordersTableCount = count($orders) > 0 ? count($orders) : 1;
$sessionsTableCount = count($sessions) > 0 ? count($sessions) : 1;
// Calculate the difference
$differenceOrdersSessions = abs($ordersTableCount - $sessionsTableCount);

$counsellorsTableCount = count($counsellors) > 0 ? count($counsellors) : 1;
$customersTableCount = count($customers) > 0 ? count($customers) : 1;
// Calculate the difference
$differenceCounsellorsCustomers = abs($counsellorsTableCount - $customersTableCount);
@endphp

<div class="side-app">

    <!-- CONTAINER -->
    <div class="main-container container-fluid">

  <!-- PAGE-HEADER -->
  <div class="page-header">
    <h1 class="page-title">Orders</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Mowet</a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="mt-2">
                            <h6 class="">Total Orders</h6>
                            <h2 class="mb-0 number-font">{{$ordersCount}}</h2>
                        </div>
                        <div class="ms-auto">
                            <div class="chart-wrapper mt-1">
                                <canvas id="saleschart"
                                    class="h-8 w-9 chart-dropshadow"></canvas>
                            </div>
                        </div>
                    </div>
                    <span class="text-muted fs-12"><span class="text-secondary"><i
                                class="fe fe-arrow-up-circle  text-secondary"></i> {{$ordersWeekCount}}</span>
                        This week</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="mt-2">
                            <h6 class="">Total Sessions</h6>
                            <h2 class="mb-0 number-font">{{$sessionsCount}}</h2>
                        </div>
                        <div class="ms-auto">
                            <div class="chart-wrapper mt-1">
                                <canvas id="leadschart"
                                    class="h-8 w-9 chart-dropshadow"></canvas>
                            </div>
                        </div>
                    </div>
                    <span class="text-muted fs-12"><span class="text-pink"><i
                                class="fe fe-arrow-up-circle text-pink"></i> {{$sessionsWeekCount}}</span>
                        This Week</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="mt-2">
                            <h6 class="">Total Counsellors</h6>
                            <h2 class="mb-0 number-font">{{$counsellorsCount}}</h2>
                        </div>
                        <div class="ms-auto">
                            <div class="chart-wrapper mt-1">
                                <canvas id="profitchart"
                                    class="h-8 w-9 chart-dropshadow"></canvas>
                            </div>
                        </div>
                    </div>
                    <span class="text-muted fs-12"><span class="text-green"><i
                                class="fe fe-arrow-up-circle text-green"></i> {{$counsellorsWeekCount}}</span>
                        This week</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="mt-2">
                            <h6 class="">Total Customers</h6>
                            <h2 class="mb-0 number-font">{{$customersCount}}</h2>
                        </div>
                        <div class="ms-auto">
                            <div class="chart-wrapper mt-1">
                                <canvas id="costchart"
                                    class="h-8 w-9 chart-dropshadow"></canvas>
                            </div>
                        </div>
                    </div>
                    <span class="text-muted fs-12"><span class="text-warning"><i
                                class="fe fe-arrow-up-circle text-warning"></i> {{$customersWeekCount}}</span>
                        This Week</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
   

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent Sessions</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>Session ID</th>
                                <th>User Name</th>
                                <th>Session Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($sessions)>0)
                            @foreach($sessions as $session)
                            <tr>
                            {{-- <td>{{$session['id']}}</td> --}}
                            <td>{{$session['id']}}</td>
                            <td>{{$session['counsellor']['name']}}</td>
                            <td>{{date('d-M-Y', strtotime($session['created_at']))}}</td>
                            </tr>
                            @endforeach
                            @else
                            <!--let datatables display no data available-->
                            <tr>
                                <td colspan="4" style="text-align: center">No sessions so far</td>
                            </tr>
                            @endif

                            {{-- Add empty rows if necessary --}}
                            {{-- @for($i = 0; $i < $differenceOutletsSales && 
                            $outletsTableCount < $salesTableCount; $i++)
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            @endfor --}}

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

      <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent Orders</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Order Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($orders)>0)
                            @foreach($orders as $order)
                            <tr>
                            {{-- <td>{{$order['id']}}</td> --}}
                            <td>{{$order['id']}}</td>
                            <td>{{$order['customer']['name']}}</td>
                            <td>{{date('d-M-Y', strtotime($order['created_at']))}}</td>
                            </tr>
                            @endforeach
                            @else
                            <!--let datatables display no data available-->
                            <tr>
                                <td colspan="4" style="text-align: center">No orders so far</td>
                            </tr>
                            @endif

                            {{-- Add empty rows if necessary --}}
                            @for($i = 0; $i < $differenceOrdersSessions && 
                            $ordersTableCount <> $sessionsTableCount; $i++)
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            @endfor

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

        <div class="row">
   

    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent Counsellors</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>Counsellor ID</th>
                                <th>Counsellor Name</th>
                                <th>Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($counsellors)>0)
                            @foreach($counsellors as $counsellor)
                            <tr>
                            {{-- <td>{{$counsellor['id']}}</td> --}}
                            <td>{{$counsellor['id']}}</td>
                            <td>{{$counsellor['name']}}</td>
                            <td>{{date('d-M-Y', strtotime($counsellor['created_at']))}}</td>
                            </tr>
                            @endforeach
                            @else
                            <!--let datatables display no data available-->
                            <tr>
                                <td colspan="4" style="text-align: center">No sessions so far</td>
                            </tr>
                            @endif

                            {{-- Add empty rows if necessary --}}
                            {{-- @for($i = 0; $i < $differenceOutletsSales && 
                            $outletsTableCount < $salesTableCount; $i++)
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            @endfor --}}

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

      <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recent Customers</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table border text-nowrap text-md-nowrap table-striped mb-0">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>Customer ID</th>
                                <th>Customer Name</th>
                                <th>Registration Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($customers)>0)
                            @foreach($customers as $customer)
                            <tr>
                            {{-- <td>{{$customer['id']}}</td> --}}
                            <td>{{$customer['id']}}</td>
                            <td>{{$customer['name']}}</td>
                            <td>{{date('d-M-Y', strtotime($customer['created_at']))}}</td>
                            </tr>
                            @endforeach
                            @else
                            <!--let datatables display no data available-->
                            <tr>
                                <td colspan="4" style="text-align: center">No customers so far</td>
                            </tr>
                            @endif

                            {{-- Add empty rows if necessary --}}
                            @for($i = 0; $i < $differenceCounsellorsCustomers && 
                            $counsellorsTableCount <> $customersTableCount; $i++)
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            @endfor

                            
                        </tbody>
                    </table>
                </div>
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
                            <div id="googleMapOrders" class="worldh world-map h-500" ></div>
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
        itemDetails.innerHTML = "Order Description: "+name+"<br/> Customer Name: "+seller;
        var confirmDeleteLink = document.getElementById('confirmDelete'); //or grab it by tagname etc
        confirmDeleteLink.href = "/deleteorder/"+id;
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
    var orders= @json($orders);
    

    if(orders[0]['orderitems'][0]['outlet']){
        alert("we get here order yeah");
    var mapProp= {
      center:new google.maps.LatLng(Number(orders[0]['orderitems'][0]['outlet']['lat']),
      Number(orders[0]['orderitems'][0]['outlet']['long'])),
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
    if(orders.length>0){
        alert("we get here with the plans. wuuhuu");
    var bounds = new google.maps.LatLngBounds();

    console.log(orders);
    
    orders.forEach(order => {
        var lat1 = Number(order['orderitems'][0]['outlet']['lat']);
        var long1 = Number(order['orderitems'][0]['outlet']['long']);
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
            //     content: "<div><h3>"+order['orderitems'][0]['outlet']['name']+"</h3>"+
            //         "<p>Latitude: "+lat1+"</p>"+
            //         "<p>Longitude: "+long1+"</p>"+
            //         "</div>"
            // });

            // Add a click event listener to the marker to open the InfoWindow
            // marker.addListener('click', function() {
            //     infoWindow.open(map, marker);
            // });
            const myPosition = { lat: -25.344, lng: 131.031 };
            
        
        alert(order['orderitems'][0]['outlet']['name']);
        var marker = new google.maps.Marker({position: myPosition,
            title: order['orderitems'][0]['outlet']['name'],
        });
        // google.maps.event.addListener(marker, 'click', function() {
        //         infowindow.open(map,marker);
        //     });
        marker.setMap(map);
        
    });
    //map.fitBounds(bounds);
    var lat1 = orders[0]['orderitems'][0]['outlet']['lat'];
    var long1 = orders[0]['orderitems'][0]['outlet']['long'];
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
        var orders= @json($orders);

    if(orders[0] != null){
    var mapProp= {
      center:new google.maps.LatLng(
        Number(orders[0]['start_lat']),
        Number(orders[0]['start_long'])),
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
      
    
   var googleMapsDiv= document.getElementById("googleMapOrders");

   distanceDiv= document.getElementById("distance");


    
    map = new google.maps.Map(googleMapsDiv,mapProp);
    directionsService = new google.maps.DirectionsService();
    directionsRenderer = new google.maps.DirectionsRenderer();
    directionsRenderer.setMap(map);
    // alert("we get here");
    var waypoints = [];
 
    // if(orders.length>0){
    // var bounds = new google.maps.LatLngBounds();
    
    // orders[0]['orderitems'].forEach(orderitem => {
    //     var lat1 = Number(orderitem['outlet']['lat']);
    //     var long1 = Number(orderitem['outlet']['long']);
    
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
    //             content: "<div><h3>"+orderitem['outlet']['name']+"</h3>"+
    //                 // "<p>Seller: "+( orderitem['outlet']['user']===null ? 'Deleted User': orderitem['outlet']['user']['name'])+"</p>"+
    //                 "<p>Latitude: "+lat1+"</p>"+
    //                 "<p>Longitude: "+long1+"</p>"+
    //                 "</div>"
    //         });

    //         // Add a click event listener to the marker to open the InfoWindow
    //         // marker.addListener('click', function() {
    //         //     infoWindow.open(map, marker);
    //         // });
            
        
       
    //     // var marker = new google.maps.Marker({position: myPosition,
    //     //     title: orderitem['outlet']['name'],
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









    // var lat1 = orders[0]['orderitems'][0]['outlet']['lat'];
    // var long1 = orders[0]['orderitems'][0]['outlet']['long'];
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

    function rewriteMap(order){
        
        //alert('we get here');
        //alert (order['orderitems'][0]['outlet']['lat']);
        distanceDiv.innerText = "";

        
        //console.log(order);
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
        
 

        waypoints.push({ location: { lat: Number(order.start_lat) , lng: Number(order.start_long) }, stopover: true });
                // Adding a new location
        locations.push({
            "lat": Number(order.start_lat),
            "long": Number(order.start_long),
            "date": Number(order.created_at)
        });
        var  count = 0;
        const totalLocations = order.locations.length;
        const step = Math.ceil(totalLocations / 20); // Calculate step size

        order.locations.forEach((location, index) => {
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

       
        
        if(order.end_lat==null){
            // alert("endpoint undefined")
            // const origin = waypoints.shift().location;

            var bounds = new google.maps.LatLngBounds();
            addMarkers(map,locations,bounds);
            map.fitBounds(bounds);

        }else{
            waypoints.push({ location: { lat: Number(order.end_lat), lng: Number(
                order.end_long) }, stopover: true });
            locations.push({
                "lat": Number(order.end_lat),
                "long": Number(order.end_long),
                "date": order.updated_at

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

