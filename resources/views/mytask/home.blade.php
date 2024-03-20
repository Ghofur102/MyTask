<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <style>
        body {
            background-color: #f6f6f6;
            margin-top: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            border: none;
            position: relative;
            margin-bottom: 30px;
            box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
        }

        .card .card-header {
            border-bottom-color: #f9f9f9;
            line-height: 30px;
            -ms-grid-row-align: center;
            align-self: center;
            width: 100%;
            padding: 10px 25px;
            display: flex;
            align-items: center;
        }

        .card .card-header,
        .card .card-body,
        .card .card-footer {
            background-color: transparent;
            padding: 20px 25px;
        }

        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
        }

        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, .03);
            border-bottom: 1px solid rgba(0, 0, 0, .125);
        }

        .table:not(.table-sm) thead th {
            border-bottom: none;
            background-color: #e9e9eb;
            color: #666;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .table .table-img img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: 2px solid #bbbbbb;
            -webkit-box-shadow: 5px 6px 15px 0px rgba(49, 47, 49, 0.5);
            -moz-box-shadow: 5px 6px 15px 0px rgba(49, 47, 49, 0.5);
            -ms-box-shadow: 5px 6px 15px 0px rgba(49, 47, 49, 0.5);
            box-shadow: 5px 6px 15px 0px rgba(49, 47, 49, 0.5);
            text-shadow: 0 0 black;
        }

        .table .team-member-sm {
            width: 32px;
            -webkit-transition: all 0.25s ease;
            -o-transition: all 0.25s ease;
            -moz-transition: all 0.25s ease;
            transition: all 0.25s ease;
        }

        .table .team-member {
            position: relative;
            width: 30px;
            white-space: nowrap;
            border-radius: 1000px;
            vertical-align: bottom;
            display: inline-block;
        }

        .table .order-list li img {
            border: 2px solid #ffffff;
            box-shadow: 4px 3px 6px 0 rgba(0, 0, 0, 0.2);
        }

        .table .team-member img {
            width: 100%;
            max-width: 100%;
            height: auto;
            border: 0;
            border-radius: 1000px;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .table .order-list li+li {
            margin-left: -14px;
            background: transparent;
        }

        .avatar.avatar-sm {
            font-size: 12px;
            height: 30px;
            width: 30px;
        }

        .avatar {
            background: #6777ef;
            border-radius: 50%;
            color: #e3eaef;
            display: inline-block;
            font-size: 16px;
            font-weight: 300;
            margin: 0;
            position: relative;
            vertical-align: middle;
            line-height: 1.28;
            height: 45px;
            width: 45px;
        }

        .table .order-list li .badge {
            background: rgba(228, 222, 222, 0.8);
            color: #6b6f82;
            margin-bottom: 6px;
        }

        .badge {
            vertical-align: middle;
            padding: 7px 12px;
            font-weight: 600;
            letter-spacing: 0.3px;
            border-radius: 30px;
            font-size: 12px;
        }

        .progress-bar {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-direction: column;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
            -ms-flex-pack: center;
            -webkit-box-pack: center;
            justify-content: center;
            overflow: hidden;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            background-color: #007bff;
            -webkit-transition: width .6s ease;
            transition: width .6s ease;
        }

        .bg-success {
            background-color: #54ca68 !important;
        }

        .bg-purple {
            background-color: #9c27b0 !important;
            color: #fff;
        }

        .bg-cyan {
            background-color: #10cfbd !important;
            color: #fff;
        }

        .bg-red {
            background-color: #f44336 !important;
            color: #fff;
        }

        .progress {
            -webkit-box-shadow: 0 0.4rem 0.6rem rgba(0, 0, 0, 0.15);
            box-shadow: 0 0.4rem 0.6rem rgba(0, 0, 0, 0.15);
        }

        .btn-action {
            color: #fff !important;
            line-height: 25px;
            font-size: 12px;
            min-width: 35px;
            min-height: 35px;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />


    <div class="container">
        @if (Route::has('login'))
            <nav class="mb-4">
                @auth

                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                     
                        <button class="btn btn-danger">Logout</button>


                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="btn btn-outline-primary">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                         class="btn btn-outline-primary">
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
        <div class="col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Selamat Datang <br> Tanggal Sekarang: {{ now()->format('d/m/Y') }}</h4>


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>

                                    <th>Deskripsi</th>
                                    <th>Status</th>
                                    <th>Reminder</th>
                                    <th>Action</th>
                                </tr>


                                @foreach ($todayData as $item)
                                    <tr>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td class="align-middle">
                                            {{ $item->status }}
                                        </td>
                                        <td>{{ $item->reminder }}</td>
                                        <td>
                                            <form action="/status/{{ $item->id }}" method="post">
                                                @csrf
                                                <button type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                        height="25" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="m10.6 16.2l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4zM5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h14q.825 0 1.413.588T21 5v14q0 .825-.587 1.413T19 21z" />
                                                    </svg>
                                                </button>
                                            </form>

                                        </td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ url('/form') }}" class="btn btn-primary">Tambah Tugas</a>
                        <a href="{{ url('/daftar') }}" class="btn btn-secondary">Tugas Lain</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
