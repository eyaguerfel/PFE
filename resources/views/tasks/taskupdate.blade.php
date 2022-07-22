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

        
        <form  method="POST" action="{{route('taskedit',['task'=>$array['task']->id])}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="put">
                        <div class="card">
                            <div class="card-header"><strong>Update Task</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group"><label for="name" class=" form-control-label">Name</label><input type="text" name="name" id="name" placeholder=" Name" class="form-control" value="{{$task->name}}"></div>
                                <div class="form-group"><label for="start_date" class=" form-control-label">Start Date</label><input type="date" name ="start_date"id="start_date" placeholder="Start Date" class="form-control"></div>
                                <div class="form-group"><label for="end_date" class=" form-control-label">End Date</label><input type="date" name="end_date" id="end_date" placeholder="Start Date" class="form-control"></div>
                                <div class="form-group"><label for="user" class=" form-control-label">User</label>

                                <select id="user" name="user_id" class="form-control">
                                      @foreach($array['user'] as $u)
                                      <option value="{{$u->id}}">{{$u->first_name}}</option>
                                      @endforeach                       
                                  </select>
                                  <div class="form-group"><label for="role" class=" form-control-label">Project</label>

                                  <select id="project" name="project_id" class="form-control">
                                      @foreach($array['project'] as $p)
                                      <option value="{{$p->id}}">{{$p->name}}</option>
                                      @endforeach                       
                                  </select>
                                
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
</form>
</body>
</html>
