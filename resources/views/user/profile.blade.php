@extends('layouts.master')

@section('title')
    User Profile | CSE Alumni Directory
@stop

@section('styles')
@stop

@section('content')
    <div id="wrapper">

        @include('includes.navbar')

        <div id="page-wrapper">

            <div class="container" style="min-height: 100%; height: 100%;">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile <small>Overview</small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                
                <table class="table" style="border:none" >
                    <tbody>
                        <tr>
                            <td>Name:</td>
                            <td>{{ $data["name"] }}</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>{{ $data["email"] }}</td>
                        </tr>
                        <tr>
                            <td>Contact Number:</td>
                            <td>{{ $data["contact_no"] }}</td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>{{ $data["address"] }}</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

@stop