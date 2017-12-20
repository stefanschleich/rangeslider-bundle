/**
 * Contao RangeSlider Bundle
 *
 * @author Stefan Schleich <https://github.com/stefanschleich>
 */
(function(iife) {

    /**
     * Immediately Invoked Function Expression
     * http://gregfranko.com/jquery-best-practices/
     */
    iife(window.jQuery, window, document);

}(function($, window, document) {

    /**
     * Init rangeSlider on dom ready
     */
    $(function() {
        $('input[data-rangeslider]').ionRangeSlider();
    });
}));