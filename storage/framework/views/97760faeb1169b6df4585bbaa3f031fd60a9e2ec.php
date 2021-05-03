<?php $__env->startSection('title', 'Employee'); ?>
    <?php $__env->startSection('cram'); ?>
    <ul class="breadcrumb">
        <li><a href="<?php echo e(route('user.dashboard')); ?>">Home</a></li>                    
        <li class="active">Employee List</li>
    </ul>
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('contant'); ?>
       <div class="page-title">                    
            <h2><span class="fa fa-arrow-circle-o-left"></span> Employee List</h2>
        </div>
        <?php if(Input::old('success')): ?>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Well done!</strong> <?php echo e(Input::old('success')); ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if(Input::old('error')): ?>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>Well done!</strong> <?php echo e(Input::old('error')); ?>

                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="page-content-wrap">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">                                
                            <h3 class="panel-title"><center>All Emplyees</center></h3>
                            <div class="text-right">
                                <a href="<?php echo e(route('insert.employee')); ?>" class="btn btn-info btn-rounded">Add</a>

                                <?php /*<a href="<?php echo e(route('export.employee')); ?>" class="btn btn-info btn-rounded">Export</a>
                            */ ?>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="get">
                                <div class="row">
                                    <div class="col-md-6">
                                        <select class="form-control" name="session">
                                            <option value="">Select Session</option>
                                            <?php foreach($sessions as $session): ?>
                                                <option value="<?php echo e($session->id); ?>"><?php echo e($session->session); ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-info btn-block">Get Employees</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <?php if($sessionData ): ?>
                                            Employees
                                            <?php 
                                                $session_id = $sessionData->id;
                                             ?>
                                            ( <strong> <?php echo e($sessionData->session); ?>  </strong> )
                                        <?php else: ?>
                                            <?php 
                                                $session_id = $currentSessionId;
                                             ?>
                                            All Employee List ( <strong> <?php echo e($currentSession); ?></strong> )
                                        <?php endif; ?>
                                    </h3>
                                    <div class="text-right">
                                        <a href="<?php echo e(route('export.employee',$session_id)); ?>" class="btn btn-info btn-rounded">Export</a>
                                    </div>

                                </div>
                                <div class="panel-body">
                                    <?php if(count($employees)>0): ?>
                                        <form method="get" action="<?php echo e(route('delete_all_employee')); ?>">
                                            
                                                <div style="overflow: scroll;">
                                                <table style="border: 1px solid black" class="table <?php if($currentSession): ?> datatable <?php endif; ?> table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        Select All
                                                        <input type="checkbox"  id="select_all" value="check"
                                                               onchange=" return select_all_checkbox()">
                                                    </th>
                                                    <th>#</th>
                                                    <th>Staff Type</th>
                                                    <th>Class</th>
                                                    <th>Section</th>
                                                    <th>Name</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Mobile</th>
                                                    <th>Email</th>
                                                    <th>Image</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($employees as $key => $employee): ?>
                                                    <tr>
                                                        <th>
                                                            <input type="hidden" name="time_table_id[]" value="<?php echo e($employee->id); ?>">
                                                            <input type="checkbox" name="select[]" class="select_all_checkboc_class"
                                                                   id="select_all_<?php echo e($employee->id); ?>" value="<?php echo e($employee->id); ?>"
                                                                   onchange="check_checkboc(this.id)" >
                                                        </th>
                                                        <td><?php echo e($key+1); ?></td>
                                                        <td><?php echo e($employee->staff_type); ?></td>
                                                        <td><?php echo e($employee->class); ?></td>
                                                        <td><?php echo e($employee->section); ?></td>
                                                        <td><?php echo e($employee->name); ?></td>
                                                        <td><label class="label label-success" style="font-size:12px"> <?php echo e($employee->username); ?></label></td>
                                                        <td><label class="label label-danger" style="font-size:12px"><?php echo e($employee->hint_password); ?></label></td>
                                                        <td><?php echo e($employee->mobile); ?></td>
                                                        <td><?php echo e($employee->email); ?></td>
                                                        <td>
                                                    <img src="<?php echo e(url($employee->avatar)); ?>" class="img-thumbnail" width="100px" height="100px">
                                                </td>
                                                        <td>
                                                            <a href="<?php echo e(route('edit.employee', $employee->id)); ?>" class="btn btn-info">Edit</a>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo e(route('delete.employee', $employee->id)); ?>" class="btn btn-danger">Delete</a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <?php if($sessionData): ?>
                                                    <tr>
                                                        <td colspan="12"  align="center">
                                                            <button type="submit" title="Delete All Employee" class="btn btn-danger" name="delete_all" value="ok">
                                                                Delete All
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                        </div>
                                        </form>
                                    <?php else: ?>
                                        <center><h2>No Time Table Found!!!</h2></center>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php /* updated 4-5-2018 by priya*/ ?>
       <script type="text/javascript">
           function select_all_checkbox()
           {
               if($('#select_all').prop("checked") == true)
               {
                   $('.select_all_checkboc_class').prop("checked", true);
               }
               else
               {
                   $('.select_all_checkboc_class').prop("checked", false);
               }

           }
           function check_checkboc(id)
           {
               var employee = id.split("_");
               var employee_id = employee[2];
               if($('#select_all_'+employee_id).prop("checked")== true)
               {
                   $('#select_all_'+employee_id).prop("checked", true);
               }
               else
               {
                   $('#select_all_'+employee_id).prop("checked", false);
               }
           }
       </script>
       <?php /*end*/ ?>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('users.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>