<?php
/* Smarty version 3.1.30, created on 2020-08-25 18:05:49
  from "/opt/lampp/htdocs/samaneBanque/src/view/welcome/index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f4536dd9142c2_39008426',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8fc732555f86b5a05966fe14c72d884c38a9891e' => 
    array (
      0 => '/opt/lampp/htdocs/samaneBanque/src/view/welcome/index.html',
      1 => 1598371523,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f4536dd9142c2_39008426 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Welcome</title>
		<!-- l'appel de <?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
 vous permet de recupérer le chemin de votre site web  -->
		<!--link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/bootstrap.min.css"/>
		<link type="text/css" rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/samane.css"/-->
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/login.css" />
		<!-- integration de javascript dans le moteur de rendu de vue Smarty -->
		
			<?php echo '<script'; ?>
 language=javascript>
			function load_design() {
			   document.getElementById("design_js").style.color = "#40007d";
			}

			<?php echo '</script'; ?>
>
		
	</head>
	<body onload="load_design()">
	
    <header>
        <div class="brand">Sign In</div>
    </header>
    <div class="div_form">
        <form action="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
User/handleUser"  method="post">
            <select name="type" id="type_employe">
                <option value="">...</option>
                <option value="responsable">Responsable Compte</option>
                <option value="administrateur">Administrateur</option>
                <option value="caissiere">Caissiere</option>
            </select><br>
            <input class="input" type="text" name="login" id="login" autocomplete="off" placeholder="entrer votre login"/><br>
            <input class="input" type="password" name="password" id="pwd" placeholder="entrer votre mot de passe"/><br>
            <button type="submit" name="btn" value="connex" >CONNEXION</button> <button type="reset" id="annuler">ANNULER</button>
        </form>    
    </div>



    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/js/login.js" type="text/javascript"><?php echo '</script'; ?>
>

	</body>
</html>
<?php }
}
