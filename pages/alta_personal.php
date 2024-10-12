<h2>Alta de Personal</h2>
<form id="altaPersonalForm">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="puesto" class="form-label">Puesto</label>
        <input type="text" class="form-control" id="puesto" name="puesto" required>
    </div>
    <button type="submit" class="btn btn-primary">Dar de Alta</button>
</form>

<script>
$(document).ready(function() {
    $('#altaPersonalForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'api/alta_personal.php',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert('Personal dado de alta exitosamente');
                $('#altaPersonalForm')[0].reset();
            },
            error: function() {
                alert('Error al dar de alta al personal');
            }
        });
    });
});
</script>