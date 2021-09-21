<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?= base_url('assets/vendor/login'); ?>/images/icons/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/login'); ?>/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/login'); ?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/login'); ?>/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/login'); ?>/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/login'); ?>/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/login'); ?>/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/login'); ?>/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/login'); ?>/css/main.css">
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('<?= base_url('assets/vendor/login'); ?>/images/img-01.jpg');">
            <div class="wrap-login100 p-t-10 p-b-30">
                <?= form_open('Auth/validasi', 'class="formlogin login100-form validate-form"') ?>
                <?= csrf_field() ?>
                <div class="login100-form-avatar">
                    <img class="img-thumbnail logoweb" src="<?= base_url('uploads/profile/thumb' . '/thumb_' . $profile[0]['logo_pt']); ?>" width="100px" alt="Foto">
                </div>

                <span class="login100-form-title p-t-20 p-b-45">
                    Raman Sejahtera Farm
                </span>

                <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input m-b-10" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn p-t-10">
                    <button class="login100-form-btn btnlogin" type="submit">
                        Login
                    </button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <img src="/assets/img/uni.png" width="30" height="30" style="vertical-align:middle"> <span>Copyright &copy; Supply Chain Management 2021</span>
            </div>
        </div>
    </footer>

    <script src="<?= base_url('assets/vendor/login'); ?>/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url('assets/vendor/login'); ?>/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url('assets/vendor/login'); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/vendor/login'); ?>/vendor/select2/select2.min.js"></script>
    <script src="<?= base_url('assets/vendor/login'); ?>/js/main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            $('.formlogin').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $('.btnlogin').prop('disable', true);
                        $('.btnlogin').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i>Loading...')

                    },
                    complete: function() {
                        $('.btnlogin').prop('disable', false);
                        $('.btnlogin').html('Login')
                    },
                    success: function(response) {
                        if (response.error) {
                            Swal.fire({
                                title: "Oooopss!",
                                text: response.error,
                                icon: "error",
                                showConfirmButton: false,
                                footer: '---',
                                timer: 1250
                            });
                        }

                        if (response.sukses) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Anda berhasil login!",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1250
                            }).then(function() {
                                window.location = response.sukses.link;
                            });

                        }
                    }
                });
                return false;
            });
        });
    </script>

</body>

</html>