@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>patient's Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">


                                    @if ($patientData->photo)
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('storage/' . $patientData->photo) }}"
                                            alt="{{ $patientData->name }}" width="50">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('backend/dist/img/noimage.png') }}" alt="No Image" width="50">
                                    @endif
                                </div>

                                <h3 class="profile-username text-center">{{ $patientData->name }}</h3>


                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{ $patientData->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Phone</b> <a class="float-right">{{ $patientData->phone }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Birt Date</b> <a class="float-right">
                                            {{ date('d M Y', strtotime($patientData->birthday)) }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Gender</b><a class="float-right">{{ $patientData->gender }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Address</b><a class="float-right">{{ $patientData->address }}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        
                        <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">Patient's Request List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                          
                                
                                <table id="example2" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Requested Unit</th>
                                            <th>Needed Date</th>
                                            <th>Status</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bloodRequests as $key => $data)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $data->requested_unit }}</td>
                                                <td>{{ date('d M Y', strtotime($data->needed_date)) }}</td>
                                                <td>
                                                    {{ $data->status == 1 ? 'Accepted' : ($data->status == 2 ? 'On Hold' : ($data->status == 3 ? 'Refused' : '')) }}
                                                </td>

                                                <td>
                                                    <button type="button" class="btn btn-sm dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        <a class="dropdown-item" data-toggle="modal"
                                                            href="#modal-unitHistory{{ $data->slug }}">
                                                            <i class="fa fa-check-square"></i> Show Unit
                                                            Data
                                                        </a>



                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach

                                        <!-- Add more rows with data as needed -->
                                    </tbody>

                                </table>
                                
                                @isset($data)
                                <div class="modal fade" id="modal-unitHistory{{ $data->slug }}">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Unit
                                                    History</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>



                                            <div class="modal-body">


                                                <table id="example2" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Donor Name</th>
                                                            <th>Phone</th>
                                                            <th>Inventory Slug</th>
                                                            <th>Date</th>





                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $InvData = App\Models\admin\InventoryHistory::where('blood_request_slug', $data->slug)->get();
                                                        @endphp
                                                        @foreach ($InvData as $key => $data)
                                                            @php
                                                                $donorData = App\Models\admin\donor::where('slug', App\Models\admin\Inventory::where('slug', $data->inventory_slug)->value('donor_slug'))
                                                                    ->select('name', 'phone', 'address')
                                                                    ->first();

                                                            @endphp
                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $donorData->name }}</td>
                                                                <td>{{ $donorData->phone }}</td>
                                                                <td>{{ $data->inventory_slug }}</td>
                                                                <td>{{ date('d M Y', strtotime($data->created_at)) }}
                                                                </td>






                                                            </tr>
                                                        @endforeach

                                                        <!-- Add more rows with data as needed -->
                                                    </tbody>
                                                </table>



                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>

                                            </div>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            @endisset
                                
                                
                            </div>
                            <!-- /.card-body -->
                          </div>


                       
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <!-- /.content -->
    </div>
@endsection
