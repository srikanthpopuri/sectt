// JavaScript Document
function setState(id,url,datas){
	id='#'+id;
    rul=url;
		$htmlObj=$.ajax({
		 type:"POST",
		url:rul,
        ifModified:true,
	    dataType:"html",
		data: datas,
        cache: false,
		 beforeSend: function() {
             // Show your spinner
			 NProgress.start();
           // $('#formLoader').fadeIn();
		 }, 
		success: function(result) {
			NProgress.done();
			         //   $('#formLoader').fadeOut();
				 $(id).html(result);
				//alert(id);<img src="js/loading.gif" />
				 }
		 });
}


function setStateGet(id,url,datas){
	id='#'+id;
    rul=url;
		$htmlObj=$.ajax({
		 type:"GET",
		url:rul,
        ifModified:true,
	    dataType:"html",
		data: datas,
        cache: false,
		 beforeSend: function() {
             // Show your spinner
			 NProgress.start();
        //   $('#formLoader').fadeIn();	
				 }, 
		success: function(result) {
			NProgress.done();
			        //    $('#formLoader').fadeOut();
				 $(id).html(result);
				 }
		 });
}



function confirmDelete(id,path,datas){

if(confirm("Are you sure You want to delete this?")){
  setStateGet(id,path,datas);
}
}


//Form Animations
function animateForm(url,formData,tableData){
	
	$('.panel-body .btn-success').hide();

	 $("html:not(:animated),body:not(:animated)").animate({ scrollTop: 0}, 1000 );
	
	setTimeout(function()
            {
	
	$('#adminForm').effect( 'fadeIn', 350,function(){
	
	$(this).slideUp(200,function(){

	setStateGet('adminForm',url,formData);								 

	 });
  
	  });
	},900);
  	
	$('.panel-body .btn-success').fadeIn(2000);


     setStateGet('adminTable',url,tableData);

}



function navigate(rul,id){

	
	$('#navigation a').removeClass('active');
	$('#'+id).addClass('active');

$("#loading").css('display','inline');

//$("#l_bar").css('display','inline');

$('#content').slideUp("1000",function (){
  
  htmlobj=$.ajax({url:rul,cache:false,async:false,dataType:"html",timeout:4000,ifModified:true,
				 
				 
				 error: function( objAJAXRequest, strError,strError1 )
				 {    
				 alert(strError1);	  }		 
			
				 
				 });
																				

  $('#content').html(htmlobj.responseText);

$('#content').slideDown("3000");
 // $("#l_bar").css('display','none');
	    $("#loading").css('display','none');
		
								});

//setStateGet('rightDiv',url,'displayPage=1')
//	alert($('#'+id).text());
	
}

