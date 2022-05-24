<!--<h1>Create User</h1>

<form action="" method="POST">
    @csrf
<div class="form-group">
    <label for="first_name">Display Name</label>
    <input type="text" name="display_name"class="form-control" id="display_name" placeholder="First Name">
  </div>
  <div class="form-group">
    <label for="last_name">Description</label>
    <input type="text" name="description"class="form-control" id="description" placeholder="Last Name">
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

        <form action="{{route('rolecreate')}}" method="POST">
        @csrf
                        <div class="card">
                            <div class="card-header"><strong>Create Role</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="display_name" class=" form-control-label">Display Name</label><input type="text" id="display_name" placeholder="Display Name" class="form-control"></div>
                                <div class="form-group"><label for="description" class=" form-control-label">Description</label><!--<input type="text" id="description" placeholder="Description" class="form-control">--><textarea id="description" placeholder="Description" class="form-control"></textarea></div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
</form>
</body>
</html>
