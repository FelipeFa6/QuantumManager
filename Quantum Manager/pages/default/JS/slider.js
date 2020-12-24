$(document).ready(function(){
   
    let imgItems = $('.slider li').length;
    
    let imgPos = 0;
    
    for(let i=0 ; i < imgItems ; i++){
        $('.paginacion').append('<li class="fa fa-circle"></li>');
        
    }
    $('.slider li').hide();
    $('.slider li').first().show();
    $('.paginacion li').first().css({color:'#000000'});
    
    //Llamar funciones
    $('.paginacion li').click(paginacion);
    $('.der span').click(siguiente);
    $('.izq span').click(anterior);
    
    setInterval(function(){
        siguiente();
    }, 5000)
    //-----------------------
    
    function paginacion(){
        let p = $(this).index();
        
        $('.slider li').hide();
        $('.slider li').eq(p).fadeIn();
        $('.paginacion li').css({color:'grey'});
        $('.paginacion li').eq(p).css({color:'#000000'});
        
        imgPos = p;
    }
    
    function siguiente(){
        if(imgPos >= imgItems-1){
           imgPos = 0;
        }else{
            imgPos++;
        }
        $('.slider li').hide();
        $('.slider li').eq(imgPos).fadeIn();
        
        $('.paginacion li').css({color:'grey'});
        $('.paginacion li').eq(imgPos).css({color:'#000000'});
    }
    
    function anterior(){
        if(imgPos <= 0){
           imgPos = imgItems-1;
        }else{
            imgPos--;
        }
        $('.slider li').hide();
        $('.slider li').eq(imgPos).fadeIn();
        
        $('.paginacion li').css({color:'grey'});
        $('.paginacion li').eq(imgPos).css({color:'#000000'});
    }
});