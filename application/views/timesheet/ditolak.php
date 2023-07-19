<script>
    $(function() {
        $('#daterange').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
            table.draw();
        });
        $('#daterange').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            table.draw();
        });
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = moment($('#daterange').val().split(' - ')[0], 'YYYY-MM-DD');
                var max = moment($('#daterange').val().split(' - ')[1], 'YYYY-MM-DD');
                var date = moment(data[3], 'YYYY-MM-DD');
                if ($('#daterange').val() === '') {
                    return true;
                }
                if (min <= date && date <= max) {
                    return true;
                }
                return false;
            }
        );
        $('#daterange').keyup(function() {
            table.draw();
        });
        table.buttons().container()
            .appendTo($('.col-sm-6:eq(0)', table.table().container()));
    });
</script>