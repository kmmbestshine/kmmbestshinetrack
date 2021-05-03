
var app = angular.module("app", [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
    
    app.constant('urls', {
        HOST:'http://stjosephspallalakuppam.in/'
    });
	
	 app.factory('appGlobal', function() {
		 
		 return {
			printDiv: function(divID) {
                var divElements = document.getElementById(divID).innerHTML;
				var oldPage = document.body.innerHTML;
				document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
				window.print();
				document.body.innerHTML = oldPage;
            }
		}
		 
	 });

	app.run(function($rootScope, appGlobal) {
        $rootScope.appData = appGlobal;
    });
    app.controller('expcontroller',function($scope,$http){
	
		$scope.addexpcategory=function(){
			console.log($scope.newcategory);
		if($scope.newcategory)
		{
			var data=JSON.stringify({
				newcategory:$scope.newcategory,
			});
			$http.post("/users/get/exp-catagory/save",data).then(function(res){
				if(res.data!=''){
					var cont='';
					cont+= "<option selected='selected' value='"+res.data+"'>"+res.data+"</option>";
					$('#category').append(cont); 
				} 
			});
		}
	}
});
	app.controller('furniturecontroller',function($scope,$http){

		$scope.addfur_category=function(){
		if($scope.newcategory){
			var data=JSON.stringify({
				/*category_type:$("#type").val(),*/
				/*updated 24-3-2018*/
				category_type:$scope.catetype,
				newcategory:$scope.newcategory,
			});
			$http.post("/users/get/fur-catagory/save",data).then(function(res){
				if(res.data!=''){
					$("#subcategory").empty();
					var cont='';
					cont+= "<option selected='selected' value='"+res.data+"'>"+res.data+"</option>";
					$('#category').append(cont); 
				} 
			});
		}
	}
	$scope.getcategoery=function(){
                $scope.catetype=$("#catetypee").val();
        }


	$scope.addfur_subcategory=function(){
		var category=$("#category").val();
		if(category!='')
		{
			var data=JSON.stringify({
				newcategory:$('#category').val(),
				subcategory:$scope.new_subcategory,
			});
			$http.post("/users/get/fur-subcatagory/save",data).then(function(res){

				if(res.data!=''){
					var cont='';
					cont+= "<option selected='selected' value='"+res.data+"'>"+res.data+"</option>";
					$('#subcategory').append(cont); 
				} 
			});
		}
	}
});

app.controller("feeTable",['$scope','$http',function($scope,$http){
    var index = 1;
	$("#installment_form").hide();
	
	$scope.fees=[
		{
			'feesName':'',
			'studentType':['New','Existing'],
			'paymentType':['ONE TIME','MONTHLY','ANNUAL'],
			'amount':'',
			'installment':''
		}
	];
    
    // changes done by parthiban 15-11-2017 
    $scope.getfee = function(){
    	var classId = $("#selectClass").val();
        var session = $("#selectSession").val();
        // var classId = $("input[name='class_id']:checked"). val();
        if(session == "" || classId == ""){
            $("#jsErrors").html("Please select class & Session");
        }else{
            window.location.href = 'http://stjosephspallalakuppam.in/users/fee/structure/' + session + '/'+classId+'';
        }
    };   
		
		//start
	/* $scope.addNew = function(fees){
        $scope.fees.push({ 
            'feesName':'',
			'studentType':['New','Existing'],
			'paymentType':['ONE TIME','MONTHLY','ANNUAL'],
			'amount':'',
			'installment':''
        });
    }; */
	
	$scope.addNew = function(fees){
		var formError = false;
   		var index = $scope.fees.length - 1;
	   	var feeName = $("td").find("input[name='fee_name_"+index+"']").val();
	   	var paymentType = $("td").find("select[name='payment_type_"+index+"']").val();
	   	var studentType = $("td").find("select[name='student_type_"+index+"']").val();
	   	var amount = $("td").find("input[name='amount_"+index+"']").val();

	   	if(feeName == ""){
	   		formError = true;
	   	}

	   	if(paymentType == ""){
	   		formError = true;
	   	}	

	   	if(studentType == ""){
	   		formError = true;
	   	}

	   	if(amount == ""){
	   		formError = true;
	   	}	   	

	   	if(paymentType == "ANNUAL"){
	   		var installment = $("td").find("input[name='installment_"+index+"']").val();
	   		if(installment == ""){
	   			formError = true;
	   		}
	   	}

	   	if(formError){
	   		$("#jsErrors").html("Please fill all fields");
	   	}else{
	   		var response;
	   		response = validateInstallment();
	   		if(response){
	   			$scope.fees.push({ 
		            'feesName':'',
					'studentType':['New','Existing'],
					'paymentType':['ONE TIME','MONTHLY','ANNUAL'],
					'amount':'',
					'installment':''
	        	});	

	        	$("#jsErrors").html("");
	   		}else{
	   			$("#jsErrors").html("Please select installment");
	   		}
	   	}
    };

    function validateInstallment(){
        var ind = 1;
        var totalRowCount = 0;
        var filledData = 0;
        $('#installmentTable').find("tr:gt(0)").each(function(){
        	totalRowCount++;
            var amount = $(this).find("td").find("input[name='installment_amount_"+ind+"']").val();
            var date = $(this).find("td").find("input[name='installment_date_"+ind+"']").val();
            var installmentType = $(this).find("td").find("select[name='installment_type_"+ind+"']").val();

            if(installmentType == "-" || installmentType == undefined){
            	console.log('error');
            }else{	
            	ind++;
            	filledData++;
            }
        });

        if(totalRowCount == filledData){
        	return true;
        }else{
        	return false;
        }
    }; 
    

    $scope.remove = function(){
        var newDataList=[];
        $scope.selectedAll = false;
        angular.forEach($scope.fees, function(selected){
            if(!selected.selected){
                newDataList.push(selected);
            }
        }); 
        $scope.fees = newDataList;
    };

     $scope.checkAll = function () {
        if (!$scope.selectedAll) {
            $scope.selectedAll = true;
        } else {
            $scope.selectedAll = false;
        }
        angular.forEach($scope.fees, function(fee) {
            fee.selected = $scope.selectedAll;
        });
    };

    // changes done by parthiban 03-10-2017
    $scope.showInstallment = function(){
        $noOfInstallments = $(event.target).val();
        $installmentId = $(event.target).attr('id');
        $row = $installmentId.split('_');
        $rowId = $row[1];
        $amount = $("#amount_"+$rowId+"").val();
        $newInstallmentAmount = $amount/$noOfInstallments;
        if($noOfInstallments > 0){
			$("#installment_form").show();
            var feeTable = angular.element( document.querySelector( '#feeTable' ) );
            var sno = 0;
            var installmentTable = angular.element( document.querySelector( '#installmentTable' ) );
            for (var i=0; i < $noOfInstallments; i++) {
                sno++;
                installmentTable.append('<tr id="row_'+$installmentId+'" class="row_'+$installmentId+'"><td>'+sno+'</td><td><input type="text" class="form-control" name="installment_amount_'+sno+'" value="'+$newInstallmentAmount.toFixed(2)+'" required></td><!--<td><input type="date" class="form-control" name="installment_date_'+sno+'" required></td>--><td><select name="installment_type_'+sno+'" class="form-control"><option value="-">Select installment type</option><option value="1st quarterly">1st quarterly</option><option value="2nd quarterly">2nd quarterly</option><option value="3rd quarterly">3rd quarterly</option><option value="4th quarterly">4th quarterly</option></select></td></tr>');
            }
			$('#myInstallmentModal').modal('show');
        }else{
			$("#installment_form").hide();
            $('#installmentTable').find("tr:gt(0)").remove();
        }  
    };

    $scope.checkInstallment = function(){
        console.log($(event.target));
        $thisId = $(event.target).attr('id')
        $selectId = $thisId.split('_');
        $selectValue = $('#'+$thisId+'').val();
        if($selectValue != 'ANNUAL'){
            $("#installment_"+$selectId[2]+"").prop("disabled", true);
        }else{
            $("#installment_"+$selectId[2]+"").prop("disabled", false);
        }
    };



    $scope.submitInstallment = function($scope){
        var index = 1;
        var totalRowCount = 0;
        var installmentData =[];
		var thisId = $(event.target).attr('id');
		var installmentId = $thisId.split('_');
        $('#installmentTable').find("tr:gt(0)").each(function(){
        	totalRowCount++;
            $thisRowId = $(this).attr('id');
            $selectId = $thisRowId.split('_');
            var amount = $(this).find("td").find("input[name='installment_amount_"+index+"']").val();
            var date = $(this).find("td").find("input[name='installment_date_"+index+"']").val();
            var installmentType = $(this).find("td").find("select[name='installment_type_"+index+"']").val();

            if(installmentType == "-" || installmentType == undefined){
            	$(".show-error-msg").show();
            }else{	
            	index++;
	            installmentData.push({
	                'amount':amount,
	                'due_date':date,
	                'Installment_type':installmentType
	            });
            }
        });

        var installmentArrayLength = installmentData.length;

        if(totalRowCount == installmentArrayLength){
        	$(".show-error-msg").show();
	       	$http({
	            method: 'POST',
	            url: 'http://stjosephspallalakuppam.in/users/installment',
	            data:{'requestData':installmentData},
	            dataType: "html"
	        }).then(function successCallback(response) {
	            console.log(response);
				$('#installment_id_'+installmentId[2]+'').val(JSON.stringify(response.data));
				$('.row_installment_'+installmentId[2]+'').remove();
				$('#installment_form').hide();
				$('#myInstallmentModal').modal('hide');
	        }, function errorCallback(response) {
	            console.log(response);
        	});
        }
    };
	
	$("#post_fees").click(function(e){
		var index = 0;
		$('#feesTable').find("tr:gt(0)").each(function(){
            var feeName = $(this).find("td").find("input[name='fee_name_"+index+"']").val();
			var studentType = $(this).find("td").find("select[name='student_type_"+index+"']").val();
			var paymentType = $(this).find("td").find("select[name='payment_type_"+index+"']").val();
			var amount = $(this).find("td").find("input[name='amount_"+index+"']").val();

			// if($("input[name='class_id']:checked").val() === undefined){
			// 	$("#jsErrors").html("Please select class");
			// 	e.preventDefault(e);
			// }

			// changes done by parthiban 14-11-2017
	        var classId = $("#selectClass").val();
	        var session = $("#selectSession").val();
	        if(session == "" || classId == ""){
	            $("#jsErrors").html("Please select class & session");
	            e.preventDefault(e);
	        }			
			
			if(feeName === undefined){
				$("#jsErrors").html("Please fill Fee name");
				e.preventDefault(e);
			}
			 
			if(studentType === undefined || studentType === '?'){
				$("#jsErrors").html("Please fill Student Type");
				e.preventDefault(e);
			}
			if(paymentType === undefined || paymentType ==='?' ){
				$("#jsErrors").html("Please fill Payment Type");
				e.preventDefault(e);
			}
			if(amount === undefined){
				$("#jsErrors").html("Please fill Amount");
				e.preventDefault(e);
			}
			index++;
		});
	});
	
	$("#enableDate").click(function(){
		var index = 0;
		var isChecked = $('#installmentTable').find("th").find("input[id='enableDate']").attr('checked');
		if(isChecked){
			$('#installmentTable').find("tr:gt(0)").each(function(){
				index++;
				$(this).find("td").find('select[name="installment_type_'+index+'"]').prop('disabled', true);
			});
		}
		index = 0;
		$('#installmentTable').find("tr:gt(0)").each(function(){
			index++;
			$(this).find("td").find('input[name="installment_date_'+index+'"]').removeAttr("disabled");
		});
	});
	
	$("#enableInstallmentType").click(function(){
		var index = 0;
		$('#installmentTable').find("tr:gt(0)").each(function(){
			index++;
			$(this).find("td").find('input[name="installment_date_'+index+'"]').prop('disabled', true);
		});
		index = 0;
		$('#installmentTable').find("tr:gt(0)").each(function(){
			index++;
			 $(this).find("td").find('select[name="installment_type_'+index+'"]').removeAttr("disabled");
		});
	});
}]);


app.controller("feeSlipTable",['$scope','$http',function($scope,$http){
	$scope.deleteRow=function(){
		console.log($(event.target));
		var editButtonId = $(event.target).attr('id').split('_');

		$http({
                method: 'DELETE',
                url: 'http://stjosephspallalakuppam.in/fee/slip/'+editButtonId[1]+'',
                dataType: "html"
        }).then(function successCallback(response) {
				console.log(response);
                $('#feeSlipTable').append(response.data);
				$('#'+editButtonId[1]+'').remove();				
            }, function errorCallback(response) {
                console.log(response);
        });
	};
	
	$scope.print =function(){
		var mywindow = window.open('', 'PRINT', 'height=400,width=600');

		mywindow.document.write('<html><head><title>' + document.title  + '</title>');
		mywindow.document.write('</head><body >');
		mywindow.document.write('<h1>' + document.title  + '</h1>');
		mywindow.document.write(document.getElementById($(event.target)).innerHTML);
		mywindow.document.write('</body></html>');

		mywindow.document.close(); // necessary for IE >= 10
		mywindow.focus(); // necessary for IE >= 10*/

		mywindow.print();
		mywindow.close();

		return true;
	}
}]);


	
app.controller("payment",['$scope','$http',function($scope,$http){
	$scope.getStudent = function(){
		if($scope.registerNo)
		{
			/******* updated 23-2-2018 by priya  *******/

            var reg = $scope.registerNo;
            var result = reg.replace("/", ".");

            /******* end *******/

			$http({
                method: 'POST',
                url: 'http://stjosephspallalakuppam.in/users/payment/student/'+result+'',
                dataType: "html"
            }).then(function successCallback(response) {
				$('#singleStudentPayment').html('');
				$('#singleStudentPayment').append(response.data);
				$("#lateFee,#concession").keydown(function(){
					var lateFee = $('#lateFee').val();
					var concession = $('#concession').val();
					$('#grandTotal').val( lateFee + concession);
				});
            }, function errorCallback(response) {
                console.log(response);
            });
		}	
	};
}]);

app.controller("payFee",['$scope','$http',function($scope,$http){
	var currentMonth = new Date().getMonth();
	$('select[id=payMonth] option:eq('+currentMonth+')').attr('selected', 'selected');
	$('#payMonth').click(function(){
		var inputValue = $('#payMonth').val();
		$('#hiddenPayMonth').val(inputValue);
		
	});
	$scope.recivedAmount = function(){
		if($(event.target).is(":checked")){
			var thisId = $(event.target).attr('id');
			var selected_id = thisId.split('_');
			var installment_amount = 'installment_amount_'+selected_id[1];
			$('#'+installment_amount+'').prop('disabled', false);
			var recivedAmount = parseInt($("#recivedAmount").val())+ parseInt($('#'+installment_amount+'').val());
			$("input[name=recivedAmount]").val(recivedAmount);
			$("#recivedAmount").val(recivedAmount);
			$("#recivedAmount").prop('disabled', false);
		}else{
			var thisId = $(event.target).attr('id');
			var selected_id = thisId.split('_');
			var installment_amount = 'installment_amount_'+selected_id[1];
			$('#'+installment_amount+'').prop('disabled', true);
			var recivedAmount = parseInt($("#recivedAmount").val())- parseInt($('#'+installment_amount+'').val());
			$("input[name=recivedAmount]").val(recivedAmount);
			$("#recivedAmount").val(recivedAmount);
			$("#recivedAmount").prop('disabled', false);
		}
		if($("#recivedAmount").val() == 0){
			$("#recivedAmount").prop('disabled', true);
		}
	}
	
	// changes done by parthiban 15-11-2017
	$scope.recivedAmountMonth = function(){
		if($(event.target).is(":checked")){
            var extafee = parseInt($("#lateFee").val())- parseInt($('#concession').val());
            var oldAmount = $("#recivedAmount").val();
            if(oldAmount != "0"){
                var oldAmount = parseInt($("#recivedAmount").val()) - parseInt(extafee); 
            }
           
			var recivedAmount = (parseInt(oldAmount)+ parseInt($('#grandTotal').val()))+parseInt(extafee);
			$("input[name=recivedAmount]").val(recivedAmount);
			$("#recivedAmount").val(recivedAmount);
			$("#recivedAmount").prop('disabled', true);
		}else{
			var recivedAmount = parseInt($("#recivedAmount").val()) - parseInt($('#grandTotal').val());
			$("input[name=recivedAmount]").val(recivedAmount);
			$("#recivedAmount").val(recivedAmount);
			$("#recivedAmount").prop('disabled', true);
		}
		if($("#recivedAmount").val() == 0){
			$("#recivedAmount").prop('disabled', true);
		}   
	}
}]);	

app.controller("feeRecipt",['$scope','$http',function($scope,$http){
	$scope.print =function(divID){
		printDiv(divID);
	}
}]);


function printDiv(divID) {
	var divElements = document.getElementById(divID).innerHTML;
	var oldPage = document.body.innerHTML;
	document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
	window.print();
	document.body.innerHTML = oldPage;
}


app.controller("attendance",['$scope','$http',function($scope,$http){
	$('.dropdown-submenu a.test').on("click", function(e){
		$('#class_id').val($('input[name='+$(this).text()+']').val());
		$(this).next('ul').toggle();
		e.stopPropagation();
		e.preventDefault();
	  });
	  
	  $('.inside-menu li a').on("click", function(e){
		$('#section_id').val($('input[name='+$(this).text()+']').val());
		$('input[name=place_attendence]').trigger("click");
	  });
}]);

app.controller("upgrade",['$scope','$http',function($scope,$http){
    $('.dropdown-submenu a.test').on("click", function(e){
		$('#class_id').val($('input[name='+$(this).text()+']').val());
            $('#selectClass').text($(this).text());
		$(this).next('ul').toggle();
		e.stopPropagation();
		e.preventDefault();
	});
	  
	$('.inside-menu li a').on("click", function(e){
		$('#section_id').val($('input[name='+$(this).text()+']').val());
	    $('#selectSection').text($(this).text());
	});
          
	$('#promotionClass').on("click",function(){
	  	$('[id="showSelectClass"]').text($(this).find(":selected").text());
	  	var classId = $(this).find(":selected").val();
	  
	  	$http({
	        method: 'POST',
	        url: 'http://127.0.0.1:8000/get/section',
	        data : {'class_id':classId},
	        dataType: "html"
	    }).then(function successCallback(response) {
	        var classSection =response.data;
	        $('[id="promotionSection"]').html('');
	        $.each(classSection, function(i, item) {
	            var options = '<option value="'+item.value+'">'+item.text+'</option>';
	            $('[id="promotionSection"]').append(options);
	        }); 
	    }); 
	});
}]);	
	
	
	
	
	
	
	
	
	
	









