$( document ).ready(function() {
    $(".form-submit").on("click", function(event) {
        event.preventDefault();
        $("#deleteCategoryForm")
            .attr('action', $(this).attr('data-categoryId'))
            .submit();
    });
});