$('.button').on('click',function (e){
    var id = $(this).attr('id');
    var name = 'Almaz';
    $.post( "rent?id="+id, function( data ) {

        alert(data);
    });
})