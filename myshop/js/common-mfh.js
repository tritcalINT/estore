/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// add to cart
function addToCart(itmky, qty, hqty,sqty) {

    if (itmky == '') {
        alert('Item Key Cannot Be Blank !');
        return;
    }

    if (qty == '' && hqty == '') {
        alert('Quantity Cannot Be Blank !');
        return;
    }

    var url = 'controllers/cart_controller.php?mode=addToCart';
    url += '&itmky=' + itmky;
    url += '&qty=' + qty;
    url += '&hqty=' + hqty;
    url += '&sqty=' + sqty;
    
    $.ajax({
        type: 'GET',
        url: url,
        data: null,
        dataType: 'html',
        success: function (data) {
//            $('#resp').html(data);
            refrehCart();
        }
    });
    
    // alert('Cart Updated');
    
     
     
}
// refresh cart
function refrehCart() {
    var url = 'controllers/cart_controller.php?mode=showCart';
    $.ajax({
        type: 'GET',
        url: url,
        data: null,
        dataType: 'html',
        success: function (data) {
           // alert(data);
            $('#cartdiv').html(data);
            refrehlistCart();
        }
    });
}
// 


function refrehlistCart() {
    //alert("hjhjh");
    var url = 'controllers/cart_controller.php?mode=showlistCart';
    $.ajax({
        type: 'GET',
        url: url,
        data: null,
        dataType: 'html',
        success: function (data) {
         //   alert(data);
            $('#listcartmenu').html(data);
        }
    });
}

// empty cart
function emptyCart() {
    var url = 'controllers/cart_controller.php?mode=emptyCart';
    $.ajax({
        type: 'GET',
        url: url,
        data: null,
        dataType: 'html',
        success: function (data) {
            $('#cartdiv').html('');
            refrehCart();
            showTotal();
            loadCartItems();
            
        }
    });
    
    window.location='index.php';
}

function checkoutcart()
{
    var usrky = $('#txtsesusrky').val() ;
//    alert(usrky);
    if(usrky==0)
    {
        alert("Login First to Checkout");
    }
    else
    {
        window.open("checkout","_self");
    }    
}

// empty cart with out the itemss
function emptyCartwoItems() {
    var url = 'controllers/cart_controller.php?mode=emptyCart';
    $.ajax({
        type: 'GET',
        url: url,
        data: null,
        dataType: 'html',
        success: function (data) {
            $('#cartdiv').html('');
            refrehCart();
            showTotal();
            
        }
    });
}
// Company updates
function updatecompany()
{
        var pusrky = $('#txtcomky').val();
        var pcom = $('#selcom').val();
        
        if (pusrky == "" || pusrky == 0)
        {
            return false;
        }
        else
        {
            var url_a = "controllers/company_control.php";

            var url = "pmode=updatecompany";
            url = url + "&precid=" + pusrky;
            url = url + "&pcom=" + pcom;
            
            //Randon Parameter Value to Avoid Server Chash
            url = url + "&sid=" + Math.random();
          

            $.ajax({
                type: 'GET',
                dataType: 'html',
                data: url,
                url: url_a,
                success: function (data) {
                    
                    if(data=='ok')
                    {    
                        alert('Sucesfully Posted..');
                    }    
                }
            });

        }
}    
// Update security
function updatesecurity()
{
        var pusrky = $('#txtcomky').val();
        var paccess = $('#selaccess').val();
        var pdisable = $('#seldis').val();
               
        if (pusrky == "" || pusrky == 0)
        {
            return false;
        }
        else
        {
            var url_a = "controllers/company_control.php";

            var url = "pmode=security";
            url = url + "&precid=" + pusrky;
            url = url + "&paccess=" + paccess;
            url = url + "&pdisable=" + pdisable;
           
            //Randon Parameter Value to Avoid Server Chash
            url = url + "&sid=" + Math.random();
          

            $.ajax({
                type: 'GET',
                dataType: 'html',
                data: url,
                url: url_a,
                success: function (data) {
                    
                    if(data=='ok')
                    {    
                        alert('Sucesfully Posted..');
                    }    
                }
            });

        }
}    
// update notification details
function updateemailnotification() {

        var pusrky = $('#txtcomky').val();
        var pnotemail = $('#emailnot').val();
  
        if(document.getElementById('chksecemail').checked == true)
        {
                fsecemail=1;
        }
        else
        {
                fsecemail=0;
        }
       if(document.getElementById('chksysemail').checked == true)
        {
                fsysemail=1;
        }
        else
        {
                fsysemail=0;
        }

        if (pusrky == "" || pusrky == 0)
        {
            return false;
        }
        else
        {
            var url_a = "controllers/company_control.php";

            var url = "pmode=notification";
            url = url + "&precid=" + pusrky;
            url = url + "&fsecemail=" + fsecemail;
            url = url + "&fsysemail=" + fsysemail;
            url = url + "&pnotemail=" + pnotemail;

            //Randon Parameter Value to Avoid Server Chash
            url = url + "&sid=" + Math.random();
           

            $.ajax({
                type: 'GET',
                dataType: 'html',
                data: url,
                url: url_a,
                success: function (data) {
                    if(data=='ok')
                    {    
                        alert('Sucesfully Posted..');
                    }    
                }
            });

        }
    }
//    Close companyuser profile 
function closeapplication()
{
   
    window.open("index.php", '_self');
}
//update detailsc company
function funcUploadImg(form) {
                
        $.ajax({
            url: "controllers/company_control.php",
            type: "POST",
            data: new FormData(form),
            success: function(data)
            {

            }
        });

    }
    
function loadprofilepic()
{
       
        $("#imgprofile").attr("src", "controllers/company_control.php?pimgmode=img&imgrecid="+($('#txtcomky').val()));
}


function funsaveproducts(form) {
                
        $.ajax({
            url: "controllers/company_control.php",
            type: "POST",
            data: new FormData(form),
            success: function(data)
            {

            }
        });

    }
//load payment method wise the screen
function funloadpaymenthod()
{
   
    var url = 'controllers/cart_controller.php?mode=paymentmethod&paytype='+$('#paytype').val();
    
    //alert(url);
    $.ajax({
        type: 'GET',
        url: url,
        data: null,
        dataType: 'html',
        success: function (data) {
            $('#paymentdiv').html(data);
        }
    });
}

function writeGpay()
{
   
    var url = 'admin/data/gpay_out_data.php?mode=paymentmethod&scg_user_id='+$('#scg_user_id').val()+'&pay_out='+$('#pay_out').val()+'&before_balance='+$('#before_balance').val();
    
    //alert(url);
    $.ajax({
        type: 'POST',
        url: url,
        data: null,
        dataType: 'html',
        success: function (data) {
            
        }
    });
}



// scroller

function initScroll() {
                // browser window scroll (in pixels) after which the "back to top" link is shown
                var offset = 300,
                //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
                offset_opacity = 1200,
                //duration of the top scrolling animation (in ms)
                scroll_top_duration = 700,
                //grab the "back to top" link
                $back_to_top = $('.cd-top');
                //hide or show the "back to top" link
                $(window).scroll(function() {
                    ($(this).scrollTop() > offset) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
                    if ($(this).scrollTop() > offset_opacity) {
                        $back_to_top.addClass('cd-fade-out');
                    }
                });
                //smooth scroll to top
                $back_to_top.on('click', function(event) {
                    event.preventDefault();
                    $('body,html').animate({
                        scrollTop: 0
                    }, scroll_top_duration
                );
                });
            }
            
// Saving            
function writeOrderData(){
     
    var nic = $('#user-id').val();
    var fnm = $('#user_name').val();
    var snm = $('#userName2').val();
    var addr = $('#addr').val();
    var town = $("#addr_state").val(); //$('#txttown').val();
    var city = $("#addr_city").val(); // $('#txtcity').val();
    var country = $("#simg option:selected").text();
    var tel = $('#user_tel').val();
    var dob = $('#user_dob').val();
    var email = $('#user_email').val();
    var paytype = $('#paytype').val();
    var url = 'controllers/cart_controller.php?mode=writeOrderData';
    url += '&addr=' + addr;
    url += '&town=' + town;
    url += '&city=' + city;
    url += '&country=' + country;
    url += '&tel=' + tel;
    url += '&dob=' + dob;
    url += '&email=' + email;
    url += '&paytype=' + paytype;

    if(paytype == 'mastercard' || paytype == 'visa' || paytype == 'amex'){
        var ccno = $('#cc-number').val();
        var ccexp = $('#cc-exp').val();
        var cccvc = $('#cc-cvc').val();
        var numeric = $('#numeric').val();
        url += '&ccno=' + ccno;
        url += '&ccexp=' + ccexp;
        url += '&cccvc=' + cccvc;
        url += '&numeric=' + numeric;
    }else if(paytype == 'cheque'){
        var chqno = $('#chqno').val();
        var bnkno = $('#bnkno').val();
        var branchno = $('#branchno').val();
        url += '&chqno=' + chqno;
        url += '&bnkno=' + bnkno;
        url += '&branchno=' + branchno;
    }else if(paytype == 'cash'){
        var rem = $('#txtrem').val();
        url += '&rem=' + rem;
    }

    console.log(url);
    
 
    $.ajax({
        type: 'GET',
        url: url,
        data: null,
        dataType: 'html',
        success: function (data) {
             writeGpay();
            console.log(data);
            $('#cusnm').html(fnm + ' ' + snm);
            $('#cusemail').html(email);
            $('#totordamt').html(data.ordamt);
            $('#txtordno').html(data.ordno);
            console.log(data);
            alert('Successfully Placed Your Order...');
           
           // window.location.href = "../index.php";
           $( "#pay_now" ).click();
            emptyCartwoItems();
           
        }
    });

}      
//loard cart
function loadCartItems(){

        	var url = 'controllers/cart_controller.php?mode=checkoutShow';
			$.ajax({
				type: 'GET',
				url: url,
				data: null,
				dataType: 'html',
				success: function(data){
					$('#cartdetail').html(data);
					showTotal();
				}
			});

        }
        
// Load order items details        
function loadCartOrderdItems(){

        	var url = 'controllers/cart_controller.php?mode=checkoutShowOrder&precordid='+$('#txtordid').val();
			$.ajax({
				type: 'GET',
				url: url,
				data: null,
				dataType: 'html',
				success: function(data){
					$('#cartdetail').html(data);
					showOrdTotal();
				}
			});

        }
        
        
        function removeItem(name, itmky){
        		$('#'+ name).fadeOut('slow', function(c){
					$('#'+ name).remove();
				});

        	var url = 'controllers/cart_controller.php?mode=removeCart';
			url += '&itmky=' + itmky;
			$.ajax({
				type: 'GET',
				url: url,
				data: null,
				dataType: 'html',
				success: function(data){
					loadCartItems();
                                        refrehCart()    ;

				}
			});

        }
// Show total
function showTotal(){

        var url = 'controllers/cart_controller.php?mode=showTotal';
                $.ajax({
                        type: 'GET',
                        url: url,
                        data: null,
                        dataType: 'html',
                        success: function(data){
                                $('#totaldiv').html(data);
                        }
                });

}
//Show total order
function showOrdTotal(){

        var url = 'controllers/cart_controller.php?mode=showOrdTotal&precordid='+$('#txtordid').val();
                $.ajax({
                        type: 'GET',
                        url: url,
                        data: null,
                        dataType: 'html',
                        success: function(data){
                                $('#totaldiv').html(data);
                        }
                });

}

// Show total
function showTotalhistory(){

        var url = 'controllers/cart_controller.php?mode=showTotalhistory';
                $.ajax({
                        type: 'GET',
                        url: url,
                        data: null,
                        dataType: 'html',
                        success: function(data){
                                $('#totaldiv').html(data);
                        }
                });

}
//state
function getstate(code)
{
    
    var url = 'controllers/company_control.php?pmode=getStates&countryId='+code;
    
    $.ajax({
        type: 'GET',
        url: url,
        data: null,
        dataType: 'html',
        success: function (data) {
           
            $('#txttown').html(data);
            $("#txttp1").intlTelInput('destroy');
            $("#txttp2").intlTelInput('destroy');

$("#txttp1").intlTelInput({
       allowDropdown: false,
       autoPlaceholder: true,
       dropdownContainer: "body",
       formatOnDisplay: true,
       initialCountry: "auto",
       onlyCountries: [code],
       placeholderNumberType: "MOBILE",
       separateDialCode: true,
      utilsScript: "build/js/utils.js"
    });

$("#txttp2").intlTelInput({
       allowDropdown: false,
       autoPlaceholder: true,
       dropdownContainer: "body",
       formatOnDisplay: true,
       initialCountry: "auto",
       onlyCountries: [code],
       placeholderNumberType: "MOBILE",
       separateDialCode: true,
      utilsScript: "build/js/utils.js"
    });

$("#txttp1").intlTelInput("setCountry", code);
$("#txttp2").intlTelInput("setCountry", code);



        }
    });
}

function getstateonly(code)
{
   
    var url = 'controllers/company_control.php?pmode=getStates&countryId='+code;
    
    $.ajax({
        type: 'GET',
        url: url,
        data: null,
        dataType: 'html',
        success: function (data) {
          
            $('#selprodstate').html(data);


        }
    });
}


function getcities(code)
{
     var url = 'controllers/company_control.php?pmode=getCities&stateId='+code;
    
    $.ajax({
        type: 'GET',
        url: url,
        data: null,
        dataType: 'html',
        success: function (data) {
           
            $('#txtcity').html(data);
             
//?            initPaymentTypes();
        }
    });
}

//update detailsc company
function funcuserinfo(form) {
                
        $.ajax({
            url: "controllers/usercontrol.php",
            type: "POST",
            data: new FormData(form),
            success: function(data)
            {

            }
        });

    }
    
// display filter div
function showfilt()
{
     $('#divfilter').fadeIn("slow");
}
    