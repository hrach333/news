
$.ajax({
    type:"post",
    url:"/rubric/2",
    success:function(json){
        var data = JSON.parse(json);
        var content = $(".content");
        for(var i = 0; i < count(data); i++)
        {
            content.append('<h2>'+data.title+'</h2><p>'+data.description+'</p>');
        }
    }
})

