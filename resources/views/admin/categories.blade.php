@extends('layouts.appadmin')

@section('title')
        Catégories
@endsection

{{Form::hidden($increment=1)}}

@section('contenu')
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Catégories</h4>

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
                        <th>Nome de la catégorie</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $categories as $category )
                    <tr>
                        <td>{{$increment}}</td>
                        <td>{{$category->category_name}}</td>
                        {{--<td>
                          <label class="badge badge-info">On hold</label>
                        </td>--}}
                        <td>
                          <button class="btn btn-outline-primary" onclick="window.location ='{{url('/edit_categorie/'.$category->id)}}'">Edit</button>

                          <a id="delete" href="{{url('/supprimercategorie/'.$category->id)}}"><button class="btn btn-outline-danger" >Delete</button></a>
                        </td>
                    </tr>
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
    <script src="{{asset('backend/js/data-table.js')}}"></script>
@endsection