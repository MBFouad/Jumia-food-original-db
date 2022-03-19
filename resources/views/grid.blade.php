<table class="table table-bordered" id="customers-table">
    <thead>
    <tr>
        <th>Country</th>
        <th>State</th>
        <th>Country Code</th>
        <th>Phone</th>
    </tr>
    </thead>
</table>

@section('scripts')
    <script>
        var grid = $('#customers-table').DataTable({
            processing: true,
            bFilter: false,
            lengthChange: false,
            serverSide: true,
            "ajax": {
                "url": "{!! route('customer.data') !!}",
                "data": function (reqData) {
                    reqData.country = $('#country').val();
                    reqData.status = $('#state').val();
                }
            },
            columns: [
                {data: 'country', name: 'country'},
                {data: 'status', name: 'status'},
                {data: 'country_code', name: 'country_code'},
                {data: 'phone', name: 'phone'}
            ]
        });

        let page = {
            reloadGrid: () => grid.ajax.reload(),
            filter: function () {
                $('#country').change(function () {
                    if ($(this).val() == '') {
                        page.resetSelect('#state');
                    }
                    page.reloadGrid();
                });
                $('#state').change(function () {
                    if ($('#country').val() != '') {
                        page.reloadGrid();
                    } else {
                        page.error('Please select Country first', () => page.resetSelect(this))
                    }
                });
            },
            resetSelect: (select) => $(select).val(''),
            error: function (message, callback) {
                alert(message);
                callback();
            },
            init: function () {
                page.filter();
            }
        }
        jQuery(document).ready(function () {
            page.init();
        });
    </script>
@endsection
