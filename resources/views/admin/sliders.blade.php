@extends('layouts.appadmin')

@section('title')
        Sliders
@endsection

{{Form::hidden($increment=1)}}

@section('contenu')
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sliders</h4>

        @if(Session::has('status'))
        <div class="alert alert-success">
            {{Session::get('status')}}
        </div>
        @endif

        <div class="row">
          <div class="col-12">
            <div class="table-responsive">
              <table id="order-listing" class="table">
                <thead>
                  <tr>
                      <th>Order #</th>
                      <th>Image</th>
                      <th>Description one</th>
                      <th>Description two</th>
                      <th>Status</th>
                      <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                 
                  @foreach ( $sliders as $slider )
                  <tr>
                    <td>{{$increment}}</td>
                    <td><img src="/storage/slider_image/{{$slider->slider_image}}" alt=""></td>
                    <td>{{$slider->description1}}</td>
                    <td>{{$slider->description2}}</td>

                    @if ($slider->status == 1 )
                      <td>
                      <label class="badge badge-success">Activé</label>
                      </td>
                    @else
                      <td>
                      <label class="badge badge-danger">Désactivé</label>
                      </td>
                    @endif

                    <td>
                    <button class="btn btn-outline-primary" onclick="window.location ='{{url('/edit_slider/'.$slider->id)}}'">Edit</button>
                      
                    <a id="delete" href="{{url('/supprimerslider/'.$slider->id)}}"><button class="btn btn-outline-danger" >Delete</button></a>

                    @if ($slider->status == 1)
                        <button class="btn btn-outline-warning" onclick="window.location ='{{url('/desactiver_slider/'.$slider->id)}}'">Désactiver</button>
                    @else
                        <button class="btn btn-outline-success" onclick="window.location ='{{url('/activer_slider/'.$slider->id)}}'">Activer</button>
                    @endif
                  </td>
                    {{Form::hidden($increment=$increment + 1)}}
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')
    <script src="backend/js/data-table.js"></script>
@endsection