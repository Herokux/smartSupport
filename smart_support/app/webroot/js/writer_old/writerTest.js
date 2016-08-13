/******** CHARACTEERS COUNTER *******************/
function highlighter(parName, highlightedChars) {
    var mainText = parName.text();
    
    var highlitedText = mainText.substring(0,highlightedChars+1);
    var nonHighlightedText = mainText.substring(highlightedChars+1,mainText.length);
    // console.log(highlitedText);
    var changedValue = "<span class='highlighted'>" + highlitedText + "</span>" + nonHighlightedText;
    parName.html(changedValue);
}

var counter = function(TextAreaHeader) {
    var value = $(this).val();

    var totalChars = value.length;
    console.log(totalChars);
    console.log(this.id);
    switch (this.id) {
        case ("scrambleInput1"):
            highlighter($("#scrambleHighlight1"), totalChars-1);
            break;

        case ("scrambleInput2"):
            highlighter($("#scrambleHighlight2"), totalChars-1);
            break;

        case ("scrambleInput3"):
            highlighter($("#scrambleHighlight3"), totalChars-1);
            break;

        case ("scrambleInput4"):
            highlighter($("#scrambleHighlight4"), totalChars-1);
            break;

    }
};


var counterParent = function(TextArea) {
    $(TextArea).change(counter);
    $(TextArea).keydown(counter);
    $(TextArea).keypress(counter);
    $(TextArea).keyup(counter);
    $(TextArea).blur(counter);
    $(TextArea).focus(counter);
}
/******** CHARACTEERS COUNTER END*******************/







$(document).ready(function () {

    $(window).blur(function(){
        $("#violationAlert").click();
    })
    .focus(function(){
        $('#myModal').on('hidden.bs.modal', function (e) {
             location.reload();
        });
        
    });

    $("#startButton").click(function(){
        $(this).css({display:'none'});
        $(".testForm").css({display:'block'});
        
        countDown(600,"status");
        $(".testForm").css({display:'block'})
        
    
        
    })
    
    
    
    
    if ($("#list1").val()=="opt1")
    {
        $(this).attr("disabled");
    }
    
    
    counterParent("#scrambleInput1");
    counterParent("#scrambleInput2");
    counterParent("#scrambleInput3");
    counterParent("#scrambleInput4");
    
    
    
});