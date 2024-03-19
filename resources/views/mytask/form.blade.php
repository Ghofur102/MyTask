<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: #FFEBEE
        }

        .card {
            width: 400px;
            background-color: #fff;
            border: none;
            border-radius: 12px
        }

        label.radio {
            cursor: pointer;
            width: 100%
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none
        }

        label.radio span {
            padding: 7px 14px;
            border: 2px solid #eee;
            display: inline-block;
            color: #039be5;
            border-radius: 10px;
            width: 100%;
            height: 48px;
            line-height: 27px
        }

        label.radio input:checked+span {
            border-color: #039BE5;
            background-color: #81D4FA;
            color: #fff;
            border-radius: 9px;
            height: 48px;
            line-height: 27px
        }

        .form-control {
            margin-top: 10px;
            height: 48px;
            border: 2px solid #eee;
            border-radius: 10px
        }

        .form-control:focus {
            box-shadow: none;
            border: 2px solid #039BE5
        }

        .agree-text {
            font-size: 12px
        }

        .terms {
            font-size: 12px;
            text-decoration: none;
            color: #039BE5
        }

        .confirm-button {
            height: 50px;
            border-radius: 10px
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5 mb-5 d-flex justify-content-center">
        <div class="card px-1 py-4">
            <div class="card-body">
                <a href="dashboard">
                <button type="button" class="btn btn-primary mb-3">Kembali</button></a>
                <h6 class="card-title mb-3">Tambah Daftar Pekerjaan</h6>
                <form method="POST" action="/form">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <!-- <label for="name">Name</label> --> <input class="form-control" type="text"
                                    name="deskripsi" placeholder="Deskripsi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input class="form-control" type="date" name="deadline" placeholder="Deskripsi">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <select class="form-select" name="reminder" id="inputGroupSelect01">
                                    <option selected>Reminder</option>
                                    <option value="1">1 hari sebelum</option>
                                    <option value="2">2 hari sebelum</option>
                                    <option value="3">3 hari sebelum</option>
                                </select>
                            </div>
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary btn-block confirm-button">Confirm</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
