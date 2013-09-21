(function($){
    //add classes to form inputs based on their type
    $('input').each(function(){
        $(this).addClass($(this).attr('type'));
    });

    //open external links in a new window
    $('a').filter(function(index){
        return /^https?:\/\/(www.)?/i.test($(this).attr('href')) && $(this).attr('href').toLowerCase().indexOf(window.location.hostname) == -1;
    }).attr('target', '_blank').addClass('external');

    //placeholders
    $('input, textarea').placeholder();
})(jQuery);