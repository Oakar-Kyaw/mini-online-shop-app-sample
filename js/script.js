$(document).ready(function(){
    
    $('.carousel').carousel({
    interval: 2000
});

//isotope
var $grid = $('.collection-list').isotope({});
$('.filter-button-group').on( 'click', 'button', function() {
var filterValue = $(this).attr('data-filter');
removeActiveColor();
$(this).addClass("btn-active");
$grid.isotope({ filter: filterValue });
});
const findButton= $('.filter-button-group').find("button");
function removeActiveColor(){
    findButton.each(function(){
         $(this).removeClass("btn-active");
    })
    
};
$(".heart").on("click",function(){
    if($(this).hasClass('fa-solid')){
        $(this).removeClass('fa-solid heart-color');
    }
    else {
        $(this).addClass('fa-solid heart-color');
    }
});

$(".cat-button").on("click",function(){
    console.log("click")
})

$(".search-button").on('click',function(){
    $(".icon-button").css("display","none");
    $(".search").css("display","block");
})

$(".fa-xmark").on('click',function(){
    $(".icon-button").css("display","block");
    $(".search").css("display","none");
})

$("form" ).submit(function(event){
   let email= $("#user_email").val();
   let password= $("#user_password").val();
    let confirm_password=$("#user_confirm_password").val();
    if(empty(email) || empty(password) || empty(confirm_password)){
       
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


}
);   
let count=0;
let favorite=0;
$('.add-cart').on('click',function(){
    let item_id=$(this).val();
    
   $.ajax({
        type:"POST",
       url:`./home.php?add_cart=${item_id}`,
       success:function(){
            count++;
            $('.shop-noti').css('display','block')
           $('.shop-noti').html(count);
           $(this).html("Buy")
       }
    })
  
})

$('.shop-noti').on('click',function(){
    $(this).css('display','none')
})

$('.add-favorite').on('click',function(){
    let item_id=$(this).val();
    console.log(item_id)
   $.ajax({
        type:"POST",
       url:`./home.php?add_favorite=${item_id}`,
       success:function(){
            favorite++;
            $('.favorite-heart').css('display','block')
           $('.favorite-heart').html(favorite);
       }
    })
})

$('.favorite-heart').on('click',function(){
    $(this).css('display','none')
})