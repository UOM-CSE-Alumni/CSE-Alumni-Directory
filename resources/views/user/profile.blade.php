@extends('layouts.master')

@section('title')
    {{$data["name"]}} | CSE Alumni Directory
@stop

@section('content')
    <div id="wrapper">

        @include('includes.navbar')

        <div id="page-wrapper">

            <div class="container-fluid">

                <hr>
                <div class="container bootstrap snippet">
                    <div class="row">
                        <div class="col-sm-9">
                            <h1>{{$data["name"]}}</h1>
                        </div>
                        <div class="col-sm-2">
                            <a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="/img/usr.jpg"></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <!--left col-->

                            <ul class="list-group">
                                <li class="list-group-item text-muted">Account info</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Created</strong></span> 2.13.2014</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Last updated</strong></span> {{$data["updated_at"]}}</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Added by</strong></span> Admin</li>

                            </ul>

                            <!-- <div class="panel panel-default">
                                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                                <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
                            </div> -->

                            <!-- <ul class="list-group">
                                <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                                <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
                            </ul> -->

                            <div class="panel panel-default">
                                <div class="panel-heading">Social Media</div>
                                <div class="panel-body">
                                    <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
                                </div>
                            </div>

                        </div>
                        <!--/col-3-->
                        <div class="col-sm-8">

                            <ul class="nav nav-tabs" id="myTab">
                                <li class="active"><a href="#home" data-toggle="tab">Info</a></li>
                                <li><a href="#messages" data-toggle="tab">Messages</a></li>
                                <li><a href="#settings" data-toggle="tab">Settings</a></li>
                                
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <tbody id="items">

                                                <!-- <tr style=" height: 20px !important; background-color: #FFFFFF;">
                                                    <td colspan="3"></td>
                                                </tr> -->
                                                <div class="row" style="padding-top:20px">
                                                    @if (session('status'))
                                                        <div class="alert alert-success">
                                                            {{ session('status') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>{{$data["name"]}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Batch</td>
                                                    <td>CSE14</td>
                                                </tr>
                                                @if(! empty($data['contact_no']))
                                                <tr>
                                                    <td>Contact number</td>
                                                    <td>{{$data["contact_no"]}}</td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td>Country</td>
                                                    <td>{{$data["country"]}}</td>
                                                </tr>
                                                <tr>
                                                    <td>City</td>
                                                    <td>{{$data["city"]}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Proffession</td>
                                                    <td>Table cell</td>
                                                </tr>
                                                <tr>
                                                    <td>Organization</td>
                                                    <td>Table cell</td>
                                                </tr>
                                                @if(! empty($data['address']))
                                                <tr>
                                                    <td>Address</td>
                                                    <td>{{$data['address']}}</td>
                                                </tr>
                                                @endif

                                            </tbody>
                                        </table>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 col-md-offset-4 text-center">
                                                <ul class="pagination" id="myPager"></ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/table-resp-->

                                    <hr>

                                </div>
                                <!--/tab-pane-->
                                <div class="tab-pane" id="messages">

                                    <h2></h2>

                                    <ul class="list-group">
                                        <li class="list-group-item text-muted">Researches</li>
                                        <li class="list-group-item text-right"><a href="#" class="pull-left">Message 1</a> 2.13.2014</li>
                                        <li class="list-group-item text-right"><a href="#" class="pull-left">Message 2</a> 2.11.2014</li>
                                        <li class="list-group-item text-right"><a href="#" class="pull-left">Message 3</a> 2.11.2014</li>
                                        <li class="list-group-item text-right"><a href="#" class="pull-left">Message 4</a> 2.11.2014</li>
                                        <li class="list-group-item text-right"><a href="#" class="pull-left">Message 5</a> 2.11.2014</li>
                                        <li class="list-group-item text-right"><a href="#" class="pull-left">Message 6</a> 2.11.2014</li>                                        
                                    </ul>

                                </div>
                                <!--/tab-pane-->
                                <div class="tab-pane" id="settings">

                                    <hr>
                                    <form class="form" action= "{{ route('update_user_profile') }}" method="POST" id="user_data">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="first_name">
                                                    <h4>First name</h4></label>
                                                <input type="text" class="form-control" name="first_name" id="first_name" value= {{$data["name"]}} >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="last_name">
                                                    <h4>Last name</h4></label>
                                                <input type="text" class="form-control" name="last_name" id="last_name" value="last name" title="enter your last name if any.">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="email"><h4>Email</h4></label>
                                            </div>
                                            <div class="col-xs-6">
                                                <input type="email" class="form-control" name="email" id="email" value= {{$data["email"]}} title="enter your email.">
                                            </div>
                                            <div class="col-xs-3">
                                                <select class="selectpicker form-control" id="sel1">
                                                    <option>visibility-private</option>
                                                    <option>visibility-public</option>
                                                    <option>visibility-members</option>
                                                </select>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="contact_no"><h4>Contact number</h4></label>
                                            </div>
                                            <div class="col-xs-6">
                                                <input type="text" class="form-control" name="contact_no" id="contact_no" value= {{$data["contact_no"]}} title="enter your contact number.">
                                            </div>
                                            <div class="col-xs-3">
                                                <select class="selectpicker form-control" id="sel1" name="contact_no_visibility" form="user_data">
                                                    @if($data["contact_no_visibility"]=="public")
                                                        <option value = "private">visibility-private</option>
                                                        <option selected value = "public">visibility-public</option>
                                                        <option value = "members">visibility-members</option>
                                                    @elseif($data["contact_no_visibility"]=="members")
                                                        <option value = "private">visibility-private</option>
                                                        <option value = "public">visibility-public</option>
                                                        <option value = "members" selected> visibility-members</option>
                                                    @else
                                                        <option value = "private" selected >visibility-private</option>
                                                        <option value = "public">visibility-public</option>
                                                        <option value = "members">visibility-members</option> 
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="country">
                                                    <h4>Country</h4></label>
                                                <input type="text" class="form-control" name="country" id="country" value= {{$data["country"]}} title="enter country.">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="city">
                                                    <h4>City</h4></label>
                                                <input type="text" class="form-control" name="city" id="city" value= {{$data["city"]}} title="enter city">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="address">
                                                    <h4>Address</h4></label>
                                            </div>
                                            <div class="col-xs-6">
                                                <input type="text" class="form-control" name="address" id="address" value= {{$data["address"]}} title="enter city">
                                            </div>
                                            <div class="col-xs-3">
                                                <select class="selectpicker form-control" id="address_visibility" name="address_visibility" form="user_data">
                                                    @if($data["address_visibility"]=="public")
                                                        <option value = "private">visibility-private</option>
                                                        <option selected value = "public">visibility-public</option>
                                                        <option value = "members">visibility-members</option>
                                                    @elseif($data["address_visibility"]=="members")
                                                        <option value = "private">visibility-private</option>
                                                        <option value = "public">visibility-public</option>
                                                        <option value = "members" selected> visibility-members</option>
                                                    @else
                                                        <option selected value = "private">visibility-private</option>
                                                        <option value = "public">visibility-public</option>
                                                        <option value = "members">visibility-members</option> 
                                                    @endif
                                                </select>
                                            </div>
                                        </div>




                                        <!-- <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="password">
                                                    <h4>Password</h4></label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="password2">
                                                    <h4>Verify</h4></label>
                                                <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                                            </div>
                                        </div> -->

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <br>
                                                <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                                

                            </div>
                            <!--/tab-pane-->
                        </div>
                        <!--/tab-content-->

                    </div>
                    <!--/col-9-->
                </div>
                <!--/row-->

        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
                                    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

@stop