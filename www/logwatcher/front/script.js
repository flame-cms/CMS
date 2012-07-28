$(function(){
    $loader = $('#loader');

    /* --- Reload every 5 secs --- */
    setInterval(function(){
        $.ajax(location.href + '?do=reload', {
            beforeSend: function(){
                $loader.fadeTo('fast', '1');
            },
            success: function(payload){
                if (payload.snippets)
                    for (var id in payload.snippets) {
                        $("#" + id).html(payload.snippets[id]);
                    }

                $loader.fadeTo('fast', '0');
            }
        })
    },
    5000);

    /* --- Delete button in the table --- */
    $('body').on('click', 'table a.ajax.delete', function(event){
        event.preventDefault();
        $this = $(this);

        $tr = $this.closest('tr');

        $.ajax($this.attr('href'),{
            beforeSend: function(){
                $tr.css({
                    'backgroundColor':'#fb6c6c'
                });
                $loader.fadeTo('fast', '1');
            },
            success: function(){
                $tr.fadeTo('slow', '0', function(){
                    $tr.remove();
                });
                $loader.fadeTo('fast', '0');
            }
        });

        return false;
    });

    $clearingTempFilesState = $('#clearingTempFilesState');

    /* --- Delete button for clearing temporary files --- */
    $('header').on('click', 'a#cleartemp.ajax', function(event){
        event.preventDefault();
        $this = $(this);

        $.ajax($this.attr('href'),{
            beforeSend: function(){
                $loader.fadeTo('fast', '1');
            },
            success: function(){
                $clearingTempFilesState.text('Done.');
                $clearingTempFilesState.fadeTo('fast', '1');

                setTimeout(function(){
                    $clearingTempFilesState.fadeTo('slow', '0', function(){
                        $clearingTempFilesState.text('');
                    });
                }, '1200');

                $loader.fadeTo('fast', '0');
            }
        });
    });

});