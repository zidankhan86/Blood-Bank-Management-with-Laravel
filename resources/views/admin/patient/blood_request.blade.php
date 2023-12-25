@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Request</h1>
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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card-body">
                        <div class="col-12 col-sm-12">
                            <div class="card card-primary card-outline card-outline-tabs">
                                <div class="card-header p-0 border-bottom-0">
                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="RequestList-tab" data-toggle="pill"
                                                href="#RequestList" role="tab" aria-controls="RequestList"
                                                aria-selected="true">Request List</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="ClosedRequestList-tab" data-toggle="pill"
                                                href="#ClosedRequestList" role="tab" aria-controls="ClosedRequestList"
                                                aria-selected="false">Closed Request List</a>
                                        </li>


                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                        <div class="tab-pane fade show active" id="RequestList" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-home-tab">
                                            <div class="card" data-table-title="Class List">
                                                <div class="card-header">
                                                    <h3 class="card-title">Request List</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <table id="example1" class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Patient Name</th>
                                                                <th>Phone</th>
                                                                <th>Address</th>
                                                                <th>Blood Group</th>
                                                                <th>Available Unit</th>
                                                                <th>Requested Unit</th>
                                                                <th>Needed Date</th>
                                                                <th>Status</th>

                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($bloodRequests as $key => $data)
                                                                @php
                                                                    $patientData = App\Models\admin\Patient::where('slug', $data->patient_slug)
                                                                        ->select('name', 'phone', 'address')
                                                                        ->first();
                                                                    // get available unit amount
                                                                    $remainingUnits = App\Models\admin\Inventory::where('blood_group', $data->blood_group)
                                                                        ->where('expire_date', '>', now())
                                                                        ->where('remain_unit', '>=', 0)
                                                                        ->sum('remain_unit');
                                                                @endphp

                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ $patientData->name }}</td>
                                                                    <td>{{ $patientData->phone }}</td>
                                                                    <td>{{ $patientData->address }}</td>
                                                                    <td>{{ $data->blood_group }}</td>
                                                                    <td>{{ $remainingUnits }}</td>
                                                                    <td>{{ $data->requested_unit }}</td>
                                                                    <td>{{ date('d M Y', strtotime($data->needed_date)) }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $data->status == 1 ? 'Accepted' : ($data->status == 2 ? 'On Hold' : ($data->status == 3 ? 'Refused' : '')) }}
                                                                    </td>

                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-sm dropdown-toggle"
                                                                            data-toggle="dropdown">
                                                                            Action
                                                                        </button>
                                                                        <div class="dropdown-menu">

                                                                            <a class="dropdown-item"
                                                                                href="{{ route('admin.manage-request.show', $data->slug) }}">
                                                                                <i class="fa fa-check-square"></i> Accepted
                                                                            </a>

                                                                            <a class="dropdown-item" data-toggle="modal"
                                                                                href="#"><i class="fa fa-lock"></i> On
                                                                                Hold</a>
                                                                            <a class="dropdown-item" data-toggle="modal"
                                                                                href="#"><i
                                                                                    class="     fa fa-trash"></i>
                                                                                Refused</a>

                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                            <!-- Add more rows with data as needed -->
                                                        </tbody>
                                                    </table>

                                                </div>
                                                <!-- /.card-body -->
                                            </div>

                                        </div>
                                        <div class="tab-pane fade" id="ClosedRequestList" role="tabpanel"
                                            aria-labelledby="custom-tabs-four-profile-tab">
                                            <div class="card" data-table-title="Drop Out units">
                                                <table id="example2" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Patient Name</th>
                                                            <th>Phone</th>
                                                            <th>Address</th>
                                                            <th>Blood Group</th>
                                                            <th>Requested Unit</th>
                                                            <th>Needed Date</th>
                                                            <th>Status</th>

                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($closedbloodRequests as $key => $data)
                                                            @php
                                                                $patientData = App\Models\admin\Patient::where('slug', $data->patient_slug)
                                                                    ->select('name', 'phone', 'address')
                                                                    ->first();

                                                            @endphp

                                                            <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $patientData->name }}</td>
                                                                <td>{{ $patientData->phone }}</td>
                                                                <td>{{ $patientData->address }}</td>
                                                                <td>{{ $data->blood_group }}</td>
                                                                <td>{{ $data->requested_unit }}</td>
                                                                <td>{{ date('d M Y', strtotime($data->needed_date)) }}</td>
                                                                <td>
                                                                    {{ $data->status == 1 ? 'Accepted' : ($data->status == 2 ? 'On Hold' : ($data->status == 3 ? 'Refused' : '')) }}
                                                                </td>

                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-sm dropdown-toggle"
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
                                        </div>

                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
