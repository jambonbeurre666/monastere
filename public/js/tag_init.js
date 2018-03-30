console.log('tag-init.js chargé');

    $('[name=keywords]')
    .tagify()
    .on('add', function(e, tagName){
        console.log('added', tagName)
    });