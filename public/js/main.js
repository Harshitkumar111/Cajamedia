$(".toggle-password").click(function() {
    
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });
 
 CKEDITOR.replace('pagedescription');


 $(document).ready(function() {
  $('.js-example-basic-multiple').select2();
});


function add(){               
  var name=$("input[name=name]").val(); 
  var email=$("input[name=email]").val(); 
  var number=$("input[name=number]").val(); 
  var fordata=new FormData();                   
      fordata.append('name',name);
      fordata.append('email',email);
      fordata.append('number',number);
      $.ajaxSetup({
        headers: {   
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
      type: "POST",
      url: '/saveajax',
      data: fordata,
      processData: false,
      contentType: false,
      success: function(response){
          if(response=="1"){
              // alert("Success");
              $('#testcase')[0].reset();
              $('#exampleModal').modal('hide');  
              tablerecord();                     
          }  
      else{
          alert("Somthing in went Wrong") 
      } }              
    });
}


tablerecord()
function tablerecord(){
    
     $.ajaxSetup({
        headers: {   
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
         jQuery.ajax({
                 url:"/tablerecord",
                 type: "POST",
                 dataType:"html",
                 success:function(response){ 
                    

                     $('#hello').html(response);
                     
                     return false;
                }                          
        });
     }
     function DeleteUser(deleteid){
      var conf= confirm(" Are you sure ");
      $.ajaxSetup({
          headers: {   
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      if(conf==true){
          jQuery.ajax({
              url:'/DeleteUser',
              type:'POST',
              data: {
                   'deleteid':deleteid,
                 
                },
              success:function(data){
                alert('Delete Success')
                tablerecord()
              }
          });
      }
  }


  function GetData(id){
    $.ajaxSetup({
        headers: {   
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
                url:"/getdetails",
                type:"POST",
                data:{ 'editid':id,                              
                },
                success:function(user){
                var userData=JSON.parse(user);                          
                $('#hidden_id').val(id);                   
                $("input[name=upname]").val(userData.name);                          
                $("input[name=upemail]").val(userData.email);    
                $("input[name=upnumber]").val(userData.phone);                                                      
                }
              });
    }
    function up(){         
      var id= $('#hidden_id').val();      
      var name=$("input[name=upname]").val(); 
      var email=$("input[name=upemail]").val(); 
      var number=$("input[name=upnumber]").val(); 
      var fordata=new FormData();  
          fordata.append('id',id);                                                  
          fordata.append('name',name);
          fordata.append('email',email);
          fordata.append('number',number);
          $.ajaxSetup({
            headers: {   
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          $.ajax({
          type: "POST",
          url: '/upajax',
          data: fordata,
          processData: false,
          contentType: false,
          success: function(response){
              if(response=="1"){
                  alert("Update Success");
                  $('#uptestcase')[0].reset();
                  $('#updateexampleModal').modal('hide');  
                  tablerecord()                     
              }  
          else{
              alert("Somthing in went Wrong") 
          } }              
        });
    }