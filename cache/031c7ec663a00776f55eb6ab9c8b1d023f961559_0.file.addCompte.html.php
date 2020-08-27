<?php
/* Smarty version 3.1.30, created on 2020-08-27 12:18:01
  from "/opt/lampp/htdocs/samaneBanque/src/view/comptes/addCompte.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5f478859bfcc10_00172423',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '031c7ec663a00776f55eb6ab9c8b1d023f961559' => 
    array (
      0 => '/opt/lampp/htdocs/samaneBanque/src/view/comptes/addCompte.html',
      1 => 1598523478,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f478859bfcc10_00172423 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
        <title>ADMIN PAGE</title>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/css/compte.css" />
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
Pages/getPageCni">ANNULER</a></h1>
        </div>
    </header>
    <main>
        <form action="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
Compte/insertCompte"  method="post">
    
             <div class="Moral">
                <h2>INFORMATIONS COMPTE DU CLIENT </h2>
                <input type="text" name="" placeholder="nom complet"
             value="<?php echo $_smarty_tpl->tpl_vars['nomClient']->value;?>
" id="prenom" readonly/>
    
                <input type="text" name="" placeholder="cni" 
                 value="<?php echo $_smarty_tpl->tpl_vars['idClient']->value;?>
" id="idClient" readonly/>
            </div>
    
            <label for="" style="color:white;">TYPE COMPTE </label>
                <select name="typeCompte" id="type_m" required>
                    <option value="">Choisir...</option>
                    <option value="Epargne">Compte Epargne</option>
                    <option value="Courant">Compte Courant</option>
                    <option value="Bloque">Compte Bloque</option>
                </select><br/> 
                <input type="text" name="raison" id="raison_social" placeholder="raison social"/>
                <input type="number" name="cle_rib" id="cle_rib" min="1" max="97" placeholder="Cle RIB"/><br/>
                <input type="number" name="montant" id="montant" min="10000" placeholder="montant" /> 
                <input type="text" name="Name_entreprise" id="nom_Entreprise" placeholder="nom Entreprise" /><br/>
                <input type="text" name="adresse_Entreprise" id="Adresse_Entreprise" placeholder="Adresse Entreprise" />
                <input type="text" name="numero_Agence" id="numeroAgence"  
                placeholder="numero Agence" value="<?php echo $_smarty_tpl->tpl_vars['nomAgence']->value;?>
" readonly/><br/>
                
                <label for="" style="color:white;">DATE DEBLOCAGE COMPTE </label>
            <input type="date" placeholder="date deblocage compte" min="<?php echo $_smarty_tpl->tpl_vars['date_debloc']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['date_debloc']->value;?>
" id="date_deblocage" name="dateDebloc"/> 
                
                <!-- pour la session avec la date , voir la page index.php(Ligne 16-18) -->
                <br/>
                <label for="" style="color:white;">DATE OUVERTURE COMPTE</label>
                <input type="date" value="<?php echo $_smarty_tpl->tpl_vars['min_date']->value;?>
" name="dateOuvert" min="<?php echo $_smarty_tpl->tpl_vars['min_date']->value;?>
" placeholder="date ouverture" id="date_m" /> 
                <div id="choix">
                    <label for="" style="color:white;">FRAIS OUVERTURE</label><input  type="checkbox" name="souscription" value="souscri" id="frais"/>
                </div>
                <div id="choix2">
                    <label for="" style="color:white;">RETRAIT AGIOS TOUS LES 3 MOIS</label> <input type="checkbox" name="agiosOBG" value="agios" id="fraisR"/>
                </div>
            
    
                <input type="number" name="idAgence" value="<?php echo $_smarty_tpl->tpl_vars['idAgence']->value;?>
" hidden />
                 <input type="number" name="idEmp" value="<?php echo $_smarty_tpl->tpl_vars['idEmploye']->value;?>
" hidden/>
                 <input type="text" name="idClient"
                 value="<?php echo $_smarty_tpl->tpl_vars['idClient']->value;?>
" id="idClient" hidden/>
    
        <div class="button_for_s" id="button">
            <button id="btn_create" name="btn" value="C_compte" >Valider</button>  <button>Annuler</button>
        </div>
        </form>
       
    
    </main>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['url_base']->value;?>
public/js/compte.js" type="text/javascript"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
