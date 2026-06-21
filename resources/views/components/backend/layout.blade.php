<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @hasSection('meta-csrf')
        <meta name="l-csrf-token" content="@yield('meta-csrf')">
    @endif

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{ asset('_backend/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('_backend/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('_backend/quill.css') }}">
    <link rel="stylesheet" href="{{ asset('_backend/vs2015.css') }}">

{{--    <link href="//db.onlinewebfonts.com/c/bb018e64d01355748d8ddc53553850b9?family=Cerebri+Sans" rel="stylesheet" type="text/css"/>--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Map -->
    <link href="{{ asset('_backend/mapbox-gl') }}.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('_frontend/vendor/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('_backend/jquery-datetimepicker-1/jquery.datetimepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('_backend/daterangepicker/daterangepicker.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('_backend/theme.css') }}" id="stylesheetLight">
    <link rel="stylesheet" href="{{ asset('_backend/theme-dark') }}.css" id="stylesheetDark" disabled="">
{{--    <link rel="stylesheet" href="{{ asset('_frontend/assets/vendor/fontawesome/css/all.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('_backend/font-awesome/css/fontawesome.min.css') }}">--}}

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="{{ asset('_backend/jquery-fancy-fileuploader/fancy_fileupload.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('_backend/summernote/summernote-lite.min.css') }}">

    <link rel="stylesheet" href="{{ asset('_backend/vms-morph-1002.css') }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('_common/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('_common/img/favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('_common/img/favicon/favicon-32x32.png') }}">
    <meta name="theme-color" content="#ffffff">
    <style>
        .navbar-brand-img, .navbar-brand > img { max-height: 70px; }
        .navbar-vertical.navbar-expand-md .navbar-brand-img { max-height: initial; }
        .dataTables_wrapper { margin: 15px 10px; }
        .dt-buttons { margin-bottom: 5px; }
        .image-preview-container { margin: 5px 0; display: flex; flex-wrap: wrap; }
        .image-preview-container > div { margin: 10px 0; width: 20%; padding: 5px; }

        .image-preview {
            margin: 5px 0;
            max-width: 100%;
            max-height: 180px;
        }

        .image-details {
            display: block;
            font-size: 12px;
            color: #777;
            margin-top: 5px;
            text-align: center;
        }

        .remove-image {
            color: #f05d5b;
            cursor: pointer;
            font-size: .85em;
        }
        .c-h6 { font-size: 1.5em; margin-top: 40px; margin-bottom: 15px; }
        .c-h6 .info { background-color: #12959b; color: white; float: right; margin-top: .2rem; margin-left: 6px; padding: 2px 8px; border-radius: 2px; }
        .card-title { margin-bottom: 0; font-size: 1.1em; font-weight: 500; }
        .navbar-dark.navbar-vibrant { background: #20A044; background: radial-gradient(at left top, #20A044, #015C79); }
        .draggable { cursor: move; }

        /* Summernote */
        .note-toolbar .dropdown-toggle::after { border: none; }
        .note-editor.note-frame.fullscreen { background: #fff; }

        /* Theme Overrides/Customization */
        .note-toolbar .dropdown-toggle::after { content: ''; }

        /* LSF */
        input[type="radio"].lsf-toggle { display: none; }
        .lsf-toggle + label { display: inline-block; padding: 10px 20px; margin: 5px; border-radius: 25px; cursor: pointer; border: 1px solid #b2dfdb; }
        input[type="radio"].lsf-toggle:checked + label { background-color: #00897b; color: whitesmoke; }
    </style>

    @section('styles')@show

    <title>@yield('page-title') | Metteyya</title>
</head>

<body>


<!-- NAVIGATION
================================================== -->

<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-dark navbar-vibrant" id="sidebar">
    <div class="container-fluid">

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse"
                aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand" href="{{ route('backend.home') }}">
            <img src="{{ asset('_frontend/images/buddha-logo-long.png') }}" class="navbar-brand-img mx-auto" style="width: 165px; max-width: 100%;" alt="...">
        </a>

        <!-- User (xs) -->
        <div class="navbar-user d-md-none">

            <!-- Dropdown -->
            <div class="dropdown">

                <!-- Toggle -->
                <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-sm">
                        <img src="{{ asset('_backend/img/user-avatar-2.svg') }}" class="avatar-img rounded-circle" alt="...">
                    </div>
                </a>

                <!-- Menu -->
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                    <a href="#" class="dropdown-item">Settings</a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item">Logout</a>
                </div>

            </div>

        </div>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidebarCollapse">
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('backend.tasks', ['task' => 'manage-home']) }}">
                        <i class="fa fa-home"></i> Homepage Contents
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('backend.buddhist-sites.index') }}">
                        <i class="fa fa-list-alt"></i> Buddhist Sites
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('backend.teachings.index') }}">
                        <i class="fa fa-book-open-reader"></i> Teachings
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('backend.blogs.index') }}">
                        <i class="fa fa-pen-nib"></i> Research & Publications
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('backend.books.index') }}">
                        <i class="fa fa-book-open"></i> Books
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('backend.audios.index') }}">
                        <i class="fa fa-headphones"></i> Audios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('backend.videos.index') }}">
                        <i class="fa fa-circle-play"></i> Videos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('backend.gallery-images.index') }}">
                        <i class="fa fa-images"></i> Gallery Images
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('backend.tasks', ['task' => 'manage-general-info']) }}">
                        <i class="fa fa-table"></i> General Info
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('backend.tasks', ['task' => 'manage-menu-settings']) }}">
                        <i class="fa fa-bars"></i> Menu Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{ route('backend.users.index') }}">
                        <i class="fa fa-circle-user"></i> Manage Users
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link " href="{{ route('backend.contact-messages.index') }}">--}}
{{--                        <i class="fa fa-envelope"></i> Contact Messages--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link " href="{{ route('backend.tasks', ['task' => 'manage-general-info']) }}">--}}
{{--                        <i class="fa fa-table"></i> General Info--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>

            <!-- Push content down -->
            <div class="mt-auto"></div>

{{--            <div class="text-center mb-4">--}}
{{--                <a href="{{ route('home') }}" class="text-muted">Tracking Dashboard</a>--}}
{{--            </div>--}}


            <!-- User (md) -->
            <div class="navbar-user d-none d-md-flex" id="sidebarUser">
                <!-- Dropup -->
                <div class="dropup">
                    <!-- Toggle -->
                    <a href="#" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-sm">
                            <img src="{{ asset('_backend/img/user-avatar-2.svg') }}" class="avatar-img rounded-circle" alt="...">
                        </div>
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu text-center" aria-labelledby="sidebarIconCopy">
                        <h6 class="my-3 font-size-base text-info">{{ auth()->user()->name }}</h6>
                        <hr class="dropdown-divider">
                        <a href="{{ route('auth.logout') }}" class="dropdown-item">Logout</a>
                    </div>
                </div>
            </div> <!-- .navbar-collapse -->
        </div>
    </div>
</nav>


<!-- MAIN CONTENT
================================================== -->
<div class="main-content pb-6">

    <div class="container-fluid">
        <div class="header">
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h1 class="header-title">
                            @yield('page-title')
                        </h1>
                    </div>
                    @hasSection('header-action')
                        <div class="col-auto">
                            @section('header-action')@show
                        </div>
                    @endif
                </div> <!-- / .row -->
            </div>
        </div>

        @section('main-content')@show
    </div>

</div>

<!-- JAVASCRIPT
================================================== -->
<!-- Libs JS -->
<script src="{{ asset('_backend/jquery.js') }}"></script>
<script src="{{ asset('_backend/bootstrap.js') }}"></script>
<script src="{{ asset('_backend/draggable.js') }}"></script>
<script src="{{ asset('_backend/autosize.js') }}"></script>
<script src="{{ asset('_backend/Chart.js') }}"></script>
<script src="{{ asset('_backend/dropzone.js') }}"></script>
<script src="{{ asset('_backend/flatpickr.js') }}"></script>
<script src="{{ asset('_backend/highlight.js') }}"></script>
<script src="{{ asset('_backend/jquery_002.js') }}"></script>
<script src="{{ asset('_backend/list.js') }}"></script>
<script src="{{ asset('_backend/quill.js') }}"></script>
<script src="{{ asset('_backend/select2.js') }}"></script>
<script src="{{ asset('_backend/Chart_002.js') }}"></script>
<script src="{{ asset('_backend/jquery-datetimepicker-1/build/jquery.datetimepicker.full.min.js') }}"></script>
<script src="{{ asset('_backend/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('_backend/daterangepicker/daterangepicker.js') }}"></script>

<script src="{{ asset('_backend/jquery-fancy-fileuploader/jquery.ui.widget.js') }}"></script>
<script src="{{ asset('_backend/jquery-fancy-fileuploader/jquery.fileupload.js') }}"></script>
<script src="{{ asset('_backend/jquery-fancy-fileuploader/jquery.iframe-transport.js') }}"></script>
<script src="{{ asset('_backend/jquery-fancy-fileuploader/jquery.fancy-fileupload.js') }}"></script>
<script src="{{ asset('_backend/summernote/summernote-lite.min.js') }}"></script>

<!-- Map -->
<script src="{{ asset('_backend/mapbox-gl.js') }}"></script>

<!-- Theme JS -->
<script src="{{ asset('_backend/theme.js') }}"></script>
<input type="file" multiple="multiple" class="dz-hidden-input" style="visibility: hidden; position: absolute; top: 0px; left: 0px; height: 0px; width: 0px;">
<script src="{{ asset('_backend/dashkit.js') }}"></script>

{{--<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>--}}
{{--<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>--}}
{{--<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>--}}
{{--<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>--}}
{{--<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>--}}
{{--<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>--}}
{{--<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>--}}
{{--<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>--}}

<script src="{{ asset('js/scripts-5100.js?v=1.003') }}"></script>

<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['fontsize', ['fontsize']],
                // ['color', ['forecolor', 'backcolor']],
                // ['fontname', ['fontname']],
                ['para', ['ul', 'ol']],
                // ['link', ['linkDialogShow']],
                // ['table', ['table']],
                //['insert', ['link', 'picture', 'video']],
                ['view', ['undo', 'redo', /*'codeview',*/ 'fullscreen'/*, 'help'*/]],
            ],
            styleTags: [
                'p',
                // { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
                'h2', 'h3', 'h4', 'h5', 'h6'
            ],
        });

        const lsf = $('.lsf');

        if (lsf.length > 0) {
            lsf.addClass('d-none');

            lsf.each(function () {
                if ($(this).hasClass('en')) {
                    $(this).removeClass('d-none');
                }
            });
        }

        $('.lsf-toggle').on('change', function () {
            const val = $(this).val();

            const target = $(`.lsf.${val}`);

            if (target) {
                lsf.addClass('d-none');
                target.removeClass('d-none');
            }
        });
    });

    $('.file-with-preview').on('change', function (e) {
        previewImages(e);
    });

    $('.remove-image.w-fn').on('click', function () {
        $(this).parent().remove();
    });

    function previewImages(event) {
        const element = $(event.target);
        const fieldName = element.data('og-name');
        const previewContainer = element.parent().find('.image-preview-container')[0];

        previewContainer.innerHTML = '';
        let files = event.target.files;

        for (let i = 0; i < files.length; i++) {
            let file = files[i];

            if (!file.type.startsWith('image/')) {
                continue;
            }

            let reader = new FileReader();

            (function(reader, file) {
                reader.onload = function() {
                    let image = new Image();
                    image.classList.add('image-preview');
                    image.src = reader.result;
                    image.onload = function() {
                        let size = document.createElement('span');
                        size.classList.add('image-details');
                        size.innerHTML = `${image.width} x ${image.height} <br> ${getFileSize(file.size)}`;

                        /*
                        let removeBtn = document.createElement('span');
                        removeBtn.classList.add('remove-image');
                        removeBtn.innerHTML = `<i class="fa fa-close"></i> Remove`;
                        removeBtn.addEventListener('click', function() {
                            previewContainer.removeChild(preview);
                        });
                         */

                        let preview = document.createElement('div');
                        preview.draggable = true;
                        preview.appendChild(image);
                        preview.appendChild(size);

                        if (previewContainer.classList.contains('draggable-container')) {
                            let input = document.createElement("input");
                            input.setAttribute("type", "hidden");
                            input.setAttribute("name", `${fieldName}_sort_orders[]`);
                            input.setAttribute("value", i);
                            preview.appendChild(input);
                            preview.classList.add('draggable');
                        }
                        //preview.appendChild(removeBtn);
                        previewContainer.appendChild(preview);
                    };
                };
            })(reader, file);

            reader.readAsDataURL(file);
        }
    }

    function getFileSize(sizeInBytes) {
        var i = -1;
        var byteUnits = ['kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
        do {
            sizeInBytes = sizeInBytes / 1024;
            i++;
        } while (sizeInBytes > 1024);
        return Math.max(sizeInBytes, 0.1).toFixed(1) + ' ' + byteUnits[i];
    }


    // Draggable Containers
    const draggableContainers = document.querySelectorAll('.draggable-container');

    if (draggableContainers.length) {
        draggableContainers.forEach(container => {
            const draggableItemType = container.classList.contains('tabular') ? 'table' : 'default';
            let dragStartIndex;

            container.addEventListener('dragstart', e => {
                let tarElement = e.target;

                if (!tarElement.classList.contains('draggable')) {
                    tarElement = tarElement.closest('.draggable');
                }

                dragStartIndex = draggableItemType === 'table' ? tarElement.rowIndex : Array.from(container.children).indexOf(tarElement);
                tarElement.style.opacity = .3;
            });

            container.addEventListener('dragover', e => {
                e.preventDefault();
            });

            container.addEventListener('drop', e => {
                let tarElement = e.target;

                if (!tarElement.classList.contains('draggable')) {
                    tarElement = tarElement.closest('.draggable');
                }

                const dragEndIndex = draggableItemType === 'table' ? tarElement.rowIndex : Array.from(container.children).indexOf(tarElement);
                moveDraggedItem(container, dragStartIndex, dragEndIndex, draggableItemType);
            });
        });
    }

    function moveDraggedItem(container, fromIndex, toIndex, draggableItemType) {
        const draggableItems = draggableItemType === 'table' ? container.rows : Array.from(container.children);

        if (draggableItemType === 'table') {
            fromIndex--;
            toIndex--;
        }

        const fromItem = draggableItems[fromIndex];
        const toItem = draggableItems[toIndex];

        fromItem.style.opacity = 1;

        if (fromIndex === toIndex) return;

        container.insertBefore(fromItem, toItem);

        if (document.querySelector('.reorder-btn')?.length > 0) {
            document.querySelector('.reorder-btn').classList.remove('btn-outline-secondary');
            document.querySelector('.reorder-btn').classList.add('btn-success');
        }
    }

    /*
    $('.file-with-preview').on('change', function (e) {
        previewImage(e);
    });

    function previewImage(event) {
        const element = $(event.target);
        const file = element[0].files[0];

        if (!file.type.startsWith('image/')) {
            alert('Please select an image file.');
            return;
        }

        const reader = new FileReader();

        reader.onload = function() {
            var image = new Image();
            image.classList.add('image-preview');
            image.src = reader.result;

            let preview = element.parent().find('.image-preview')[0];
            preview.src = reader.result;
            element.parent().find('.image-dimension').html(image.width);
        }
        reader.readAsDataURL(file);
    }
     */

    /*
    $('.file-with-preview').FancyFileUpload({
        maxfilesize : 1000000
    });
     */
</script>

@section('scripts')@show

</body>
</html>
