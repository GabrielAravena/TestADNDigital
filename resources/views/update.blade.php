@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Header -->
            <div class="header mt-3">
                <div class="card mb-5 shadow-sm">
                    <div class="card-header">Modificar perrito</div>
                    <div class="card-body">
                        <form id="form">
                            
                            <div class="form-group row mt-3">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control col-form-label" name="nombre" value="{{ $perrito->nombre }}" required>

                                    <strong><span class="text-danger" id="nombre-error"></span></strong>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="color" class="col-md-4 col-form-label text-md-right">Color</label>

                                <div class="col-md-6">
                                    <input id="color" type="text" class="form-control col-form-label" name="color" value="{{ $perrito->color }}" required>

                                    <strong><span class="text-danger" id="color-error"></span></strong>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="raza" class="col-md-4 col-form-label text-md-right">Raza</label>

                                <div class="col-md-6">
                                    <input id="raza" type="text" class="form-control col-form-label" name="raza" value="{{ $perrito->raza }}" required>

                                    <strong><span class="text-danger" id="raza-error"></span></strong>

                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-3">
                                <div class="col-md-8 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Modificar
                                    </button>
                                    <a class="btn btn-secondary" href="javascript:history.back()">Volver</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#form").submit(function(event) {
        event.preventDefault();

        $('#nombre-error').text('');
        $('#color-error').text('');
        $('#raza-number-error').text('');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var nombre = $('#nombre').val();
        var color = $('#color').val();
        var raza = $('#raza').val();

        $.ajax({
            url: '{{ route("saveUpdate", $perrito) }}',
            type: 'POST',
            data: {
                nombre: nombre,
                color: color,
                raza: raza
            },
            success: function(response) {
                if (response) {
                    if (response) {
                    Swal.fire({
                            title: "¡Perfecto!",
                            text: "El perrito se ha modificado correctamente.",
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonText: "Continuar",
                        })
                        .then(resultado => {
                            if (resultado.value) {
                                window.location = '{{ route("index") }}';
                            }
                        });
                } else {
                    Swal.fire({
                            title: "Oops...",
                            text: "Algo salió mal, inténtalo nuevamente.",
                            icon: 'error',
                            showCancelButton: false,
                        })
                        .then(resultado => {
                            if (resultado.value) {
                                window.location = '{{ route("index") }}';
                            }
                        });
                }
                    
                }
            },
            error: function(response) {
                $('#nombre-error').text(response.responseJSON.errors.nombre);
                $('#color-error').text(response.responseJSON.errors.color);
                $('#raza-error').text(response.responseJSON.errors.raza);
            }
        });
    });
</script>

@endsection