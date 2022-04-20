{{--start content--}}
@extends('layouts.app1')
@section('contenu')

<section id="home-section" class="hero">
	<div class="home-slider owl-carousel">

         {{-- image originale du theme ... --}}
        {{--<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div> --}}

    {{-- image home transporté ... --}}
    @foreach ( $sliders as $slider )
	<div class="slider-item" style="background-image: url(/storage/slider_image/{{$slider->slider_image}});">
		<div class="overlay"></div>
	  <div class="container">
		<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
		  <div class="col-md-12 ftco-animate text-center">
            {{-- <h1 class="mb-2">{{ $slider->description1 }}</h1>
			<h2 class="subheading mb-4">{{ $slider->description2 }}</h2>
			<p><a href="#" class="btn btn-primary">View Details</a></p> --}}
		  </div>
		</div>
	  </div>
	</div>
    @endforeach
    </div>
</section>

  <section class="ftco-section">
	  <div class="container">
		  <div class="row justify-content-center">
			  <div class="col-md-10 mb-5 text-center">
				  <ul class="product-category">

					  <li><a href="{{ URL::to('/shop') }}" class="{{ (request()->is('shop')?'active':'')}}">All</a></li>

                      @foreach ( $categories as $categorie )
                      <li><a href="/select_par_cat/{{ $categorie->category_name }}" class="{{ (request()->is('select_par_cat/'.$categorie->category_name )?'active':'')}}">{{ $categorie->category_name }}</a></li>
                      @endforeach
				  </ul>
			  </div>
		  </div>

		  <div class="row">

            @foreach ($products as $product)

			  <div class="col-md-6 col-lg-3 ftco-animate">
				  <div class="product">
					  <a href="#" class="img-prod"><img class="img-fluid" src="/storage/product_image/{{ $product->product_image }}" alt="Colorlib Template">
						  <span class="status">30%</span>
						  <div class="overlay"></div>
					  </a>
					  <div class="text py-3 pb-4 px-3 text-center">
						  <h3><a href="#">{{ $product->product_name }}</a></h3>
						  <div class="d-flex">
							  <div class="pricing">
								  <p class="price"><span class="price-sale">{{ $product->product_price }}</span>{{-- <span class="mr-2 price-dc" >$80.00</span></p> --}}
							  </div>
						  </div>
						  <div class="bottom-area d-flex px-3">
							  <div class="m-auto d-flex">
								  <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
									  <span><i class="ion-ios-menu"></i></span>
								  </a>
								  <a href="/ajouter_au_panier/{{ $product->id }}" class="buy-now d-flex justify-content-center align-items-center mx-1">
									  <span><i class="ion-ios-cart">111</i></span>
								  </a>
								  <a href="#" class="heart d-flex justify-content-center align-items-center ">
									  <span><i class="ion-ios-heart"></i></span>
								  </a>
							  </div>
						  </div>
					  </div>
				  </div>
			  </div>
              @endforeach
		  </div>

		  <div class="row mt-5">
		<div class="col text-center">
		  <div class="block-27">
			<ul>
			  <li><a href="#">&lt;</a></li>
			  <li class="active"><span>1</span></li>
			  <li><a href="#">2</a></li>
			  <li><a href="#">3</a></li>
			  <li><a href="#">4</a></li>
			  <li><a href="#">5</a></li>
			  <li><a href="#">&gt;</a></li>
			</ul>
		  </div>
		</div>
	  </div>
	  </div>
  </section>
@endsection
{{--end content--}}
