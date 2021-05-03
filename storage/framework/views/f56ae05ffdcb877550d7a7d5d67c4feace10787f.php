
    <?php if($students): ?>
        <table class="table datatable">
            <?php foreach($students as $key => $student): ?>
             <thead>
                 <tr>
                     <th>#</th>
                     <th>Name</th>
                     <th>Registration No</th>
                     <th>Class</th>
                     <th>Section</th>
                     <th>Username</th>
                     <th>stu password</th>
                     <th>Parent Username</th>
                     <th>Parent password</th>
                     <th>Parent Mobile</th>
                     <th>DOB</th>
                     <th>Aadhar No</th>
                <th>EMIS No</th>
                <th>RTE</th>
                     <th>Gender</th>
                     <th>Father</th>
                     <th >Parent's Signature</th>
                     u<th >App Download</th>

                 </tr>
             </thead>
             <tbody>
                 
                     <tr style="height: 100px;">
                         <td><?php echo e($key+1); ?></td>
                         <td><?php echo e($student->name); ?></td>
                         <td><?php echo e($student->registration_no); ?></td>
                         <td><?php echo e($student->class); ?></td>
                         <td><?php echo e($student->section); ?></td>
                         <td>
                             <label class="label label-success" style="font-size:12px">
                                 <?php echo e($student->username); ?>

                             </label>
                         </td>
                         <td>
                             <label class="label label-danger" style="font-size:12px">
                                 <?php echo e($student->hint_password); ?>

                             </label>
                         </td>
                         <td>
                             <label class="label label-info" style="font-size:12px">
                                 <?php echo e($student->parent_username); ?>

                             </label>
                         </td>
                         <td>
                             <label class="label label-danger" style="font-size:12px">
                                 <?php echo e($student->parent_hint_password); ?>

                             </label>
                         </td>
                         <td><?php echo e($student->parent_contact_no); ?></td>
                         <td><?php echo e($student->dob); ?></td>
                         <td><?php echo e($student->aadhar_no); ?></td>
                <td><?php echo e($student->emi_no); ?></td>
                <td><?php echo e($student->rte); ?></td>
                         <td><?php echo e($student->gender); ?></td>
                         <td><?php echo e($student->father); ?></td>
                         <td valign="middle"></td>
                         <td valign="middle">
                            App Download From Android Playstore in your mobile.
                            <br style="mso-data-placement:same-cell;">
                            Mobile App name&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<u>StJosephspallalakuppamapp</u>
                        </td>
                     </tr>
                 <?php endforeach; ?>
             </tbody>
        </table>
    <?php endif; ?>
