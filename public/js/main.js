$(document).on('submit', '.rate-form', function (e) {
    e.preventDefault();

    var data = $(this).serializeArray();
    var url = $(this).attr('action');
    var block = $(this).closest('.itemBlock');
    $.ajax({
        url: url,
        method: 'POST',
        data: data
    }).done(function (json) {
        if(json.status == 'success'){
            block.find('.js_ratingValue').html(json.newRating)
        }else{
            alert(json.status)
        }
    })
});

$(document).on('submit', '.search-form', function (e) {
    e.preventDefault();
    var data = $(this).serializeArray();
    var url = $(this).attr('action');
    $.ajax({
        url: url,
        method: 'POST',
        data: data
    }).done(function (json) {
        $('.result-search').html(json)
    })
});

$(document).on('submit', '.sort-form', function (e) {
    e.preventDefault();
    var data = $(this).serializeArray();
    var url = $(this).attr('action');
    $.ajax({
        url: url,
        method: 'POST',
        data: data
    }).done(function (json) {
        $('.result-search').html(json)
    })
});