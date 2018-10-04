$(document).ready(function(){
    $("#listen_add").click(function(){
        alert("abc");
        $.ajax({
            type: "GET",
            url: "test.json",
            data: {username:$("#username").val(), content:$("#content").val()},
            dataType: "json",
            success: function(data){
                $('#resText').empty();   //清空resText里面的所有内容
                var html = '';
                $.each(data, function(commentIndex, comment){
                    html += '<div class="comment"><h6>' + comment['username']
                        + ':</h6><p class="para"' + comment['content']
                        + '</p></div>';
                });
                $('#resText').html(html);
            }
        });
    });
});