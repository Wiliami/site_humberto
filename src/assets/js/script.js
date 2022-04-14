
$(function() {
    $('#form1').submit(function(e) {
        e.preventDefault();
    
    
        // var user_name = $('#user').val();
        var user_comment = $('#comment').val();
        console.log(user_comment);
    
        $.ajax({
            url: '',
            type: 'POST',
            data: {comment: user_comment},
            dataType: 'json',
        }).done(function(result) {
            console.log(result);
        });
        return false;
    });
})
