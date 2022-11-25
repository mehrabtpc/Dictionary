<script src="{{asset('assets\plugins\sweet-alert\sweetalert.min.js')}}"></script>

<script>
    $(document).ready(function () {
        if (localStorage.getItem("deletedItems")) {
            swal({
                title: '!Successfully',
                text: 'Items that could be deleted were successfully deleted!',
                icon: 'success',
                dangerMode: false
            })
            localStorage.removeItem("deletedItems");
        }
    });

    $(function () {
            if (sessionStorage.reloadAfterPageLoad == true) {
                swal({
                    title: 'Successfully!',
                    text: 'Items that could be deleted were successfully deleted!',
                    icon: 'success',
                    dangerMode: false
                })
                sessionStorage.reloadAfterPageLoad = false;
            }
        }
    );
    $(document).ready(function () {
        $('#check_all').on('click', function (e) {
            if ($('#check_all').is(':checked', true)) {
                $(".checkbox").prop('checked', true);
            } else {
                $(".checkbox").prop('checked', false);
            }
        });
        $('.checkbox').on('click', function () {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#check_all').prop('checked', true);
            } else {
                $('#check_all').prop('checked', false);
            }
        });
        $('.delete-all').on('click', function (e) {
            var idsArr = [];
            $(".checkbox:checked").each(function () {
                idsArr.push($(this).attr('data-id'));
            });
            if (idsArr.length <= 0) {
                swal({
                    title: '!You did not choose',
                    text: 'Please select at least one item to delete',
                    icon: 'warning',
                    dangerMode: true
                })
            } else {
                swal({
                    title: '?Are You Sure',
                    text: '!After deleting this item, it cannot be recovered',
                    icon: 'warning',
                    buttons: ["Cancel", "Delete"],
                    dangerMode: true
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            var strIds = idsArr.join(",");
                            $.ajax({
                                url: "{{ route($model_name . '.multipleDelete') }}" + '?_token=' + '{{ csrf_token() }}',
                                type: 'DELETE',
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                data: 'ids=' + strIds,
                                success: function (data) {
                                    if (data['status'] == true) {
                                        $(".checkbox:checked").each(function () {
                                            $(this).parents("tr").remove();
                                        });
                                        localStorage.setItem("deletedItems", true);
                                        location.reload();
                                    } else {
                                        swal({
                                            title: 'Problem!',
                                            text: 'A problem has occurred in the execution of the operation. Try again.',
                                            icon: 'warning',
                                            dangerMode: true
                                        })
                                    }
                                },

                                error: function (data) {
                                    localStorage.setItem("deletedItems", true);
                                    location.reload();
                                }
                            });
                        }
                    });
            }
        });

        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.closest('form').submit();
            }
        });
    });
</script>
