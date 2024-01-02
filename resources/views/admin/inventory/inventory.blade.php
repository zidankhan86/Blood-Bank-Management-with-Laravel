@extends('admin.admin_master')
@section('admin')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Inventory</h1>
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
                    <!-- left column -->
                    <div class="col-md-5">
                        <div class="card" data-table-title="Class List">
                            <div class="card-header">
                                <h3 class="card-title">Blood List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Blood Group</th>
                                            <th>Available Bag</th>
                                            <th>Price(BDT)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>A+</td>
                                            <td>{{ \App\Models\admin\Inventory::where('blood_group', 'A+')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('remain_unit') }}
                                            </td>
                                            <td>{{ \App\Models\admin\Inventory::where('blood_group', 'A+')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('price') }}Tk/unit</td>

                                            <td><a href='{{ route('admin.manage-inv.show', 'A+') }}'
                                                    class="btn btn-primary btn-sm">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>A-</td>
                                            <td>{{ \App\Models\admin\Inventory::where('blood_group', 'A-')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('remain_unit') }}
                                            </td>
                                            <td>{{ \App\Models\admin\Inventory::where('blood_group', 'A-')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('price') }}Tk/unit</td>

                                            <td><a href='{{ route('admin.manage-inv.show', 'A-') }}'
                                                    class="btn btn-primary btn-sm">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>B+</td>
                                            <td>{{ \App\Models\admin\Inventory::where('blood_group', 'B+')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('remain_unit') }}
                                            </td>
                                            <td>{{ \App\Models\admin\Inventory::where('blood_group', 'B+')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('price') }}Tk/unit</td>
                                            
                                            <td><a href='{{ route('admin.manage-inv.show', 'B+') }}'
                                                    class="btn btn-primary btn-sm">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>B-</td>
                                            <td>{{ \App\Models\admin\Inventory::where('blood_group', 'B-')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('remain_unit') }}
                                            </td>
                                            <td>{{ \App\Models\admin\Inventory::where('blood_group', 'B-')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('price') }}Tk/unit</td>
                                            <td><a href='{{ route('admin.manage-inv.show', 'B-') }}'
                                                    class="btn btn-primary btn-sm">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>AB+</td>
                                            <td>{{ \App\Models\admin\Inventory::where('blood_group', 'AB+')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('remain_unit') }}
                                            </td>
                                            <td>{{ \App\Models\admin\Inventory::where('blood_group', 'AB+')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('price') }}Tk/unit</td>
                                            <td><a href='{{ route('admin.manage-inv.show', 'AB+') }}'
                                                    class="btn btn-primary btn-sm">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>AB-</td>
                                            <td>{{ \App\Models\admin\Inventory::where('blood_group', 'AB-')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('remain_unit') }}
                                            </td>
                                            <td>{{ \App\Models\admin\Inventory::where('blood_group', 'AB-')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('price') }}Tk/unit</td>
                                            <td><a href='{{ route('admin.manage-inv.show', 'AB-') }}'
                                                    class="btn btn-primary btn-sm">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>O+</td>
                                            <td>{{ \App\Models\admin\Inventory::where('blood_group', 'O+')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('remain_unit') }}
                                            </td>
                                            <td>{{ \App\Models\admin\Inventory::where('blood_group', 'O+')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('price') }}Tk/unit</td>
                                            <td><a href='{{ route('admin.manage-inv.show', 'O+') }}'
                                                    class="btn btn-primary btn-sm">View</a></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>O-</td>
                                            <td>{{ \App\Models\admin\Inventory::where('blood_group', 'O-')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('remain_unit') }}
                                            </td>
                                            <td>{{ \App\Models\admin\Inventory::where('blood_group', 'O-')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('price') }}Tk/unit</td>
                                            <td><a href='{{ route('admin.manage-inv.show', 'O-') }}'
                                                    class="btn btn-primary btn-sm">View</a></td>
                                        </tr>
                                    </tbody>




                                </table>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add to Inventory</h3>
                            </div>

                            {!! Form::open([
                                'route' => 'admin.manage-inv.store',
                                'method' => 'POST',
                                'files' => true,
                            ]) !!}
                            <div class="card-body">

                                <div class="form-group">
                                    {{ Form::label('donor_slug', 'Donor') }}
                                    <div class="input-group">
                                        {{ Form::select(
                                            'donor_slug',
                                            $donorData->mapWithKeys(function ($donor) {
                                                return [$donor['slug'] => $donor['name'] . ' (' . $donor['phone'] . ')' . ' (' . $donor['blood_group'] . ')'];
                                            }),
                                            null,
                                            [
                                                'class' => 'form-control select2bs4',
                                                'placeholder' => 'Select Donor',
                                                'style' => 'width: 85%;', // Reduced width
                                            ],
                                        ) }}
                                        <span class="input-group-append">
                                            <a type="button" data-toggle="modal" href="#modal"
                                                class="btn btn-info btn-flat">New!</a>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('blood_group', 'Blood Group') !!}
                                    {!! Form::select(
                                        'blood_group',
                                        [
                                            'A+' => 'A+',
                                            'A-' => 'A-',
                                            'B+' => 'B+',
                                            'B-' => 'B-',
                                            'AB+' => 'AB+',
                                            'AB-' => 'AB-',
                                            'O+' => 'O+',
                                            'O-' => 'O-',
                                        ],
                                        null,
                                        ['class' => 'form-control select2bs4', 'placeholder' => 'Select Blood Group', 'required' => 'required'],
                                    ) !!}
                                </div>


                                <div class="form-group">
                                    {!! Form::label('donate_date', 'Donate_date') !!}
                                    {!! Form::date('donate_date', null, ['class' => 'form-control', 'required']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('expire_date', 'Expire_date') !!}
                                    {!! Form::date('expire_date', null, ['class' => 'form-control', 'required']) !!}
                                </div>


                                <div class="form-group">
                                    {!! Form::label('donate_unit', 'Unit') !!}
                                    {!! Form::number('donate_unit', 1, [
                                        'class' => 'form-control',
                                        'min' => 1,
                                    ]) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('price', 'price') !!}
                                    {!! Form::number('price', 10, [
                                        'class' => 'form-control',
                                        'min' => 1,
                                    ]) !!}
                                </div>

                            </div>
                            <div class="card-footer">
                                {!! Form::submit('Add', [
                                    'class' => 'btn btn-primary float-right',
                                ]) !!}
                            </div>
                            {!! Form::close() !!}

                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="modal fade" id="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add
                                        New Donor</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                {!! Form::open([
                                    'route' => 'admin.manage-donor.store',
                                    'method' => 'POST',
                                    'files' => true,
                                    'enctype' => 'multipart/form-data',
                                ]) !!}

                                <div class="modal-body">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {!! Form::label('name', 'Name') !!}
                                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('blood_group', 'Blood Group') !!}
                                                    {!! Form::select(
                                                        'blood_group',
                                                        [
                                                            'A+' => 'A+',
                                                            'A-' => 'A-',
                                                            'B+' => 'B+',
                                                            'B-' => 'B-',
                                                            'AB+' => 'AB+',
                                                            'AB-' => 'AB-',
                                                            'O+' => 'O+',
                                                            'O-' => 'O-',
                                                        ],
                                                        null,
                                                        ['class' => 'form-control select2bs4', 'placeholder' => 'Select Blood Group', 'required' => 'required'],
                                                    ) !!}
                                                </div>

                                                <div class="form-group">
                                                    {!! Form::label('birthday', 'Birthday') !!}
                                                    {!! Form::date('birthday', null, ['class' => 'form-control']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('gender', 'Gender') !!}
                                                    {!! Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Other' => 'Other'], null, [
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Select gender',
                                                        'required' => 'required',
                                                    ]) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('address', 'Address') !!}
                                                    {!! Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'Enter address', 'rows' => 3]) !!}
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    {!! Form::label('phone', 'Phone') !!}
                                                    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Enter phone number']) !!}
                                                </div>

                                                <div class="form-group">
                                                    {!! Form::label('email', 'Email') !!}
                                                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email']) !!}
                                                </div>
                                                <div class="form-group">
                                                    {!! Form::label('photo', 'Photo') !!}
                                                    <div class="custom-file">
                                                        {!! Form::file('photo', ['class' => 'custom-file-input', 'onchange' => 'previewImage(event)']) !!}
                                                        <label class="custom-file-label" for="photo"
                                                            id="file-label">Choose file</label>
                                                    </div>
                                                </div>

                                                <div class="preview-container">
                                                    <img class="default-image"
                                                        src="{{ URL::asset('../backend/dist/img/bms.png') }}"
                                                        alt="Default Image" style="width: 150px; height: 150px;">
                                                </div>

                                                <script>
                                                    function previewImage(event) {
                                                        var reader = new FileReader();
                                                        reader.onload = function() {
                                                            var output = document.createElement('img');
                                                            output.src = reader.result;
                                                            output.style.width = '150px';
                                                            output.style.height = '150px';
                                                            document.querySelector('.preview-container').innerHTML = '';
                                                            document.querySelector('.preview-container').appendChild(output);
                                                            document.querySelector('#file-label').innerHTML = event.target.files[0].name;
                                                        };
                                                        reader.readAsDataURL(event.target.files[0]);

                                                        // show the default image if no image is selected
                                                        var defaultImage = document.querySelector('.default-image');
                                                        if (!event.target.files || event.target.files.length === 0) {
                                                            defaultImage.style.display = 'block';
                                                        } else {
                                                            defaultImage.style.display = 'none';
                                                        }
                                                    }
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    {{ Form::submit('Submit', [
                                        'class' => 'btn
                                                                                                                                                                                btn-success',
                                    ]) }}
                                </div>
                                {!! Form::close() !!}

                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    <div class="col-md-1"></div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
