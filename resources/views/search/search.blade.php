@extends('layouts.master')
@section('title') Welcome | CSE Alumni Directory
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group" id="adv-search">
                    <div class="input-group-btn">
                        <div class="btn-group" role="group">

                            <form action="{{route('search-result')}}" class="form-horizontal" method="post"
                                  enctype="multipart/form-data">

                                <input type="text" class="form-control" placeholder="Search for people" name="keyword"/>
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"
                                                                                    aria-hidden="true"></span></button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection