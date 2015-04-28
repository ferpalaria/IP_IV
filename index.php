<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login | Painel ADM - RIA</title>
<link href="css/style-login.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="login">
	<p class="title-login">Login - RIA</p>
    <form action="" method="" name="login">
    	<div class="aviso-errado">Usúario ou senha incorretos!</div>
        <div class="aviso">Preecha os campos abaixo!</div>
        <label><div class="title-field">Usuário</div></label>
        <input type="text" name="usuario" class="field-style" value="Insira seu usuário"
        	onclick="
            	this.style.background='#fff',
                this.style.borderColor='F5F5F5'
            	if(this.value == 'Insira seu usuário'){
                	this.value=''
                }
                
            "
            onblur="
            	if(this.value == ''){
                	this.value ='Insira seu usuário'
                }
            "
        /><br />
    	<label><div class="title-field">Senha</div></label>
        <input type="password" name="usuario" class="field-style" 
        	onclick="
            	this.style.background='#fff'
            "       
        /><br />
        <input type="submit" name="logar" value="Logar"  class="btn-one"/>
    </form>
</div><!--login -->

</body>
</html>