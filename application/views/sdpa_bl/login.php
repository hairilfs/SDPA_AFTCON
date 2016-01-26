<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Login | Teacher</title>

        <link href="<?= base_url(); ?>assets/img/LOGOUBL.png" rel="icon">
        <link href="<?= base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
        <link href="<?= base_url(); ?>assets/css/form-signin.css" rel="stylesheet">
    </head>
    <body>  
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title"><u>Login | Teacher</u></h1>
                    
                    <div class="account-wall">
                        <img class="profile-img" src="<?= base_url(); ?>assets/images/LOGOUBL.png" alt="">
                        
                        <form class="form-signin" action="<?= base_url(); ?>index.php/login/do_login" method="POST">
                            <input type="text" name="nip" class="form-control" placeholder="NIP" required autofocus>
                            <input type="password" name="pass" class="form-control" placeholder="Password" required>

                            <button class="btn btn-lg btn-primary btn-block" type="submit" name="masuk">Masuk</button>
                            
                            <a href="#" class="pull-left new-account" type="button" data-toggle="modal" data-target="#buatbaru">Buat Akun </a>
                            <a href="#" class="pull-right need-help" type="button" data-toggle="modal" data-target="#lupass">Lupa Password? </a><span class="clearfix"></span>
                        </form>
                    </div> <!-- <a href="#" class="text-center new-account">Buat akun </a> -->
                </div>
            </div>

            <!-- Modal lupa password-->
            <div class="modal fade" id="lupass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Lupa Kata Sandi</h4>
                        </div>

                        <form action="setting/send_mail.php" method="POST">
                            <div class="modal-body">
                                <label>Tenang! Masukkan email anda untuk mendapatkan password baru</label>
                                <input id="fcs1" type="email" name="mail" class="form-control" placeholder="Email" required>   
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="input" name="gantiPass" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Buat Akun-->
            <div class="modal fade" id="buatbaru" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Buat Akun Baru</h4>
                        </div>

                        <form action="#" method="POST">
                            <div class="modal-body">
                                Oops! Sorry, this section is not available yet.
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                                <!-- <button type="input" name="simpan" class="btn btn-primary">OK</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- /container -->

        <script src="<?= base_url(); ?>assets/js/jquery.js"></script>
        <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $('#lupass').on('shown.bs.modal', function () {
                $('#fcs1').focus();
            });
        </script>
    </body>
</html>