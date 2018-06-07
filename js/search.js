{
    // // <!-- --------------- SEARCH --------------- -->
    let tlSearchReveal = new TimelineMax()
        .from('.ctn-search-form', 1, { autoAlpha: 0 })
        .from('.form-search', 1.8, { yPercent: 50, autoAlpha: 0, ease: Power3.easeOut }, .6)
        .reverse()

    //$('.search-icon, .holder-trg-search, .box-close-search, .ctn-search-home ').click(() => {
    $('p').click(() => {
        tlSearchReveal.reversed(!tlSearchReveal.reversed())
    });

    $(document).keyup(function (e) {
        if (e.keyCode == 27) { // escape key maps to keycode `27`
            tlSearchReveal.reverse()
        }
    });

}// close search
