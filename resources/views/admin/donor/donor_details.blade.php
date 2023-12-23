@extends('admin.admin_master')
@section('admin')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>donor's Details</h1>
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
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
           

                         @if ($donorData->photo)
                         <img  class="profile-user-img img-fluid img-circle" src="{{ asset('storage/' . $donorData->photo) }}"
                             alt="{{ $donorData->name }}" width="50">
                         @else
                         <img  class="profile-user-img img-fluid img-circle" src="{{ asset('backend/dist/img/noimage.png') }}"
                             alt="No Image" width="50">
                         @endif
                  </div>
  
                  <h3 class="profile-username text-center">{{ $donorData->name }}</h3>
  
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Email</b> <a class="float-right">{{ $donorData->email }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Phone</b> <a class="float-right">{{ $donorData->phone }}</a>
                    </li>
                    <li class="list-group-item">
                    <b>Birt Date</b> <a class="float-right"> {{ date('d M Y', strtotime($donorData->birthday)) }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Gender</b><a class="float-right" >{{ $donorData->gender }}</a>
                      </li>
                    <li class="list-group-item">
                      <b>Address</b><a class="float-right" >{{ $donorData->address }}</a>
                    </li>                  
                  </ul>
                  </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card card-primary">
                    <div class="card-body p-0">
                      <!-- THE CALENDAR -->
                      <div id="calendar"></div>
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
