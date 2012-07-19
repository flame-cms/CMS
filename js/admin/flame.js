
$(document).ready(function (){
    $('.use-markdown-syntax').change(function (){
        if($('.use-markdown-syntax').attr('checked')){
            tinyMCE.execCommand('mceFocus', false, 'frm-postForm-content');
            tinyMCE.execCommand('mceRemoveControl', false, 'frm-postForm-content');
        }else{
            tinyMCE.execCommand('mceAddControl', false, 'frm-postForm-content');
        }
    });
});