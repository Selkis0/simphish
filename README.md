# simphish
Simulation de phishing en environnement professionnel

En premier lieu, les utilisateurs étaient dirigés vers le script ==recupID.php==.
Ils disposaient d'un id unique, ce qui permettait de les identifier.

Directement, ce script les renvoyait vers ==accueil.html==.

Une fois le formulaire rempli et soumis, ils déclenchaient le script ==backend.php== qui récupérait les informations entrées.
Enfin, ils étaient redirigés vers le véritable site.
