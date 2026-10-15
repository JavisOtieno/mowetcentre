@extends('layout-form')

@section('content')

<div class="side-app">

    <!-- CONTAINER -->
    <div class="main-container container-fluid">

  <!-- PAGE-HEADER -->
  <div class="page-header">
    <h1 class="page-title">Sessions</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Tracker</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Session</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->


<div class="col-xl-12 row">
    <div class="card col-md-8">
        <div class="card-header">
            <h3 class="card-title">Edit Session</h3> 
        </div>
        <div class="card-body">
            <!--<p>Use <code class="highlighter-rouge">.table-ssessioned</code>to add zebra-ssessioning to any table row within the <code class="highlighter-rouge">.tbody</code>.</p>-->
            
                
                    <form action="/saveeditsession/{{$session['id']}}" method="POST">
                        @csrf
                        @method('PUT')
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
                          

                    
                        {{-- <div class="form-group">
                            <label for="counsellor_name" class="form-label">Counsellor Name</label>
                            <input readonly type="text" class="form-control" name="counsellor_name" id="counsellor_name" placeholder="Counsellor Name" value="{{ old('counsellor_name', ($session['counsellor']?$session['counsellor']['name']:'Counsellor Not Found') ) }}" autocomplete="counsellor_name">
                        </div> --}}

                            <div class="form-group">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ old('title', $session['title']) }}" autocomplete="title">
                            </div>
                            {{-- <div class="form-group">
                                <label for="counsellor_id" class="form-label">Counsellor Id</label>
                                <input type="text" class="form-control" name="counsellor_id" id="counsellor_id" placeholder="Counsellor Id" value="{{ old('counsellor_id', $session['counsellor_id']) }}" autocomplete="counsellor_id">
                            </div> --}}

                                                                                <div class="form-group">
                            <label class="form-label"> Counsellor</label>
                            <select class="form-control select2-show-search form-select" name="counsellor_id" id="counsellor_id" data-placeholder="Choose one">
                                    <option label="Choose one"></option>
                                    @foreach($counsellors as $counsellor)
                                    <option 
                                    {{-- {{old('counsellor_id','')==$counsellor['id']? 'selected':''}} --}}
                                    {{old('counsellor_id',$session['counsellor_id'])==$counsellor['id']? 'selected':''}}
                                    value="{{$counsellor['id']}}">{{$counsellor['name']}}</option>
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
        <li style="margin-bottom: 10px;"><strong>Name</strong>: This field displays the name of the target group. It is editable and pre-filled with the existing value.</li>
        <li style="margin-bottom: 10px;"><strong>Date and Time</strong>: This field displays the date and time when the target group was created. It is disabled and cannot be modified.</li>
        </ol>
      </div>
    </div>
    
        </div>
</div>
</div>

    </div>
</div>

@endsection