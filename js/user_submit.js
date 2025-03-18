$(document).ready(function () {
    $('.progress-bar').each( function() {
            const rangeFillWidth = $(this).width() / $('.progress').width() * 100;  
            console.log(rangeFillWidth);
        if(rangeFillWidth < '30'){
            $(this).css('background-color','#ef4444');
        } else if(rangeFillWidth > '30' && rangeFillWidth <= '60'){
            $(this).css('background-color','#eab308');
        } else if(rangeFillWidth > '60' && rangeFillWidth <= '100'){
            $(this).css('background-color','#22c55e');
        }
    });
});