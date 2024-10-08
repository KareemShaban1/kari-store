<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/style.css') }}" />

</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--=================================
 preloader -->


        <!--=================================
 header start-->

        <nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="index.html"><img src="images/logo-dark.png" alt=""></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-icon-dark.png"
                        alt=""></a>
            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>
                <li class="nav-item">
                    <div class="search">
                        <a class="search-btn not_click" href="javascript:void(0);"></a>
                        <div class="search-box not-click">
                            <input type="text" class="not-click form-control" placeholder="Search" value=""
                                name="search">
                            <button class="search-button" type="submit"> <i
                                    class="fa fa-search not-click"></i></button>
                        </div>
                    </div>
                </li>
            </ul>
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="ti-bell"></i>
                        <span class="badge badge-danger notification-status"> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                        <div class="dropdown-header notifications">
                            <strong>Notifications</strong>
                            <span class="badge badge-pill badge-warning">05</span>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">New registered user <small
                                class="float-right text-muted time">Just now</small> </a>
                        <a href="#" class="dropdown-item">New invoice received <small
                                class="float-right text-muted time">22 mins</small> </a>
                        <a href="#" class="dropdown-item">Server error report<small
                                class="float-right text-muted time">7 hrs</small> </a>
                        <a href="#" class="dropdown-item">Database report<small
                                class="float-right text-muted time">1 days</small> </a>
                        <a href="#" class="dropdown-item">Order confirmation<small
                                class="float-right text-muted time">2 days</small> </a>
                    </div>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="true"> <i class=" ti-view-grid"></i> </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-big">
                        <div class="dropdown-header">
                            <strong>Quick Links</strong>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="nav-grid">
                            <a href="#" class="nav-grid-item"><i class="ti-files text-primary"></i>
                                <h5>New Task</h5>
                            </a>
                            <a href="#" class="nav-grid-item"><i class="ti-check-box text-success"></i>
                                <h5>Assign Task</h5>
                            </a>
                        </div>
                        <div class="nav-grid">
                            <a href="#" class="nav-grid-item"><i class="ti-pencil-alt text-warning"></i>
                                <h5>Add Orders</h5>
                            </a>
                            <a href="#" class="nav-grid-item"><i class="ti-truck text-danger "></i>
                                <h5>New Orders</h5>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="images/profile-avatar.jpg" alt="avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0">Michael Bean</h5>
                                    <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="e18c88828980848dcc8384808fa18c80888dcf828e8c">[email&#160;protected]</a></span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i>Activity</a>
                        <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>Messages</a>
                        <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Profile</a>
                        <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Projects <span
                                class="badge badge-info">6</span> </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
                        <a class="dropdown-item" href="#"><i class="text-danger ti-unlock"></i>Logout</a>
                    </div>
                </li>
            </ul>
        </nav>

        <!--=================================
 header End-->

        <!--=================================
 Main content -->

        <div class="container-fluid">
            <div class="row">
                <!-- Left Sidebar -->
                <div class="side-menu-fixed">
                    <div class="scrollbar side-menu-bg">
                        <ul class="nav navbar-nav side-menu" id="sidebarnav">
                            <!-- menu item Dashboard-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                                    <div class="pull-left"><i class="ti-home"></i><span
                                            class="right-nav-text">Dashboard</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                                    <li> <a href="index.html">Dashboard 01</a> </li>
                                    <li> <a href="index-02.html">Dashboard 02</a> </li>
                                    <li> <a href="index-03.html">Dashboard 03</a> </li>
                                    <li> <a href="index-04.html">Dashboard 04</a> </li>
                                    <li> <a href="index-05.html">Dashboard 05</a> </li>
                                </ul>
                            </li>
                            <!-- menu title -->
                            <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>
                            <!-- menu item Elements-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                                    <div class="pull-left"><i class="ti-palette"></i><span
                                            class="right-nav-text">Elements</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="elements" class="collapse" data-parent="#sidebarnav">
                                    <li><a href="accordions.html">Accordions</a></li>
                                    <li><a href="alerts.html">Alerts</a></li>
                                    <li><a href="button.html">Button</a></li>
                                    <li><a href="colorpicker.html">Colorpicker</a></li>
                                    <li><a href="dropdown.html">Dropdown</a></li>
                                    <li><a href="lists.html">lists</a></li>
                                    <li><a href="modal.html">modal</a></li>
                                    <li><a href="nav.html">nav</a></li>
                                    <li><a href="nicescroll.html">nicescroll</a></li>
                                    <li><a href="pricing-table.html">pricing table</a></li>
                                    <li><a href="ratings.html">ratings</a></li>
                                    <li><a href="date-picker.html">date picker</a></li>
                                    <li><a href="tabs.html">tabs</a></li>
                                    <li><a href="typography.html">typography</a></li>
                                    <li><a href="popover-tooltips.html">Popover tooltips</a></li>
                                    <li><a href="progress.html">progress</a></li>
                                    <li><a href="switch.html">switch</a></li>
                                    <li><a href="sweetalert2.html">sweetalert2</a></li>
                                    <li><a href="touchspin.html">touchspin</a></li>
                                </ul>
                            </li>
                            <!-- menu item calendar-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                                    <div class="pull-left"><i class="ti-calendar"></i><span
                                            class="right-nav-text">calendar</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                                    <li> <a href="calendar.html">Events Calendar </a> </li>
                                    <li> <a href="calendar-list.html">List Calendar</a> </li>
                                </ul>
                            </li>
                            <!-- menu item todo-->
                            <li>
                                <a href="todo-list.html"><i class="ti-menu-alt"></i><span class="right-nav-text">Todo
                                        list</span> </a>
                            </li>
                            <!-- menu item chat-->
                            <li>
                                <a href="chat-page.html"><i class="ti-comments"></i><span class="right-nav-text">Chat
                                    </span></a>
                            </li>
                            <!-- menu item mailbox-->
                            <li>
                                <a href="mail-box.html"><i class="ti-email"></i><span class="right-nav-text">Mail
                                        box</span> <span
                                        class="badge badge-pill badge-warning float-right mt-1">HOT</span> </a>
                            </li>
                            <!-- menu item Charts-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#chart">
                                    <div class="pull-left"><i class="ti-pie-chart"></i><span
                                            class="right-nav-text">Charts</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="chart" class="collapse" data-parent="#sidebarnav">
                                    <li> <a href="chart-js.html">Chart.js</a> </li>
                                    <li> <a href="chart-morris.html">Chart morris </a> </li>
                                    <li> <a href="chart-sparkline.html">Chart Sparkline</a> </li>
                                </ul>
                            </li>

                            <!-- menu font icon-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                                    <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">font
                                            icon</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                                    <li> <a href="fontawesome-icon.html">font Awesome</a> </li>
                                    <li> <a href="themify-icons.html">Themify icons</a> </li>
                                    <li> <a href="weather-icon.html">Weather icons</a> </li>
                                </ul>
                            </li>
                            <!-- menu title -->
                            <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Widgets, Forms & Tables
                            </li>
                            <!-- menu item Widgets-->
                            <li>
                                <a href="widgets.html"><i class="ti-blackboard"></i><span
                                        class="right-nav-text">Widgets</span> <span
                                        class="badge badge-pill badge-danger float-right mt-1">59</span> </a>
                            </li>
                            <!-- menu item Form-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                                    <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Form
                                            & Editor</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Form" class="collapse" data-parent="#sidebarnav">
                                    <li> <a href="editor.html">Editor</a> </li>
                                    <li> <a href="editor-markdown.html">Editor Markdown</a> </li>
                                    <li> <a href="form-input.html">Form input</a> </li>
                                    <li> <a href="form-validation-jquery.html">form validation jquery</a> </li>
                                    <li> <a href="form-wizard.html">form wizard</a> </li>
                                    <li> <a href="form-repeater.html">form repeater</a> </li>
                                    <li> <a href="input-group.html">input group</a> </li>
                                    <li> <a href="toastr.html">toastr</a> </li>
                                </ul>
                            </li>
                            <!-- menu item table -->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                                    <div class="pull-left"><i class="ti-layout-tab-window"></i><span
                                            class="right-nav-text">data table</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="table" class="collapse" data-parent="#sidebarnav">
                                    <li> <a href="data-html-table.html">Data html table</a> </li>
                                    <li> <a href="data-local.html">Data local</a> </li>
                                    <li> <a href="data-table.html">Data table</a> </li>
                                </ul>
                            </li>
                            <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">More Pages</li>
                            <!-- menu item Custom pages-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
                                    <div class="pull-left"><i class="ti-file"></i><span class="right-nav-text">Custom
                                            pages</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="custom-page" class="collapse" data-parent="#sidebarnav">
                                    <li> <a href="projects.html">projects</a> </li>
                                    <li> <a href="project-summary.html">Projects summary</a> </li>
                                    <li> <a href="profile.html">profile</a> </li>
                                    <li> <a href="app-contacts.html">App contacts</a> </li>
                                    <li> <a href="contacts.html">Contacts</a> </li>
                                    <li> <a href="file-manager.html">file manager</a> </li>
                                    <li> <a href="invoice.html">Invoice</a> </li>
                                    <li> <a href="blank.html">Blank page</a> </li>
                                    <li> <a href="layout-container.html">layout container</a> </li>
                                    <li> <a href="error.html">Error</a> </li>
                                    <li> <a href="faqs.html">faqs</a> </li>
                                </ul>
                            </li>
                            <!-- menu item Authentication-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#authentication">
                                    <div class="pull-left"><i class="ti-id-badge"></i><span
                                            class="right-nav-text">Authentication</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="authentication" class="collapse" data-parent="#sidebarnav">
                                    <li> <a href="login.html">login</a> </li>
                                    <li> <a href="register.html">register</a> </li>
                                    <li> <a href="lockscreen.html">Lock screen</a> </li>
                                </ul>
                            </li>
                            <!-- menu item maps-->
                            <li>
                                <a href="maps.html"><i class="ti-location-pin"></i><span
                                        class="right-nav-text">maps</span> <span
                                        class="badge badge-pill badge-success float-right mt-1">06</span></a>
                            </li>
                            <!-- menu item timeline-->
                            <li>
                                <a href="timeline.html"><i class="ti-panel"></i><span
                                        class="right-nav-text">timeline</span> </a>
                            </li>
                            <!-- menu item Multi level-->
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#multi-level">
                                    <div class="pull-left"><i class="ti-layers"></i><span
                                            class="right-nav-text">Multi level Menu</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="multi-level" class="collapse" data-parent="#sidebarnav">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse"
                                            data-target="#auth">Level item 1<div class="pull-right"><i
                                                    class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="auth" class="collapse">
                                            <li>
                                                <a href="javascript:void(0);" data-toggle="collapse"
                                                    data-target="#login">Level item 1.1<div class="pull-right"><i
                                                            class="ti-plus"></i></div>
                                                    <div class="clearfix"></div>
                                                </a>
                                                <ul id="login" class="collapse">
                                                    <li>
                                                        <a href="javascript:void(0);" data-toggle="collapse"
                                                            data-target="#invoice">level item 1.1.1<div
                                                                class="pull-right"><i class="ti-plus"></i></div>
                                                            <div class="clearfix"></div>
                                                        </a>
                                                        <ul id="invoice" class="collapse">
                                                            <li> <a href="#">level item 1.1.1.1</a> </li>
                                                            <li> <a href="#">level item 1.1.1.2</a> </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li> <a href="#">level item 1.2</a> </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse"
                                            data-target="#error">level item 2<div class="pull-right"><i
                                                    class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="error" class="collapse">
                                            <li> <a href="#">level item 2.1</a> </li>
                                            <li> <a href="#">level item 2.2</a> </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- Left Sidebar End-->

                <!--=================================
 Main content -->

                <!--=================================
wrapper -->

                <div class="content-wrapper">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="mb-0"> Chart Js</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                                    <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                                    <li class="breadcrumb-item active">Chart Js</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-30">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Line Stacked </h5>
                                    <div class="chart-wrapper" style="width: 100%; margin: 0 auto;">
                                        <canvas id="canvas1" width="800"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-30">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Line Styles </h5>
                                    <div class="chart-wrapper" style="width: 100%; margin: 0 auto;">
                                        <canvas id="canvas2" width="800"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-30">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Doughnut </h5>
                                    <div class="chart-wrapper">
                                        <div id="canvas-holder" style="width: 100%; margin: 0 auto; height: 300px;">
                                            <canvas id="canvas3" width="550"></canvas>
                                            <button class="button gray x-small mt-50" id="addData">Add Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-30">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Combo </h5>
                                    <div class="chart-wrapper" style="width: 100%; margin: 0 auto;">
                                        <canvas id="canvas4" width="800"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-30">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Custom Points </h5>
                                    <div id="canvas-holder1" class="chart-wrapper"
                                        style="width: 100%; margin:0 auto;">
                                        <canvas id="canvas5" width="800"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-30">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Chart Basic </h5>
                                    <div class="chart-wrapper" style="width: 100%; margin: 0 auto;">
                                        <canvas id="canvas6" width="800"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-30">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Different Point Sizes</h5>
                                    <div class="chart-wrapper" style="width: 100%; margin: 0 auto;">
                                        <canvas id="canvas7" width="800"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-30">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title"> Stacked </h5>
                                    <div class="chart-wrapper" style="width: 100%; margin: 0 auto;">
                                        <canvas id="canvas8" width="800"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--=================================
 wrapper -->


                    <!--=================================
 footer -->

                    <footer class="bg-white p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-center text-md-left">
                                    <p class="mb-0"> &copy; Copyright <span id="copyright">
                                            <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                                            <script>
                                                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                                            </script>
                                        </span>. <a href="#"> Webmin </a> All Rights Reserved. </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <ul class="text-center text-md-right">
                                    <li class="list-inline-item"><a href="#">Terms & Conditions </a> </li>
                                    <li class="list-inline-item"><a href="#">API Use Policy </a> </li>
                                    <li class="list-inline-item"><a href="#">Privacy Policy </a> </li>
                                </ul>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <!--=================================
 footer -->



    <!--=================================
 jquery -->

    <!-- jquery -->
    <script src="{{ asset('backend/assets/js/jquery-3.3.1.min.js') }}"></script>

    <!-- plugins-jquery -->
    <script src="{{ asset('backend/assets/js/plugins-jquery.js') }}"></script>

    <!-- plugin_path -->
    <script>
        var plugin_path = '{{ asset('backend/assets/js/') }}';
    </script>

    <!-- chart -->
    <script src="{{ asset('backend/assets/js/chart-init.js') }}"></script>

    <!-- calendar -->
    <script src="{{ asset('backend/assets/js/calendar.init.js') }}"></script>

    <!-- charts sparkline -->
    <script src="{{ asset('backend/assets/js/sparkline.init.js') }}"></script>

    <!-- charts morris -->
    <script src="{{ asset('backend/assets/js/morris.init.js') }}"></script>

    <!-- datepicker -->
    <script src="{{ asset('backend/assets/js/datepicker.js') }}"></script>

    <!-- sweetalert2 -->
    <script src="js/sweetalert2.js"></script>

    <!-- toastr -->
    <script src="{{ asset('backend/assets/js/toastr.js') }}"></script>

    <!-- validation -->
    <script src="{{ asset('backend/assets/js/validation.js') }}"></script>

    <!-- lobilist -->
    <script src="{{ asset('backend/assets/js/lobilist.js') }}"></script>

    <!-- custom -->
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>

</body>

</html>
