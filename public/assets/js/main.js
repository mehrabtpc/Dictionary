//SweetAlert confirmation
function confirmDelete(formId) {
    swal({
            title: 'Are You Sure?',
            text: 'After deleting this item, it cannot be recovered!',
            icon: 'warning',
            buttons: ["Cancel", "Delete"],
            dangerMode: true
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById(formId).submit();
                swal('Items Deleted Successfully', {
                    icon: 'success',
                });
            }
        });
}

$(document).ready(function () {
    //Prevent multiple submit
    $('form.save').submit(function(){
        $(this).find(':submit').attr('disabled','disabled');
    });
    //Tooltip
    $('[data-toggle="tooltip"]').tooltip();
    //Comma format
    $('input.comma').on('keyup', function(event) {
        if(event.which >= 37 && event.which <= 40) return;
        $(this).val(function(index, value) {
            return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    });
    // Select2 by showing the search
    $('.select2-show-search').select2({
        minimumResultsForSearch: ''
    });

});
