console.log('select-pages.js chargé');

    $('[name=keywords]')
    .tagify()
    .on('add', function(e, tagName){
        console.log('added', tagName)
    });