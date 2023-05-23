document.addEventListener('DOMContentLoaded', function() {
    const menuElement = document.getElementById('slide-menu');
    const allEvents = [
        'sm.back',
        'sm.open',
        'sm.close'
    ];


    allEvents.forEach(eventName => {
        menuElement.addEventListener(eventName, event);
    });

    const menu = new SlideMenu(menuElement, {
        position: 'left',
        submenuLinkAfter: ' <i class="fas fa-chevron-right float-right mt-1"></i>',
        backLinkBefore: '<i class="fas fa-chevron-left mr-2"></i> ',
    });

    $(".overlay").on("click", function() {
        menu.close();
    })

    menuElement.addEventListener('sm.open', function() {
        $('.hamburger_btn').addClass('is-open');
        $('html').addClass('overflow-hidden');
        $('body').addClass('overflow-hidden');
        $('.overlay').removeClass('d-none');
    })
    menuElement.addEventListener('sm.close', function() {
        $('.hamburger_btn').removeClass('is-open');
        $('html').removeClass('overflow-hidden');
        $('body').removeClass('overflow-hidden');
        $('.overlay').addClass('d-none');
    })
})
