@extends('frontend.frontend_master')
@section('frontend')
    <!--===============================
    =            Hero Area            =
    ================================-->

    <section class="hero-area bg-1 text-center overly">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Header Contetnt -->
                    <div class="content-block">
                        <h1>Blood Bank. </h1>
                        <p>Join the millions who donate blood and collect blood from each other <br> everyday is a beautiful day</p>
                        <div class="short-popular-category-list text-center">
                        </div>

                    </div>
                    <!-- Advance Search -->
                    {{-- <div class="advance-search">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12 col-md-12 align-content-center">
								<form>
									<div class="form-row">
										<div class="form-group col-xl-4 col-lg-3 col-md-6">
											<input type="text" class="form-control my-2 my-lg-1" id="inputtext4"
												placeholder="What are you looking for">
										</div>
										<div class="form-group col-lg-3 col-md-6">
											<select class="w-100 form-control mt-lg-1 mt-md-2">
												<option>Category</option>
												<option value="1">Top rated</option>
												<option value="2">Lowest Price</option>
												<option value="4">Highest Price</option>
											</select>
										</div>
										<div class="form-group col-lg-3 col-md-6">
											<input type="text" class="form-control my-2 my-lg-1" id="inputLocation4" placeholder="Location">
										</div>
										<div class="form-group col-xl-2 col-lg-3 col-md-6 align-self-center">
											<button type="submit" class="btn btn-primary active w-100">Search Now</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div> --}}
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>

    <!--===========================================
    =            Popular deals section            =
    ============================================-->

    <section class="popular-deals section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Be kind , Donate blood</h2>
                        <p>Today you are a hero , blood is life .</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- offer 01 -->
                <div class="col-lg-12">
                    <div class="trending-ads-slide">
                        <div class="col-sm-12 col-lg-4">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="#">
                                            <img class="card-img-top img-fluid"
                                                src="{{ asset('../frontend/images/products/products-1.jpg') }}"
                                                alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="#">Be a hero, donate today</a></h4>

                                        <p class="card-text">Donate blood, save a life. Your kindness and generosity can make an everlasting impact</p>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="#">
                                            <img class="card-img-top img-fluid"
                                                src="{{ asset('../frontend/images/products/products-2.jpg') }}"
                                                alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="#">Urgent need for blood donation.</a></h4>

                                        <p class="card-text">Urgent call for help! A life is in need. Your blood donation can be the lifeline. </p>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="#">
                                            <img class="card-img-top img-fluid"
                                                src="{{ asset('../frontend/images/products/products-3.jpg') }}"
                                                alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="#">Donate blood, save lives.</a></h4>

                                        <p class="card-text">Every drop counts! Your blood donation can save lives. </p>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <!-- product card -->
                            <div class="product-item bg-light">
                                <div class="card">
                                    <div class="thumb-content">
                                        <!-- <div class="price">$200</div> -->
                                        <a href="#">
                                            <img class="card-img-top img-fluid"
                                                src="{{ asset('../frontend/images/products/products-2.jpg') }}"
                                                alt="Card image cap">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="#">Donate blood, save a life. </a></h4>

                                        <p class="card-text">Your kindness and generosity can make an everlasting impact</p>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==========================================
    =            All Category Section            =
    ===========================================-->

    <section class=" section">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section title -->
                    <div class="section-title">
                        <h2>All Categories</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, provident!</p>
                    </div>
                    <div class="row">
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                            <a href="#"><div class="category-block">
                                <div class="header">
                                    <i class="fa fa-plus-square icon-bg-1"></i>
                                    <h4>A+</h4>
                                </div>
                            <h4 style="text-align: center">Alailable Unit: {{ \App\Models\admin\Inventory::where('blood_group', 'A+')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('remain_unit') }}</h4>
                            </div></a>
                        </div> <!-- /Category List -->
                        
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                           <a href=""> <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-plus-square icon-bg-2"></i>
                                    <h4>A-</h4>
                                </div>
                                <h4 style="text-align: center">Alailable Unit: {{ \App\Models\admin\Inventory::where('blood_group', 'A-')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('remain_unit') }}</h4>
                            </div></a>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                           <a href=""> <div class="category-block">
                                <div class="header">
                                    <i class="fa fa-plus-square icon-bg-3"></i>
                                    <h4>B+</h4>
                                </div>
                                <h4 style="text-align: center">Alailable Unit: {{ \App\Models\admin\Inventory::where('blood_group', 'B+')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('remain_unit') }}</h4>
                            </div></a>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                        <a href=""><div class="category-block">
                                <div class="header">
                                    <i class="fa fa-plus-square icon-bg-4"></i>
                                    <h4>B-</h4>
                                </div>
                                <h4 style="text-align: center">Alailable Unit: {{ \App\Models\admin\Inventory::where('blood_group', 'B-')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('remain_unit') }}</h4>
                            </div></a>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                        <a href=""><div class="category-block">
                                <div class="header">
                                    <i class="fa fa-plus-square icon-bg-5"></i>
                                    <h4>AB+</h4>
                                </div>
                                <h4 style="text-align: center">Alailable Unit: {{ \App\Models\admin\Inventory::where('blood_group', 'AB+')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('remain_unit') }}</h4>
                            </div></a>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                        <a href=""><div class="category-block">
                                <div class="header">
                                    <i class="fa fa-plus-square icon-bg-6"></i>
                                    <h4>AB-</h4>
                                </div>
                                <h4 style="text-align: center">Alailable Unit: {{ \App\Models\admin\Inventory::where('blood_group', 'AB-')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('remain_unit') }}</h4>
                            </div></a>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                        <a href=""><div class="category-block">
                                <div class="header">
                                    <i class="fa fa-plus-square icon-bg-7"></i>
                                    <h4>O+</h4>
                                </div>
                                <h4 style="text-align: center">Alailable Unit: {{ \App\Models\admin\Inventory::where('blood_group', 'O+')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('remain_unit') }}</h4>
                            </div></a>
                        </div> <!-- /Category List -->
                        <!-- Category list -->
                        <div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6">
                        <a href=""> <div class="category-block">

                                <div class="header">
                                    <i class="fa fa-plus-square icon-bg-8"></i>
                                    <h4>O-</h4>
                                </div>
                                <h4 style="text-align: center">Alailable Unit: {{ \App\Models\admin\Inventory::where('blood_group', 'O-')->where('expire_date', '>', now())->where('remain_unit', '>=', 0)->sum('remain_unit') }}</h4>
                            </div></a>
                        </div> <!-- /Category List -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>

    <!--====================================
    =            Call to Action            =
    =====================================-->

   
@endsection
