<!-- Division pour le sommaire -->
<nav class="menuLeft">
    <ul class="menu-ul">
        <li class="menu-item"><a href="index.php">retour</a></li>

        <li class="menu-item">
            Visiteur :<br>
            <?php echo $_SESSION['prenom'] . "  " . $_SESSION['nom'] ?>
        </li>

        <li class="menu-item">
            <a href="index.php?uc=etatFrais&action=selectionnerMois" title="Consultation de mes fiches de frais">Mes
                fiches de frais</a>
        </li>

        <li class="menu-item">
            <a href="index.php?uc=cumul_frais&action=selectionnerType" title="Cumul des frais">Cumul des frais (1.a)</a>
        </li>

        <li class="menu-item">
            <a href="index.php?uc=cumul_frais&action=selectionnerNumero" title="Cumul des frais">Frais des visiteurs (1.b)</a>
        </li>
        
        <li class="menu-item">
            <a href="index.php?uc=cumul_frais&action=selectionnerMois" title="Cumul des frais">Suivi des cumul de tous les frais du mois (1.c)</a>
        </li>

        <li class="menu-item">
            <a href="index.php?uc=cumul_frais&action=selectionnerNumeroVisiteur" title="Cumul des frais">Cumul de tous les frais par visiteur (1.d)</a>
        </li>

        <li class="menu-item">
            <a href="index.php?uc=cumul_frais&action=selectionnerNumeroVisiteur" title="Cumul des frais">Saisie de frais(1.e)</a>
        </li>

        <li class="menu-item">
            <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
        </li>
    </ul>
</nav>
<section class="content">


