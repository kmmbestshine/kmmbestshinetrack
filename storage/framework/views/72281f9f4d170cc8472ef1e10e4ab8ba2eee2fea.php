<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
<style type="text/css">
   
    .page-container .page-content{
       margin-left: 0px !important;  
    }
    
.widget.widget-item-icon .widget-data {
    padding-left: 162px;
}
.widget.widget-item-icon .widget-item-left {
    border-right: 1px solid rgba(0, 0, 0, 0.1);
    margin-right: 16px;
    padding-right: 13px;
}
.widget.widget-item-icon .widget-item-left, .widget.widget-item-icon .widget-item-right {
    width: 100px;
    padding: 5px 0px;
        padding-right: 0px;
    text-align: center;
}
.profile{
    background: #f7a62b !important;
    padding: 0px !important;
}
select{
    color: black;
}
.page-container .page-head {
    background:#f7a62b;
        border-top: 1px solid #f7a62b;
    border-bottom: 1px solid #f7a62b;
}
.page-container .page-navigation .page-navigation-info {
    border-bottom: 1px solid #676c71;
    background: #f7a62b;
}
.page-container .page-navigation {
    background: #f7a62b;
}



</style>
<div class="page-content">
    <div class="container">
        <!-- <div class="page-toolbar">                
            <div class="page-toolbar-block">
                <div class="page-toolbar-title">Dashboard</div>
            </div>                               
        </div> -->            
       
        <?php if(Input::old('success')): ?>
            <center><p class="alert alert-success pull-right"><?php echo e(Input::old('success')); ?></p></center>
        <?php endif; ?>   
        <?php if(Input::old('error')): ?>
            <center><p class="alert alert-danger pull-right"><?php echo e(Input::old('error')); ?></p></center>
        <?php endif; ?>
        <?php if(Input::old('exist')): ?>
            <center><p class="alert alert-danger pull-right"><?php echo e(Input::old('exist')); ?></p></center>
        <?php endif; ?> 
        <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" role="form" method="get" id="getformadmin">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>View SChool</strong></h3>
                            <div class="text-right" >
                                <a href="<?php echo e(route('createSchool')); ?>" class="btn btn-warning btn-rounded">Add School</a>
                                   
                            
                            </div>
                             
                            
                        </div>
                        <div class="panel-body">
                            <div class="row">
                               
                               
                                <!-- <?php echo e(app('request')->input('a')); ?> -->
                                <div class="col-md-4 section">
                                    <select class="form-control sel-section" name="Category" >
                                        <option value="">Select Category</option>
                                        <option value="0" 
                                        <?php echo e((Input::get('Category') == '0' ) ? 'selected="selected"':""); ?>>Demo School</option>
                                        <option value="1"  
                                        <?php echo e((Input::get('Category') == '1') ? 'selected="selected"':""); ?>>Regular School</option>
                                    </select>
                                </div>
                                 <div class="col-md-4 section">
                                    <select class="form-control sel-section" name="Status" >
                                        <option value="">Select Status</option>
                                        <option value="1"  <?php echo e((Input::get('Status') == '1' ) ? 'selected="selected"':""); ?>>Active</option>
                                        <option value="0"  <?php echo e((Input::get('Status') == '0' ) ? 'selected="selected"':""); ?>>InActive</option>
                                    </select>
                                </div>
                                <input type="hidden" id="excelexport" name="excelexport" value="0">
                                <div class="col-md-4">
                                    <button type="button" onclick="studentsubmit()" class="btn btn-warning btn-block" style="padding: 10px">Get Students</button>
                                </div>
                             </div>
                        </div>

                    </div>
                    <button style="float: right;" type="button" onclick="excelsubmit()" class="btn btn-warning btn-rounded" >Export Data</button>
                     
                </form>
            </div>
        </div>
        <br/>
        <div class="row" style="padding-top: 21px;padding-right: 30px;">
            <!-- <div class="col-md-12"> -->
               
                       

                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th class="col-md-1">#</th>
                                        <th class="col-md-1">Students</th>
                                        <th class="col-md-1">School Name</th>
                                        <th class="col-md-1">Created At</th>
                                        <th class="col-md-1">Login Detail</th>
                                        <th class="col-md-1">Contact No</th>
                                        <th class="col-md-1">Email</th>
                                        <th class="col-md-1">Address</th>
                                        <th class="col-md-1">City</th>
                                        <th class="col-md-3">Image</th>
                                        <th class="col-md-1">Edit</th>
                                        <th class="col-md-1">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php foreach($schools as $key => $school): ?>
                                <tr>
                                    <td class="col-md-1"><?php echo e($key + 1); ?></td>
                                    <td class="col-md-1"><?php echo e($school->students); ?></td>
                                    <?php $tot_stu +=$school->students;?> 
                                    <td class="col-md-1"><?php echo e($school->school_name); ?></td>
                                    <?php $created_at = date('d-m-Y', strtotime($school->created_at));?>
                                    <td class="col-md-1"><?php echo e($created_at); ?></td>
                                    <td class="col-md-1">
                                        <p>Username : <?php echo e($school->username); ?></p>
                                        <p>Password : <?php echo e($school->hint_password); ?></p>
                                    </td>
                                    <td class="col-md-1"><?php echo e($school->mobile); ?></td>
                                    <td class="col-md-1"><?php echo e($school->email); ?></td>
                                    <td class="col-md-1"><?php echo e($school->address); ?></td>
                                    <td class="col-md-1"><?php echo e($school->city); ?></td>
                                    <td class="col-md-3">
                                        <img src="<?php echo e(url($school->image)); ?>" class="img-thumbnail" width="150px" height="150px">
                                    </td>
                                    <td class="col-md-1">
                                        <a href="<?php echo e(route('editSchool', $school->id)); ?>" class="btn btn-info">Edit</a>
                                    </td>
                                    <td class="col-md-1">
                                        <a href="<?php echo e(route('deleteSchool', $school->id)); ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>  
                                </tbody>
                            </table>
                        
            
            <!-- </div> -->
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    function studentsubmit(){
        // body...
        $('#excelexport').val('0');
        $( "#getformadmin" ).submit();
    }
    function excelsubmit()
    {
        $('#excelexport').val('1');
        $( "#getformadmin" ).submit();
    }
    
    
</script>
<?php $__env->stopSection(); ?>
  
<?php echo $__env->make('admin.layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>