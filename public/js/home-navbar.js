$(document).ready(function() {
    $(window).scroll(function() {
        if($(this).scrollTop() > 500) {
            $('.navbar').addClass('solid');
            $('#search').removeClass('search-tran');
        } else {
            $('.navbar').removeClass('solid');
            $('#search').addClass('search-tran');
        }
    });
});
