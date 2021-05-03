<table border="1">
   <thead>
   <tr>
       <th colspan="16" align="center"><?php echo e($students['session']); ?></th>
   </tr>
                                 <tr>

                                    <th>Reg.No</th>
                                    <th>Roll No.</th>
                                    <th>Session</th>
                                    <th>Class</th>
                                    <th>Section</th>

                                     <th>Student Name</th>
                                     <th>Student Mobile</th>
                                     <th>DOB</th>
                                     <th>Gender</th>
                                     <!--<th>Email</th>-->

                                     <th>Father</th>
                                     <th>Mother</th>
                                     <th>Parent Mobile</th>
                                     <th>Address</th>
                                     <!--<th>City</th>
                                     <th>Post Code</th>-->
                                 </tr>
                             </thead>
                             <tbody>                   
                                 <?php foreach($students as $stu): ?>
                                 <tr>
                                     <td><?php echo e($stu->registration_no); ?></td>
                                     <td><?php echo e($stu->roll_no); ?></td>
                                     <td><?php echo e($stu->session); ?></td>
                                     <td><?php echo e($stu->class); ?></td>
                                     <td><?php echo e($stu->section); ?></td>
                                     <td><?php echo e($stu->name); ?></td>
                                     <td><?php echo e($stu->contact_no); ?></td>
                                     <td><?php echo e($stu->dob); ?></td>
                                     <td><?php echo e($stu->gender); ?></td>
                                     <!--<td><?php echo e($stu->email); ?></td>-->
                                     <td><?php echo e($stu->father); ?></td>
                                     <td><?php echo e($stu->mother); ?></td>
                                     <td><?php echo e($stu->parent_mobile); ?></td>
                                     <td><?php echo e($stu->address); ?></td>
                                     <!--<td><?php echo e($stu->city); ?></td>
                                     <td><?php echo e($stu->pin_code); ?></td>-->
                                 </tr>
                                 <?php endforeach; ?>

                             </tbody>
</table>