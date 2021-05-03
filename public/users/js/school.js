$(document).ready(function(){
	$(".attenclass").change(function()
    {
        var srclass =  $(".attenclass").val();
        console.log(srclass);
        if(srclass!="")
        {
            $.post("get/section",
            {
                srclass:srclass
            },
            function(data)
            {
                $(".attensection").removeAttr('disabled');
                var cont="<select class='form-control attensection' name='section'><option value=''>Select Section</option>";
                for(me in data)
                {
                    cont+= "<option value='"+data[me]['id']+"'>"+data[me]['section']+"</option>";
                }
                $('.mainsection').html(cont+"</select>");
            });
        }
    });
    
   
});