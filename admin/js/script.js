
 $("a").on("click",function (){
    $(this).on('click',function(){
        if($(".angle-right").hasClass("fa-angle-right")){
        $(".angle-right").removeClass("fa-angle-right ");
        console.log("clicked")
        $(".angle-right").addClass("fa-angle-down"); 
    }
    else {
        $(".angle-right").removeClass("fa-angle-down");
        $(".angle-right").addClass("fa-angle-right ");
        
    }
    })
    
   
  })

 function previewFile(input){
    var file=$("input[type=file]").get(0).files[0];
    if(file){
        var reader= new FileReader();
        reader.onload=function (){
            $('.imageInput').attr("src",reader.result)
        }
        reader.readAsDataURL(file);
    }
 }

 $("form" ).submit(function(event){
    let email= $("#user_email").val();
    
    let password= $("#user_password").val();
     let confirm_password=$("#user_confirm_password").val();

     if(email=="" || password=="" || confirm_password==""){
        
         $("#email").append("<span class='text-danger'>Email shouldn't be empty</span>");
         $("#password").append("<span class='text-danger'>Password shouldn't be empty</span>");
         $("#confirm_password").append("<span class='text-danger'>Confirm Password shouldn't be empty</span>");
     } 
         else {
             if(password!=confirm_password){
        
             $("#confirm_password").append("<span class='text-danger'>Password and Confirm Password doesn't match</span>")
     }
     else {
         $("#head").append("<span class='text-success'>Account is successfully created</span>")
     }
     
         }
     
     
    
     event.preventDefault();
 })
 