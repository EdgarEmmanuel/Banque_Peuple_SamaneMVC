<?php
/* Smarty version 3.1.30, created on 2020-08-25 21:23:06
  from "/opt/lampp/htdocs/samaneBanque/src/view/clients/cSalarie.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f45651a7b59c9_71422246',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff86e2f8c3afe9990e472582508a81680f1d77aa' => 
    array (
      0 => '/opt/lampp/htdocs/samaneBanque/src/view/clients/cSalarie.html',
      1 => 1598383382,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f45651a7b59c9_71422246 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
        <title>ADMIN PAGE</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/cSalarie.css" />
        <title>BANQUE PEUPLE</title>
         <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/favicon.ico" type="image/x-icon"/>
    </head>
<body>
    
<header>
    <div class="brand"> 
        <h1>BANQUE DU PEUPLE <a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Pages/getPageCni">ACCUEIL</a></h1>
    </div>
</header>

<main>
    <div class="form">
            <!-- form for adding client salarie  -->
            <form action="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Clients/insertSalarie" method="post">
                <div class="salarie">
                    <h2>INFORMATIONS CLIENT SALARIE</h2>
                    <input type="text" name="nom" placeholder="nom" id="nom_salarie" autocomplete="off" required />
                    <input type="text" name="prenom" placeholder="prenom" id="prenom_salarie" autocomplete="off" required /><br/>
                    <input type="text" name="adresseforCl" placeholder="Adresse Entreprise" id="addr_salarie" autocomplete="off" required />
                    <input type="text" name="telephone" placeholder="telephone" id="tele_salarie" autocomplete="off" required/><br/>
                    <input type="text" name="email" placeholder="email" id="email_salarie" autocomplete="off" required/>
                    <input type="text" name="matricule" placeholder="mat_client" id="mat_client" autocomplete="off"
                     value="<?php echo $_smarty_tpl->tpl_vars['matricules']->value;?>
" required readonly/><br/>
                    <input type="text" name="profession" placeholder="profession" id="emploi_salarie" autocomplete="off" required/>
                    <input type="text" name="nom_Entreprise" placeholder="nom entreprise" id="NameEnter_salarie" autocomplete="off" required/><br/>
                    <input type="text" name="cni" placeholder="CNI" id="cni_salarie" autocomplete="off" required/>
                </div>
                <div class="button_for_s" id="button">
                    <button id="btn_Csalarie" name="btn" value="cSalarie" >Valider</button>  <button>Annuler</button>
                </div>
        </form>
    </div>
</main>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/js/cSalarie.js" type="text/javascript"><?php echo '</script'; ?>
>
</body>
</html>





<?php }
}
