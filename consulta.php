<!doctype html>
<html lang="en">

<head>
    <title>PANEL ADMIN CLIENTES - CONSULTA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid min-vh-100 flex-column d-flex">
        <div class="row">
            <nav class="navbar bg-black d-flex justify-content-center">
                <h3 class="text-white p-2">PANEL DE CONTROL TRABAJADORES</h3>
            </nav>
        </div>
        <div class="row flex-grow-1 bg-dark">
            <div class="col-2 bg-dark d-flex text-white flex-column border-end">
                <h3 class="m-3 text-center">Navegación</h3>
                <div class="mt-5">
                    <div class="d-flex flex-row mb-3 p-2 ps-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-square mt-1" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
                        </svg>
                        <a href="./index.php" class="ms-2 fs-5 text-decoration-none text-white">Nuevo Registro</a>
                    </div>
                    <div class="d-flex flex-row mb-3 p-2 ps-3 bg-warning ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-currency-dollar mt-1" viewBox="0 0 16 16">
                            <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z" />
                        </svg>
                        <a href="./consulta.php" class="ms-2 fs-5 text-decoration-none text-white">Consulta</a>
                    </div>
                </div>

            </div>
            <div class="col-10 d-flex flex-column align-items-center my-4 text-white">
                <h4 class="mb-4">CONSULTA POR FECHA</h4>
                <form action="./procesaDatos.php" method="post" class="w-25">
                    <div class="mb-3">
                        <label for="fechaInicial" class="form-label">Elige la fecha inicial</label>
                        <input id="fechaIncial" class="form-control" type="date" required name="fechaInicial">
                    </div>
                    <div class="mb-3">
                        <label for="fechaFinal" class="form-label">Elige la fecha final</label>
                        <input id="fechaFinal" class="form-control" type="date" required name="fechaFinal">
                    </div>
                    <button type="submit" class="btn btn-warning text-white mt-2" name="select">Consultar</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

</body>

</html>