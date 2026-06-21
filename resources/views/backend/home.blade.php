@extends('components.backend.layout')

@section('main-content')
    <div class="card">
        <div class="card-body">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        @include('backend.partials.form.input', ['name' => 'title', 'label' => 'Slide Title'])
                        @include('backend.partials.form.image-file', ['name' => 'nid_file', 'label' => 'Slide Image', 'multiple' => true])
                        @include('backend.partials.form.button', ['label' => 'Submit'])
                    </div>
                </div>
            </form>
        </div>
    </div>


    <style>
        .image-preview {
            max-width: 100%;
            max-height: 180px;
            margin: 10px 0;
        }

        .image-details {
            display: block;
            font-size: 12px;
            color: #777;
            margin-top: 5px;
        }

        .remove-image {
            color: red;
            cursor: pointer;
        }
    </style>
@endsection

@section('scripts')
    <script>
        $('.file-with-preview').on('change', function (e) {
            previewImages(e);
        });

        function previewImages(event) {
            const element = $(event.target);
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
                            var size = document.createElement('span');
                            size.classList.add('image-details');
                            size.textContent = getFileSize(file.size) + ' - ' + image.width + 'x' + image.height;
                            var removeBtn = document.createElement('span');
                            removeBtn.classList.add('remove-image');
                            removeBtn.textContent = 'Remove';
                            removeBtn.addEventListener('click', function() {
                                previewContainer.removeChild(preview);
                            });
                            var preview = document.createElement('div');
                            preview.appendChild(image);
                            preview.appendChild(size);
                            preview.appendChild(removeBtn);
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
@endsection
