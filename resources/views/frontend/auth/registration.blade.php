@extends('frontend.frontend_master')
@section('frontend')






<section class="login py-5 border-top-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-8 align-item-center">
        <div class="border border">
          <h3 class="bg-gray p-4">Register Now</h3>
          <form action="{{route('register.store')}}" method="post">
            @csrf
            <fieldset class="p-4">
            <input class="form-control mb-3" type="text" placeholder="Name*" name="name" required>
              <input class="form-control mb-3" type="tel" placeholder="0177618888*" name="phone" required>
              <input class="form-control mb-3" type="text" placeholder="AB+" name="blood_group" required>
                <input class="form-control mb-3" type="email" placeholder="Email*" name="email" required>

                <textarea name="address" style="height: 80px; width: 393px;" placeholder="Write address here..."></textarea>


              <input class="form-control mb-3" type="password" placeholder="Password*" name="password" required>
              <div class="form-group mb-3">
              <label for="">Choose an option</label>
            <select name="user_type" class="form-control">
               
                <option value="4">Donor</option>
                <option value="5">Customer</option>
            </select>
            </div>
  
              <div class="d-flex justify-content-center align-items-center mt-3">
                 <button type="submit" class="btn btn-primary font-weight-bold">Register Now</button>
            </div>

            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection
