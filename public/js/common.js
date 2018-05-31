$( document ).ready(function() {
    $(".form-submit").on("click", function(event) {
        console.log($(this));
        event.preventDefault();
        $("#deleteForm")
            .attr('action', $(this).attr('data-instanceId'))
            .submit();
    });
});