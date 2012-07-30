$(document).ready(function(){

    tinyMCE.init({
        mode: "specific_textareas",
        editor_selector: "mceEditor",
        theme : "advanced",
        setup: function (ed){
            ed.onKeyUp.add(function(ed, e){
                var content = tinyMCE.activeEditor.getContent();
                editor.importFile('file', content);
            });
        }
    });

    var opts = {
        container: 'epicEditor',
        basePath: getBaseUrl() + '/js/admin/epiceditor',
        clientSideStorage: false,
        localStorageName: 'epiceditor',
        parser: marked,
        file: {
        name: 'epiceditor',
            defaultContent: '',
            autoSave: 100
        },
        theme: {
            base:'/themes/base/epiceditor.css',
                preview:'/themes/preview/preview-dark.css',
                editor:'/themes/editor/epic-light.css'
        },
        focusOnLoad: false,
            shortcut: {
            modifier: 18,
                fullscreen: 70,
                preview: 80,
                edit: 79
        }
    };

    var editor = new EpicEditor(opts);
    $textarea = $('#frm-postForm-content');
    $mce = $('#mceEitor');

    editor.on('load', function (file) {
        $textarea.val(file.content);
    });

    editor.on('update', function (file) {
        $textarea.val(file.content);
    });

    editor.load(function (file){
        var content = $('#frm-postForm-content').val();
        editor.importFile(file, content);

        $mce.hide(100, function(){
            tinyMCE.execCommand('mceRemoveControl', false, 'frm-postForm-content');
        });
    });

    $('.use-markdown-syntax').change(function (){
        if($('.use-markdown-syntax').attr('checked')){
            editor.load(function(){
                $mce.hide(100, function(){
                    tinyMCE.execCommand('mceRemoveControl', false, 'frm-postForm-content');
                });
            });
        }else{
            editor.unload(function(){
                $mce.show(100, function(){
                    tinyMCE.execCommand('mceAddControl', false, 'frm-postForm-content');
                });
            });
        }
    });
});