$(".my-rating").starRating({
    initialRating: 5,
    starSize: 30,
    strokeWidth: 9,
    strokeColor: 'black',
    ratedColors: ['#ffffff', '#b3dfda', '#80c9c1', '#34a99c', '#019383'],
    callback: function(currentRating) {
        $("#ratingValue").val(currentRating);
    }
});


$(function() {
    $('.my-rating-7').each(function() {
        var score = $(this).data('score');
        $(this).starRating({
            initialRating: score,
            readOnly: true,
            starSize: 25,
            activeColor: '#019383'
        });
    });
});
