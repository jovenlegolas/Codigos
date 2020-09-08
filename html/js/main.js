$(document).ready(function()
{
    $(".pesquisa-card").click(function(){
        $(".icone-search").css('color','transparent');
    });
   
       
    $(".pesquisa-card").mouseout(function(){
        $(".icone-search").css('color','rgb(44, 2, 23)');
    });

 
    var menu = $('.btn-show-pass');
    var showPass = 0;
    menu.on('click', function()
    {   
        if(showPass == 0) 
        {
            $(this).next('input').attr('type','text');
            $(this).find('i').removeClass('fas fa-eye');
            $(this).find('i').removeClass('fa-eye');
            $(this).find('i').addClass('fas');
            $(this).find('i').addClass('fa-eye-slash');
            showPass = 1;
        }
        else 
        {
            $(this).next('input').attr('type','password');
            $(this).find('i').removeClass('fas'); 
            $(this).find('i').removeClass('fa-eye-slash');    
            $(this).find('i').addClass('fas'); 
            $(this).find('i').addClass('fa-eye');  
            showPass = 0;
        }

            if(showPass == 0)
                $('.input-senha').attr('type','password');
            else
                $('.input-senha').attr('type','text');
    });
    
});