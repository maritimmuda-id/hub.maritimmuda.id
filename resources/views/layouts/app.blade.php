<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@3.2/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />

    @stack('styles')
</head>

<body class="c-app flex-row align-items-center">
    <div class="container">
        @yield("content")

        <div class="row justify-content-center mt-3">
            <footer class="col-md-10 d-flex align-items-center justify-content-between row no-gutters">
                <div class="col-md-4 text-muted">
                    <span>Copyright &copy;</span>
                    <a href="https://maritimmuda.id">Maritim Muda Nusantara</a>
                    <span>{{ date('Y') }}</span>
                    <div class="mt-1">Maritim Muda Hub v2.0</div>
                </div>
                <div class="col-md-2">
                    <div class="text-muted">Didukung Oleh:</div>
                    <div class="mt-1">
                        <img class="img-fluid" src="https://res.cloudinary.com/zhanang19/image/upload/q_auto,w_45/v1632031446/Logo_Kemenko_Marves_jdpzst.png" alt="Kementerian Koordinator Bidang Kemaritiman dan Investasi" loading="lazy">
                        <img class="img-fluid" src="https://res.cloudinary.com/zhanang19/image/upload/q_auto,w_45/v1632031445/Logo_KKP_y7yr5d.png" alt="Kementerian Kelautan dan Perikanan" loading="lazy">
                        <img class="img-fluid" src="https://res.cloudinary.com/zhanang19/image/upload/q_auto,w_45/v1632031504/Kemenpora_Logo_kwwpr5.png" alt="Kementerian Pemuda dan Olahraga" loading="lazy">
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center">
                    <img class="img-fluid" src="https://res.cloudinary.com/zhanang19/image/upload/q_auto,w_50/v1632113345/ORI_Original_Rekor_Indonesia_kbmhcc.png" alt="Original Rekor Indonesia" loading="lazy">
                    <a href="#" class="ml-2 text-muted">Platform Digital Jejaring Nasional Pemuda Bidang Kemaritiman Pertama di Indonesia</a>
                </div>
            </footer>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
