var $collectionHolder;
var $addTagButton = $('<button type="button" class="add_ticket_link">Ajouter un ticket</button>');

jQuery(document).ready(function() {
    $collectionHolder = $('ul.tickets');
    $collectionHolder.append($addTagButton);
    $collectionHolder.data('index', $collectionHolder.find(':input').length);
    $addTagButton.on('click', function(e)
    {
        addTicketForm($collectionHolder, $addTagButton);
    });
});
function addTicketForm($collectionHolder, $addTagButton) {
    var prototype = $collectionHolder.data('prototype');
    var index = $collectionHolder.data('index');
    var newForm = prototype;
    newForm = newForm.replace(/__name__/g, index);
    $collectionHolder.data('index', index + 1);
    var $newFormLi = $('<li></li>').append(newForm);
    $addTagButton.before($newFormLi);
    addTicketFormDeleteLink($newFormLi);
}
function addTicketFormDeleteLink($tagFormLi) {
    var $removeFormButton = $('<button type="button">Supprimer ce ticket</button>');
    $tagFormLi.append($removeFormButton);
    $removeFormButton.on('click', function(e) {
        $tagFormLi.remove();
    });
}