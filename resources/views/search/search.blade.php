@extends('layouts.master')
@section('title') Welcome | CSE Alumni Directory
@endsection

@section('content')

    <div id="page-wrapper">
        {{--simple search--}}
        <div class="container-fluid">
            <h1>Simple search</h1>


            <form action="{{route('simple-search')}}" class="form-horizontal" method="post"
                  enctype="multipart/form-data">
                <input type="text" class="form-control" placeholder="Search for people..."
                       name="keyword"/>
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">Search <span
                            class="glyphicon glyphicon-search"
                            aria-hidden="true"></span></button>

            </form>
        </div>


    <br>
    {{--Advance search--}}
    <div class="container-fluid">
        <h1>Advance Search</h1>


        <form action="{{route('advance-search')}}" class="form-horizontal" method="post"
              enctype="multipart/form-data">

            <input type="text" class="form-control" placeholder="Name" name="keyword"/>

            <select class="selectpicker" name="degrees[]" data-live-search="true" data-width="100%" multiple
                    title="Search by degree program...">
                @foreach($degrees as $degree)
                    <option value="{{$degree->id}}">{{$degree->type}}-{{$degree->batch_name}}</option>
                @endforeach
            </select>

            <select class="selectpicker" name="companies[]" data-live-search="true" data-width="100%" multiple
                    title="Search by company...">
                @foreach($companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                @endforeach
            </select>
            {{ csrf_field() }}

            <button type="submit" class="btn btn-primary">Search <span
                        class="glyphicon glyphicon-search"
                        aria-hidden="true"></span></button>

        </form>
    </div>
    </div>




@endsection