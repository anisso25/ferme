@extends('layouts.appadmin')

@section('title')
    Editer produit
@endsection

@section('contenu')
        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Editer Produit</h4>


                    {!!Form::open(['action'=> 'App\Http\Controllers\ProdectController@modifierproduit', 'method' => 'post', 'id' => 'commentForm', 'class' => 'cmxform', 'enctype'=>'multipart/form-data'])!!}
                    {{ csrf_field() }}
                    @method("PUT")
                    <div class="form-group">
                          
                          {{Form::hidden('id', $product->id)}}
                          {{Form::label('', 'Nom du produit', ['for' => 'cname'])}}
                          {{Form::text('product_name', $product->product_name,['class'=> 'form-control', 'id' => 'cname'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('', 'Prix du produit', ['for' => 'cname'])}}
                        {{Form::number('product_price',$product->product_price,['class'=> 'form-control', 'id' => 'cname'])}}
                    </div>
                    <div class="form-group">
                      {{Form::label('', 'Catégorie du produit')}}
                      {{Form::select('product_category', $categories,$product->product_category ,['class'=> 'form-control'])}}
                      
                    {{--
                      <br>
                      <select name="" id="">
                        @foreach ($categories as $categorie)
                        <option value="">{{$categorie->category_name}}</option>
                        @endforeach
                      </select>
                    --}}
                      
                  </div>
                  <div class="form-group">
                    {{Form::label('', "Ajouter l'image du produit", ['for' => 'cname'])}}
                    {{Form::file('product_image',['class'=> 'form-control', 'id' => 'cname'])}}
                </div>

                      {{Form::submit('Modifier', ['class' => 'btn btn-primary'])}}
                      {!!Form::close()!!}
                </div>
              </div>
            </div>
          </div>
@endsection

@section('scripts')
    {{--<script src="backend/js/form-validation.js"></script>
    <script src="backend/js/bt-maxLength.js"></script>--}}
@endsection