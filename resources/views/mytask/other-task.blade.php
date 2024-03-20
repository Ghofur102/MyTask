<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            margin-top: 40px;
            background: #eee;
        }

        .page-todo .tasks {
            background: #fff;
            padding: 0;
            border-right: 1px solid #d1d4d7;
            margin: -30px 15px -30px -15px
        }

        .page-todo .task-list {
            padding: 30px 15px;
            height: 100%
        }

        .page-todo .graph {
            height: 100%
        }

        .page-todo .priority.high {
            background: #fffdfd;
            margin-bottom: 1px
        }

        .page-todo .priority.high span {
            background: #f86c6b;
            padding: 2px 10px;
            color: #fff;
            display: inline-block;
            font-size: 12px
        }

        .page-todo .priority.medium {
            background: #fff0ab;
            margin-bottom: 1px
        }

        .page-todo .priority.medium span {
            background: #f8cb00;
            padding: 2px 10px;
            color: #fff;
            display: inline-block;
            font-size: 12px
        }

        .page-todo .priority.low {
            background: #cfedda;
            margin-bottom: 1px
        }

        .page-todo .priority.low span {
            background: #4dbd74;
            padding: 2px 10px;
            color: #fff;
            display: inline-block;
            font-size: 12px
        }

        .page-todo .task {
            border-bottom: 1px solid #e4e5e6;
            margin-bottom: 1px;
            position: relative
        }

        .page-todo .task .desc {
            display: inline-block;
            width: 75%;
            padding: 10px 10px;
            font-size: 12px
        }

        .page-todo .task .desc .title {
            font-size: 18px;
            margin-bottom: 5px
        }

        .page-todo .task .time {
            display: inline-block;
            width: 15%;
            padding: 10px 10px 10px 0;
            font-size: 12px;
            text-align: right;
            position: absolute;
            top: 0;
            right: 0
        }

        .page-todo .task .time .date {
            font-size: 18px;
            margin-bottom: 5px
        }

        .page-todo .task.last {
            border-bottom: 1px solid transparent
        }

        .page-todo .task.high {
            border-left: 2px solid #f86c6b
        }

        .page-todo .task.medium {
            border-left: 2px solid #f8cb00
        }

        .page-todo .task.low {
            border-left: 2px solid #4dbd74
        }

        .page-todo .timeline {
            width: auto;
            height: 100%;
            margin: 20px auto;
            position: relative
        }

        .page-todo .timeline:before {
            position: absolute;
            content: '';
            height: 100%;
            width: 4px;
            background: #d1d4d7;
            left: 50%;
            margin-left: -2px
        }

        .page-todo .timeslot {
            display: inline-block;
            position: relative;
            width: 100%;
            margin: 5px 0
        }

        .page-todo .timeslot .task {
            position: relative;
            width: 44%;
            display: block;
            border: none;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box
        }

        .page-todo .timeslot .task span {
            border: 2px solid #63c2de;
            background: #e1f3f9;
            padding: 5px;
            display: block;
            font-size: 11px
        }

        .page-todo .timeslot .task span span.details {
            font-size: 16px;
            margin-bottom: 10px
        }

        .page-todo .timeslot .task span span.remaining {
            font-size: 14px
        }

        .page-todo .timeslot .task span span {
            border: 0;
            background: 0 0;
            padding: 0
        }

        .page-todo .timeslot .task .arrow {
            position: absolute;
            top: 6px;
            right: 0;
            height: 20px;
            width: 20px;
            border-left: 12px solid #63c2de;
            border-top: 12px solid transparent;
            border-bottom: 12px solid transparent;
            margin-right: -18px
        }

        .page-todo .timeslot .task .arrow:after {
            position: absolute;
            content: '';
            top: -12px;
            right: 3px;
            height: 20px;
            width: 20px;
            border-left: 12px solid #e1f3f9;
            border-top: 12px solid transparent;
            border-bottom: 12px solid transparent
        }

        .page-todo .timeslot .icon {
            position: absolute;
            border: 2px solid #d1d4d7;
            background: #2a2c36;
            -webkit-border-radius: 50em;
            -moz-border-radius: 50em;
            border-radius: 50em;
            height: 30px;
            width: 30px;
            top: 0;
            left: 50%;
            margin-left: -17px;
            color: #fff;
            font-size: 14px;
            line-height: 30px;
            text-align: center;
            text-shadow: none;
            z-index: 2;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box
        }

        .page-todo .timeslot .time {
            background: #d1d4d7;
            position: absolute;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            top: 1px;
            left: 50%;
            padding: 5px 10px 5px 40px;
            z-index: 1;
            margin-top: 1px
        }

        .page-todo .timeslot.alt .task {
            margin-left: 56%;
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box
        }

        .page-todo .timeslot.alt .task .arrow {
            position: absolute;
            top: 6px;
            left: 0;
            height: 20px;
            width: 20px;
            border-left: none;
            border-right: 12px solid #63c2de;
            border-top: 12px solid transparent;
            border-bottom: 12px solid transparent;
            margin-left: -18px
        }

        .page-todo .timeslot.alt .task .arrow:after {
            top: -12px;
            left: 3px;
            height: 20px;
            width: 20px;
            border-left: none;
            border-right: 12px solid #e1f3f9;
            border-top: 12px solid transparent;
            border-bottom: 12px solid transparent
        }

        .page-todo .timeslot.alt .time {
            top: 1px;
            left: auto;
            right: 50%;
            padding: 5px 40px 5px 10px
        }

        @media only screen and (min-width:992px) and (max-width:1199px) {
            .page-todo task .desc {
                display: inline-block;
                width: 70%;
                padding: 10px 10px;
                font-size: 12px
            }

            .page-todo task .desc .title {
                font-size: 16px;
                margin-bottom: 5px
            }

            .page-todo task .time {
                display: inline-block;
                float: right;
                width: 20%;
                padding: 10px 10px;
                font-size: 12px;
                text-align: right
            }

            .page-todo task .time .date {
                font-size: 16px;
                margin-bottom: 5px
            }
        }

        @media only screen and (min-width:768px) and (max-width:991px) {
            .page-todo .task {
                margin-bottom: 1px
            }

            .page-todo .task .desc {
                display: inline-block;
                width: 65%;
                padding: 10px 10px;
                font-size: 10px;
                margin-right: -20px
            }

            .page-todo .task .desc .title {
                font-size: 14px;
                margin-bottom: 5px
            }

            .page-todo .task .time {
                display: inline-block;
                float: right;
                width: 25%;
                padding: 10px 10px;
                font-size: 10px;
                text-align: right
            }

            .page-todo .task .time .date {
                font-size: 14px;
                margin-bottom: 5px
            }

            .page-todo .timeslot .task span {
                padding: 5px;
                display: block;
                font-size: 10px
            }

            .page-todo .timeslot .task span span {
                border: 0;
                background: 0 0;
                padding: 0
            }

            .page-todo .timeslot .task span span.details {
                font-size: 14px;
                margin-bottom: 0
            }

            .page-todo .timeslot .task span span.remaining {
                font-size: 12px
            }
        }

        @media only screen and (max-width:767px) {
            .page-todo .tasks {
                position: relative;
                margin: 0 !important
            }

            .page-todo .graph {
                position: relative;
                margin: 0 !important
            }

            .page-todo .task {
                margin-bottom: 1px
            }

            .page-todo .task .desc {
                display: inline-block;
                width: 65%;
                padding: 10px 10px;
                font-size: 10px;
                margin-right: -20px
            }

            .page-todo .task .desc .title {
                font-size: 14px;
                margin-bottom: 5px
            }

            .page-todo .task .time {
                display: inline-block;
                float: right;
                width: 25%;
                padding: 10px 10px;
                font-size: 10px;
                text-align: right
            }

            .page-todo .task .time .date {
                font-size: 14px;
                margin-bottom: 5px
            }

            .page-todo .timeslot .task span {
                padding: 5px;
                display: block;
                font-size: 10px
            }

            .page-todo .timeslot .task span span {
                border: 0;
                background: 0 0;
                padding: 0
            }

            .page-todo .timeslot .task span span.details {
                font-size: 14px;
                margin-bottom: 0
            }

            .page-todo .timeslot .task span span.remaining {
                font-size: 12px
            }
        }
    </style>
</head>

<body>
    <div class="container page-todo bootstrap snippets bootdeys">
        <div class="col-sm-12 tasks">
            <div class="task-list">
                <h1>Tasks</h1>

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a style="text-decoration:none" href="/" class="nav-link">Kembali</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Belum Deadline</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Telat</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="priority high"><span>Belum Deadline</span></div>
                        @foreach ($tugas_belum_deadline as $item)
                            <div class="task high">
                                <div class="desc">
                                    <div>{{ $item->deskripsi }}
                                    </div>
                                </div>
                                <div class="time">
                                    <div class="date">{{ $item->deadline }}</div>
                                    <div>{{ $item->reminder }}</div>
                                </div>
                                <div class="widget-content-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $item->id }}">
                                        <path fill="currentColor"
                                            d="M5 19h1.425L16.2 9.225L14.775 7.8L5 17.575zm-1 2q-.425 0-.712-.288T3 20v-2.425q0-.4.15-.763t.425-.637L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.437.65T21 6.4q0 .4-.138.763t-.437.662l-12.6 12.6q-.275.275-.638.425t-.762.15zM19 6.4L17.6 5zm-3.525 2.125l-.7-.725L16.2 9.225z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $item->id }}">
                                        <path fill="currentColor"
                                            d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                                    </svg>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="edit/{{ $item->id }}">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <!-- <label for="name">Name</label> --> <input
                                                                    class="form-control" type="text" name="deskripsi"
                                                                    placeholder="Deskripsi"
                                                                    value="{{ $item->deskripsi }}">
                                                                @error('deskripsi')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <input class="form-control" type="date" name="deadline"
                                                                value="{{ $item->deadline }}">
                                                            @error('deadline')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="input-group mb-3">
                                                                <select class="form-select" name="reminder"
                                                                    id="inputGroupSelect01">
                                                                    <option selected>Reminder</option>
                                                                    <option value="1"
                                                                        {{ $item->reminder === '1' ? 'selected' : '' }}>
                                                                        1 hari sebelum</option>
                                                                    <option value="2"
                                                                        {{ $item->reminder === '2' ? 'selected' : '' }}>
                                                                        2 hari sebelum</option>
                                                                    <option value="3"
                                                                        {{ $item->reminder === '3' ? 'selected' : '' }}>
                                                                        3 hari sebelum</option>
                                                                </select>
                                                                @error('reminder')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Edit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="hapusModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form method="post" action="delete/{{ $item->id }}">
                                            @method('DELETE')
                                            @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah yakin ingin menghapus?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>





                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                        aria-labelledby="pills-profile-tab" tabindex="0">
                        <div class="priority high"><span>Telat</span></div>
                        @foreach ($tugas_telat as $item)
                            <div class="task high">
                                <div class="desc">
                                    <div class="title">Lorem Ipsum</div>
                                    <div>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit
                                    </div>
                                </div>
                                <div class="time">
                                    <div class="date">Jun 1, 2012</div>
                                    <div> 1 day</div>
                                </div>
                                <div class="widget-content-right">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" data-bs-toggle="modal" data-bs-target="#editModal">
                                        <path fill="currentColor"
                                            d="M5 19h1.425L16.2 9.225L14.775 7.8L5 17.575zm-1 2q-.425 0-.712-.288T3 20v-2.425q0-.4.15-.763t.425-.637L16.2 3.575q.3-.275.663-.425t.762-.15q.4 0 .775.15t.65.45L20.425 5q.3.275.437.65T21 6.4q0 .4-.138.763t-.437.662l-12.6 12.6q-.275.275-.638.425t-.762.15zM19 6.4L17.6 5zm-3.525 2.125l-.7-.725L16.2 9.225z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" data-bs-toggle="modal" data-bs-target="#hapusModal">
                                        <path fill="currentColor"
                                            d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                                    </svg>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="editModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger">Edit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="hapusModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah yakin ingin menghapus?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
