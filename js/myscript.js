$(document).ready(function() {
    manageButtons();
});

function manageButtons() {
    $('button').on('click', function(event) {
        let elemId = event.target.id;
        if(elemId === 'hideAside') {
            $('aside').hide(2000);
        } else if (elemId === 'fadeImg') {
            $('img').fadeToggle(2000);
        } else if (elemId === 'toggleMenu') {
            $('nav').slideToggle(100);
        } else if (elemId === 'loadFaq') {
            let container = $(this).parent();
            container.html('<img src="../images/Loading_icon.gif" title="loading...">');
            $.ajax({
                url: '../view/faq.php',
            }).done(function (data) {
                container.html(data);
                manageFaq();
            });
        }
    });
}

function manageFaq() {
    $('#faq').find('li').on('mouseenter', function (event) {
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