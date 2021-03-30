@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('mensaje'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong class="text-center">{{ session('mensaje') }}</strong>
        <button type="button" class="close" data-dismiss="alert" alert-label="Close">
            <span>&times;</span>
        </button>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header">Ingresa un perrito</div>
                <div class="card-body">
                    <form id="form">

                        <div class="form-group row mt-3">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control col-form-label" name="nombre" value="{{ old('nombre') }}" required>

                                <strong><span class="text-danger" id="nombre-error"></span></strong>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="color" class="col-md-4 col-form-label text-md-right">Color</label>

                            <div class="col-md-6">
                                <input id="color" type="text" class="form-control col-form-label" name="color" value="{{ old('color') }}" required>

                                <strong><span class="text-danger" id="color-error"></span></strong>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="raza" class="col-md-4 col-form-label text-md-right">Raza</label>

                            <div class="col-md-6">
                                <input id="raza" type="text" class="form-control col-form-label" name="raza" value="{{ old('raza') }}" required>

                                <strong><span class="text-danger" id="raza-error"></span></strong>

                            </div>
                        </div>

                        <div class="form-group row justify-content-center mb-3">
                            <div class="col-md-8 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Ingresar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-3 shadow-sm">
                <div class="card-header">Perritos</div>
                <div class="card-body">
                    <table class="table table-sm">
                        @if(!$perritos->isEmpty())
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Color</th>
                                <th>Raza</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                            @foreach($perritos as $perrito)
                            <tr style="height: 100px;">
                                <td class="col-1" style="vertical-align: middle"><strong> {{ $perrito->id }} </strong></td>
                                <td class="col-3" style="vertical-align: middle">{{ $perrito->nombre }} </td>
                                <td class="col-3" style="vertical-align: middle">{{ $perrito->color }}</td>
                                <td class="col-3" style="vertical-align: middle">{{ $perrito->raza }}</td>
                                <td class="col-2 text-center" style="vertical-align: middle">
                                    <div class="row justify-content-center">

                                        <a href="{{ route('update', $perrito) }}" class="mr-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Modificar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>

                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" data-toggle="modal" data-target="#eliminarPublicacion{{ $perrito->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                            </svg>
                                        </a>

                                        <a href="#" onclick="interactuar( '{{ $perrito->nombre }}', '{{ $perrito->id }}' );" class="ml-3" data-bs-toggle="tooltip" data-bs-placement="top" title="¿Qué está haciendo {{ $perrito->nombre }}?" data-toggle="modal" data-target="#interaccion{{ $perrito->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="green" class="bi bi-volume-up" viewBox="0 0 16 16">
                                                <path d="M11.536 14.01A8.473 8.473 0 0 0 14.026 8a8.473 8.473 0 0 0-2.49-6.01l-.708.707A7.476 7.476 0 0 1 13.025 8c0 2.071-.84 3.946-2.197 5.303l.708.707z" />
                                                <path d="M10.121 12.596A6.48 6.48 0 0 0 12.025 8a6.48 6.48 0 0 0-1.904-4.596l-.707.707A5.483 5.483 0 0 1 11.025 8a5.483 5.483 0 0 1-1.61 3.89l.706.706z" />
                                                <path d="M10.025 8a4.486 4.486 0 0 1-1.318 3.182L8 10.475A3.489 3.489 0 0 0 9.025 8c0-.966-.392-1.841-1.025-2.475l.707-.707A4.486 4.486 0 0 1 10.025 8zM7 4a.5.5 0 0 0-.812-.39L3.825 5.5H1.5A.5.5 0 0 0 1 6v4a.5.5 0 0 0 .5.5h2.325l2.363 1.89A.5.5 0 0 0 7 12V4zM4.312 6.39 6 5.04v5.92L4.312 9.61A.5.5 0 0 0 4 9.5H2v-3h2a.5.5 0 0 0 .312-.11z" />
                                            </svg>
                                        </a>

                                        <div class="modal fade text-center" id="eliminarPublicacion{{ $perrito->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Atención</h5>
                                                        <button type="button" class="ml-2 mb-1 close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Estás seguro que deseas eliminar este perrito
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-frown" viewBox="0 0 16 16">
                                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                            <path d="M4.285 12.433a.5.5 0 0 0 .683-.183A3.498 3.498 0 0 1 8 10.5c1.295 0 2.426.703 3.032 1.75a.5.5 0 0 0 .866-.5A4.498 4.498 0 0 0 8 9.5a4.5 4.5 0 0 0-3.898 2.25.5.5 0 0 0 .183.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z" />
                                                        </svg>
                                                        ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <a class="btn btn-danger" href="{{ route('delete', $perrito) }}">Eliminar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade text-center" id="interaccion{{ $perrito->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">¿Qué está haciendo {{ $perrito->nombre }}?</h5>
                                                        <button type="button" class="ml-2 mb-1 close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <span id="interaccionTexto{{ $perrito->id }}"></span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h3>No hay perritos registrados</h3>
                    @endif
                    <div class="col-md-12 text-center">
                        {{ $perritos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<audio id="audio1" src="audios/gruñendo.mp3"></audio>
<audio id="audio2" src="audios/llorando.mp3"></audio>
<audio id="audio3" src="audios/tomando agua.mp3"></audio>

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
            url: '{{ route("store") }}',
            type: 'POST',
            data: {
                nombre: nombre,
                color: color,
                raza: raza
            },
            success: function(response) {
                if (response) {
                    Swal.fire({
                            title: "¡Perfecto!",
                            text: "El perrito se ha agregado correctamente.",
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
            },
            error: function(response) {
                $('#nombre-error').text(response.responseJSON.errors.nombre);
                $('#color-error').text(response.responseJSON.errors.color);
                $('#raza-error').text(response.responseJSON.errors.raza);
            }
        });
    });

    function interactuar(nombre, id) {

        var num = Math.round(Math.random() * 2 + 1);
        var texto;

        if (num == 1) {
            texto = "gruñendo";
        } else if (num == 2) {
            texto = "llorando";
        } else {
            texto = "bebiendo agua";
        }


        $('#audio' + num)[0].play();
        $('#interaccionTexto' + id).text(nombre + " está " + texto);
    }
</script>

@endsection