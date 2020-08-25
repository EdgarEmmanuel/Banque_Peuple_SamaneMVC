<?php
/* Smarty version 3.1.30, created on 2020-08-25 21:47:21
  from "/opt/lampp/htdocs/samaneBanque/src/view/clients/cNSalarie.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f456ac9cd0bf4_07654708',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e70ac3fadf3af3937443b98ebade484791c57b7f' => 
    array (
      0 => '/opt/lampp/htdocs/samaneBanque/src/view/clients/cNSalarie.html',
      1 => 1598384596,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f456ac9cd0bf4_07654708 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
        <title>ADMIN PAGE</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/cNSalarie.css" />
        <title>BANQUE PEUPLE</title>
         <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/favicon.ico" type="image/x-icon"/>
    </head>
<body><header>
    <div class="brand"> 
        <h1>BANQUE DU PEUPLE<a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Pages/getPageCni">ACCUEIL</a></h1>
    </div>
</header>
<main>
    <div class="form">
            <form action="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Clients/insertCIndependant" method="post">
            <!-- form for adding Independant client -->
            <div class="Independant">
                <h2>INFORMATIONS CLIENT INDEPENDANT</h2>
                <input type="text" name="nom" placeholder="nom" id="nom_i" autocomplete="off" required/>
                <input type="text" name="prenom" placeholder="prenom" id="prenom_i" autocomplete="off" required /><br/>
                <input type="text" name="localisation" placeholder="adresse" id="adresse_i" autocomplete="off" required />
                <input type="text" name="telephone" placeholder="telephone" id="telephone_i" autocomplete="off" required /><br/>
                <input type="email" name="email" placeholder="email" id="email_i" autocomplete="off" required/>
                <input type="text" name="matricule" value="<?php echo $_smarty_tpl->tpl_vars['matricule_inde']->value;?>
" autocomplete="off" placeholder="mat_client" id="mat_client" required readonly/><br/>
                <input type="text" name="activite" placeholder="activite" id="activite_i" autocomplete="off" required /><br/>
                <input type="text" name="cni" placeholder="CNI" id="activite_i" autocomplete="off" required/><br/>
            </div>
           <button name="btn" value="Cindependant">Valider</button><button>Annuler</button>
        </form>
    </div>
</main>
    <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/js/cNSalarie.js" ><?php echo '</script'; ?>
>
</body>
</html>





<?php }
}
