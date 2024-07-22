@extends('layout-admin')
@section('content-admin')
<!--start-top-serch-->
<div id="search">
    <form action="result.html" method="get">
        <input type="text" placeholder="Search here..." />
        <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
    </form>
</div>
    <!-- BEGIN CONTENT -->
    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/dashboard')}}" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i>
                    Home</a></div>
            <h1>Manage jobcategories</h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-title"> <span class="icon"><a href="form.html"> <i class="icon-plus"></i>
                                </a></span>
                            <h5>Add jobcategories</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Jobcategories image</th>
                                        <th>Name</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td></td>
                                        <td width='250'>
                                            <img src="" alt="">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href='#45' class='btn btn-success btn-mini'>Edit</a>
                                            <a href="" class='btn btn-danger btn-mini'>Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row" style="margin-left: 18px;">
                                <ul class="pagination">
                                    <li><a href=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
@endsection
