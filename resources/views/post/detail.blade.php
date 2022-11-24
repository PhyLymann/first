@extends('layout.master')

@section('content')
   
    <h3 class="mt-5">{{ $post->title}}</h3>
    <span class="badge bg-info text-white">{{ $post->category->name }}</span>
    <div class="row mt-5">
        <div class="col-md-7">
            {!! $post->description !!}

            <div class="my-5">
                @foreach ($post->tag as $tag)
                    
                <span class="badge bg-success">{{ $tag->title }}</span>

                @endforeach 
            </div>
        </div>
        <div class="col-md-3">
            <img 
                @if($post->image) 
                src="{{asset('storage/'.$post->image)}}" class="card-img-top" 
                @else src="/images/thumbnail.png" 
                @endif
            />
            <div class="row">
                <table>
                    <style>
                    table, th, td {
                        border: 1px solid white;
                        border-collapse: collapse;
                      }
                      th, td {
                        background-color: #0cb6b6;
                      }
                    </style>
                    @if($post->user)
                        <tr>
                            <th>Created By</th>
                            <th>Gmail</th>
                        </tr>
                        <tr>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->user->email }}</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <h3>Similar Ads</h3>
    <div class="row">
            @foreach ($similars as $post )
                <div class="container p-5">
                    <div class="col-sm-3">
                        <img @if($post->image) src="{{asset('storage/'.$post->image)}}" @else src="/images/thumbnail.png" @endif class="card-img-top" alt="..."/>
                        <h5 class="card-title">{{ $post->title}}</h5>
                        <small class="badge bg-danger">{{ $post->category? $post->category->name : ''}}</small>
                        <p class="card-text">{{ $post->price}}</p>
                        <a href="/listing/{{ $post->id}}" class="btn btn-primary">View Detail</a>
                    </div>
                </div> 
             @endforeach
    </div>
</div>
@endsection