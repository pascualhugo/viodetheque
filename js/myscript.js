

$(document).ready(function() {
    manageButtons();
    manageFaq();
});

function manageButtons() {
    $('button').on('click', function(event) {
        var elemId = event.target.id;
        if(elemId === 'hideAside') {
            $('aside').hide(2000);
        } else if (elemId === 'fadeImg') {
            $('img').fadeToggle(100);
        } else if (elemId === 'toggleMenu') {
            $('nav').slideToggle(100);
        }
    });
}

function manageFaq() {
    $('li').on('mouseenter', function (event) {
        $(this).find('dd').slideDown(500);
        $(this).siblings().filter(function () {
            return (!$(this).data().state) || $(this).data().state === 'closeable';
        }).find('dd').slideUp(500);

    }).on('click', function (event) {
        if (!$(this).data().state) {
            $(this).data({state: 'persistent', clicks: 0}).slideDown(100)
        } else if ('persistent' === $(this).data().state) {
            $(this).data('state', 'closeable').find('dd').slideUp(100);
        } else if ('closeable' === $(this).data().state) {
            $(this).data('state','persistent').find('dd').slideDown(100);
        }
        const clicks = ++$(this).data().clicks;
        $(this).find('strong').html('(' + clicks + 'clics)');
    })
}