<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{ asset('back/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('back/app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('back/app-assets/vendors/css/extensions/tether-theme-arrows.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/app-assets/vendors/css/extensions/tether.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('back/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/app-assets/css/pages/dashboard-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/app-assets/css/pages/card-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('back/app-assets/css/plugins/tour/tour.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

    <!--Ck-editor-->
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <!--End-Ck-editor-->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    {{--Select2--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js" defer></script>

    <!--Material Design Iconic Font-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-floating footer-static  "
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ficon feather icon-menu"></i></a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                                                                   href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">John Doe</span><span
                                    class="user-status">Available</span></div>
                            <span><img class="round"
                                       src="{{ asset('back/app-assets/images/portrait/small/avatar-s-11.jpg') }}"
                                       alt="avatar" height="40" width="40"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                                                          href="page-user-profile.html"><i
                                    class="feather icon-user"></i> Edit Profile</a><a class="dropdown-item"
                                                                                      href="app-email.html"><i
                                    class="feather icon-mail"></i> My Inbox</a><a class="dropdown-item"
                                                                                  href="app-todo.html"><i
                                    class="feather icon-check-square"></i> Task</a><a class="dropdown-item"
                                                                                      href="app-chat.html"><i
                                    class="feather icon-message-square"></i> Chats</a>
{{--                            <form action="{{ route('logout') }}" method="POST">--}}
{{--                                @csrf--}}
{{--                                <div class="dropdown-divider"></div>--}}
{{--                                <button class="dropdown-item" type="submit"><i class="feather icon-power"></i> Logout--}}
{{--                                </button>--}}
{{--                            </form>--}}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a class="pb-25" href="#">
            <h6 class="text-primary mb-0">Files</h6>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="{{ asset('back/app-assets/images/icons/xls.png') }}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing
                        Manager</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;17kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="{{ asset('back/app-assets/images/icons/jpg.png') }}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd
                        Developer</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;11kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="{{ asset('back/app-assets/images/icons/pdf.png') }}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital
                        Marketing Manager</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;150kb</small>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="{{ asset('back/app-assets/images/icons/doc.png') }}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;256kb</small>
        </a></li>
    <li class="d-flex align-items-center"><a class="pb-25" href="#">
            <h6 class="text-primary mb-0">Members</h6>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="{{ asset('back/app-assets/images/portrait/small/avatar-s-8.jpg') }}"
                                               alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="{{ asset('back/app-assets/images/portrait/small/avatar-s-1.jpg') }}"
                                               alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd
                        Developer</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img
                        src="{{ asset('back/app-assets/images/portrait/small/avatar-s-14.jpg') }}" alt="png"
                        height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing
                        Manager</small>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a
            class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="{{ asset('back/app-assets/images/portrait/small/avatar-s-6.jpg') }}"
                                               alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
        </a></li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a
            class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No results found.</span>
            </div>
        </a></li>
</ul>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" target="_blank" href="{{ route('index') }}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Solanews</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                        class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header"><span>Apps</span>
            </li>
            <li class="nav-item @if(Route::current()->getName() == ('categories.index')) active @endif"><a href="{{ route('categories.index') }}"><i class="feather icon-mail"></i><span
                        class="menu-title">Категории</span></a>
            </li>
            <li class="nav-item @if(Route::current()->getName() == ('posts.index')) active @endif"><a href="{{ route('posts.index') }}"><i class="feather icon-message-square"></i><span
                        class="menu-title" data-i18n="Chat">Посты</span></a>
            </li>
{{--            <li class="nav-item @if(Route::current()->getName() == ('subcategories.index')) active @endif"><a href="{{ route('subcategories.index') }}"><i class="feather icon-check-square"></i><span--}}
{{--                        class="menu-title" data-i18n="Todo">Подкатегории</span></a>--}}
{{--            </li>--}}
{{--            <li class=" nav-item"><a href="app-calender.html"><i class="feather icon-calendar"></i><span--}}
{{--                        class="menu-title" data-i18n="Calender">Calender</span></a>--}}
{{--            </li>--}}
{{--            <li class=" nav-item"><a href="colors.html"><i class="feather icon-droplet"></i><span class="menu-title"--}}
{{--                                                                                                  data-i18n="Colors">Colors</span></a>--}}
{{--            </li>--}}
{{--            <li class=" nav-item"><a href="#"><i class="feather icon-eye"></i><span class="menu-title"--}}
{{--                                                                                    data-i18n="Icons">Icons</span></a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li><a href="icons-feather.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                              data-i18n="Feather">Feather</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="icons-font-awesome.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                   data-i18n="Font Awesome">Font Awesome</span></a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class=" nav-item"><a href="#"><i class="feather icon-briefcase"></i><span class="menu-title"--}}
{{--                                                                                          data-i18n="Components">Components</span></a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li><a href="component-alerts.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                 data-i18n="Alerts">Alerts</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-buttons-basic.html"><i class="feather icon-circle"></i><span--}}
{{--                                class="menu-item" data-i18n="Buttons">Buttons</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-breadcrumbs.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                      data-i18n="Breadcrumbs">Breadcrumbs</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-carousel.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                   data-i18n="Carousel">Carousel</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-collapse.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                   data-i18n="Collapse">Collapse</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-dropdowns.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                    data-i18n="Dropdowns">Dropdowns</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-list-group.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                     data-i18n="List Group">List Group</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-modals.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                 data-i18n="Modals">Modals</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-pagination.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                     data-i18n="Pagination">Pagination</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-navs-component.html"><i class="feather icon-circle"></i><span--}}
{{--                                class="menu-item" data-i18n="Navs Component">Navs Component</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-navbar.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                 data-i18n="Navbar">Navbar</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-tabs-component.html"><i class="feather icon-circle"></i><span--}}
{{--                                class="menu-item" data-i18n="Tabs Component">Tabs Component</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-pills-component.html"><i class="feather icon-circle"></i><span--}}
{{--                                class="menu-item" data-i18n="Pills Component">Pills Component</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-tooltips.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                   data-i18n="Tooltips">Tooltips</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-popovers.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                   data-i18n="Popovers">Popovers</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-badges.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                 data-i18n="Badges">Badges</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-pill-badges.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                      data-i18n="Pill Badges">Pill Badges</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-progress.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                   data-i18n="Progress">Progress</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-media-objects.html"><i class="feather icon-circle"></i><span--}}
{{--                                class="menu-item">Media Objects</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-spinner.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                  data-i18n="Spinner">Spinner</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="component-bs-toast.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                   data-i18n="Toasts">Toasts</span></a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class=" nav-item"><a href="#"><i class="feather icon-box"></i><span class="menu-title"--}}
{{--                                                                                    data-i18n="Extra Components">Extra Components</span></a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li><a href="ex-component-avatar.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                    data-i18n="Avatar">Avatar</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="ex-component-chips.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                   data-i18n="Chips">Chips</span></a>--}}
{{--                    </li>--}}
{{--                    <li><a href="ex-component-divider.html"><i class="feather icon-circle"></i><span class="menu-item"--}}
{{--                                                                                                     data-i18n="Divider">Divider</span></a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class=" nav-item"><a href="form-layout.html"><i class="feather icon-box"></i><span class="menu-title"--}}
{{--                                                                                                   data-i18n="Form Layout">Form Layout</span></a>--}}
{{--            </li>--}}
{{--            <li class=" nav-item"><a href="form-wizard.html"><i class="feather icon-package"></i><span--}}
{{--                        class="menu-title" data-i18n="Form Wizard">Form Wizard</span></a>--}}
{{--            </li>--}}
{{--            <li class=" nav-item"><a href="form-validation.html"><i class="feather icon-check-circle"></i><span--}}
{{--                        class="menu-title" data-i18n="Form Validation">Form Validation</span></a>--}}
{{--            </li>--}}
{{--            <li class=" nav-item"><a href="table.html"><i class="feather icon-server"></i><span class="menu-title"--}}
{{--                                                                                                data-i18n="Table">Table</span></a>--}}
{{--            </li>--}}

        </ul>
    </div>
</div>
<!-- END: Main Menu-->
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            {{--FLASHs--}}
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session()->has('warning'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session()->get('warning') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session()->has('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session()->get('danger') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{--end-FLASHs--}}

            @yield('content')

        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!--Ck-editor-->
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            items: [ 'bold', 'italic', '|', 'undo', 'redo', '-', 'numberedList', 'bulletedList' ],
            viewportTopOffset: 30,
            shouldNotGroupWhenFull: true,
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                ]
            }
        } )
</script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor2' ), {
            items: [ 'bold', 'italic', '|', 'undo', 'redo', '-', 'numberedList', 'bulletedList' ],
            viewportTopOffset: 30,
            shouldNotGroupWhenFull: true,
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                ]
            }
        } )
</script>
<!--End-Ck-editor-->

<!-- BEGIN: Vendor JS-->
<script src="{{ asset('back/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('back/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
<script src="{{ asset('back/app-assets/vendors/js/extensions/tether.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('back/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('back/app-assets/js/core/app.js') }}"></script>
<script src="{{ asset('back/app-assets/js/scripts/components.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('back/app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>
<!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
