<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon"/>


	<title>Hoo</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- CSS externo -->
<link rel="stylesheet" type="text/css" href="static/login.css">
<!-- JavaScript externo -->
<link rel="stylesheet" type="text/js" href="static/login.js">
</head>
<body>
	<div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="img/hoo-large.jpg" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="core/login.php" method="POST">
            <!-- INICIO form -->
            
            	<!-- Campo Email -->
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" required autofocus>

                <!-- Campo senha -->
                <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Login</button>

            </form><!-- FIM form -->
            <a href="cadastrar_novo_user.php" class="forgot-password">
                <button type="button" class="btn btn-success">Cadastrar-se</button>
            </a>
            <div>
	            Desenvolvido por: 
	            <a href="https://www.linkedin.com/in/gabriel-vieira-teodoro-b60932a7?trk=nav_responsive_tab_profile_pic" target="blank">
	            Gabriel Vieira Teodoro
	            </a>
            </div>
        </div><!-- /card-container -->
    </div><!-- /container -->
    
</div>
</body>
</html>