@extends('layout-form')

@section('content')

<div class="side-app">

    <!-- CONTAINER -->
    <div class="main-container container-fluid">

  <!-- PAGE-HEADER -->
  <div class="page-header">
    <h1 class="page-title">Orders</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Tracker</a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->


<div class="col-xl-12 row">
    <div class="card col-md-8 ">
        <div class="card-header">
            <h3 class="card-title">Add Order</h3> 
        </div>
        <div class="card-body">
            <!--<p>Use <code class="highlighter-rouge">.table-sordered</code>to add zebra-sordering to any table row within the <code class="highlighter-rouge">.tbody</code>.</p>-->
            
                
                    <form action="/saveorder" method="POST">
                        @csrf
                        @method('POST')
                        <div class="">

                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>
                                            @if ($error == 'Any special error')
                                            Any special error
                                            @else
                                            {{ $error }}
                                            @endif
                                            </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="{{ old('description', '') }}" autocomplete="description">
                            </div>

                         

                            {{-- <div class="form-group">
                                <label for="end_long" class="form-label">Customer Id</label>
                                <input type="number" class="form-control" name="customer_id" id="customer_id" placeholder="Customer Id" value="{{ old('customer_id', '') }}" autocomplete="customer_id">
                            </div> --}}

                                                        <div class="form-group">
                            <label class="form-label"> Customer</label>
                            <select class="form-control select2-show-search form-select" name="customer_id" id="customer_id" data-placeholder="Choose one">
                                    <option label="Choose one"></option>
                                    @foreach($customers as $customer)
                                    <option {{old('customer_id','')==$customer['id']? 'selected':''}} value="{{$customer['id']}}">{{$customer['name']}}</option>
                                    @endforeach
                                    
                                </select>
                        </div>



                            
                        </div>
                        <button class="btn btn-primary col-12 mt-4 mb-0">Save</button>
                    </form>
                
            </div>

        </div>
        <div class="col-md-3">

            <div class="card" style="width: 18rem;height:95%;background-color:#F7F7F9">
          <div class="card-body">
             
            <h5 class="card-title">Quick Tips</h5>
           <ol class="card-text">
                <li style="margin-bottom: 10px;"><strong>Name </strong>: Enter the name of the order. </li>
            </ol>
          </div>
        </div>
        
            </div>
    </div>
</div>

    </div>
</div>

@endsection