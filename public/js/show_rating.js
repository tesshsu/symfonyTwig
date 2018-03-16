$(document).ready(function() {
    $('.rating-article').on('click', function(e) {
        e.preventDefault();
        var _self = this;
        $(this).toggleClass('fa-star-o').toggleClass('fa-star');

        $.ajax({
            method: 'POST',
            url: $(this).attr('href')
        }).done(function(data) {
            $('.js-like-article-count').html(data.stars);
        })
    });
});
