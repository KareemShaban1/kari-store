<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                   
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{Route('backend.dashboard')}}"><i class="fa-solid fa-house fa-fade"></i><span class="right-nav-text">
                                {{ trans('sidebar_trans.Dashboard') }}
                            </span> 
                        </a>
                    </li>


                    <!-- menu title -->
                    {{-- <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('sidebar_trans.Elements') }} </li> --}}
                    
                    
                     <!-- menu item WebsiteParts-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#websiteParts-menu">
                            <div class="pull-left"><i class="fa-solid fa-image fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.WebsiteParts') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="websiteParts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('backend.websiteParts.create')}}">{{ trans('sidebar_trans.Add_WebsitePart') }} </a> </li>
                            <li> <a href="{{Route('backend.websiteParts.index')}}">{{ trans('sidebar_trans.All_WebsiteParts') }} </a> </li>
                            {{-- <li> <a href="{{Route('backend.brands.trash')}}">{{ trans('sidebar_trans.Trash_WebsiteParts') }}</a> </li> --}}

                        </ul>
                    </li>

                    <!-- menu item Banners-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#banners-menu">
                            <div class="pull-left"><i class="fa-solid fa-image fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Banners') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="banners-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('backend.banners.create')}}">{{ trans('sidebar_trans.Add_Banner') }} </a> </li>
                            <li> <a href="{{Route('backend.banners.index')}}">{{ trans('sidebar_trans.All_Banners') }} </a> </li>
                            {{-- <li> <a href="{{Route('backend.brands.trash')}}">{{ trans('sidebar_trans.Trash_Banners') }}</a> </li> --}}

                        </ul>
                    </li>


                     <!-- menu item Brands-->
                     @can('view','App\Models\Brand')
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#brands-menu">
                            <div class="pull-left"><i class="fa-sharp fa-solid fa-list fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Brands') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="brands-menu" class="collapse" data-parent="#sidebarnav">
                            @can('create','App\Models\Brand')
                            <li> <a href="{{Route('backend.brands.create')}}">{{ trans('sidebar_trans.Add_Brand') }} </a> </li>
                            @endcan
                            @can('view','App\Models\Brand')
                            <li> <a href="{{Route('backend.brands.index')}}">{{ trans('sidebar_trans.All_Brands') }}</a> </li>
                            @endcan
                            {{-- <li> <a href="{{Route('backend.brands.trash')}}">{{ trans('sidebar_trans.Trash_Brands') }}</a> </li> --}}

                        </ul>
                    </li>
                    @endcan

                     <!-- menu item Stores-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#stores-menu">
                            <div class="pull-left"><i class="fa-solid fa-store fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Stores') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="stores-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('backend.stores.create')}}">{{ trans('sidebar_trans.Add_Store') }} </a> </li>
                            <li> <a href="{{Route('backend.stores.index')}}">{{ trans('sidebar_trans.All_Stores') }} </a> </li>
                            {{-- <li> <a href="{{Route('backend.stores.trash')}}">{{ trans('sidebar_trans.Trash_Stores') }}</a> </li> --}}
                        </ul>
                    </li>
                    
                     <!-- menu item Categories-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#categories-menu">
                            <div class="pull-left"><i class="fa-solid fa-tags fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Categories') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="categories-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('backend.categories.create')}}">{{ trans('sidebar_trans.Add_Category') }} </a> </li>
                            <li> <a href="{{Route('backend.categories.index')}}">{{ trans('sidebar_trans.All_Categories') }}</a> </li>
                            <li> <a href="{{Route('backend.categories.trash')}}">{{ trans('sidebar_trans.Trash_Categories') }}</a> </li>

                        </ul>
                    </li>

                     


                    <!-- menu item Products-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#products-menu">
                            <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Products') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="products-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('backend.products.create')}}">{{ trans('sidebar_trans.Add_Product') }} </a> </li>
                            <li> <a href="{{Route('backend.products.index')}}">{{ trans('sidebar_trans.All_Products') }}</a> </li>
                            
                        </ul>
                    </li>


                    <!-- menu  Attributes-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#attributes-menu">
                            <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Attributes') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="attributes-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('backend.attributes.create')}}">{{ trans('sidebar_trans.Add_Attribute') }} </a> </li>
                            <li> <a href="{{Route('backend.attributes.index')}}">{{ trans('sidebar_trans.All_Attributes') }}</a> </li>
                            
                        </ul>
                    </li>


                     <!-- menu  Attribute Values-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#attribute_values-menu">
                            <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Attribute_Values') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="attribute_values-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('backend.attribute_values.create')}}">{{ trans('sidebar_trans.Add_Attribute_Value') }} </a> </li>
                            <li> <a href="{{Route('backend.attribute_values.index')}}">{{ trans('sidebar_trans.All_Attribute_Values') }}</a> </li>
                            
                        </ul>
                    </li>

                     <!-- menu  Coupons-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#coupons-menu">
                            <div class="pull-left"><i class="fa-brands fa-product-hunt fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Coupons') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="coupons-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('backend.coupons.create')}}">{{ trans('sidebar_trans.Add_Coupon') }} </a> </li>
                            <li> <a href="{{Route('backend.coupons.index')}}">{{ trans('sidebar_trans.All_Coupons') }}</a> </li>
                            
                        </ul>
                    </li>


                    <!-- menu item Orders-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#orders-menu">
                            <div class="pull-left"><i class="fa-solid fa-cart-shopping fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Orders') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="orders-menu" class="collapse" data-parent="#sidebarnav">
                            {{-- <li> <a href="{{Route('backend.orders.create')}}">{{ trans('sidebar_trans.Add_Order') }} </a> </li> --}}
                            <li> <a href="{{Route('backend.orders.index')}}">{{ trans('sidebar_trans.All_Orders') }}</a> </li>
                        </ul>
                    </li>

                    
                     <!-- menu item roles-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#roles-menu">
                            <div class="pull-left"><i class="fa-solid fa-check fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Roles') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="roles-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('backend.roles.create')}}">{{ trans('sidebar_trans.Add_Role') }} </a> </li>
                            <li> <a href="{{Route('backend.roles.index')}}">{{ trans('sidebar_trans.All_Roles') }}</a> </li>
                        </ul>
                    </li>
                    
                    


                    <!-- menu item Admins-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#admins-menu">
                            <div class="pull-left"><i class="fa-solid fa-user-tie fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Admins') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="admins-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('backend.admins.create')}}">{{ trans('sidebar_trans.Add_Admin') }} </a> </li>
                            <li> <a href="{{Route('backend.admins.index')}}">{{ trans('sidebar_trans.All_Admins') }}</a> </li>
                        </ul>
                    </li>


                     <!-- menu item Users-->
                     <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#users-menu">
                            <div class="pull-left"><i class="fa-solid fa-users fa-fade"></i><span
                                    class="right-nav-text">{{ trans('sidebar_trans.Users') }} </span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="users-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{Route('backend.profile.edit')}}">{{ trans('sidebar_trans.Edit_Profile') }} </a> </li>
                            <li> <a href="">{{ trans('sidebar_trans.All_User') }}</a> </li>
                        </ul>
                    </li>

                    
                    
                
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
