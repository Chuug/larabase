@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/dist/ui/trumbowyg.min.css') }}">
@endpush

@push('bottomScripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
    <script src="{{ asset('plugins/trumbowyg/dist/trumbowyg.min.js') }}"></script>
    <script src="{{ asset('plugins/trumbowyg/dist/langs/fr.min.js') }}"></script>
    <script>
        $('#trumbowyg').trumbowyg({
            lang: 'fr',
            autogrow: true,
            btns: [
                ['viewHTML'],
                ['undo','redo'],
                ['formating'],
                ['strong','em','del'],
                ['link'],
                ['insertImage'],
                ['justifyLeft','justifyCenter','justifyRight','justifyFull'],
                ['unorderedList','orderedList'],
                ['horizontalRule']
            ]
        });
    </script>
@endpush