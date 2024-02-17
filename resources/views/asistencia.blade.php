<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Asistencias</title>
    <!-- Estilos CSS y scripts JS para Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Estilos CSS personalizados -->
    <style>
        /* Estilo para el encabezado de la página */
        header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            margin-bottom: 20px;
        }
        /* Estilo para el botón de registro de asistencia */
        #btn-registrar {
            margin-bottom: 20px;
        }
        /* Estilo para la tabla de asistencias */
        #tabla-asistencias th {
            background-color: #007bff;
            color: white;
        }
        /* Estilo para el modal */
        .modal-content {
            border-radius: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Lista de Asistencias</h1>
    </header>

    <div class="container">
        <!-- Botón para abrir el modal -->
        <button id="btn-registrar" type="button" class="btn btn-primary" data-toggle="modal" data-target="#registroModal">
            Registrar Asistencia
        </button>

        <!-- Modal para registrar la asistencia -->
        <div class="modal fade" id="registroModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Encabezado del modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Registrar Asistencia</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Cuerpo del modal -->
                    <div class="modal-body">
                        <!-- Formulario para registrar la asistencia -->
                        <form method="POST" action="{{ route('registrar.asistencia') }}">
                            @csrf
                            <div class="form-group">
                                <label for="alumno_id">Alumno:</label>
                                <!-- Aquí puedes cargar los alumnos desde la base de datos -->
                                <select class="form-control" id="alumno_id" name="alumno_id">
                                    @foreach($alumnos as $alumno)
                                    <option value="{{ $alumno->id }}">{{ $alumno->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha:</label>
                                <input type="date" class="form-control" id="fecha" name="fecha">
                            </div>
                            <div class="form-group">
                                <label for="asistencia">Asistencia:</label>
                                <select class="form-control" id="asistencia" name="asistencia">
                                    <option value="A">Asistió</option>
                                    <option value="T">Tardanza</option>
                                    <option value="F">Falta</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de asistencias -->
        <table id="tabla-asistencias" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Alumno</th>
                    <th>Fecha</th>
                    <th>Asistencia</th>
                </tr>
            </thead>
            <tbody>
                @foreach($asistencias as $asistencia)
                <tr>
                    <td>{{ $asistencia->id }}</td>
                    <td>{{ $asistencia->alumno->nombre }}</td>
                    <td>{{ $asistencia->fecha }}</td>
                    <td>{{ $asistencia->asistencia }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
