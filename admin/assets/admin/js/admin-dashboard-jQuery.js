document.addEventListener("DOMContentLoaded", function(event) {

    (function ($) {
        let start = new Date();
        start.setDate(start.getDate());
        start.setHours(0, 0, 0, 0)

        let now = new Date();
        let diff = (now.getTime() - start.getTime()) / 1000;
        let clock = $('#homeStartClock').FlipClock(diff, {
            clockFace: 'HourlyCounter',
            countdown: false,
            showSeconds: true,
            language: 'de-de',
        });
    })(jQuery);

});