<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">

                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ Route('delivery.dashboard') }}"><i class="fa-solid fa-house fa-fade"></i><span
                                class="right-nav-text">
                                {{ trans('sidebar_trans.Dashboard') }}
                            </span>
                        </a>
                    </li>


                    <!-- menu title -->
                    {{-- <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('sidebar_trans.Elements') }} </li> --}}


                    <!-- menu item Orders-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#orders-menu">
                            <div class="pull-left"><i class="fa-solid fa-cart-shopping fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Orders') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="orders-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a
                                    href="{{ Route('delivery.orders.index') }}">{{ trans('sidebar_trans.All_Orders') }}</a>
                            </li>
                            <li> <a
                                    href="{{ route('delivery.orders.reports', ['pending']) }}">{{ trans('sidebar_trans.Pending_Orders') }}</a>
                            </li>
                            <li> <a
                                    href="{{ route('delivery.orders.reports', ['processing']) }}">{{ trans('sidebar_trans.Processing_Orders') }}</a>
                            </li>
                            <li> <a
                                    href="{{ route('delivery.orders.reports', ['delivering']) }}">{{ trans('sidebar_trans.Delivering_Orders') }}</a>
                            </li>
                            <li> <a
                                    href="{{ route('delivery.orders.reports', ['completed']) }}">{{ trans('sidebar_trans.Completed_Orders') }}</a>
                            </li>
                            <li> <a
                                    href="{{ route('delivery.orders.reports', ['cancelled']) }}">{{ trans('sidebar_trans.Cancelled_Orders') }}</a>
                            </li>
                            <li> <a
                                    href="{{ route('delivery.orders.reports', ['refunded']) }}">{{ trans('sidebar_trans.Refunded_Orders') }}</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#reports-menu">
                            <div class="pull-left"><i class="fa-solid fa-cart-shopping fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Reports') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="reports-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a
                                    href="{{ Route('delivery.deliveredOrders.reports') }}">{{ trans('sidebar_trans.Delivery_Reports') }}</a>
                            </li>
                        </ul>
                    </li>



                </ul>
                </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
