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
                        <li class="breadcrumb-item active"><a href="{{ route('admin.manage-shift.index') }}">donor</a>
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


<script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>

<!-- Your HTML file -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar')
    
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        firstDay: 6,
        editable: false,
        slotMinTime: '07:00:00',
        slotMaxTime: '20:00:00',

        slotLabelFormat: {
            hour: '2-digit',
            minute: '2-digit',
            hour12: true,
        },
        allDaySlot: false,
        contentHeight: 'auto', // Adjust this value as needed
        events: [
            @foreach($routineData as $routine)
            {
                id: '{{ $routine->id }}',
                title: '{{ App\Models\admin\Subject::where('slug', $routine->subject_slug)->first()->value('name') }} - {{  App\Models\admin\Section::where('slug', $routine->section_slug)->first()->value('name') }}',
                daysOfWeek: ['{{$routine->day}}'],
                startTime: '{{ $routine->start_time }}',
                endTime: '{{ $routine->end_time }}',
                // eventColor:'#' + Math.floor(Math.random()*16777215).toString(16) ,

            },
            @endforeach
        ],

    });
    calendar.render()
})

</script>

@endsection
