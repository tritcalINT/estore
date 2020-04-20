$(document).ready(function(){
	$('#dob').datetimepicker({
		format: 'dd-mm-yyyy',
		autoclose: 1,
		minView: 2
	});
	
	$('#search_date').datetimepicker({
        format: 'yyyy-mm-dd',
		autoclose: 1,
		minView: 2
    });
	
	$('#search_withdraw_date').datetimepicker({
        format: 'yyyy-mm-dd',
		autoclose: 1,
		minView: 2
    });
	
	$('#search_transfer_date').datetimepicker({
        format: 'yyyy-mm-dd',
		autoclose: 1,
		minView: 2
    });
	
	$('#search_package_date').datetimepicker({
        format: 'yyyy-mm-dd',
		autoclose: 1,
		minView: 2
    });
	
	$('#search_trading_date').datetimepicker({
        format: 'yyyy-mm-dd',
		autoclose: 1,
		minView: 2
    });
	
	$('#search_interest_date').datetimepicker({
        format: 'yyyy-mm-dd',
		autoclose: 1,
		minView: 2
    });
	
	$('#search_messages_date').datetimepicker({
        format: 'yyyy-mm-dd',
		autoclose: 1,
		minView: 2
    });
	
	$('#myModalSuccess').modal('show');
	
	/*$('#collapseOne').on('show.bs.collapse', function (e) {
		alert('test');
	})*/
});

function changeCurrency(val,amt){
     if(val){
		var cur_name = $('#currency').find('option:selected').text();
        var dataString = 'cur='+ val;
        $.ajax({
            type: "POST",
    		url: "../member/data/getcurrencyrate.php",
    		data: dataString,
    		cache: false,
            success: function(data) {
                data = $.parseJSON(data);
                var cu_rate = data.deposit_rate;
				var cu_details = data.type_details;
				var deposit_amount = cu_rate * amt;
                $("#deposit_amount").val(deposit_amount);   
				$("#upload_label").html('Upload Slip for '+cur_name+' '+deposit_amount+' :');	
				$("#deposit_details").html(cu_details);				
            }
        });
    } else{
       $("#deposit_amount").val('');   
	   $("#upload_label").html('Upload Slip :');
	   $("#deposit_details").html('');
    }
}


function assignexpiredate(id,refno){
   $('#md_id_exp').val(id);
    $('#myModalExpire').modal('show');
}

function return_reward(id){
    var url1="data/member_reward_expdt.php";
    // Set URL Paramaeters 
    url="pmode=returnrewardamt";
    url=url+"&md_id="+id;
   
    //Randon Parameter Value to Avoid Server Chash
    url=url+"&sid="+Math.random();
    //Set Callback Function When Responce is Ready
//alert(url);
    $.ajax({
        type: 'GET',
        dataType: 'html',
        data: url,
        url: url1,
        success: function (data) {
          console.log(data);
        }
    });
}

function updateexpdate()
{
    var md_id = $('#md_id_exp').val();
    var md_expdt = $('#rewards_end').val();
    
    var url1="data/member_reward_expdt.php";
    // Set URL Paramaeters 
    url="pmode=updateexpire";
    url=url+"&md_id="+md_id;
    url=url+"&md_expdt="+md_expdt;
    //Randon Parameter Value to Avoid Server Chash
    url=url+"&sid="+Math.random();
    //Set Callback Function When Responce is Ready
//alert(url);
    $.ajax({
        type: 'GET',
        dataType: 'html',
        data: url,
        url: url1,
        success: function (data) {
          console.log(data);
        }
    });
    
}

function changeTopupCurrency(){
     
	var cur_name = $('#currency').find('option:selected').text();
	var amt = $('#actual_amount').val();
	var val = $('#currency').val();
	if(val != '' && amt != ''){
        var dataString = 'cur='+ val;
        $.ajax({
            type: "POST",
    		url: "../member/data/getcurrencyrate.php",
    		data: dataString,
    		cache: false,
            success: function(data) {
                data = $.parseJSON(data);
                var cu_rate = data.deposit_rate;
				var cu_details = data.type_details;
				var deposit_amount = amt*cu_rate;
                $("#deposit_amount").val(deposit_amount);   
				$("#upload_label").html('Upload Slip for '+cur_name+' '+deposit_amount+' :');
				$("#deposit_details").html(cu_details);					
            }
        });
    } else{
       $("#deposit_amount").val('');   
	   $("#upload_label").html('Upload Slip :');
	   $("#deposit_details").html('');
    }
}

function getWithdrawFund(v){
	var thawed_acoount = $('#thawed_account').val();
	var bonus_account = $('#bonus_account').val();
        var gpay_account = $('#gpay_account').val();
        
        
	if(v == '1'){
		$('#available_fund').val(thawed_acoount);
	} else if (v == '2'){
		$('#available_fund').val(bonus_account);
	} else if (v == '4'){
		$('#available_fund').val(gpay_account);
	}
		
}

function getWithdrawMethodDetails(v){
	var mid = $('#member').val();
	if(v != '' && mid != ''){
		var dataString = 'wm='+ v + '&m=' + mid;
        $.ajax({
            type: "POST",
    		url: "../member/data/getmemberinfo.php",
    		data: dataString,
    		cache: false,
            success: function(data) {
                data = $.parseJSON(data);
                var wm_label = data.label;
				var wm_value = data.value;
				if(wm_value == '' || wm_value == null){
					alert('Details not available. Please set in Member Profile');
					$("#method_details").val('');   
					$("#withdraw_method_label").html('');
				} else {
					$("#method_details").val(wm_value);   
					$("#withdraw_method_label").html(wm_label+' :');
				}					
            }
        });
    } else{
       $("#method_details").val('');   
	   $("#withdraw_method_label").html('');
    }
}


function changeActualamount(){
	var amt = $('#amount').val();
	var val = $('#withdraw_method').val();
	if(val != '' && amt != ''){
        var dataString = 'cur='+ val;
        $.ajax({
            type: "POST",
    		url: "../member/data/getcurrencyrate.php",
    		data: dataString,
    		cache: false,
            success: function(data) {
                data = $.parseJSON(data);
                var cu_rate = data.withdraw_rate;
				if(cu_rate > 0){
					var actual_amount = Math.round((amt*cu_rate)* 100) / 100;
					$("#actual_amount").val(actual_amount);   
					$("#withdraw_rate").html(cu_rate);
				} else {
					$("#actual_amount").val('');
					$("#withdraw_rate").html('');
				}
            }
        });
    } else{
       $("#actual_amount").val('');  
	   $("#withdraw_rate").html('');	   
    }
}




function viewRejected(msg,type){
    if(msg != ''){
        $('#rejected_message').text(msg);
    }
	
	if(type == 'deposit'){
		$("#myModalWithdrawLabel").css("display", "none");
		$("#myModalWithdrawText").css("display", "none");
		$("#myModalDepositLabel").css("display", "block");
                
                $("#myModalDepositLabel1").css("display", "none");
                $("#myModalDepositText1").css("display", "none");
                
		$("#myModalDepositText").css("display", "block");
	} else if(type == 'withdraw'){
		$("#myModalDepositLabel").css("display", "none");
		$("#myModalDepositText").css("display", "none");
                
                $("#myModalDepositText1").css("display", "none");
                 $("#myModalDepositLabel1").css("display", "none");
                
		$("#myModalWithdrawLabel").css("display", "block");
		$("#myModalWithdrawText").css("display", "block");
	}else if(type == 'G-Pay Rewards'){
		$("#myModalDepositLabel").css("display", "none");
		$("#myModalDepositText").css("display", "none");
                 $("#myModalDepositLabel1").css("display", "block");
                $("#myModalDepositText11").css("display", "block");
		$("#myModalWithdrawLabel").css("display", "none");
		$("#myModalWithdrawText").css("display", "none");
	}else if(type == 'E-Share'){
		$("#myModalDepositLabel").css("display", "none");
		$("#myModalDepositText").css("display", "none");
                 $("#myModalDepositLabel1").css("display", "none");
                $("#myModalDepositText11").css("display", "none");
		$("#myModalWithdrawLabel").css("display", "none");
		$("#myModalWithdrawText").css("display", "none");
                $("#myModalDepositLabel2").css("display", "block");
                $("#myModalDepositText12").css("display", "block");

	}
    
    
    
    $('#myModal').modal('show');
}


function assignexpiredate(id,refno){
   $('#md_id_exp').val(id);
    $('#myModalExpire').modal('show');
}

function updateexpdate()
{
    var md_id = $('#md_id_exp').val();
    var md_expdt = $('#rewards_end').val();
    
    var url1="data/member_reward_expdt.php";
    // Set URL Paramaeters 
    url="pmode=updateexpire";
    url=url+"&md_id="+md_id;
    url=url+"&md_expdt="+md_expdt;
    //Randon Parameter Value to Avoid Server Chash
    url=url+"&sid="+Math.random();
    //Set Callback Function When Responce is Ready
alert(url);
    $.ajax({
        type: 'GET',
        dataType: 'html',
        data: url,
        url: url1,
        success: function (data) {
          console.log(data);
        }
    });
    
}


function deleteTrading(id){
	$("#tradingid").val(id); 
	$('#myModal').modal('show');
}

function confirmDeleteTrading(){
	$("#trading_delete").submit();
}



var clipboard = new Clipboard('.copybtn');
clipboard.on('success', function(e) {
    //console.log(e);
});

clipboard.on('error', function(e) {
    //console.log(e);
});




$("form#frmgfundpayout").submit(function(){
   var formData = $(this).serialize();
  alert("sadfasdf");
  return false;
  
  
   $.ajax({
        url: 'data/pay_out_gfund.php',
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {
            // console.log(data);
            alert('Recorded Successfully Posted');
       //       loaddebtorsfollowupdetails();
              $('#restsms').click();           
        }
    });
    return false;
});