@extends('layout-form')

@section('content')

<div class="side-app">

    <!-- CONTAINER -->
    <div class="main-container container-fluid">

  <!-- PAGE-HEADER -->
  <div class="page-header">
    <h1 class="page-title">Patients</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Mowet</a></li>
            <li class="breadcrumb-item active" aria-current="page">Patients</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->


<div class="col-xl-12 row">
    <div class="card col-md-8 ">
        <div class="card-header">
            <h3 class="card-title">Add Patient</h3> 
        </div>
        <div class="card-body">
            <!--<p>Use <code class="highlighter-rouge">.table-sordered</code>to add zebra-sordering to any table row within the <code class="highlighter-rouge">.tbody</code>.</p>-->
            
                
                    <form action="/savepatient" method="POST">
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
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name', '') }}" autocomplete="name">
                            </div>
                            <div class="form-group">
                                <label for="id_number" class="form-label">ID Number</label>
                                <input type="text" class="form-control" name="id_number" id="id_number" placeholder="ID Number" value="{{ old('id_number', '') }}" autocomplete="id_number">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{ old('phone', '') }}" autocomplete="phone">        
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email', '') }}" autocomplete="email">
                            </div>
                            <div class="form-group">
                                <label for="address" class="form-label">Gender</label>
                                {{-- <input type="text" class="form-control" name="gender" id="gender" placeholder="Gender" value="{{ old('gender', '') }}" autocomplete="gender"> --}}
                                  <select name="gender" id="gender" class="form-control form-select select2" data-bs-placeholder="Select Gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                       
                </select>
                            </div>
                            <div class="form-group">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Address" value="{{ old('address', '') }}" autocomplete="address">
                            </div>
                            <div class="form-group">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Date of Birth" value="{{ old('date_of_birth', '') }}" autocomplete="date_of_birth">
                            </div>
                            <div class="form-group">
                                <label for="age" class="form-label">Age</label>
                                <input type="number" class="form-control" name="age" id="age" placeholder="Age" value="{{ old('age', '') }}" autocomplete="age">
                            </div>
                            <div class="form-group">
                                <label for="case_manager" class="form-label">Case Manager</label>
                                <input type="text" class="form-control" name="case_manager" id="case_manager" placeholder="Case Manager" value="{{ old('case_manager', '') }}" autocomplete="case_manager"> 
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
                <li style="margin-bottom: 10px;"><strong>Title </strong>: Enter the title of the patient. </li>
            </ol>
          </div>
        </div>
        
            </div>
    </div>
</div>

    </div>
</div>

@endsection