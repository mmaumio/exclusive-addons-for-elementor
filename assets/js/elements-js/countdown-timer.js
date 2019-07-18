// Countdown Timer
var CountdownTimer = function ($scope, $) {
    var $countdownTimerWrapper = $scope.find('[data-countdown]').eq(0);

    if (typeof $countdownTimerWrapper !== 'undefined' && $countdownTimerWrapper !== null) {		
        var $this = $countdownTimerWrapper,
            finalDate = $this.data('countdown'),
            day = $this.data('day'),
            hours = $this.data('hours'),
            minutes = $this.data('minutes'),
            seconds = $this.data('seconds');

        $this.countdown(finalDate, function (event) {
            $(this).html(event.strftime(' ' +
                '<div class="exad-countdown-container"><span class="exad-countdown-count">%-D </span><span class="exad-countdown-title">' + day + '</span></div>' +
                '<div class="exad-countdown-container"><span class="exad-countdown-count">%H </span><span class="exad-countdown-title">' + hours + '</span></div>' +
                '<div class="exad-countdown-container"><span class="exad-countdown-count">%M </span><span class="exad-countdown-title">' + minutes + '</span></div>' +
                '<div class="exad-countdown-container"><span class="exad-countdown-count">%S </span><span class="exad-countdown-title">' + seconds + '</span></div>'));
        }).on('finish.countdown', function (event) {
            $(this).html("<p class='message'>Hurrey! This is event day</p>");
        });
    }
};