<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <title>Quill</title>
</head>
<body>




<div class="container">
    <div class="card mt-5">
        <h3 class="card-header p-3">Quill Editor in blade - Laravel 11</h3>
        <div class="card-body">

            <form method="POST" action="{{ route('quill.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="inputName">Title:</label>
                    <input
                        type="text"
                        name="title"
                        id="inputName"
                        class="form-control @error('title') is-invalid @enderror"
                        placeholder="Name">

                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">

                    <label class="form-label" for="inputEmail">Body:</label>

{{--                    Toolbar--}}
                    <div id="toolbar-container">
                      <span class="ql-formats">
                        <select class="ql-font"></select>
                        <select class="ql-size"></select>
                      </span>
                                            <span class="ql-formats">
                        <button class="ql-bold"></button>
                        <button class="ql-italic"></button>
                        <button class="ql-underline"></button>
                        <button class="ql-strike"></button>
                      </span>
                                            <span class="ql-formats">
                        <select class="ql-color"></select>
                        <select class="ql-background"></select>
                      </span>
                                            <span class="ql-formats">
                        <button class="ql-script" value="sub"></button>
                        <button class="ql-script" value="super"></button>
                      </span>
                                            <span class="ql-formats">
                        <button class="ql-header" value="1"></button>
                        <button class="ql-header" value="2"></button>
                        <button class="ql-blockquote"></button>
                        <button class="ql-code-block"></button>
                      </span>
                                            <span class="ql-formats">
                        <button class="ql-list" value="ordered"></button>
                        <button class="ql-list" value="bullet"></button>
                        <button class="ql-indent" value="-1"></button>
                        <button class="ql-indent" value="+1"></button>
                      </span>
                                            <span class="ql-formats">
                        <button class="ql-direction" value="rtl"></button>
                        <select class="ql-align"></select>
                      </span>
                                            <span class="ql-formats">
                        <button class="ql-link"></button>
                        <button class="ql-image"></button>
                        <button class="ql-video"></button>
                        <button class="ql-formula"></button>
                      </span>
                                            <span class="ql-formats">
                        <button class="ql-clean"></button>
                      </span>
                    </div>

{{--                    Body area--}}
                    <div id="editor" class="mb-3" style="height: 300px;">
                    </div>
                    <textarea
                        rows="3"
                        class="mb-3 d-none"
                        name="body"
                        id="quill-editor-area"></textarea>


                    @error('body')
                    <span class="text-danger">{{ $message }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <button class="btn btn-success btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<!-- Initialize Quill editor -->
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        if (document.getElementById('quill-editor-area')) {
            var editor = new Quill('#editor', {
                modules: {
                    toolbar: '#toolbar-container',
                },
                theme: 'snow',
            });;
            var quillEditor = document.getElementById('quill-editor-area');
            editor.on('text-change', function() {
                quillEditor.value = editor.root.innerHTML;
            });

            quillEditor.addEventListener('input', function() {
                editor.root.innerHTML = quillEditor.value;
            });
        }
    });
</script>

</html>
