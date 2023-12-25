@extends('frontend.frontend_master')
@section('frontend')

<section class="user-profile section">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user">
						<!-- User Image -->
						<div class="image d-flex justify-content-center">
							<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvy8GTYOlfbtWbRjhjN8aQAU3jDdBBh46-4G28BhGGkQ&s" alt="" class="">
						</div>
						<!-- User Name -->
						<h5 class="text-center">{{auth()->user()->name}}</h5>
					</div>
					<!-- Dashboard Links -->
         
				</div>
			</div>
			<div class="col-lg-8">
				
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="widget personal-info">
							<h3 class="widget-header user">Personal Information</h3>
							<form action="#">
								<!-- First Name -->
								<div class="form-group">
									<label for="first-name"> Name</label>
									<input type="text" class="form-control"  id="first-name" value="{{auth()->user()->name}}" disabled>
								</div>
								<!-- Last Name -->
								<div class="form-group">
									<label for="last-name">Email</label>
									<input type="text" class="form-control" id="last-name" value="{{auth()->user()->email}}" disabled>
								</div>
								
								<!-- Comunity Name -->
								<!-- <div class="form-group">
									<label for="comunity-name">Joined</label>
									<input type="text" class="form-control" id="comunity-name" value="{{auth()->user()->created_at}}" disabled>
								</div> -->
								<!-- Checkbox -->
								<!-- <div class="form-check">
								  <label class="form-check-label" for="hide-profile">
									<input class="form-check-input mt-1" type="checkbox" value="" id="hide-profile">
									Hide Profile from Public/Comunity
								  </label>
								</div> -->
								
								
							</form>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
