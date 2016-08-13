$(document).ready(function () {
    var timer=0;
    
    $(".intro input:radio").click(function(){
        
        var temp=$(this).val();
        if (timer==0){
            countDown(900,"status");
            timer=1;
        }
        
        
        
        
        $(".testForm").load('');
     
        
    
        
    })
    
   

    
    
});