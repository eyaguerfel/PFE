<?php
            $user=App\Http\Controllers\UserController::get_connected_user();
        ?>

        @if($user->role_id==1)
<div class="orders">
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
            <div class="card-body">
                <h4 class="box-title">Orders </h4>
            </div>
            <div class="card-body--">
                <div class="table-stats order-table ov-h">
                    <table class="table ">
                    <thead>
                        <tr>
                            <th class="serial">#</th>                                                    
                            <th class="avatar">Avatar</th>                                                    
                            <th>ID</th>                            
                            <th>Name</th>
                            <th>Task</th>                                              
                            <th>project</th>                                                    
                            <th>Status</th>                                                
                        </tr>                                            
                    </thead>                                            
                    <tbody>
                        @foreach($array['tasks'] as $task)                 
                            <tr>
                                <?php $picture = $task->picture; ?>               
                                <td class="serial">1.</td>                                                                             
                                <td class="avatar">                                                        
                                <div class="round-img">
                                    <a href="#"><img class="rounded-circle" src="{{URL::asset('/public/user/'.$picture)}}" style="width:50px; height:50px"alt=""></a>
                                </div>
                                </td>
                                                        
                                <td> {{$task->user_id}} </td>                                                    
                                <td>  <span class="name">{{ $task->user }}</span> </td>
                                <td>{{ $task->name }}</td>                                                   
                                <td> <span class="product">{{ $task->project}}</span> </td>                                                    
                                <td>
                                    @if($task->status == 1)
                                        <span class="badge badge-complete">Complete</span>
                                    @elseif($task->status == 0)
                                        <span class="badge badge-pending">To do </span>
                                    @elseif($task->status == 2)
                                        <span class="badge badge-warning">Doing</span>
                                    @endif
                                </td>
                                                    
                            </tr>
                        @endforeach
                    </tbody>                                      
                </table>                                  
            </div> <!-- /.table-stats -->                                
        </div>                            
    </div> <!-- /.card -->                        
</div>  <!-- /.col-lg-8 -->

                        
<div class="col-xl-4">                           
    <div class="row">                                
        <div class="col-lg-6 col-xl-12">                                  
            <div class="card br-0">                                       
                <div class="card-body">                                            
                    <div class="chart-container ov-h">                                                    
                    <div id="flotPie1" class="float-chart"></div>                       
                    </div>                                        
                </div>
                                    
    </div><!-- /.card -->
                                
</div>

                                
<div class="col-lg-6 col-xl-12">                                   
    <div class="card bg-flat-color-3  ">                                        
        <div class="card-body">                                            
            <h4 class="card-title m-0  white-color ">August 2018</h4>                                        
        </div>                                         
            <div class="card-body">                                                
                <div id="flotLine5" class="flot-line"></div>                                            
            </div>                                    
    </div>
                            
</div>                            
</div>                        
</div> <!-- /.col-md-4 -->                   
</div>
</div>
@endif