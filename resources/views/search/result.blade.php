@extends('layouts.master')
@section('title')
    Search Results | CSE Alumni Directory
@endsection
@section('content')
    <div id="page-wrapper">

        <div class="container-fluid">
            @if($results->count()==0)
                <h3> No Matches Found ...</h3>
            @else
                <h3>Results : </h3>
                @foreach($results as $result)
                    <div class="col-md-4">
                        <div class="card " style="width: 20rem;">
                            <img class="card-img-top" style="width: 20rem" src="img/avatar.jpg" alt="Card image cap">
                            <div class="card-block">
                                <h4 class="card-title">{{$result->name}}</h4>
                                <h5 class="card-title">Email Address : <a href="#">{{$result->email}}</a></h5>
                                <h5 class="card-title">Contact Number : {{$result->contact_no}}</h5>
                                <h5 class="card-title">Address : {{$result->address}}</h5>
                                <h5 class="card-title">City : {{$result->city}}</h5>
                                <h5 class="card-title">Country : {{$result->country}}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection







