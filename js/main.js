$(document).ready(function() {
    // Cargar la página de inicio por defecto
    loadPage('alta_personal');

    // Manejar clics en los enlaces de navegación
    $('.nav-link').on('click', function(e) {
        e.preventDefault();
        var page = $(this).data('page');
        loadPage(page);
    });

    function loadPage(page) {
        $.ajax({
            url: 'pages/' + page + '.php',
            method: 'GET',
            success: function(response) {
                $('#content').html(response);
            },
            error: function() {
                $('#content').html('<p>Error al cargar la página.</p>');
            }
        });
    }
});