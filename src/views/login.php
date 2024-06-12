<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | Bootstrap Simple Admin Template</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/auth.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <img class="brand" src="../views/img/logopratao.png" alt="logo" width="210" height="100">
                    </div>
                    <h6 class="mb-4 text-muted">Faça login na sua conta</h6>
                    <form method = "post" action="../index.php/?controle=principal&acao=logar">
                        <div class="mb-3 text-start">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input type="text" name="usuario" class="form-control" placeholder="Enter Usuario" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" name = "senha" class="form-control" placeholder="Password" required>
                        </div>
                        <!-- <div class="mb-3 text-start">
                            <div class="form-check">
                              <input class="form-check-input" name="remember" type="checkbox" value="" id="check1">
                              <label class="form-check-label" for="check1">
                                Lembre-se de mim neste dispositivo
                              </label>
                            </div>
                        </div> -->
                        <button class="btn btn-primary shadow-2 mb-4">Logar</button>
                    </form>
                    <p class="mb-2 text-muted">Esqueceu sua senha? <a href="forgot-password.html">Resetar</a></p>
                    <!-- <p class="mb-0 text-muted">Don't have account yet? <a href="signup.html">Signup</a></p> -->
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>