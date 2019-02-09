
<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
        <span class="info-box-icon bg-black"><i class="fas fa-blog"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Articles</span>
            <span class="info-box-number">{{\App\Models\Post::count()}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
        <span class="info-box-icon bg-black"><i class="fas fa-drum"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Samples</span>
            <span class="info-box-number">{{\App\Models\Product::count()}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!-- /.col -->

<!-- fix for small devices only -->
<div class="clearfix visible-sm-block"></div>

<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
        <span class="info-box-icon bg-black"><i class="fas fa-cart-arrow-down"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Sales</span>
            <span class="info-box-number">{{\App\Models\Order::count()}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
        <span class="info-box-icon bg-black"><i class="ion ion-ios-people-outline"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Users</span>
            <span class="info-box-number">{{\App\Models\User::count()}}</span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!-- /.col -->
