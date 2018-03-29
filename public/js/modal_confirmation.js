console.log('script modal_confirmation.js chargé');

$('[data-toggle="modal"]').click(function() {

let name = $(this).data('name');
let url = $(this).data('url');
let modal = $('#deleteConf');

modal.find('.customers-name').text(name);
modal.find('.delete-btn').attr('href', url);

modal.modal()
})