@extends('frontend.frontend_master')
@section('frontend')
    <section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                        <h3 class="bg-gray p-4">Register Now</h3>
                        <form action="{{ route('register.store') }}" method="post">
                            @csrf
                            <fieldset class="p-4">
                                <input class="form-control mb-3" type="text" placeholder="Name*" name="name" required>
                                <input class="form-control mb-3" type="tel" placeholder="0177618888*" name="phone"
                                    required>
                                    <select class="nice-select w-100 form-control mt-lg-1 mt-md-2 mb-3"  name="blood_group" required>
                                        <option value="">Select Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                <input class="form-control mb-3" type="email" placeholder="Email*" name="email"
                                    required>

                                <textarea name="address" style="height: 80px; width: 393px;" placeholder="Write address here..."></textarea>


                                <input class="form-control mb-3" type="password" placeholder="Password*" name="password"
                                    required>

                                <div class="form-group mb-3">
                                    <strong>You are a </strong>

                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="user_type" id="donor" class="form-check-input"
                                            value="2">
                                        <label for="donor" class="form-check-label">Donor</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="user_type" id="patient" class="form-check-input"
                                            value="3">
                                        <label for="patient" class="form-check-label">Patient</label>
                                    </div>
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
