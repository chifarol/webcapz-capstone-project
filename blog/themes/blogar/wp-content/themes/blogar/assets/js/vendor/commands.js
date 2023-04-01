(function (window, document, $, undefined) {
    'use strict';

    $(".axilcopyLink").each(function(e) {
        $(this).on('click',function(){
            var link = $(this).data('link');
            var tempInput = document.createElement("input");
            tempInput.style = "position: absolute; left: -1000px; top: -1000px; opacity: 0;";
            tempInput.value = link;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            console.log("Copied:", tempInput.value);

            $(this).tooltip({
                trigger: 'click',
                placement: 'bottom'
            });
            var btn = $(this);
            setTooltip(btn, 'Copied');
            hideTooltip(btn);

            document.body.removeChild(tempInput);
        });
    });

    function setTooltip(btn, message) {
        btn.tooltip('hide')
            .attr('data-original-title', message)
            .tooltip('show');
    }

    function hideTooltip(btn) {
        setTimeout(function() {
            btn.tooltip('hide');
        }, 1000);
    }

})(window, document, jQuery);