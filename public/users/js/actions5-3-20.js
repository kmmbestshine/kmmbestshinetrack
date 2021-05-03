$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
$("#add_grade").click(function (){
	var exid=$("#first_row").html();
		var obe=$("#main_div").append(exid);
});
    
    $(".attenclass").change(function()
    {
        var srclass =  $(".attenclass").val();

        if(srclass!="")
        {
            $.post("../get/section/ajax",
            {
                srclass:srclass
            },
            function(data)
            {
                $(".attensection").removeAttr('disabled');
                var cont="<select class='form-control attensection' name='section'><option value=''>Select Section</option>";
                for(me in data)
                {
                    cont+= "<option value='"+data[me]['id']+"'>"+data[me]['section']+"</option>";
                }
                $('.mainsection').html(cont+"</select>");
            });
        }
    });

    $(".reportAttClass").change(function()
    {

        var srclass =  $(".reportAttClass").val();
    
        if(srclass!="")
        {
            $.post("./get/section/ajax",
            {
                srclass:srclass
            },
            function(data)
            {
                console.log(data);
                $(".attensection").removeAttr('disabled');
                var cont="<select class='form-control attensection' name='section'><option value=''>Select Section</option>";
                for(me in data)
                {
                    cont+= "<option value='"+data[me]['id']+"'>"+data[me]['section']+"</option>";
                }
                $('.mainsection').html(cont+"</select>");
            });
        }
    });

    $("#staff_type").change(function(){
        $("#staff_type").removeAttr('disabled');
        $.get("../employee/get/"+$(this).val(), function(data){
            var cont = '<select class="form-control select" name="employee" required id="salaryAmount" data-live-search="true">';
            for(me in data.data)
            {
                 cont+= "<option value='"+data.data[me]['id']+"' data-value='"+data.data[me]['salary']+"'>"+data.data[me]['name']+"</option>";

            }
            $('#employee').html(cont+"</select>");
        });
    });


    // $("#salaryAmount").change(function(){
    //     alert('helo');
    //     console.log($(this).attr('data-value'));
    // });

    $(".route").change(function()
    {
        var bus_id =  $(".route").val();
        if(bus_id!="")
        {
            $.post("../post/stop/routes",
            {
                bus_id:bus_id
            },
            function(data)
            {
                $(".stop").removeAttr('disabled');
                var cont="<select class='form-control stop' name='stop'><option value=''>Select Stop</option>";
                for(me in data)
                {
                    cont+= "<option value='"+data[me]['id']+"'>"+data[me]['stop']+"</option>";
                }
                $('.stop-box').html(cont+"</select>");
            });
        }
    });

    $(".editroute").change(function()
    {
        var bus_id =  $(".editroute").val();
        if(bus_id!="")
        {
            $.post("../../post/stop/routes",
            {
                bus_id:bus_id
            },
            function(data)
            {
                var cont="<select class='form-control editstop' name='stop'><option value=''>Select Stop</option>";
                for(me in data)
                {
                    cont+= "<option value='"+data[me]['id']+"'>"+data[me]['stop']+"</option>";
                }
                $('.edit-stop-box').html(cont+"</select>");
            });
        }
    });
    $(".examclass").change(function()
        {
            var srclass =  $(".examclass").val();
            if(srclass!="")
            {
                $.post("../get/section/ajax",
                {
                    srclass:srclass
                },
                function(data)
                {
                    $(".homeexamsection").removeAttr('disabled');
                    var cont="<select class='form-control homeexamsection' name='section'><option value=''>Select Section</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['section']+"</option>";
                    }
                    $('.examsection').html(cont+"</select>");
                    subSectionOperation();
                });
            }
        });
        
        function subSectionOperation()
        {
            $(".homeexamsection").change(function()
            {
                var srsection =  $(".homeexamsection").val();
                console.log(srsection);
                if(srsection!="")
                {
                    $.post("../subjects/section",
                    {
                        srsection:srsection
                    },
                    function(data)
                    {
                        $(".headexamsubject").removeAttr('disabled');
                        var cont="<select class='form-control headexamsubject' name='subject'><option value=''>Select Subject</option>";
                        for(me in data)
                        {
                            cont+= "<option value='"+data[me]['id']+"'>"+data[me]['subject']+"</option>";
                        }
                        $('.examsubject').html(cont+"</select>");
                    });
                }
            });
    
        }
        


    /*
    *updated 21-10-2017 by priya
    * $(".class").change(function()
    {
        var srclass =  $(".class").val();
        if(srclass!="")
        {
            $.post("../get/section/ajax",
            {
                srclass:srclass
            },
            function(data)
            {
                $(".sel-section").removeAttr('disabled');
                var cont="<select class='form-control sel-section' name='section'><option value=''>Select Section</option>";
                for(me in data)
                {
                    cont+= "<option value='"+data[me]['id']+"'>"+data[me]['section']+"</option>";
                }
                $('.section').html(cont+"</select>");
            });
        }
    });*/
    $(".class").change(function()
    {
        var srclass =  $(".class").val();
        if(srclass!="")
        {
            if(srclass == 0)
            {
               // alert('abc');exit;
                $(".sel-section").removeAttr('disabled');
                var cont="<select class='form-control sel-section' name='section'><option value=''>Select Section</option>";
                cont+= "<option value='0'>All Section</option>";
                $('.section').html(cont+"</select>");

            }
            else
            {
                //alert('123');exit;
                $.post("../get/section/ajax",
                    {
                        srclass:srclass
                    },
                    function(data)
                    {
                        $(".sel-section").removeAttr('disabled');
                        var cont="<select class='form-control sel-section' name='section'><option value=''>Select Section</option>";
                        for(me in data)
                        {
                            cont+= "<option value='"+data[me]['id']+"'>"+data[me]['section']+"</option>";
                        }
                        $('.section').html(cont+"</select>");
                    });
            }
        }
    });

/******* end  *******/

    $(".editclass").change(function()
    {
        var srclass =  $(".editclass").val();
        if(srclass!="")
        {
            $.post("../../get/section/ajax",
            {
                srclass:srclass
            },
            function(data)
            {
                var cont="<select class='form-control edit-section' name='section'><option value=''>Select Section</option>";
                for(me in data)
                {
                    cont+= "<option value='"+data[me]['id']+"'>"+data[me]['section']+"</option>";
                }
                $('.editsection').html(cont+"</select>");
            });
        }
    });

    function subOperation()
    {
        $(".workclass").change(function()
        {
            var srclass =  $(".workclass").val();
            if(srclass!="")
            {
                $.post("get/section/ajax",
                {
                    srclass:srclass
                },
                function(data)
                {
                    $(".homesection").removeAttr('disabled');
                    var cont="<select class='form-control homesection' name='section'><option value=''>Select Section</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['section']+"</option>";
                    }
                    $('.worksection').html(cont+"</select>");
                    subOperation();
                });
            }
        });

        $(".homesection").change(function()
        {
            var srsection =  $(".homesection").val();
            console.log(srsection);
            if(srsection!="")
            {
                $.post("subjects/section",
                {
                    srsection:srsection
                },
                function(data)
                {
                    $(".subject").removeAttr('disabled');
                    var cont="<select class='form-control subject' name='subject'><option value=''>Select Subject</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['subject']+"</option>";
                    }
                    $('.worksubject').html(cont+"</select>");
                });
            }
        });
    }
    subOperation();


    $("#search-input").keyup(function(){
        var search = $('#search-input').val();
        if(search.length>1)
        {
            $.post("search/student", {
                search:search
            },
            function(data){
                var cont = "<ul class='search-result'><table class='table table-bordered'></thead><tr><th>Name</th><th>Roll No</th><th>Registration No</th></tr></thead><tbody>";
                for(me in data)
                {
                    cont+= "<tr><td>"+data[me]['name']+"</td><td>"+data[me]['roll_no']+"</td><td>"+data[me]['registration_no']+"</td></tr>";
                }
                $('.search-result').html(cont+"</tbody></table></ul>");
            });
        }
    });
    $("#user_role").on('change',function(){
        $(".childdivteacher").hide();
        $(".childdivstudent").hide();
        
        var user_role=$("#user_role").val();
        if(user_role=='Student')
        {
          $(".childdivstudent").show();  
        }
        if(user_role=='Teacher')
        {
            $(".childdivteacher").show();
        }
    });
    

    $("#BookStatus").on('click',function(){
        //$(".mainheader").show();
        console.log($("#bookid").val());
        var book_no = $("#bookid").val();
        //console.log(book_no);
        $(".mainheader").hide();
        $(".issuedet").hide();
        $(".childdivteacher").hide();
        $(".childdivstudent").hide();
        $("#BookLayoutInLibrary").show();
                    
         if(book_no=='')
        {
            console.log(book_no);
            $("#BookLayoutInLibrary").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Book No Can Not Be Empty</div></div></center>");
        }
        else{
            console.log(book_no);
             $("#BookLayoutInLibrary").html();
             $(".mainheader").hide();
          $("#BookLayoutInLibrary").html("<div class='col-md-6 col-md-offset-3'>LOADING...</div>");
          
          
           $.post("../get/book/library",
            {
                book_no : book_no
            }, function(data){
                console.log(data);
                if(data == 'empty')
                {
                    $("#BookLayoutInLibrary").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Book No does not match with any Books</div></div></center>")
                }
               else if(data=='Not available')
                {
                    /*
                    *updated 14-10-2017 by priya
                    *$("#BookLayoutInLibrary").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Book available.</div></div></center>")
                     */
                    $("#BookLayoutInLibrary").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-success my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Book available.</div></div></center>")

                    $(".mainheader").show();
                    $("#BookLayoutInLibrary").hide("fade", {}, 2000);
                    
                }
               else
                {    
                    var cont="<div class='row' style='margin-left:12%'><div class='col-md-6'><table class='table table-bordered table-condensed'>";
                    cont+="<tr><th>Book No</th><td>"+data[0]['book_no']+"</td></tr>";
                    if(data['teacher']==undefined)
                    {
                    cont+="<tr><th>Student Name</th><td>"+data[0]['name']+"</td></tr>";
                    }else{
                    cont+="<tr><th>Teacher Name</th><td>"+data[0]['name']+"</td></tr>";    
                    }
                    cont+="<tr><th>Book Name</th><td>"+data[0]['book_name']+"</td></tr>";
                    cont+="<tr><th>Issue Date</th><td>"+data[0]['issue_date']+"</td></tr>";
                    cont+="<tr><th>Issue Return Date</th><td>"+data[0]['return_date']+"</td></tr>";
                    cont+="<tr><th>Status</th><td>Not Available</td></tr>";
                    cont+="</table></div>";


                    $("#BookLayoutInLibrary").html(cont+"</div>");
                    
                }
            });
          
          
        }
        
    });
    $("#getTeacherInLibrary").click(function(){        
       $("#TeacherLayoutInLibrary").html("<div class='col-md-6 col-md-offset-3'>LOADING...</div>");
        $('.issuedet').hide();
        var username = $("#username").val();
        var book_no = $("#bookid").val();//updated 5-10-2017 by priya
        if(username=='')
        {
            $("#TeacherLayoutInLibrary").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Username No Can Not Be Empty</div></div></center>")
        }
        else
        {
            $.post("../get/teacher/library",
            {
                username : username,book_no : book_no//updated 5-10-2017 by priya
            }, function(data){
                if(data=='empty')
                {
                    //$("#TeacherLayoutInLibrary").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Registration No does not match with any Teacher</div></div></center>")
                    $("#TeacherLayoutInLibrary").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>This Book already issued to this User Name</div></div></center>");
                }
                else
                {
                    var cont="<div class='row col-md-12' style='margin-left:2%'><div class='col-md-6'><table class='table table-bordered table-condensed'>";
                    cont+="<tr><th>Teacher Id</th><td>"+data.teacher['id']+"</td></tr>";
                    cont+="<tr><th>Teacher Name</th><td>"+data.teacher['name']+"</td></tr>";
                    cont+="<tr><th>Teacher Email</th><td>"+data.teacher['email']+"</td></tr>";
//                    cont+="<tr><th>Class</th><td>"+data.student['class']+"</td></tr>";
//                    cont+="<tr><th>Section</th><td>"+data.student['section']+"</td></tr>";
                    cont+="</table></div></div>";

                    cont+="<div class='row' style='margin-left:3%'><div class='col-md-6'><table class='table table-bordered table-condensed'><tr><th>Book No</th><th>Subject</th><th>Issue Date</th><th>Return Date</th></tr>";
                    for(me in data.library)
                    {
                        cont+="<tr><td>"+data.library[me]['book_no']+"</td>";
                        cont+="<td>"+data.library[me]['subject']+"</td>";
                        cont+="<td>"+data.library[me]['issue_date']+"</td>";
                        cont+="<td>"+data.library[me]['return_date']+"</td></tr>";
                    }

                    $("#TeacherLayoutInLibrary").html(cont+"</table></div></div>");
                    $(".issuedet").show();
                }
            });
        }
    });
    // $("#getStudentInLibrary").click(function(){
    //     $("#StudentLayoutInLibrary").html("<div class='col-md-6 col-md-offset-3'>LOADING...</div>");
    //     var reg_no = $("#RegNoInLibrary").val();
    //     if(reg_no=='')
    //     {
    //         $("#StudentLayoutInLibrary").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Registration No Can Not Be Empty</div></div></center>")
    //     }
    //     else
    //     {
    //         $.post("../get/student/library",
    //         {
    //             reg_no : reg_no
    //         }, function(data){
    //             if(data=='empty')
    //             {
    //                 $("#StudentLayoutInLibrary").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Registration No does not match with any Student</div></div></center>")
    //             }
    //             else
    //             {
    //                 var cont="<div class='row'><div class='col-md-6'><table class='table table-bordered table-condensed'>";
    //                 cont+="<tr><th>Student Name</th><td>"+data.student['name']+"</td></tr>";
    //                 cont+="<tr><th>Roll No</th><td>"+data.student['roll_no']+"</td></tr>";
    //                 cont+="<tr><th>Registration No</th><td>"+data.student['registration_no']+"</td></tr>";
    //                 cont+="<tr><th>Class</th><td>"+data.student['class']+"</td></tr>";
    //                 cont+="<tr><th>Section</th><td>"+data.student['section']+"</td></tr>";
    //                 cont+="</table></div>";

    //                 cont+="<div class='col-md-6'><table class='table table-bordered table-condensed'><tr><th>Book No</th><th>Subject</th><th>Issue Date</th><th>Return Date</th></tr>";
    //                 for(me in data.library)
    //                 {
    //                     cont+="<tr><td>"+data.library[me]['book_no']+"</td>";
    //                     cont+="<td>"+data.library[me]['subject']+"</td>";
    //                     cont+="<td>"+data.library[me]['issue_date']+"</td>";
    //                     cont+="<td>"+data.library[me]['return_date']+"</td></tr>";
    //                 }

    //                 $("#StudentLayoutInLibrary").html(cont+"</table></div></div>");
    //             }
    //         });
    //     }
    // });

    // $("#getBook").click(function(){
    //     $("#BookLayout").html("<div class='col-md-6 col-md-offset-3'>LOADING...</div>");
    //     var book_no = $("#book_no").val();
    //     if(book_no=='')
    //     {
    //         $("#BookLayout").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Book No Can Not Be Empty</div></div></center>")
    //     }
    //     else
    //     {
    //         $.post("../book/info", {book_no:book_no},
    //         function(data){
    //             if(data=='empty')
    //             {
    //                 $("#BookLayout").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Book No does not match</div></div></center>")
    //             }
    //             else
    //             {
    //                 console.log(data);
    //                 var cont="<div class='row'><div class='col-md-6 col-md-offset-1'><table class='table table-bordered table-condensed'>";
    //                 cont+="<tr><th>Student Name</th><td>"+data.bookInfo['name']+"</td></tr>";
    //                 cont+="<tr><th>Registration No</th><td>"+data.bookInfo['registration_no']+"</td></tr>";
    //                 cont+="<tr><th>Book No</th><td>"+data.bookInfo['book_no']+"</td></tr>";
    //                 cont+="<tr><th>Issue Date</th><td>"+data.bookInfo['issue_date']+"</td></tr>";
    //                 cont+="<tr><th>Return Date</th><td>"+data.bookInfo['return_date']+"</td></tr>";
    //                 cont+="<tr><th>Fine</th><td>"+data.fine+"</td></tr></table></div>";
    //                 cont+="<tr><td><a href='#' class='btn btn-primary'><i class='fa fa-print'></i> Receipt</a></td></tr>";
    //                 cont+="<input type='hidden' name='fine' value='"+data.fine+"'>";

    //                 $("#BookLayout").html(cont+"</div>");
    //             }
    //         });
    //     }
    // });
$("#getStudentInLibrary").click(function(){
        $("#StudentLayoutInLibrary").html("<div class='col-md-6 col-md-offset-3'>LOADING...</div>");
        $('.issuedet').hide();
        var reg_no = $("#RegNoInLibrary").val();
        var book_no = $("#bookid").val();//updated 5-10-2017 by priya
        if(reg_no=='')
        {
            $("#StudentLayoutInLibrary").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Registration No Can Not Be Empty</div></div></center>")
        }
        else
        {
            $.post("../get/student/library",
            {
                //reg_no : reg_no
                reg_no : reg_no,book_no : book_no//updated 5-10-2017 by priya
            }, function(data){
                if(data=='null')
                {
                    //$("#StudentLayoutInLibrary").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Registration No does not match with any Student</div></div></center>")
                    $("#StudentLayoutInLibrary").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>This Book already issued to this Registration No</div></div></center>");
                }
                else
                {
                    var cont="<div class='row col-md-12' style='margin-left:2%'><div class='col-md-6'><table class='table table-bordered table-condensed'>";
                    cont+="<tr><th>Student Name</th><td>"+data.student['name']+"</td></tr>";
                    cont+="<tr><th>Roll No</th><td>"+data.student['roll_no']+"</td></tr>";
                    cont+="<tr><th>Registration No</th><td>"+data.student['registration_no']+"</td></tr>";
                    cont+="<tr><th>Class</th><td>"+data.student['class']+"</td></tr>";
                    cont+="<tr><th>Section</th><td>"+data.student['section']+"</td></tr>";
                    cont+="</table></div></div>";

                    cont+="<div class='row' style='margin-left:3%'><div class='col-md-6'><table class='table table-bordered table-condensed'><tr><th>Book No</th><th>Subject</th><th>Issue Date</th><th>Return Date</th></tr>";
                    for(me in data.library)
                    {
                        cont+="<tr><td>"+data.library[me]['book_no']+"</td>";
                        cont+="<td>"+data.library[me]['subject']+"</td>";
                        cont+="<td>"+data.library[me]['issue_date']+"</td>";
                        cont+="<td>"+data.library[me]['return_date']+"</td></tr>";
                    }

                    $("#StudentLayoutInLibrary").html(cont+"</table></div></div>");
                    $(".issuedet").show();
                }
            });
        }
    });

//     $("#getBook").click(function(){
//         $("#BookLayout").html("<div class='col-md-6 col-md-offset-3'>LOADING...</div>");
//         var book_no = $("#book_no").val();
//         if(book_no=='')
//         {
//             $("#BookLayout").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Book No Can Not Be Empty</div></div></center>")
//         }
//         else
//         {
//             $.post("../book/info", {book_no:book_no},
//             function(data){
//                 if(data=='empty')
//                 {
//                     $("#BookLayout").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Book No does not match</div></div></center>")
//                 }
//                 else
//                 {
//                     //console.log(data);

//                     cont+="<tr><th>Student Name</th><td>"+data.bookInfo['name']+"</td></tr>";
// //                     if(data.bookInfo['registration_no']!=undefined){
//                     var cont="<div class='row'><div class='col-md-6 col-md-offset-1'><table class='table table-bordered table-condensed'>";                    cont+="<tr><th>Registration No</th><td>"+data.bookInfo['registration_no']+"</td></tr>";
//                     cont+="<tr><th>Book No</th><td>"+data.bookInfo['book_no']+"</td></tr>";
//                     cont+="<tr><th>Issue Date</th><td>"+data.bookInfo['issue_date']+"</td></tr>";
//                     cont+="<tr><th>Return Date</th><td>"+data.bookInfo['return_date']+"</td></tr>";
//                     cont+="<tr><th>Fine</th><td>"+data.fine+"</td></tr></table></div>";
// //                    cont+="<tr><td><a href='#' class='btn btn-primary'><i class='fa fa-print'></i> Receipt</a></td></tr>";
//                     cont+="<input type='hidden' name='fine' value='"+data.fine+"'>";

//                     $("#BookLayout").html(cont+"</div>");
//                     }
//                     else
//                     {
//                         var cont="<div class='row'><div class='col-md-6 col-md-offset-1'><table class='table table-bordered table-condensed'>";
//                     cont+="<tr><th>Teacher Name</th><td>"+data.bookInfo['name']+"</td></tr>";
//                     cont+="<tr><th>Book No</th><td>"+data.bookInfo['book_no']+"</td></tr>";
//                     cont+="<tr><th>Issue Date</th><td>"+data.bookInfo['issue_date']+"</td></tr>";
//                     cont+="<tr><th>Return Date</th><td>"+data.bookInfo['return_date']+"</td></tr>";
//                     cont+="<tr><th>Fine</th><td>"+data.fine+"</td></tr></table></div>";
// //                    cont+="<tr><td><a href='#' class='btn btn-primary'><i class='fa fa-print'></i> Receipt</a></td></tr>";
//                     cont+="<input type='hidden' name='fine' value='"+data.fine+"'>";

//                     $("#BookLayout").html(cont+"</div>");
//                     }
//                     }
                
//             });
//         }
//     });
    $("#getBook").click(function()
    {
        //$("#BookLayout").html("<div class='col-md-6 col-md-offset-3'>LOADING...</div>");
        console.log($("#book_no").val());
        var book_no = $("#book_no").val();
        $(".mainheader").hide();
        $(".childdivteacher").hide();
        $(".childdivstudent").hide();
        $("#BookLayout").show();
                    
        if(book_no=='')
        {
            $("#BookLayout").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Book No Can Not Be Empty</div></div></center>")
        }
        else
        {
            
            console.log(book_no);
            $("#BookLayout").html();
            $(".mainheader").hide();
            //$("#BookLayout").html("<div class='col-md-6 col-md-offset-3'>LOADING...</div>");
            $.post("../book/info", {book_no:book_no},
            function(data)
            {
                if(data=='empty')
                {
                    $("#BookLayout").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Book No does not match</div></div></center>")
                }
                else
                {  //alert(data);exit;
                    /*
                  *updated 14-10-2017 by priya
                  $("#BookLayout").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Book available.</div></div></center>")
                   */
                    $("#BookLayout").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-success my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Book available.</div></div></center>")
                    $(".mainheader").show();
                    $("#BookLayout").hide("fade", {}, 2000);
                }

                
            });
        }
    });
        
   /* $("#getStudentLibrary").click(function()
    {
        $("#StudentLayoutInLibrary").html("<div class='col-md-6 col-md-offset-3'>LOADING...</div>");
        var book_no = $("#book_no").val();
        var reg_no = $("#RegNoInLibrary").val();
        if(reg_no=='')
        {
            $("#StudentLayoutInLibrary").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Registration No Can Not Be Empty</div></div></center>")
        }
        else
        {
            $.post("../get/student/library/detail",
            {
                //reg_no : reg_no
                reg_no : reg_no,book_no : book_no
            }, function(data)
            {
                //alert(data);exit;
                if(data=='empty')
                {
                    $("#StudentLayoutInLibrary").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Book is not issued to this Registration No.</div></div></center>")
                }
                else
                {
                    var cont="<div class='row col-md-12' style='margin-left:2%'><div class='col-md-6'><table class='table table-bordered table-condensed'>";
                    cont+="<tr><th>Student Name</th><td>"+data.student['name']+"</td></tr>";
                    cont+="<tr><th>Roll No</th><td>"+data.student['roll_no']+"</td></tr>";
                    cont+="<tr><th>Registration No</th><td>"+data.student['registration_no']+"</td></tr>";
                    cont+="<tr><th>Class</th><td>"+data.student['class']+"</td></tr>";
                    cont+="<tr><th>Section</th><td>"+data.student['section']+"</td></tr>";
                    cont+="</table></div></div>";

                    cont+="<div class='row' style='margin-left:3%'><div class='col-md-6'><table class='table table-bordered table-condensed'><tr><th>Book No</th><th>Subject</th><th>Issue Date</th><th>Return Date</th></tr>";
                    for(me in data.library)
                    {
                        cont+="<tr><td>"+data.library[me]['book_no']+"</td>";
                        cont+="<td>"+data.library[me]['subject']+"</td>";
                        cont+="<td>"+data.library[me]['issue_date']+"</td>";
                        cont+="<td>"+data.library[me]['return_date']+"</td></tr>";
                    }
                    // cont+="<tr><td>"+data.library['book_no']+"</td>";
                    // cont+="<td>"+data.library['subject']+"</td>";
                    // cont+="<td>"+data.library['issue_date']+"</td>";
                    // cont+="<td>"+data.library['return_date']+"</td></tr>";
                        
                    $("#StudentLayoutInLibrary").html(cont+"</table></div></div>");
                    
                }
            });
        }
    });
    
    $("#getTeacherLibrary").click(function()
    {        
       $("#TeacherLayoutInLibrary").html("<div class='col-md-6 col-md-offset-3'>LOADING...</div>");
        var username = $("#username").val();
        var book_no = $("#book_no").val();
        if(username=='')
        {
            $("#TeacherLayoutInLibrary").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Username No Can Not Be Empty</div></div></center>")
        }
        else
        {
            $.post("../get/teacher/library/detail",
            {
               // username : username
                username : username,book_no : book_no
            }, function(data)
            {
                //alert(data);exit;
                if(data=='empty')
                {
                    $("#TeacherLayoutInLibrary").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Book is not issued to this User Name</div></div></center>")
                }
                else
                {
                    var cont="<div class='row col-md-12' style='margin-left:2%'><div class='col-md-6'><table class='table table-bordered table-condensed'>";
                    cont+="<tr><th>Teacher Id</th><td>"+data.teacher['id']+"</td></tr>";
                    cont+="<tr><th>Teacher Name</th><td>"+data.teacher['name']+"</td></tr>";
                    cont+="<tr><th>Teacher Email</th><td>"+data.teacher['email']+"</td></tr>";
//                    cont+="<tr><th>Class</th><td>"+data.student['class']+"</td></tr>";
//                    cont+="<tr><th>Section</th><td>"+data.student['section']+"</td></tr>";
                    cont+="</table></div></div>";

                    cont+="<div class='row' style='margin-left:3%'><div class='col-md-6'><table class='table table-bordered table-condensed'><tr><th>Book No</th><th>Subject</th><th>Issue Date</th><th>Return Date</th></tr>";
                    for(me in data.library)
                    {
                        cont+="<tr><td>"+data.library[me]['book_no']+"</td>";
                        cont+="<td>"+data.library[me]['subject']+"</td>";
                        cont+="<td>"+data.library[me]['issue_date']+"</td>";
                        cont+="<td>"+data.library[me]['return_date']+"</td></tr>";
                    }
                    // cont+="<tr><td>"+data.library['book_no']+"</td>";
                    // cont+="<td>"+data.library['subject']+"</td>";
                    // cont+="<td>"+data.library['issue_date']+"</td>";
                    // cont+="<td>"+data.library['return_date']+"</td></tr>";

                    $("#TeacherLayoutInLibrary").html(cont+"</table></div></div>");
                }
            });
        }
    });*/
    $("#getStudentReturn").click(function()
    {
        //alert('asd');exit;
        $("#StudentLayoutInReturn").html("<div class='col-md-6 col-md-offset-3'>LOADING...</div>");
        var book_no = $("#book_no").val();
        var reg_no = $("#RegNoInLibrary").val();
        if(reg_no=='')
        {
            $("#StudentLayoutInReturn").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Registration No Can Not Be Empty</div></div></center>")
        }
        else
        {
            $.post("../get/student/library/detail",
                {
                    //reg_no : reg_no
                    reg_no : reg_no,book_no : book_no
                }, function(data)
                {
                    //alert(data);exit;
                    if(data=='empty')
                    {
                        $("#StudentLayoutInReturn").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Book is not issued to this Registration No.</div></div></center>")
                    }
                    else
                    {
                        var cont="<div class='row col-md-12' style='margin-left:2%'><div class='col-md-6'><table class='table table-bordered table-condensed'>";
                        cont+="<tr><th>Student Name</th><td>"+data.student['name']+"</td></tr>";
                        cont+="<tr><th>Roll No</th><td>"+data.student['roll_no']+"</td></tr>";
                        cont+="<tr><th>Registration No</th><td>"+data.student['registration_no']+"</td></tr>";
                        cont+="<tr><th>Class</th><td>"+data.student['class']+"</td></tr>";
                        cont+="<tr><th>Section</th><td>"+data.student['section']+"</td></tr>";
                        cont+="</table></div></div>";

                        cont+="<div class='row' style='margin-left:3%'><div class='col-md-6'><table class='table table-bordered table-condensed'><tr><th>Book No</th><th>Subject</th><th>Issue Date</th><th>Return Date</th></tr>";
                        for(me in data.library)
                        {
                            cont+="<tr><td>"+data.library[me]['book_no']+"</td>";
                            cont+="<td>"+data.library[me]['subject']+"</td>";
                            cont+="<td>"+data.library[me]['issue_date']+"</td>";
                            cont+="<td>"+data.library[me]['return_date']+"</td></tr>";
                        }
                        // cont+="<tr><td>"+data.library['book_no']+"</td>";
                        // cont+="<td>"+data.library['subject']+"</td>";
                        // cont+="<td>"+data.library['issue_date']+"</td>";
                        // cont+="<td>"+data.library['return_date']+"</td></tr>";

                        $("#StudentLayoutInReturn").html(cont+"</table></div></div>");

                    }
                });
        }
    });

    $("#getTeacherReturn").click(function()
    {
        $("#TeacherLayoutInReturn").html("<div class='col-md-6 col-md-offset-3'>LOADING...</div>");
        var username = $("#username").val();
        var book_no = $("#book_no").val();
        if(username=='')
        {
            $("#TeacherLayoutInReturn").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Username No Can Not Be Empty</div></div></center>")
        }
        else
        {
            $.post("../get/teacher/library/detail",
                {
                    // username : username
                    username : username,book_no : book_no
                }, function(data)
                {
                    //alert(data);exit;
                    if(data=='empty')
                    {
                        $("#TeacherLayoutInReturn").html("<center><div class='col-md-6 col-md-offset-1'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Book is not issued to this User Name</div></div></center>")
                    }
                    else
                    {
                        var cont="<div class='row col-md-12' style='margin-left:2%'><div class='col-md-6'><table class='table table-bordered table-condensed'>";
                        cont+="<tr><th>Teacher Id</th><td>"+data.teacher['id']+"</td></tr>";
                        cont+="<tr><th>Teacher Name</th><td>"+data.teacher['name']+"</td></tr>";
                        cont+="<tr><th>Teacher Email</th><td>"+data.teacher['email']+"</td></tr>";
//                    cont+="<tr><th>Class</th><td>"+data.student['class']+"</td></tr>";
//                    cont+="<tr><th>Section</th><td>"+data.student['section']+"</td></tr>";
                        cont+="</table></div></div>";

                        cont+="<div class='row' style='margin-left:3%'><div class='col-md-6'><table class='table table-bordered table-condensed'><tr><th>Book No</th><th>Subject</th><th>Issue Date</th><th>Return Date</th></tr>";
                        for(me in data.library)
                        {
                            cont+="<tr><td>"+data.library[me]['book_no']+"</td>";
                            cont+="<td>"+data.library[me]['subject']+"</td>";
                            cont+="<td>"+data.library[me]['issue_date']+"</td>";
                            cont+="<td>"+data.library[me]['return_date']+"</td></tr>";
                        }
                        // cont+="<tr><td>"+data.library['book_no']+"</td>";
                        // cont+="<td>"+data.library['subject']+"</td>";
                        // cont+="<td>"+data.library['issue_date']+"</td>";
                        // cont+="<td>"+data.library['return_date']+"</td></tr>";

                        $("#TeacherLayoutInReturn").html(cont+"</table></div></div>");
                    }
                });
        }
    });

    $("#reissue_data_box").hide(); 
    $("input[name=bookrel]").click(function(){
        var bookrel = $(this).val();
        console.log(bookrel);
        if(bookrel == 'reissue')
        {
            $("#reissue_data_box").show();
        }
        else
        {
            $("#reissue_data_box").hide();   
        }
    });

    $.mpb("show",{value: [0,50],speed: 5});        
    /* END PROGGRESS START */
    
    var html_click_avail = true;
    
    $("html").on("click", function(){
        if(html_click_avail)
            $(".x-navigation-horizontal li,.x-navigation-minimized li").removeClass('active');        
    });        
    
    $(".x-navigation-horizontal .panel").on("click",function(e){
        e.stopPropagation();
    });    
    
    /* WIDGETS (DEMO)*/
    $(".widget-remove").on("click",function(){
        $(this).parents(".widget").fadeOut(400,function(){
            $(this).remove();
            $("body > .tooltip").remove();
        });
        return false;
    });
    /* END WIDGETS */
    
    /* Gallery Items */
    $(".gallery-item .iCheck-helper").on("click",function(){
        var wr = $(this).parent("div");
        if(wr.hasClass("checked")){
            $(this).parents(".gallery-item").addClass("active");
        }else{            
            $(this).parents(".gallery-item").removeClass("active");
        }
    });
    $(".gallery-item-remove").on("click",function(){
        $(this).parents(".gallery-item").fadeOut(400,function(){
            $(this).remove();
        });
        return false;
    });
    $("#gallery-toggle-items").on("click",function(){
        
        $(".gallery-item").each(function(){
            
            var wr = $(this).find(".iCheck-helper").parent("div");
            
            if(wr.hasClass("checked")){
                $(this).removeClass("active");
                wr.removeClass("checked");
                wr.find("input").prop("checked",false);
            }else{            
                $(this).addClass("active");
                wr.addClass("checked");
                wr.find("input").prop("checked",true);
            }
            
        });
        
    });
    /* END Gallery Items */

    // XN PANEL DRAGGING
    $( ".xn-panel-dragging" ).draggable({
        containment: ".page-content", handle: ".panel-heading", scroll: false,
        start: function(event,ui){
            html_click_avail = false;
            $(this).addClass("dragged");
        },
        stop: function( event, ui ) {
            $(this).resizable({
                maxHeight: 400,
                maxWidth: 600,
                minHeight: 200,
                minWidth: 200,
                helper: "resizable-helper",
                start: function( event, ui ) {
                    html_click_avail = false;
                },
                stop: function( event, ui ) {
                    $(this).find(".panel-body").height(ui.size.height - 82);
                    $(this).find(".scroll").mCustomScrollbar("update");
                                            
                    setTimeout(function(){
                        html_click_avail = true; 
                    },1000);
                                            
                }
            })
            
            setTimeout(function(){
                html_click_avail = true; 
            },1000);            
        }
    });
    // END XN PANEL DRAGGING
    
    /* DROPDOWN TOGGLE */
    $(".dropdown-toggle").on("click",function(){
        onresize();
    });
    /* DROPDOWN TOGGLE */
    
    /* MESSAGE BOX */
    $(".mb-control").on("click",function(){
        var box = $($(this).data("box"));
        if(box.length > 0){
            box.toggleClass("open");
            
            var sound = box.data("sound");
            
            if(sound === 'alert')
                playAudio('alert');
            
            if(sound === 'fail')
                playAudio('fail');
            
        }        
        return false;
    });
    $(".mb-control-close").on("click",function(){
       $(this).parents(".message-box").removeClass("open");
       return false;
    });    
    /* END MESSAGE BOX */
    
    /* CONTENT FRAME */
    $(".content-frame-left-toggle").on("click",function(){
        $(".content-frame-left").is(":visible") 
        ? $(".content-frame-left").hide() 
        : $(".content-frame-left").show();
        page_content_onresize();
    });
    $(".content-frame-right-toggle").on("click",function(){
        $(".content-frame-right").is(":visible") 
        ? $(".content-frame-right").hide() 
        : $(".content-frame-right").show();
        page_content_onresize();
    });    
    /* END CONTENT FRAME */
    
    /* MAILBOX */
    $(".mail .mail-star").on("click",function(){
        $(this).toggleClass("starred");
    });
    
    $(".mail-checkall .iCheck-helper").on("click",function(){
        
        var prop = $(this).prev("input").prop("checked");
                    
        $(".mail .mail-item").each(function(){            
            var cl = $(this).find(".mail-checkbox > div");            
            cl.toggleClass("checked",prop).find("input").prop("checked",prop);                        
        }); 
        
    });
    /* END MAILBOX */
    
    /* PANELS */
    
    $(".panel-fullscreen").on("click",function(){
        panel_fullscreen($(this).parents(".panel"));
        return false;
    });
    
    $(".panel-collapse").on("click",function(){
        panel_collapse($(this).parents(".panel"));
        $(this).parents(".dropdown").removeClass("open");
        return false;
    });    
    $(".panel-remove").on("click",function(){
        panel_remove($(this).parents(".panel"));
        $(this).parents(".dropdown").removeClass("open");
        return false;
    });
    $(".panel-refresh").on("click",function(){
        var panel = $(this).parents(".panel");
        panel_refresh(panel);

        setTimeout(function(){
            panel_refresh(panel);
        },3000);
        
        $(this).parents(".dropdown").removeClass("open");
        return false;
    });
    /* EOF PANELS */
    
    /* ACCORDION */
    $(".accordion .panel-title a").on("click",function(){
        
        var blockOpen = $(this).attr("href");
        var accordion = $(this).parents(".accordion");        
        var noCollapse = accordion.hasClass("accordion-dc");
        
        
        if($(blockOpen).length > 0){            
            
            if($(blockOpen).hasClass("panel-body-open")){
                $(blockOpen).slideUp(200,function(){
                    $(this).removeClass("panel-body-open");
                });
            }else{
                $(blockOpen).slideDown(200,function(){
                    $(this).addClass("panel-body-open");
                });
            }
            
            if(!noCollapse){
                accordion.find(".panel-body-open").not(blockOpen).slideUp(200,function(){
                    $(this).removeClass("panel-body-open");
                });                                           
            }
            
            return false;
        }
        
    });
    /* EOF ACCORDION */
    
    /* DATATABLES/CONTENT HEIGHT FIX */
    $(".dataTables_length select").on("change",function(){
        onresize();
    });
    /* END DATATABLES/CONTENT HEIGHT FIX */
    
    /* TOGGLE FUNCTION */
    $(".toggle").on("click",function(){
        var elm = $("#"+$(this).data("toggle"));
        if(elm.is(":visible"))
            elm.addClass("hidden").removeClass("show");
        else
            elm.addClass("show").removeClass("hidden");
        
        return false;
    });
    /* END TOGGLE FUNCTION */
    
    /* MESSAGES LOADING */
    $(".messages .item").each(function(index){
        var elm = $(this);
        setInterval(function(){
            elm.addClass("item-visible");
        },index*300);              
    });
    /* END MESSAGES LOADING */
    
    x_navigation();
});

$(function(){            
    onload();

    /* PROGGRESS COMPLETE */
    $.mpb("update",{value: 100, speed: 5, complete: function(){            
        $(".mpb").fadeOut(200,function(){
            $(this).remove();
        });
    }});
    /* END PROGGRESS COMPLETE */
});

$(window).resize(function(){
    x_navigation_onresize();
    page_content_onresize();
});

function onload(){
    x_navigation_onresize();    
    page_content_onresize();
}

function page_content_onresize(){
    $(".page-content,.content-frame-body,.content-frame-right,.content-frame-left").css("width","").css("height","");
    
    var content_minus = 0;
    content_minus = ($(".page-container-boxed").length > 0) ? 40 : content_minus;
    content_minus += ($(".page-navigation-top-fixed").length > 0) ? 50 : 0;
    
    var content = $(".page-content");
    var sidebar = $(".page-sidebar");
    
    if(content.height() < $(document).height() - content_minus){        
        content.height($(document).height() - content_minus);
    }        
    
    if(sidebar.height() > content.height()){        
        content.height(sidebar.height());
    }
    
    if($(window).width() > 1024){
        
        if($(".page-sidebar").hasClass("scroll")){
            if($("body").hasClass("page-container-boxed")){
                var doc_height = $(document).height() - 40;
            }else{
                var doc_height = $(window).height();
            }
           $(".page-sidebar").height(doc_height);
           
       }
       
        if($(".content-frame-body").height() < $(document).height()-162){
            $(".content-frame-body,.content-frame-right,.content-frame-left").height($(document).height()-162);            
        }else{
            $(".content-frame-right,.content-frame-left").height($(".content-frame-body").height());
        }
        
        $(".content-frame-left").show();
        $(".content-frame-right").show();
    }else{
        $(".content-frame-body").height($(".content-frame").height()-80);
        
        if($(".page-sidebar").hasClass("scroll"))
           $(".page-sidebar").css("height","");
    }
    
    if($(window).width() < 1200){
        if($("body").hasClass("page-container-boxed")){
            $("body").removeClass("page-container-boxed").data("boxed","1");
        }
    }else{
        if($("body").data("boxed") === "1"){
            $("body").addClass("page-container-boxed").data("boxed","");
        }
    }
}

/* PANEL FUNCTIONS */
function panel_fullscreen(panel){    
    
    if(panel.hasClass("panel-fullscreened")){
        panel.removeClass("panel-fullscreened").unwrap();
        panel.find(".panel-body,.chart-holder").css("height","");
        panel.find(".panel-fullscreen .fa").removeClass("fa-compress").addClass("fa-expand");        
        
        $(window).resize();
    }else{
        var head    = panel.find(".panel-heading");
        var body    = panel.find(".panel-body");
        var footer  = panel.find(".panel-footer");
        var hplus   = 30;
        
        if(body.hasClass("panel-body-table") || body.hasClass("padding-0")){
            hplus = 0;
        }
        if(head.length > 0){
            hplus += head.height()+21;
        } 
        if(footer.length > 0){
            hplus += footer.height()+21;
        } 

        panel.find(".panel-body,.chart-holder").height($(window).height() - hplus);
        
        
        panel.addClass("panel-fullscreened").wrap('<div class="panel-fullscreen-wrap"></div>');        
        panel.find(".panel-fullscreen .fa").removeClass("fa-expand").addClass("fa-compress");
        
        $(window).resize();
    }
}

function panel_collapse(panel,action,callback){

    if(panel.hasClass("panel-toggled")){        
        panel.removeClass("panel-toggled");
        
        panel.find(".panel-collapse .fa-angle-up").removeClass("fa-angle-up").addClass("fa-angle-down");

        if(action && action === "shown" && typeof callback === "function")
            callback();            

        onload();
                
    }else{
        panel.addClass("panel-toggled");
                
        panel.find(".panel-collapse .fa-angle-down").removeClass("fa-angle-down").addClass("fa-angle-up");

        if(action && action === "hidden" && typeof callback === "function")
            callback();

        onload();        
        
    }
}
function panel_refresh(panel,action,callback){        
    if(!panel.hasClass("panel-refreshing")){
        panel.append('<div class="panel-refresh-layer"><img src="img/loaders/default.gif"/></div>');
        panel.find(".panel-refresh-layer").width(panel.width()).height(panel.height());
        panel.addClass("panel-refreshing");
        
        if(action && action === "shown" && typeof callback === "function") 
            callback();
    }else{
        panel.find(".panel-refresh-layer").remove();
        panel.removeClass("panel-refreshing");
        
        if(action && action === "hidden" && typeof callback === "function") 
            callback();        
    }       
    onload();
}
function panel_remove(panel,action,callback){    
    if(action && action === "before" && typeof callback === "function") 
        callback();
    
    panel.animate({'opacity':0},200,function(){
        panel.parent(".panel-fullscreen-wrap").remove();
        $(this).remove();        
        if(action && action === "after" && typeof callback === "function") 
            callback();
        
        
        onload();
    });    
}
/* EOF PANEL FUNCTIONS */

/* X-NAVIGATION CONTROL FUNCTIONS */
function x_navigation_onresize(){    
    
    var inner_port = window.innerWidth || $(document).width();
    
    if(inner_port < 1025){               
        $(".page-sidebar .x-navigation").removeClass("x-navigation-minimized");
        $(".page-container").removeClass("page-container-wide");
        $(".page-sidebar .x-navigation li.active").removeClass("active");
        
                
        $(".x-navigation-horizontal").each(function(){            
            if(!$(this).hasClass("x-navigation-panel")){                
                $(".x-navigation-horizontal").addClass("x-navigation-h-holder").removeClass("x-navigation-horizontal");
            }
        });
        
        
    }else{        
        if($(".page-navigation-toggled").length > 0){
            x_navigation_minimize("close");
        }       
        
        $(".x-navigation-h-holder").addClass("x-navigation-horizontal").removeClass("x-navigation-h-holder");                
    }
    
}

function x_navigation_minimize(action){
    
    if(action == 'open'){
        $(".page-container").removeClass("page-container-wide");
        $(".page-sidebar .x-navigation").removeClass("x-navigation-minimized");
        $(".x-navigation-minimize").find(".fa").removeClass("fa-indent").addClass("fa-dedent");
        $(".page-sidebar.scroll").mCustomScrollbar("update");
    }
    
    if(action == 'close'){
        $(".page-container").addClass("page-container-wide");
        $(".page-sidebar .x-navigation").addClass("x-navigation-minimized");
        $(".x-navigation-minimize").find(".fa").removeClass("fa-dedent").addClass("fa-indent");
        $(".page-sidebar.scroll").mCustomScrollbar("disable",true);
    }
    
    $(".x-navigation li.active").removeClass("active");
    
}

function x_navigation(){
    
    $(".x-navigation-control").click(function(){
        $(this).parents(".x-navigation").toggleClass("x-navigation-open");
        
        onresize();
        
        return false;
    });

    if($(".page-navigation-toggled").length > 0){
        x_navigation_minimize("close");
    }    
    
    $(".x-navigation-minimize").click(function(){
                
        if($(".page-sidebar .x-navigation").hasClass("x-navigation-minimized")){
            $(".page-container").removeClass("page-navigation-toggled");
            x_navigation_minimize("open");
        }else{            
            $(".page-container").addClass("page-navigation-toggled");
            x_navigation_minimize("close");            
        }
        
        onresize();
        
        return false;        
    });
       
    $(".x-navigation  li > a").click(function(){
        
        var li = $(this).parent('li');        
        var ul = li.parent("ul");
        
        ul.find(" > li").not(li).removeClass("active");    
        
    });
    
    $(".x-navigation li").click(function(event){
        event.stopPropagation();
        
        var li = $(this);
                
            if(li.children("ul").length > 0 || li.children(".panel").length > 0 || $(this).hasClass("xn-profile") > 0){
                if(li.hasClass("active")){
                    li.removeClass("active");
                    li.find("li.active").removeClass("active");
                }else
                    li.addClass("active");
                    
                onresize();
                
                if($(this).hasClass("xn-profile") > 0)
                    return true;
                else
                    return false;
            }                                     
    });
    
    /* XN-SEARCH */
    $(".xn-search").on("click",function(){
        $(this).find("input").focus();
    })
    /* END XN-SEARCH */
    
}
/* EOF X-NAVIGATION CONTROL FUNCTIONS */

/* PAGE ON RESIZE WITH TIMEOUT */
function onresize(timeout){    
    timeout = timeout ? timeout : 200;

    setTimeout(function(){
        page_content_onresize();
    },timeout);
}
/* EOF PAGE ON RESIZE WITH TIMEOUT */

/* PLAY SOUND FUNCTION */
function playAudio(file){
    if(file === 'alert')
        document.getElementById('audio-alert').play();

    if(file === 'fail')
        document.getElementById('audio-fail').play();    
}
/* END PLAY SOUND FUNCTION */

/* NEW OBJECT(GET SIZE OF ARRAY) */
Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};
/* EOF NEW OBJECT(GET SIZE OF ARRAY) */

$(".searchStudent").keyup(function(){
    if($(this).val() == '')
    {
        $('.dropBox').hide();
    }
    if($(this).val().length >=1)
    {
        $.post('../search/student', {search:$(this).val()}).then(function(res){
            $('.dropBox').show();
            var data = '';
            for(me in res.data)
            {
                console.log(res.data[me], me);
                data = "<tr onClick='openFee("+res.data[me]['id']+")' style='cursor:pointer'><a href='' class='searchList'><td>Name : "+res.data[me]['name']+"</td><td>Reg.No : "+res.data[me]['registration_no']+"</td><td>Class : "+res.data[me]['class']+"</td></a></tr>";
            }
            $('#result').html(data);
        }, function(error){
            $('.dropBox').hide();
        });
    }
});

var save_balance = 0;
function openFee(id)
{
    $('.dropBox').hide();
    $.get('../get/student/info/'+id).then(function(res){
        console.log(res);
        $(".studentImg").attr('src', 'http://stjosephspallalakuppam.in/'+res.data['avatar']);
        $("#student_id").attr('value', res.data['id']);
        $('#regNo').html(res.data['registration_no']);
        $('#class').html(res.data['class']);
        $('#section').html(res.data['section']);
        $('#name').html(res.data['name']);
        $('#father').html(res.data['father']);
        $('#mother').html(res.data['mother']);
        $('#dob').html(res.data['dob']);
        $('#email').html(res.data['email']);
        $('#mobile').html(res.data['mobile']);
        $('#admission').html(res.admission_fee);
        $('#registration').html(res.registration);
        $('#security').html(res.security);
        $('#annual').html(res.annual);
        $('#total_fee').html(res.total_fee);
        var fee1 = '';
        for(ann in res.annualfee)
        {   
            fee1 += '<tr><td>'+res.annualfee[ann]['fee_head']+'</td><td>'+res.annualfee[ann]['amount']+'</td></tr>' 
        }   
        $('#priceList1').html(fee1);
        $('#pay_balance').html(res.pay);
        $('#total_discount').html(res.total_discount);
        $('#balance').html(res.balance);
        if(res.data['bus_stop_id'] != null && res.data['transport_fee'] != null)
        {
            $('#bus_stop_id').html('<td>Transport Fee</td><td>'+res.data['transport_fee']+ '</td>');
        }
        else
        {
            $('#bus_stop_id').hide();
        }
        save_balance = res.balance;
        var monthData = '';
        for(me in res.months)
        {
            if(res.months[me]['status'] == '1')
            {
                monthData+="<li><label><input type='checkbox' onClick='getFeeHead("+res.months[me]['month']+")' checked disabled class='check_month' name='month[]'' value="+res.months[me]['month']+"> "+res.months[me]['name']+"</label></li>";
            }   
            else
            {
                monthData+="<li><label><input type='checkbox' onClick='getFeeHead("+res.months[me]['month']+")' class='check_month' name='month[]' value="+res.months[me]['month']+"> "+res.months[me]['name']+"</label></li>"
            }

        }
        $("#months").html(monthData);
        var heads = '';
        for(me in res.head)
        {
            heads += "<tr><td>"+res.head[me]['fee_head']+"</td><td>"+res.head[me]['amount']+"</td></tr>";
        }
        heads += "<tr><td>Total</td><td>"+res.total+"</td></tr>";
        $('#priceList').html(heads);
    }, function(error){

    });
}
var sel_month = [];
function getFeeHead(month){
        if($.inArray(month,sel_month) == -1)
        {
            sel_month.push(month);
        }
        else
        {
            sel_month.splice($.inArray(month,sel_month), 1);
        }
        var month_length = sel_month.length;
        var student_id = $('#student_id').val();
        var subData ='';
        $.get('../get/fee/head/'+ student_id+ '/' +month_length).then(function(res){
            for(me in res.data)
            {
                subData += "<tr><td>"+res.data[me]['fee_head']+"</td><td>"+res.data[me]['amount']+"</td></tr>";
            }
            subData += "<tr><td>Total</td><td>"+res.total+"</td></tr>" ;
            $('#priceList').html(subData);
        });

  };

$('.month').hide();
$('.annual').hide();
$('.paymentType').change(function(){
    if($(this).val() == 'month')
    {
        $('.month').show();
        $('.annual').hide();
    }
    else
    {
        $('.month').hide();
        $('.annual').show();
    }
});

$('#discount').change(function(){

    if($(this).val() != '')
    {
        var balance = parseFloat($('#balance').html());
        var dis = parseFloat($(this).val());
        console.log(balance, dis);
        $('#balance').html(balance - dis);    
    }
    else
    {
        $('#balance').html(save_balance);
    }
    
});

$('#head_type').change(function(){

    $.get('../../get/fee/head/'+ $(this).val()).then(function(res){
        console.log(res);
    var typehead = '<option>Choose Fee Head</option>';
    for(headtype in res.data)
    {
        typehead += '<option value="'+res.data[headtype]['id']+'">'+res.data[headtype]['fee_head']+'</option>'
    }   
    $('#head').html(typehead);
    });


});

$('.print').click(function(){
    var innerContents = document.getElementById('printReciept').innerHTML;
        var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');
        popupWinindow.document.open();
        popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="http://stjosephspallalakuppam.in/users/css/bootstrap/bootstrap.min.css" /><link rel="stylesheet" type="text/css" href="users/assets/styles.css" /></head><body onload="window.print()">' + innerContents + '</html>');
        popupWinindow.document.close();
});
/********* updated 25-10-2017  by priya ***********/

    /*********************************************************************
                                REPORT MODULE
    *********************************************************************/

    $(".analystTeacher").change(function()
    {
        var srclass =  $(".analystTeacher").val();
        if(srclass == 0)
        {
            // alert(srclass);exit;
            //$('.analystExam').attr('disabled', 'disabled');
            $('.analystclass').attr('disabled', 'disabled');
        }
    });

    $(".analystclass").change(function()
    {
        var srclass =  $(".analystclass").val();
        if(srclass!="")
        {
            $.post("../../get/student/section/ajax",
                {
                    srclass:srclass
                },
                function(data)
                {
                    $('.analystTeacher').attr('disabled', 'disabled');
                    $(".homeexamsection").removeAttr('disabled');
                    var cont="<select class='form-control homeexamsection' name='section'><option value=''>Select Section</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['section']+"</option>";
                    }
                    $('.examsection').html(cont+"</select>");
                });
        }
    });

    /********* updated 31-10-2017  by priya ***********/

    /*********************************************************************
                            ADD MARKS MODULE
    *********************************************************************/

    /*** @ To get Section based on class_id @  ***/
    $(".markClass").change(function()
    {
        //alert(123);
        var srclass =  $(".markClass").val();
        if(srclass!="")
        {
            $.post("../get/section/ajax",
                {
                    srclass:srclass
                },
                function(data)
                {
                    $(".mark_section").removeAttr('disabled');
                    var cont="<select class='form-control mark_section' name='section'><option value=''>Select Section</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['section']+"</option>";
                    }
                    $('.student_section').html(cont+"</select>");
                });
        }
    });

    $(".student_section").change(function()
    {
        $.post("../add/students/marks/section",
            {}, function(data)
            {
                //alert(data);
                $(".examtype").removeAttr('disabled');
                var exam="<select class='form-control examtype' name='exam'><option value=''>Select Exam</option>";
                for(me in data)
                {
                    exam+= "<option value='"+data[me]['id']+"'>"+data[me]['exam_type']+"</option>";
                }
                $('.get_exam_type').html(exam+"</select>");
            });
    });

    $(".get_exam_type").change(function()
    {
        var srclass =  $(".markClass").val();
        var srcsection =  $(".mark_section").val();
        if(srcsection!="")
        {
            $.post("../add/students/marks/teacher",
                {
                    srcclass:srclass,srcsection:srcsection
                },
                function(data)
                {
                    //alert(data);
                    $(".mark_teacher").removeAttr('disabled');
                    var cont="<select class='form-control mark_teacher' name='teacher'><option value=''>Select Teacher</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['name']+"</option>";
                    }
                    $('.teacher_result').html(cont+"</select>");
                });
        }
    });

    /*** @ To get Teacher & Exam Type based on class_id & Section from time table @  ***
    * Updated
    *$(".student_section").change(function()
    {
        var srclass =  $(".markClass").val();
        var srcsection =  $(".mark_section").val();
        if(srcsection!="")
        {
            //alert(123);
            $.post("../add/students/marks/section",
                {
                    srcclass:srclass,srcsection:srcsection
                },
                function(data)
                {
                    //alert(data);
                    $(".mark_teacher").removeAttr('disabled');
                    //$(".examtype").removeAttr('disabled');
                    var cont="<select class='form-control mark_teacher' name='teacher'><option value=''>Select Teacher</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['name']+"</option>";
                    }
                    $('.teacher_result').html(cont+"</select>");


                    var exam="<select class='form-control examtype' name='exam'><option value=''>Select Exam</option>";
                    for(me in data.examType)
                    {
                        exam+= "<option value='"+data.examType[me]['exam_id']+"'>"+data.examType[me]['exam_type']+"</option>";
                    }
                    $('.get_exam_type').html(exam+"</select>");
                    var cont="<select class='form-control mark_teacher' name='teacher'><option value=''>Select Teacher</option>";
                    for(row in data.teacherdetail)
                    {
                        cont+= "<option value='"+data.teacherdetail[row]['id']+"'>"+data.teacherdetail[row]['name']+"</option>";
                    }
                    $('.teacher_result').html(cont+"</select>");

                });
        }
    });
    *** @ To get Teacher based on class_id & Section from time table @  ***
    $(".get_exam_type").change(function()
    {
        var srclass =  $(".markClass").val();
        var srcsection =  $(".mark_section").val();
        var srcexam =  $(".examtype").val();
        if(srcsection!="")
        {
            //alert(123);
            $.post("../add/students/marks/section",
                {
                    srcclass:srclass,srcsection:srcsection,srcexam:srcexam
                },
                function(data)
                {
                    //alert(data);
                    $(".mark_teacher").removeAttr('disabled');
                    //$(".examtype").removeAttr('disabled');
                    var cont="<select class='form-control mark_teacher' name='teacher'><option value=''>Select Teacher</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['name']+"</option>";
                    }
                    $('.teacher_result').html(cont+"</select>");

                });
        }
    });*/


    /*** @ To get Subject based on class,Section,Teacher & Exam Type from time table @  ***/
    $(".teacher_result").change(function()
    {
        //alert(123);
        var srclass =  $(".markClass").val();
        var srcsection =  $(".mark_section").val();
        var srcteacher =  $(".mark_teacher").val();
        var srcexamtype =  $(".examtype").val();
        if(srcteacher!="")
        {
            $.post("../add/students/exam/result",
                {
                    srclass:srclass,
                    srcteacher:srcteacher,
                    srcsection:srcsection,
                    srcexamtype:srcexamtype
                },
                function(data)
                {
                    //alert(data);
                    $(".subject").removeAttr('disabled');
                    var cont="<select class='form-control subject' name='subject'><option value=''>Select Subject</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['subject']+"</option>";
                    }
                    $('.get_subject').html(cont+"</select>");
                });
        }
    });
 /********* updated 07-11-2017  by priya ***********/

    /*********************************************************************
     *                        EMPLOYEE ATTENDANCE MODULE
     *********************************************************************/
    $(".staff_type").change(function()
    {
        var srtype =  $(".staff_type").val();
        if(srtype!="")
        {
            $.post("../../get/staff/type/details",
                {
                    srtype:srtype
                },
                function(data)
                {
                    // alert(data);
                    $(".staff_name").removeAttr('disabled');
                    //var cont="<select class='js-example-basic-multiple form-control staff_name' multiple='multiple' name='name[]'><option value=''>Select Teacher</option>";
                    var cont="<select class='js-example-basic-multiple form-control staff_name'  name='name'><option value=''>Select Teacher</option>";

                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['name']+"</option>";
                    }
                    $('.attendance_teacher_name').html(cont+"</select>");
                });
        }
    });

    // $(".attendance_session_type").change(function()
    $(".present_date").change(function()
    {
        // alert(12);
        var srtype =  $(".staff_type").val();
        var staff_name =  $(".staff_name").val();
        var present_date =  $(".present_date").val();
        // var session =  $(".attendance_session_type").val();

        if(present_date != "")
        {
            //alert(45);
            $.post("../../get/staff/attendance/detail",
                {
                    srtype:srtype,
                    stname:staff_name,
                    predate:present_date
                    //session:session
                },
                function(data)
                {
                    //alert(data);
                    if(data == 'Has Value')
                    {
                        $("#getExistAttendance").html("<br/><center><div class='col-md-12'><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>Attendance has been added already to this Employee Id</div></div></center>");
                   		$("#getExistAttendance").hide("fade", {}, 5000);
                    }
                });
        }


    });

    $(".teacher_attendance_radio").change(function()
    {
        var value = $(this).val();
        //alert(value);
        if(value == 'L')
        {
            $("#in_time").attr('disabled', 'disabled');
            $("#out_time").attr('disabled', 'disabled');
        }
        else if(value == 'A')
        {
            $("#in_time").attr('disabled', 'disabled');
            $("#out_time").attr('disabled', 'disabled');
        }
        else
        {
            $("#in_time").removeAttr('disabled');
            $("#out_time").removeAttr('disabled');
        }
    });

    /*$(".edit_staff_type").on(function()
    {
        var srtype =  $(".edit_staff_type").val();
        if(srtype!="")
        {
            $.post("../../get/staff/type/details",
                {
                    srtype:srtype
                },
                function(data)
                {
                    // alert(data);
                    $(".staff_name").removeAttr('disabled');
                    var cont="<select class='js-example-basic-multiple form-control staff_name' multiple='multiple' name='name[]'><option value=''>Select Teacher</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['name']+"</option>";
                    }
                    $('.attendance_teacher_name').html(cont+"</select>");
                });
        }
    });*/

    $(".edit_session_type").click(function()
    {
        var value = $(this).val();
        // alert(value);
        var cont="<select class='form-control edit_session_type' name='session'><option value=''>Select Session</option>";
        if(value == 'AM')
        {
            cont+= "<option value='am' selected >AM</option>";
            cont+= "<option value='pm'>PM</option>";
        }
        else
        {
            cont+= "<option value='am'>AM</option>";
            cont+= "<option value='pm' selected>PM</option>";
        }
        $('.append_session_type').html(cont+"</select>");
    });

    $('.edit_attendance_radio').change(function()
    {
        var value = $(this).val();
        //alert(value);
        if(value == 'L')
        {
            $("#in_time").attr('disabled', 'disabled');
            $("#out_time").attr('disabled', 'disabled');
        }
        else if(value == 'A')
        {
            $("#in_time").attr('disabled', 'disabled');
            $("#out_time").attr('disabled', 'disabled');
        }
        else
        {
            $("#in_time").removeAttr('disabled');
            $("#out_time").removeAttr('disabled');
        }
    });

    /**************************************************************************
     *                          ADD PAYROLL REPORT
     ***************************************************************************/
    $(".payment_day").change(function()
    {
        //alert(123);
        var srdate =  $(".payment_day").val();
        if(srdate)
        {

            $.post("../../get/teacher/payroll/attendance",
                {
                    srdate:srdate
                },
                function(data)
                {
                    // alert(data);
                    $(".payroll_teacher").removeAttr('disabled');
                    var cont="<label class='control-label'>Select Employee <small>(required)</small></label><select class='custom-select mb-2 mr-sm-2 mb-sm-0 form-control payroll_teacher'  name='employee_id' required><option value=''>Select Employee Name</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['name']+"</option>";
                    }
                    $('.payroll_teacher_class').html(cont+"</select>");
                });


        }
    });

    function daysInMonth(month, year)
    {
        return new Date(year, month, 0).getDate();
    }

    $(".payroll_teacher_class").change(function()
    {
        //alert(123);
        var srteacher =  $(".payroll_teacher").val();
        var payment_day =  $(".payment_day").val();
        if(srteacher!="")
        {

            $.post("../../get/employee/payroll/all/details",
                {
                    srteacher:srteacher,payment_day:payment_day
                },
                function(data)
                {
                    //alert(data);
                    var total_days = daysInMonth(data.month,data.year);
                    for(me in data.employee_attendance)
                    {
                        var total_leave = data.employee_attendance[me]['total_leave_taken'];
                        var employee_salary = data.employee_attendance[me]['salary'];
                        var perDaySalary = employee_salary / total_days;

                        /*var total_bonus =0;
                        if(data.employee_bonus)
                        {
                            for(row2 in data.employee_bonus)
                            {
                                if(data.employee_attendance[me]['date'] == data.employee_bonus[row2]['date'])
                                {
                                    if(data.employee_attendance[me]['attendance'] == 'P')
                                    {
                                        if( data.employee_bonus[row2]['bonus']  )
                                        {
                                            var total_bonus = Math.round(total_bonus + data.employee_bonus[row2]['bonus']);
                                        }
                                    }
                                }
                            }
                        }*/
                    }

                    $('.total_leave_days').val(total_leave);
                    for(row1 in data.employee_allowed_leave)
                    {
                        if(data.employee_allowed_leave[row1]['allowed_leave'] >=12)
                        {
                            var allowed_leave = data.employee_allowed_leave[row1]['allowed_leave']/12;
                        }
                        else
                        {
                            var allowed_leave = data.employee_allowed_leave[row1]['allowed_leave'];
                        }
                        if(total_leave <= allowed_leave)
                        {
                            var worked_days = total_days;
                        }
                        else
                        {
                            var worked_days =(allowed_leave - total_leave) + total_days ;
                        }
                    }
                    if(!employee_salary)
                    {
                       // alert(123);
                        $(".displayEmployeeSalary").html("<center><div class='col-lg-12 '><div class='alert alert-danger my-alert' role='alert'><button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>This Employee has no Salary !!!</div></div></center>");
                        $(".displayEmployeeSalary").hide("fade", {}, 10000);
                    }
                    $('.basic_payroll_salary').val(employee_salary);
                    $('.basic_salary').val(employee_salary);
                    $('.basic_payroll_salary').attr('disabled', 'disabled');
                    $('.total_allowed_leave').val(allowed_leave);
                    $('.total_worked_days').val(worked_days);

                    /*updated 17-3-2018*/
                    $('.payroll_gross').val(employee_salary);

                    //$('.payroll_overtime').val(total_bonus);
                  //  $('.payroll_overtime_amnt').val(total_bonus);
                  //  $('.payroll_overtime').attr('disabled', 'disabled');

                });


        }
    });
    $(".payment_bonus_value").keydown(function()
    {
        //alert(123);
        var srteacher =  $(".payroll_teacher").val();
        var payment_day =  $(".payment_day").val();
        var payment_bonus =  $(".payroll_bonus").val();
        var payroll_allowance =  $(".payroll_allowance").val();
       // var payroll_overtime =  $(".payroll_overtime").val();
        var worked_days =  $(".total_worked_days").val();
        if(srteacher!="")
        {
            $.post("../../get/employee/payroll/gross/details",
                {
                    srteacher:srteacher,payment_day:payment_day,payment_bonus:payment_bonus
                },
                function(data)
                {
                    //alert(data.employee_details['salary']);
                    var total_days = daysInMonth(data.month,data.year);
                    var employee_salary = data.employee_details['salary'];
                    var perDaySalary = employee_salary / total_days;

                   /* if(payroll_overtime)
                    {
                        var salary = ( parseInt(worked_days * perDaySalary) +  parseInt(payroll_overtime));
                    }*/

                   /*updated 16-3-2018*/
                    var salary = ( perDaySalary * worked_days ) ;

                    // alert(salary);
                    if(!payroll_allowance)
                    {
                        payroll_allowance = 0;
                    }
                    if(!payment_bonus)
                    {
                        payment_bonus = 0;
                    }
                    /*****  end *****/

                    var gross = ( parseInt(salary) +  parseInt(payroll_allowance) +  parseInt(payment_bonus) );
                    // alert(gross);

                    var prof_tax = 0;
                    if(data.employee_pTax)
                    {
                        for(row3 in data.employee_pTax)
                        {
                            prof_tax = Math.round(salary *( data.employee_pTax[row3]['tax'] / 100))  ;
                        }
                    }

                    var getTotalPercent = 1 ;
                    if(data.employee_deductions)
                    {
                        for(row4 in data.employee_deductions)
                        {
                            getTotalPercent = data.employee_deductions[row4]['total_deduction_percent'] ;
                        }
                    }
                    /*updated 16-3-2018*/
                    var deduction = Math.round(employee_salary *( getTotalPercent / 100));

                    // var num = total_bonus.toPrecision(2);
                    $('.payroll_gross').val(gross);
                    $('.payroll_tax').val(prof_tax);
                    $('.payroll_tax_amount').val(prof_tax);
                    $('.payroll_tax').attr('disabled', 'disabled');
                    $('.payroll_deductions').val(deduction);
                    $('.payroll_deductions_amount').val(deduction);
                    $('.payroll_deductions').attr('disabled', 'disabled');

                });


        }
    });
     function change_distributed(val){
        if(val!=''){
            $.post('/users/get/category-type/list',
            {
                category:val,
            },
            function(data){
                $("#category").empty();
                cont="<option value=''></option>";
                 $.each(data, function( index, value ) {
                  cont+= "<option value='"+value['category']+"'>"+value['category']+"</option>";
                });  
                var options = $('#category').append(cont);
            });
        }
    }

    function change_subcategory(val){
        var category=$('#category').val();
        if(val!=''){
            $.post('/users/get/sub-category/list',
            {
                category:val,
            },
            function(data){
                console.log(data);
                $("#subcategory").removeAttr('disabled');
                $("#subcategory").empty();
                cont="<option value=''></option>";
                 $.each(data, function( index, value ) {
                  cont+= "<option value='"+value['sub_category']+"'>"+value['sub_category']+"</option>";
                });  
                var options = $('#subcategory').append(cont);
            });
        }
    }

    function get_section_id(val){
         if(val!=''){
            $.post('/users/get/distribute/section-id',
            {
                class_id:val,
            },
            function(data){
                console.log(data);
                $("#section_id").removeAttr('disabled');
                $("#section_id").empty();

                var cont="<option value=''></option>";
                $.each(data, function( index, value ) {
                  cont+= "<option value='"+value['id']+"'>"+value['section']+"</option>";
                });  
                console.log(cont);
               $('#section_id').append(cont);
            });
        }

    }
    function get_student_id(val){
         if(val!=''){
            $.post('/users/get/distribute/student-id',
            {
                class_id:$('#class_id').val(),
                section_id:val,
            },
            function(data){
                console.log(data);
                $("#Student_id").removeAttr('disabled');
                $("#Student_id").empty();

                var cont="<option value=''></option>";
                $.each(data, function( index, value ) {
                  cont+= "<option value='"+value['registration_no']+"'>"+value['name']+"</option>";
                });  
                console.log(cont);
               $('#Student_id').append(cont);
            });
        }

    }

    /*******************************************************************************
    *                           SYLLABUS MODULE
    * ******************************************************************************/

    $(".syllabus_class").change(function()
    {
        var srclass =  $(".syllabus_class").val();
        if(srclass!="")
        {
            $.post("../../get/syllabus/subject/ajax",
                {
                    srclass:srclass
                },
                function(data)
                {
                    console.log(data);
                    $(".syllabus_subject").removeAttr('disabled');
                    var cont="<select class='form-control syllabus_subject' name='subject'><option value=''>Select Subject</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['subject']+"</option>";
                    }
                    /*for (var i = 0; i < data.length; i++)
                    {
                        for(me in data[i])
                        {
                            cont+= "<option value='"+data[0][me]['id']+"'>"+data[0][me]['subject']+"</option>";
                        }
                    }*/
                    $('.syllabus_subject_div').html(cont+"</select>");
                });
        }
    });

/*********************************************************************
     *                        Previous Payment
     *********************************************************************/
    $(".ppaymentclass").change(function()
    {
        var srclass =  $(".ppaymentclass").val();
        if(srclass!="")
        {
            $.post("../../get/student/section/ajax",
                {
                    srclass:srclass
                },
                function(data)
                {
                    $(".homeppaymentsection").removeAttr('disabled');
                    var cont="<select class='form-control homeppaymentsection' name='section'><option value=''>Select Section</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['section']+"</option>";
                    }
                    $('.ppaymentsection').html(cont+"</select>");
                });
        }
    });
    $(".ppaymentsection").change(function()
    {
        var srclass =  $(".ppaymentclass").val();
        var srsection =  $(".homeppaymentsection").val();
        if(srclass!="")
        {
            $.post("../../get/previous/student/ajax",
                {
                    srclass:srclass,srsection:srsection
                },
                function(data)
                {
                    $(".homeppaymentstudent").removeAttr('disabled');
                    var cont="<select class='form-control homeppaymentstudent' name='student'><option value=''>Select Student</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['name']+"</option>";
                    }
                    $('.ppaymentstudent').html(cont+"</select>");
                });
        }
    });

/*******************************************************************************
 *                           UPGRADE MODULE
 * ******************************************************************************/

/** @ Updated 2-6-2018 by priya @ **/

$(".session").change(function()
{
    var srsession =  $(".session").val();
    if(srsession!="")
    {
        $.post("../get/session/class/ajax",
            {
                srsession:srsession
            },
            function(data)
            {
                $(".class").removeAttr('disabled');
                var cont="<select class='form-control class' name='class' id='upgradeClass'><option value=''>Select Class</option>";
                for(me in data)
                {
                    cont+= "<option value='"+data[me]['id']+"'>"+data[me]['class']+"</option>";
                }
                $('.upgrade_class').html(cont+"</select>");
            });
    }
});

$(".upgrade_class").change(function()
{
    var srclass =  $(".class").val();
    var srsession =  $(".session").val();
    //alert(srclass);
    if(srclass!="")
    {
        $.post("../get/upgrade/section/ajax",
            {
                srclass:srclass,srsession:srsession
            },
            function(data)
            {
                $(".upsection").removeAttr('disabled');
                var cont="<select class='form-control upsection' name='section'><option value=''>Select Section</option>";
                for(me in data)
                {
                    cont+= "<option value='"+data[me]['id']+"'>"+data[me]['section']+"</option>";
                }
                $('.upgrade_section').html(cont+"</select>");
            });
    }
});


/** @ New Session,class & section to upgrade @  **/
$(".new_session").change(function()
{
    var srsession =  $(".new_session").val();
    if(srsession!="")
    {
        $.post("../get/session/class/ajax",
            {
                srsession:srsession
            },
            function(data)
            {
                $(".new_class").removeAttr('disabled');
                var cont="<select class='form-control new_class' name='upgrade_class'><option value=''>Select Class</option>";
                for(me in data)
                {
                    cont+= "<option value='"+data[me]['id']+"'>"+data[me]['class']+"</option>";
                }
                $('.new_upgrade_class').html(cont+"</select>");
            });
    }
});

$(".new_upgrade_class").change(function()
{
    var srclass =  $(".new_class").val();
    var srsession =  $(".new_session").val();
    //alert(srclass);
    if(srclass!="")
    {
        $.post("../get/upgrade/section/ajax",
            {
                srclass:srclass,srsession:srsession
            },
            function(data)
            {
                $(".new_upsection").removeAttr('disabled');
                var cont="<select class='form-control new_upsection' name='upgrade_section'><option value=''>Select Section</option>";
                for(me in data)
                {
                    cont+= "<option value='"+data[me]['id']+"'>"+data[me]['section']+"</option>";
                }
                $('.new_upgrade_section').html(cont+"</select>");
            });
    }
});
/*********************************************************************
     *                        single student collect Payment
     *********************************************************************/
    $(".cpaymentclass").change(function()
    {
        var srclass =  $(".cpaymentclass").val();
        if(srclass!="")
        {
            $.post("../getcollect/student/section/ajax",
                {
                    srclass:srclass
                },
                function(data)
                {
                    $(".homecpaymentsection").removeAttr('disabled');
                    var cont="<select class='form-control homecpaymentsection' name='section'><option value=''>Select Section</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['section']+"</option>";
                    }
                    $('.cpaymentsection').html(cont+"</select>");
                });
        }
    });
    $(".cpaymentsection").change(function()
    {
        var srclass =  $(".cpaymentclass").val();
        var srsection =  $(".homecpaymentsection").val();
        if(srclass!="")
        {
            $.post("../get/collect/student/ajax",
                {
                    srclass:srclass,srsection:srsection
                },
                function(data)
                {
                    $(".homecpaymentstudent").removeAttr('disabled');
                    var cont="<select class='form-control homecpaymentstudent' name='student'><option value=''>Select Student</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['name']+"</option>";
                    }
                    $('.cpaymentstudent').html(cont+"</select>");
                });
        }
    });
/*********************************************************************
     *                        single student Payment
     *********************************************************************/
    $(".spaymentclass").change(function()
    {
        var srclass =  $(".spaymentclass").val();
        if(srclass!="")
        {
            $.post("../../getfee/student/section/ajax",
                {
                    srclass:srclass
                },
                function(data)
                {
                    $(".homespaymentsection").removeAttr('disabled');
                    var cont="<select class='form-control homespaymentsection' name='section'><option value=''>Select Section</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['section']+"</option>";
                    }
                    $('.spaymentsection').html(cont+"</select>");
                });
        }
    });
    $(".spaymentsection").change(function()
    {
        var srclass =  $(".spaymentclass").val();
        var srsection =  $(".homespaymentsection").val();
        if(srclass!="")
        {
            $.post("../../get/fee/student/ajax",
                {
                    srclass:srclass,srsection:srsection
                },
                function(data)
                {
                    $(".homespaymentstudent").removeAttr('disabled');
                    var cont="<select class='form-control homespaymentstudent' name='student'><option value=''>Select Student</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['name']+"</option>";
                    }
                    $('.spaymentstudent').html(cont+"</select>");
                });
        }
    });
/********************  end 2-6-2018  *************************/
/********************  end 2-6-2018  *************************/
/*********************************************************************
     *                        home visit form
     *********************************************************************/
    $(".homevisitclass").change(function()
    {
        var srclass =  $(".homevisitclass").val();
        if(srclass!="")
        {
            $.post("../gethomevisit/student/section/ajax",
                {
                    srclass:srclass
                },
                function(data)
                {
                    $(".homevisitsection").removeAttr('disabled');
                    var cont="<select class='form-control homevisitsection' name='section'><option value=''>Select Section</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['section']+"</option>";
                    }
                    $('.homevsection').html(cont+"</select>");
                });
        }
    });
    $(".homevsection").change(function()
    {
        var srclass =  $(".homevisitclass").val();
        var srsection =  $(".homevisitsection").val();
        if(srclass!="")
        {
            $.post("../get/homevisit/student/ajax",
                {
                    srclass:srclass,srsection:srsection
                },
                function(data)
                {
                    $(".homevisitstudent").removeAttr('disabled');
                    var cont="<select class='form-control homevisitstudent' name='student'><option value=''>Select Student</option>";
                    for(me in data)
                    {
                        cont+= "<option value='"+data[me]['id']+"'>"+data[me]['name']+"</option>";
                    }
                    $('.homevstudent').html(cont+"</select>");
                });
        }
    });
/********************  end 2-6-2018  *************************/
/********************  end 2-6-2018  *************************/