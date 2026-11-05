@extends('layout-form')

@section('content')

<div class="side-app">

    <!-- CONTAINER -->
    <div class="main-container container-fluid">

  <!-- PAGE-HEADER -->
  <div class="page-header">
    <h1 class="page-title">Reviews</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Mowet</a></li>
            <li class="breadcrumb-item active" aria-current="page">Reviews</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->


<div class="col-xl-12 row">
    <div class="card col-md-8 ">
        <div class="card-header">
            <h3 class="card-title">Add Review</h3> 
        </div>
        <div class="card-body">
            <!--<p>Use <code class="highlighter-rouge">.table-sordered</code>to add zebra-sordering to any table row within the <code class="highlighter-rouge">.tbody</code>.</p>-->
            
                
                    <form action="/savereview" method="POST">
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

                        <!--
      'name',
        'id_number',
        'phone',
        'email',
        'gender',
        'address',
        'date_of_birth',
        'age',
        'case_manager',
                        -->

                        <div class="form-group">
                            <label class="form-label"> Patient</label>

                            <select class="form-control select2-show-search form-select" name="patient_id" id="patient_id" data-placeholder="Choose one">
                                    <option label="Choose one"></option>
                                    @foreach($patients as $patient)
                                    <option {{old('patient_id','')==$patient['id']? 'selected':''}} value="{{$patient['id']}}">{{$patient['name']}}</option>
                                    @endforeach
                                    
                                </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label"> Specialist</label>

                            <select class="form-control select2-show-search form-select" name="specialist_id" id="specialist_id" data-placeholder="Choose one">
                                    <option label="Choose one"></option>
                                    @foreach($specialists as $specialist)
                                    <option {{old('specialist_id','')==$specialist['id']? 'selected':''}} value="{{$specialist['id']}}">{{$specialist['name']}}</option>
                                    @endforeach
                                    
                                </select>
                        </div>
                            
                            <div class="form-group">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" class="form-control" name="location" id="location" placeholder="Location" value="{{ old('location', '') }}" autocomplete="location">
                            </div>
                       
                        
                            

                           
                            

                         

                            {{-- <div class="form-group">
                                <label for="end_long" class="form-label">Counsellor Id</label>
                                <input type="number" class="form-control" name="counsellor_id" id="counsellor_id" placeholder="Counsellor Id" value="{{ old('counsellor_id', '') }}" autocomplete="counsellor_id">
                            </div> --}}



                            
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
                <li style="margin-bottom: 10px;"><strong>Title </strong>: Enter the title of the review. </li>
            </ol>
          </div>
        </div>
        
            </div>
    </div>
</div>

    </div>
</div>

@endsection