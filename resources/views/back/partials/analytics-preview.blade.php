<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Page views (Last 7 days)</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table no-margin">
                <th>Page</th>
                <th>Visitors</th>
                <th>Views</th>
                <th>Date</th>
                <tbody>
                    @foreach($analyticsData as $data)
                        <tr>
                            <td>{{$data['pageTitle']}}</td>
                            <td>{{$data['visitors']}}</td>
                            <td>{{$data['pageViews']}}</td>
                            <td>{{$data['date']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
</div>
