$(function(){

    /**
     * Update Dropdown and update hiiden field for event filtering
     */
    $('li a').on('click', function(ev){
        ev.preventDefault();

        var type = $(this).text(),
            $text = $('.filterBy');

        if(type == 'None'){
            $text.text('Filter By');
        }else{
            $text.text(type);
        }

        $('[name="type"]').val(type.trim());
    });

    /**
     * On Search trigger collection filter event
     */
    $('[data-event="search"]').on('keydown click', function(e) {

        if(e.code == 13)
            e.preventDefault();

        var $el = $(this),
            $form = $('form'),
            $type = $('[type="hidden"]', $form);

        session_view.search($el.val(), $type.val());
    });
});