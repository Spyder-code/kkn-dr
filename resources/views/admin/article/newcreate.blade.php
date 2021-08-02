<!doctype html>
<html lang="en">

<head>

    <title>Create Article|Spydercode</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="favicon.png">

    <!--Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Buenard:wght@400;700&family=Ubuntu:ital,wght@0,400;0,500;0,700;1,400;1,500&display=swap" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>

     <!-- JS Libraries -->
    <script defer src="https://unpkg.com/turndown/dist/turndown.js"></script>
    <script defer src="https://unpkg.com/showdown/dist/showdown.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/jitbit/HtmlSanitizer@master/HtmlSanitizer.js"></script>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>

    <!-- SimpleBar core -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css" />
    <script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>

    <!-- Animated Modal -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/animatedModal.js') }}"></script>

    <!--CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/writty.css') }}">

</head>

<body>
    
    <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="content" id="article_content">
        <div class="container">
            <div class="topbar">
                <div class="topbar-row">
                    <label class="switch">
                        <input id="theme-switch" type="checkbox">
                        <div class="switch-slider" title="Theme switch"> <span class="sun"><i class="fas fa-sun"></i></span><span class="moon"><i class="fas fa-moon"></i></span></div>
                    </label>
                    <button class="topbar-button" onclick="toggleRTL()" type="button"><i class="fas fa-exchange-alt"></i>&nbsp; RTL Mode</button>
                    <button class="topbar-button" onclick="clearStorage()" type="button"><i class="fas fa-pencil-alt"></i>&nbsp; New Text</button>
                    <a id="demo01" href="#animatedModal"><i class="fas fa-save"></i>&nbsp; Save</a>
                    <a href="{{ route('article.index') }}"><i class="fas fa-arrow-circle-left"></i>&nbsp; Back</a>
                    <!-- <button class="topbar-button" onclick="return confirm('Are you sure?')" type="submit"><i class="fas fa-upload"></i>&nbsp; Save</button> -->
                    <input id="import-file" type="file" accept=".md,.html">
                </div>
            </div>
    
            <div class="toolbar">
                <div class="popup">
                    <button type="button" class="popup-button toolbar-button"><i class="fas fa-heading"></i></button>
                    <div class="popup-window">
                        <button title="Heading format" class="popup-item Heading" data-edit="formatBlock:h1">Heading</button>
                        <button title="Subheading format" class="popup-item Subheading" data-edit="formatBlock:h2">Subheading</button>
                        <button title="Body format" class="popup-item Body" data-edit="formatBlock:p">Body</button>
                        <button title="Caption format" class="popup-item Caption" data-edit="formatBlock:h5">Caption</button>
                    </div>
                </div>
                <button title="Bold" class="toolbar-button" data-edit="bold"><i class="fas fa-bold"></i></button>
                <button title="Italic" class="toolbar-button" data-edit="italic"><i class="fas fa-italic"></i></button>
                <button title="Underline" class="toolbar-button" data-edit="underline"><i class="fas fa-underline"></i></button>
                <div class="popup">
                    <button type="button" class="popup-button toolbar-button"><i class="fas fa-align-left"></i></button>
                    <div class="popup-window">
                        <button title="Align left" class="popup-item" data-edit="justifyLeft"><i class="fas fa-align-left"></i></button>
                        <button title="Align center" class="popup-item" data-edit="justifyCenter"><i class="fas fa-align-center"></i></button>
                        <button title="Align justify" class="popup-item" data-edit="justifyFull"><i class="fas fa-align-justify"></i></button>
                        <button title="Align right" class="popup-item" data-edit="justifyRight"><i class="fas fa-align-right"></i></button>
                    </div>
                </div>
                <button title="Quote" class="toolbar-button" data-edit="formatBlock:blockquote"><i class="fas fa-quote-right"></i></button>
                <button title="Unordered list" class="toolbar-button" data-edit="insertUnorderedList"><i class="fas fa-list-ul"></i></button>
                <button title="Ordered list" class="toolbar-button" data-edit="insertOrderedList"><i class="fas fa-list-ol"></i></button>
                <button title="Insert link" class="toolbar-button" type="button" data-edt="insertLink"><i class="fas fa-link"></i></button>
                <div class="popup">
                    <button title="Image" type="button" class="popup-button toolbar-button no-caret"><i class="fas fa-image"></i></button>
                    <div class="popup-window">
                        <label class="popup-button" for="imageUpload"><i class="fas fa-arrow-circle-up"></i>&nbsp; Upload Image</label>
                        <input type="file" name="imageUpload" hidden id="imageUpload" accept=".gif,.jpg,.jpeg,.png">
                    </div>
                </div>
                <div class="popup">
                    <button title="Download" class="toolbar-button last"><i class="fas fa-download"></i></button>
                    <div class="popup-window">
                        <button class="popup-button" onclick="printJS('content','html')"><i class="fas fa-file-pdf"></i>&nbsp; Print or save PDF</button>
                        <button class="popup-button" onclick='downloadContent("html")'><i class="fas fa-file-code"></i>&nbsp; Download HTML</button>
                        <button class="popup-button" onclick='downloadContent("txt")'><i class="fas fa-file-alt"></i>&nbsp; Download TXT</button>
                        <button class="popup-button" onclick='downloadContent("md")'><i class="fas fa-file"></i>&nbsp; Download MD</button>
                    </div>
    
                </div>
                <span id="counter">0</span>
            </div>
    
            <div id="editor" class="editor" data-simplebar data-simplebar-auto-hide="false">
                <div id="content" class="content" contenteditable="true">
                    <p>Start writing...✏️</p>
                </div>
            </div>
            
            <!-- Modal -->
            <div id="animatedModal">
                <!--THIS IS IMPORTANT! to close the modal, the class name has to match the name given on the ID -->
                <div  id="btn-close-modal" class="close-animatedModal"> 
                    <i class="fas fa-times-circle"></i>
                </div>
                    
                <div class="modal-content">
                    <div class="input-group">
                        <label class="label">Title</label>
                        <input type="text" class="input" name="title" value="{{ old('title') }}">
                    </div>
                    <div class="input-group">
                        <label>Category</label>
                        <select name="category_id" class="input">
                            <option></option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group">
                        <label class="label">Category</label>
                        <select name="" class="input">
                            <option value="">Kesehatan</option>
                            <option value="">Kecantikan</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <button type="submit" class="btn-save"><i class="fas fa-save"></i> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="bottom-bar">
        <div class="bottom-row">
            <a href="https://writtyapp.com" target="_blank"><img class="logo" border="0" alt="About Writty" src="writtybottom.svg" width="50"></a>
        </div>
    </div>


    <!-- Writty JS -->
    <script src="{{ asset('assets/js/writty.js') }}"></script>

    <!-- Autosave -->
    <script src="{{ asset('assets/js/writtyautosave.js') }}"></script>
    <script>
        $("#demo01").animatedModal();
        $('#content').keydown(function (e) { 
            var val = $(this).html();
            $('#article_content').val(val);
        });
    </script>

</body>

</html>
