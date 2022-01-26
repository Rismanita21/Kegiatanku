@extends('welcome')

@section('content')
    
<div class="container">    
    <div class="row py-4">
        @foreach($activitys as $activity)
        <div class="col-md-12 mb-3">
            <div class="card border-0 ">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <img src="{{url('storage/'. $activity->image)}}" alt="" width="100px" class="rounded" height="100px">
                            
                            <div class="ml-3">
                                <h3 class="text-danger">{{$activity->nama_activity}}</h3>
                                <p class="text-muted">
                                    {{str_limit(strip_tags($activity->desc), 100)}}
                                </p>
                              <div class="d-flex align-items-center">
                                <small class="text-info">Created, {{$activity->created_at->diffForHumans()}}
                                </small>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="{{route('kegiatan.create', $activity->id)}}" class="btn btn-outline-info">
                            Read more
                          </a>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @endforeach
    </div>
</div>
@endsection