<!--<h1>Create User</h1>

<form action="" method="POST">
    @csrf
<div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" name="first_name"class="form-control" id="first_name" placeholder="First Name">
  </div>
  <div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name"class="form-control" id="last_name" placeholder="Last Name">
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">    
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>-->



<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
   @include('layout.head')
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
       @include ('layout.nav')
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('layout.header')
        <!-- /#header -->
        <!-- Content -->
        @include('layout.script')


        
        <form  method="POST" action="{{route('useredit',['user'=>$user->id])}}"enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="put">
                        <div class="card">
                            <div class="card-header"><strong>Update User</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                  <label for="first_name" class=" form-control-label">First Name</label><input type="text" id="first_name" name="first_name" placeholder="First Name" class="form-control" value="{{$user->first_name}}"></div>
                                <div class="form-group"><label for="last_name" class=" form-control-label">Last Name</label><input type="text" id="last_name" name="last_name" placeholder="Last Name Name" class="form-control" value="{{$user->last_name}}"></div>
                                <div class="form-group"><label for="email" class=" form-control-label">Email</label><input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" value="{{$user->email}}"></div>
                                <div class="form-group"><label for="role" class=" form-control-label">Role</label>
                                    <select id="role" name="role_id" class="form-control">
                                      @foreach($role1 as $r)
                                      <option value="{{$r->id}}">{{$r->display_name}}</option>
                                      @endforeach
                                                                
                                  </select>
                              </div>
                              <div class="form-group"><label for="picture" class=" form-control-label">Picture</label>
                                <input type="file" id="picture" name="picture" class="form-control">
                                <div class="form-group"><label for="password" class=" form-control-label">Password</label><input type="password" id="password" name="password" placeholder="Enter Password" class="form-control"></div>

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
</form>
 </body>
</html>