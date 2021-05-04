# Composant Mailer
1. doc : https://symfony.com/doc/current/mailer.html
2. recherche google : https://symfonycasts.com/
3. Compte Mailtrap : https://mailtrap.io/

## Installer Mail
- vérifie config/bundle.php
- si besoin 
```bash
composer require symfony/mailer 
```

# Controller Contact
```bash
symfony console make:controller Contact
```

## Méthode de test
- lors de l'exécution avec une route donnée, on veut envoyer un mail.
- donc sans formulaire.

# La configuration d'envoi 
- le fichier .env : Voir MAILER_DNS ?
- config/packages/mail.yaml


# Choix SMTP Mailtrap
- compte gratuit
- addbox
- settings et intégrations --> Symfony 5
- copier le MAILER_DSN

# Test d'envoi.

# Formulaire de contact:
`symfony console make:form ContactFormType`
