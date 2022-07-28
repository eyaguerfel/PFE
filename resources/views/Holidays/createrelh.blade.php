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
        @include('flash-message')

        @if ($exception = Session::get('exception'))
          <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>   
              @if(isset($exception['name'][0]))
                <strong>{{ $exception['name'][0] }}</strong>
              @elseif(isset($exception['start_date'][0]))
                <strong>{{ $exception['start_date'][0] }}</strong>
              @elseif(isset($exception['end_date'][0]))
                <strong>{{ $exception['end_date'][0] }}</strong>
              @endif
          </div>
        @endif

        <form action="{{route('createrelholidays')}}" method="POST">
        @csrf
        <div class="card">
                            <div class="card-header"><strong>Create religious holiday</strong></div>
                            <div class="card-body card-block">
       <div class="form-group">
            <label for="name" class=" form-control-label">Name</label>
        <input type="text" id="name" name="name" placeholder="Name" class="form-control"></div>
        
        <div class="form-group">
             <label for="start_date" class="control-label">Start date</label>
                <input id="start_date" name="start_date" type="date" class="form-control"></div>

         <div class="form-group">
             <label for="end_date" class="control-label">End date</label>
                <input id="end_date" name="end_date" type="date" class="form-control"></div>

        <button type="submit" class="btn btn-primary">Submit</button>

        </div>
</form>
 </body>
</html>


