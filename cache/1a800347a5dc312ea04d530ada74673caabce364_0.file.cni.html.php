<?php
/* Smarty version 3.1.30, created on 2020-08-27 10:40:44
  from "/opt/lampp/htdocs/samaneBanque/src/view/admin/cni.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f47718c030044_47226982',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a800347a5dc312ea04d530ada74673caabce364' => 
    array (
      0 => '/opt/lampp/htdocs/samaneBanque/src/view/admin/cni.html',
      1 => 1598517635,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f47718c030044_47226982 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
        <title>ADMIN PAGE</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/cni.css" />
        <title>BANQUE PEUPLE</title>
         <link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/favicon.ico" type="image/x-icon"/>
        <link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/favicon.ico" type="image/x-icon"/>
    </head>
<body>
    <header>
        <div class="brand">
            Banque du Peuple
        </div>
    </header>
    <main>
     <input type="text" value="Matricule - <?php echo $_smarty_tpl->tpl_vars['mat']->value;?>
"  id="caissiere" readonly/>
        <a href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Pages/logout" id="a" >Deconnexion</a><br>
        <input type="text" value="Nom Complet - <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" id="nom" readonly/><br>
        <form action="/verifyMat" method="post" id="formGest">
            <label id="label"  for="">ANCIEN CLIENT</label><br/>
            <input type="text" placeholder="MATRICULE CLIENT" name="matricule" id="cni" autocomplete="off" required /> <br>
            <button id="verClient" name="btn" value="verify">Verifier</button>
        </form>
    </main> <br/><br/>
    <a class="new" id="add">NOUVEAU CLIENT</a> <br/><br/><br/><br/>
    <a class="addS" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Pages/getPageInsertCS" id="add">Nouveau Client Salarie </a> <br/><br/><br/><br/>
    <a class="addM" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Pages/getPageMoral" id="add">Nouveau Client Moral </a> <br/><br/><br/><br/>
    <a class="addI" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Pages/getPageIndependant" id="add">Nouveau Client Independant </a>

    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/js/cni.js" type="text/javascript"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
