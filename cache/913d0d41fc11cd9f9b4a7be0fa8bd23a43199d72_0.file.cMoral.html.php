<?php
/* Smarty version 3.1.30, created on 2020-08-25 21:31:14
  from "/opt/lampp/htdocs/samaneBanque/src/view/clients/cMoral.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f456702ea3c39_49735923',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '913d0d41fc11cd9f9b4a7be0fa8bd23a43199d72' => 
    array (
      0 => '/opt/lampp/htdocs/samaneBanque/src/view/clients/cMoral.html',
      1 => 1598383806,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f456702ea3c39_49735923 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
        <title>ADMIN PAGE</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/cMoral.css" />
        <title>BANQUE PEUPLE</title>
         <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/favicon.ico" type="image/x-icon"/>
    </head>
<body>
     <header> 
    <div class="brand"> 
        <h1>BANQUE DU PEUPLE<a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Pages/getPageCni">ACCUEIL</a></h1>
    </div>
</header>
<main>
    <div class="form">
            <!-- form for adding client Moral -->
            <form action="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Clients/pageInsertMoral" method="post">
            <div class="Moral">
                    <h2>INFORMATIONS CLIENT MORAL</h2>
                <input type="text" name="nom" placeholder="nom Entreprise" id="nom_enter_m" required autocomplete="off"/>
                <input type="text" name="adresse" placeholder="adresse" id="adresse_m" required autocomplete="off"/><br/>
                <input type="text" name="telephone" placeholder="telephone Professionel" id="tel_m" required autocomplete="off"/>
                <input type="text" name="email" placeholder="email entreprise" id="email_m" required autocomplete="off"/><br/>
                <input type="text" name="matricule" placeholder="matricule" value="<?php echo $_smarty_tpl->tpl_vars['matriculeMoral']->value;?>
" id="mat_client" required readonly/>
                <input type="text" name="type" placeholder="type entreprise" id="type_enter_m" required autocomplete="off"/><br/>
                <input type="text" name="activite" placeholder="activite Entreprise" id="activite_m" required autocomplete="off"/><br/>
                <input type="number" name="ninea" placeholder="NINEA Entreprise" min="1" id="activite_m" required autocomplete="off"/><br/>
            </div>
            <!-- end of all the  -->
            <button name="btn" value="CMoral">Valider</button><button>Annuler</button>
        </form>
    </div>
</main>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/js/cMoral.js" type="text/javascript"><?php echo '</script'; ?>
>
</body>
</html>





<?php }
}
