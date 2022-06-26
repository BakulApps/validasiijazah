<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <title>MTs. Darul Hikmah Menganti - Validasi Data Siswa</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/fonts/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <script src="{{asset('assets/js/main/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/main/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/plugin/pnotify.min.js')}}"></script>
        <script src="{{asset('assets/js/app.js')}}"></script>
        <script src="{{asset('assets/js/page/home.js')}}"></script>
    </head>
    <body>
    <script type="text/javascript">
        var baseurl = '{{route('home')}}'
    </script>
        <div class="navbar navbar-expand-lg navbar-dark bg-indigo navbar-static">
            <div class="navbar-brand ml-2 ml-lg-0">
                <a href="{{route('home')}}" class="d-inline-block">
                    <img src="{{asset('assets/img/logo.png')}}" alt="MTs. Darul Hikmah Menganti" style="width: 180px; height: auto">
                </a>
            </div>
        </div>
        <div class="page-content">
            <div class="content-wrapper">
                <div class="content-inner">
                    <div class="content d-flex justify-content-center align-items-center">
                        <div class="login-form" id="form-submit">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <i class="icon-reading icon-2x text-secondary border-secondary border-3 rounded-pill p-3 mb-3 mt-1"></i>
                                        <h5 class="mb-0">Validasi Data Ijazah</h5>
                                        <span class="d-block text-muted">Masukkan NISN anda dibawah ini</span>
                                    </div>

                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                        <input type="text" class="form-control" id="student_nisn" placeholder="Nomor Induk Sekolah Nasional">
                                        <div class="form-control-feedback">
                                            <i class="icon-user text-muted"></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="buttonGet" class="btn btn-primary btn-block">Periksa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-0" id="form-information">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <h5 class="mb-0">Validasi Data Ijazah</h5>
                                    <span class="d-block text-muted">Informasi data Siswa</span>
                                </div>
                                <div class="form-group">
                                    <span class="text-danger font-weight-semibold font-italic">
                                        Data diambil dari perpaduan Kartu Keluarga, Akta Kelahiran dan Ijazah jenjang sebelumnya<br/>apabilah terdatapat pembaharuan data
                                        silahkan membawa data terbaru ke Kantor.
                                    </span>
                                </div>
                                <div class="form-group">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                            <tr>
                                                <td>Nama</td>
                                                <td id="student_fullname">MUHAMMAD UBAYDILLAH BUDI SETIAWAN</td>
                                            </tr>
                                            <tr>
                                                <td>Kelas</td>
                                                <td id="student_class">IX-1</td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Ijazah</td>
                                                <td id="student_noijazah">0190/MTs.11.20.0006/PP.01.1/06/2022</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Lahir</td>
                                                <td id="student_placebirth">Demak</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Lahir</td>
                                                <td id="student_datebirth">22 Juli 2007</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Ayah Kandung</td>
                                                <td id="student_father">Faiq Abror Sarwo Widodo</td>
                                            </tr>
                                            <tr>
                                                <td>NISM</td>
                                                <td id="student_nism">121233200005217249</td>
                                            </tr>
                                            <tr>
                                                <td>NISN</td>
                                                <td id="student_nisn">0074894507</td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Peserta Ujian</td>
                                                <td id="student_nopes">22-11-20-2-0006-0185</td>
                                            </tr>
                                            <tr>
                                                <td>NIK</td>
                                                <td id="student_nik">3321082207070002</td>
                                            </tr>
                                            <tr>
                                                <td>Keterangan</td>
                                                <td id="student_desc">blm ada ijazah</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea type="text" class="form-control" id="student_comment" placeholder="Isi keterangan apabila terdapat ketidaksesuain dengan data terbaru"></textarea>
                                </div>
                                <label class="custom-control custom-control-info custom-checkbox mb-2">
                                    <input type="checkbox" name="student_agreement" class="custom-control-input">
                                    <span class="custom-control-label">Dengan ini saya menyatakan bahwa data saya Valid,<br/>apabila kemudian hari terdapat kekeliruan maka menjadi tanggung jawab saya.</span>
                                </label>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" id="ButtonValidate" class="btn btn-danger btn-block">Validasi</button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" data-toggle="modal" data-target="#modal_confirm" class="btn btn-info btn-block">Kirim Keterangan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="navbar navbar-expand-lg navbar-light">
                        <div class="text-center d-lg-none w-100">
                            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                                <i class="icon-unfold mr-2"></i>
                                Footer
                            </button>
                        </div>

                        <div class="navbar-collapse collapse" id="navbar-footer">
                                <span class="navbar-text">
                                    &copy; 2022. <a href="#">App Kit</a> by <a href="#" target="_blank">Limitless</a>
                                </span>

                            <ul class="navbar-nav ml-lg-auto">
                                <li class="nav-item"><a href="#" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
                                <li class="nav-item"><a href="#" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div id="modal_confirm" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Validasi Data Ijazah</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="student_phone">Masukkan Nomor HP/WA yang bisa dihubungi</label>
                                <input type="text" id="student_phone" placeholder="Ex. 082229366505" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="ButtonDesc">Kirim Keterangan</button>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
