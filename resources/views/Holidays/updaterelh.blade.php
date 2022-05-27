
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


<form  method="POST" action="{{route('reledit',['religiousholiday'=>$religiousholiday->id])}}">
        @csrf
        <input type="hidden" name="_method" value="put">
                        
                          <div class="card">
                            <div class="card-header"><strong>Update holidays</strong></div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                  <label for="name" class=" form-control-label">Name</label>
                                  <input type="text" id="name" name="name" placeholder="Name" class="form-control" value="{{$religiousholiday->name}}"></div>
                                  <div class="form-group">
                                  <label for="start_date" class="control-label">Start date</label>
                                  <input id="start_date" name="start_date" type="date" class="form-control"></div>
                                  <div class="form-group">
                                  <label for="end_date" class="control-label">End date</label>
                                  <input id="end_date" name="end_date" type="date" class="form-control"></div>
                                  </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
</form>
 </body>
</html>