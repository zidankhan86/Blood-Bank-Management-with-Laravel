@extends('frontend.frontend_master')
@section('frontend')
<section class="page-title">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2 text-center">
				<!-- Title text -->
				<h3>Blood Request</h3>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>
<!-- page title -->

<!-- contact us start-->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-us-content p-4">
                  
                    <h1 class="pt-3">Hello, what's on your mind?</h1>
                    <p class="pt-3 pb-5">Please fill-up this form before ask for blood.</p>
                </div>
            </div>
            <div class="col-md-6">
                    <form action="{{route('patient.blood-request.store')}}" method="post">
                        @csrf
                        <fieldset class="p-4">
                            <div class="form-group">
                                <div class="col-lg-12 pt-2">

                                    <label for="">Which date you need blood</label>
                                    <input type="date" id="needed_date" name="needed_date" placeholder="Needed Date *" class="form-control" required>
                                </div>
                                    <div class="col-lg-12 pt-2">
                                        <label for="">Enter unit</label>
                                        <input type="number" name="requested_unit" min="1" value="1" class="form-control" required>
                                    </div>
                           
                                    <div class="col-lg-12 pt-2">

                            <textarea name="note"   placeholder="Write note(Not mendetory) *" class="border w-100 p-3 mt-3 mt-lg-4"></textarea>
                                    </div>
                            <div class="btn-grounp">
                                <button type="submit" class="btn btn-primary mt-2 float-right">Blood Request</button>
                            </div>
                        </div>

                        </fieldset>
                    </form>
            </div>
        </div>
    </div>
</section>
<!-- contact us end -->

<script>
    var today = new Date().toISOString().split('T')[0];
    document.getElementById('needed_date').setAttribute('min', today);
</script>

@endsection
