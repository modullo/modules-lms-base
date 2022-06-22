<html lang="en">
<head>
    <title>Code-Editor</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('vendor/assets/codemirror.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/assets/show-hint.css') }}" />
    <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="{{asset('vendor/assets/index.css')}}" />
</head>

<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a class="btn" id="run-btn">Run</a></li>
            <li class="nav-item dropdown">
                <a class="btn dropdown-toggle" type="button" data-toggle="dropdown"
                >Options <span class="caret"></span
                    ></a>
                <ul class="dropdown-menu">
                    <li><a href="javascript:autoFormatSelection()">Format</a></li>
                    <li><a href="javascript:commentSelection(true)">Comment</a></li>
                    <li>
                        <a href="javascript:commentSelection(false)">Uncomment</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="editor">
    <div id="resizeMe" class="code a">
        <div class="html-code"></div>
    </div>
    <div class="code pa">
        <iframe id="preview-window"></iframe>
    </div>
</div>
</body>
<script src="{{asset('vendor/assets/codemirror.js')}}"></script>
<script src="{{asset('vendor/assets/formatting.js')}}"></script>
<script src="{{asset('vendor/assets/show-hint.js')}}"></script>
<script src="{{asset('vendor/assets/xml-hint.js')}}"></script>
<script src="{{asset('vendor/assets/html-hint.js')}}"></script>
<script src="{{asset('vendor/assets/xml.js')}}"></script>
<script src="{{asset('vendor/assets/javascript.js')}}"></script>
<script src="{{asset('vendor/assets/css.js')}}"></script>
<script src="{{asset('vendor/assets/htmlmixed.js')}}"></script>
<script src="https://unpkg.com/split.js/dist/split.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    Split([".a", ".pa"]);
    var htmlEditor = CodeMirror(
        document.querySelector(".editor .code .html-code"),
        {
            mode: "htmlmixed",
            tabSize: 4,
            lineNumbers: true,
            extraKeys: { "Ctrl-Space": "autocomplete" },
        }
    );
    CodeMirror.commands["selectAll"](htmlEditor);

    function getSelectedRange() {
        return {
            from: htmlEditor.getCursor(true),
            to: htmlEditor.getCursor(false),
        };
    }

    function autoFormatSelection() {
        var range = getSelectedRange();
        htmlEditor.autoFormatRange(range.from, range.to);
    }

    function commentSelection(isComment) {
        var range = getSelectedRange(),
            selStart = htmlEditor.getCursor("start");
        htmlEditor.commentRange(isComment, range.from, range.to);
        htmlEditor.setSelection(selStart, htmlEditor.getCursor("end"));
    }
    document.querySelector("#run-btn").addEventListener("click", function () {
        let htmlCode = htmlEditor.getValue();
        let previewWindow =
            document.querySelector("#preview-window").contentWindow.document;
        previewWindow.open();
        previewWindow.write(htmlCode);
        previewWindow.close();
    });
</script>
</html>



