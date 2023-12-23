@extends('admin.admin_master')
@section('admin')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage donor</h1>
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
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-12 col-sm-12">
                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="donor-list-tab" data-toggle="pill"
                                            href="#donor-list" role="tab" aria-controls="donor-list"
                                            aria-selected="true">donor List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ isset($editData) ? 'disabled' : '' }}"
                                            id="add-donor-tab" data-toggle="pill" href="#add-donor" role="tab"
                                            aria-controls="add-donor" aria-selected="false">Add donor</a>
                                    </li>

                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                    <div class="tab-pane fade show active" id="donor-list" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-home-tab">
                                        @if (!empty($editData))
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">donor Information</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            {!! Form::model($editData, [
                                            'route' => ['admin.manage-donor.update', $editData->slug],
                                            'method' => 'PUT',
                                            'files' => true,
                                            ]) !!}
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!! Form::label('name', 'Name') !!}
                                                            {!! Form::text('name', null, ['class' => 'form-control',
                                                            'placeholder' => 'Enter name']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('birthday', 'Birthday') !!}
                                                            {!! Form::date('birthday', null, ['class' =>
                                                            'form-control']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('gender', 'Gender') !!}
                                                            {!! Form::select('gender', ['Male' => 'Male', 'Female' =>
                                                            'Female', 'Other' => 'Other'], null, [
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Select gender',
                                                            ]) !!}
                                                        </div>
                                                 



                                                        <div class="form-group">
                                                            {!! Form::label('address', 'Address') !!}
                                                            {!! Form::textarea('address', null, ['class' => 'form-control',
                                                            'placeholder' => 'Enter address', 'rows' => 3]) !!}
                                                        </div>
                                                        

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!! Form::label('phone', 'Phone') !!}
                                                            {!! Form::text('phone', null, ['class' => 'form-control',
                                                            'placeholder' => 'Enter phone number']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('email', 'Email') !!}
                                                            {!! Form::email('email', null, ['class' => 'form-control',
                                                            'placeholder' => 'Enter email']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('email', 'Email') !!}
                                                            {!! Form::email('email', null, ['class' => 'form-control',
                                                            'placeholder' => 'Enter email']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('photo', 'Photo') !!}
                                                            <div class="custom-file">
                                                                {!! Form::file('photo', ['class' => 'custom-file-input',
                                                                'onchange' => 'previewImage(event)']) !!}
                                                                <label class="custom-file-label" for="photo"
                                                                    id="file-label">Choose file</label>
                                                            </div>
                                                        </div>





                                                        @if (!empty($editData->photo))
                                                        <div class="preview-container">
                                                            <img class="default-image"
                                                                src="{{ asset('storage/' . $editData->photo) }}"
                                                                alt="Default Image"
                                                                style="width: 150px; height: 150px;">
                                                        </div>
                                                        @else
                                                        <div class="preview-container">
                                                            <img class="default-image"
                                                                src="{{ URL::asset('../backend/dist/img/bms.png') }}"
                                                                alt="Default Image"
                                                                style="width: 150px; height: 150px;">
                                                        </div>
                                                        @endif


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
                                            <div class="card-footer">
                                                <a class="btn btn-danger float-ledt" href="{{ route('admin.manage-donor.index') }}">Cancel</a>

                                                {!! Form::submit('Submit', ['class' => 'btn btn-primary float-right'])
                                                !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                        @endif
                                        <div class="card" data-table-title="donor List">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Photo</th>
                                                        <th>Name</th>
                                                        <th>Birthday</th>
                                                        <th>Address</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($donorData as $key => $donor)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>
                                                            @if ($donor->photo)
                                                            <img src="{{ asset('storage/' . $donor->photo) }}"
                                                                alt="{{ $donor->name }}" width="50">
                                                            @else
                                                            <img src="{{ asset('backend/dist/img/noimage.png') }}"
                                                                alt="No Image" width="50">
                                                            @endif
                                                        </td>
                                                        <td>{{ $donor->name }}</td>
                                                        <td>{{ date('d M Y', strtotime($donor->birthday)) }}</td>
                                                        <td>{{ $donor->address }}</td>
                                                        <td>{{ $donor->email }}</td>
                                                        <td>{{ $donor->phone }}</td>
                                                        <td>
                                                            @if ($donor->status == 1)
                                                            <span class="badge bg-success">Active</span>
                                                            @else
                                                            <span class="badge bg-danger">Deactive</span>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <button type="button" class="btn btn-sm dropdown-toggle"
                                                                data-toggle="dropdown" {{ isset($editData) ? 'disabled'
                                                                : '' }}>
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                href="{{ route('admin.manage-donor.show', $donor->slug) }}"><i
                                                                    class="fa fa-eye"></i> view</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.manage-donor.edit', $donor->slug) }}"><i
                                                                        class="fa fa-edit"></i> Edit</a>

                                                                <a class="dropdown-item" data-toggle="modal"
                                                                    href="#modal-status{{ $donor->slug }}"><i
                                                                        class="fa fa-check-square"></i>
                                                                    Status</a>
                                                                <a class="dropdown-item" data-toggle="modal"
                                                                    href="#modal-password{{ $donor->user_id }}"><i
                                                                        class="fa fa-lock"></i> Change password</a>
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="event.preventDefault(); confirmDelete('{{ $donor->slug }}', '{{ route('admin.manage-donor.destroy', $donor->slug) }}');">
                                                                    <i class="fa fa-trash"></i> Delete
                                                                </a>
                                                                <form id="delete-class-form-{{ $donor->slug }}"
                                                                    action="{{ route('admin.manage-donor.destroy', $donor->slug) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </div>





                                                            <div class="modal fade"
                                                                id="modal-status{{ $donor->slug }}">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Edit
                                                                                {{ $donor->name }}'s Status</h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>

                                                                        {!! Form::open([
                                                                        'route' => ['admin.donorStatus.update',
                                                                        $donor->slug],
                                                                        'method' => 'POST',
                                                                        ]) !!}
                                                                        @csrf

                                                                        <div class="modal-body">


                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="input-group">
                                                                                        <label
                                                                                            class="col-3 col-form-label">
                                                                                            Status </label>
                                                                                        <select name="status"
                                                                                            class="form-select">
                                                                                            <option value="" selected=""
                                                                                                disabled="">
                                                                                                Select Status
                                                                                            </option>
                                                                                            <option value="1" {{
                                                                                                $donor->status == '1'
                                                                                                ? 'selected' : '' }}>
                                                                                                Active</option>
                                                                                            <option value="0" {{
                                                                                                $donor->status == '0'
                                                                                                ? 'selected' : '' }}>
                                                                                                Deactive</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>



                                                                        </div>
                                                                        <div
                                                                            class="modal-footer justify-content-between">
                                                                            <button type="button"
                                                                                class="btn btn-default"
                                                                                data-dismiss="modal">Close</button>
                                                                            {{ Form::submit('Update', ['class' => 'btn
                                                                            btn-success']) }}
                                                                        </div>
                                                                        {!! Form::close() !!}

                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>

                                                            <div class="modal fade"
                                                                id="modal-password{{ $donor->user_id }}">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Update
                                                                                {{ $donor->name }}'s Password</h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>

                                                                        {!! Form::open([
                                                                        'route' => ['change-password',
                                                                        $donor->user_id],
                                                                        'method' => 'POST',
                                                                        ]) !!}
                                                                        @csrf

                                                                        <div class="modal-body">


                                                                            <div class="row">
                                                                                <div class="col-md-12">




                                                                                    <div class="input-group mb-3">
                                                                                        <input type="password"
                                                                                            class="form-control"
                                                                                            id="current_password"
                                                                                            name="current_password"
                                                                                            placeholder="Password">
                                                                                        <div class="input-group-append">
                                                                                            <div
                                                                                                class="input-group-text">
                                                                                                <span
                                                                                                    class="fas fa-lock"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="input-group mb-3">
                                                                                        <input type="password"
                                                                                            class="form-control"
                                                                                            id="new_password"
                                                                                            name="new_password"
                                                                                            placeholder="New Password">
                                                                                        <div class="input-group-append">
                                                                                            <div
                                                                                                class="input-group-text">
                                                                                                <span
                                                                                                    class="fas fa-lock"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="input-group mb-3">
                                                                                        <input type="password"
                                                                                            class="form-control"
                                                                                            id="password_confirmation"
                                                                                            name="password_confirmation"
                                                                                            placeholder="Confirm New Password">
                                                                                        <div class="input-group-append">
                                                                                            <div
                                                                                                class="input-group-text">
                                                                                                <span
                                                                                                    class="fas fa-lock"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                            </div>



                                                                        </div>
                                                                        <div
                                                                            class="modal-footer justify-content-between">
                                                                            <button type="button"
                                                                                class="btn btn-default"
                                                                                data-dismiss="modal">Close</button>
                                                                            {{ Form::submit('Change Password', ['class'
                                                                            => 'btn btn-success']) }}
                                                                        </div>
                                                                        {!! Form::close() !!}

                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>




                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="add-donor" role="tabpanel"
                                        aria-labelledby="custom-tabs-four-profile-tab">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">donor Information</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            {!! Form::open([
                                            'route' => 'admin.manage-donor.store',
                                            'method' => 'POST',
                                            'files' => true,
                                            'enctype' => 'multipart/form-data',
                                            ]) !!}
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!! Form::label('name', 'Name') !!}
                                                            {!! Form::text('name', null, ['class' => 'form-control',
                                                            'placeholder' => 'Enter name']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('birthday', 'Birthday') !!}
                                                            {!! Form::date('birthday', null, ['class' =>
                                                            'form-control']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('gender', 'Gender') !!}
                                                            {!! Form::select('gender', ['Male' => 'Male', 'Female' =>
                                                            'Female', 'Other' => 'Other'], null, [
                                                            'class' => 'form-control',
                                                            'placeholder' => 'Select gender',
                                                            ]) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('address', 'Address') !!}
                                                            {!! Form::textarea('address', null, ['class' => 'form-control',
                                                            'placeholder' => 'Enter address', 'rows' => 3]) !!}
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!! Form::label('phone', 'Phone') !!}
                                                            {!! Form::text('phone', null, ['class' => 'form-control',
                                                            'placeholder' => 'Enter phone number']) !!}
                                                        </div>

                                                        <div class="form-group">
                                                            {!! Form::label('email', 'Email') !!}
                                                            {!! Form::email('email', null, ['class' => 'form-control',
                                                            'placeholder' => 'Enter email']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('photo', 'Photo') !!}
                                                            <div class="custom-file">
                                                                {!! Form::file('photo', ['class' => 'custom-file-input',
                                                                'onchange' => 'previewImage(event)']) !!}
                                                                <label class="custom-file-label" for="photo"
                                                                    id="file-label">Choose file</label>
                                                            </div>
                                                        </div>

                                                        <div class="preview-container">
                                                            <img class="default-image"
                                                                src="{{ URL::asset('../backend/dist/img/bms.png') }}"
                                                                alt="Default Image"
                                                                style="width: 150px; height: 150px;">
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
                                            <div class="card-footer">
                                                <a class="btn btn-danger float-ledt" href="{{ route('admin.manage-donor.index') }}">Cancel</a>

                                                {!! Form::submit('Submit', ['class' => 'btn btn-primary float-right'])
                                                !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
