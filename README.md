# MangaTrendz

[![PHP](https://img.shields.io/badge/PHP-8%2B-blue)]()
[![MySQL](https://img.shields.io/badge/MySQL-Database-orange)]()
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5-purple)]()
[![Status](https://img.shields.io/badge/Status-Active-success)]()

---

## Description

MangaTrendz est un site web d’actualités manga avec un backoffice administrateur permettant la gestion complète des articles (CRUD).

Le projet repose sur une architecture PHP modulaire avec utilisation de PDO pour la base de données et Bootstrap pour l’interface utilisateur.
Ce blog PHP permet aux utilisateurs de découvrir et de discuter des dernières tendances dans le monde des mangas, des nouvelles sorties aux classiques indémodables.

--- 

## Fonctionnalités

### Frontend
- Affichage des articles
- Page détail article
- Pagination
- Filtrage par catégorie
- Page 404 personnalisée
- SEO dynamique (meta title / description)
- Interface responsive

### Admin
- Authentification (user / admin)
- Dashboard administrateur
- Création d’articles
- Modification d’articles
- Suppression d’articles
- Upload d’images
- Image par défaut automatique
- Suppression des images associées
- Messages de confirmation (flash)

---

## Stack technique

- PHP (procédural modulaire)
- MySQL
- PDO
- Bootstrap 5
- HTML / CSS / JavaScript

---

## Installation

### Prérequis

- PHP >= 8
- MySQL
- WAMP / XAMPP recommandé

---

### Étapes

#### 1. Cloner le projet

```bash
git clone https://github.com/ton-repo/MangaTrendz.git
```

#### 2. Placer le projet

```
C:\wamp64\www\MangaTrendz
```

#### 3. Creér une BDD / Importation

Ouvrir phpMyAdmin et créer la base de données
Ou importer la BDD existante a partir du fichier .sql se trouvant dans :
```
z-Documentation
```

#### 4. Configurer la connexion 

Configurer la connexion à l'aide du fichier config.php se trouvant dans : 
```
lib/config.php
```


#### 5. Lancer le serveur Apache/MySQL

Al'aide de WAMP/XAMPP lancer Apache et MySQL 

#### 6. Acceder au site 

```
http://loclahost/MangaTrendz
```

#### 7 . Acces administrateur 

Email de connexion : admin@test.com
Mot de passe : test


MangaTrendz/
📦admin
 ┣ 📂crud
 ┃ ┣ 📜create.php
 ┃ ┣ 📜delete.php
 ┃ ┣ 📜edit.php
 ┃ ┗ 📜edit_article.php
 ┣ 📂templates
 ┃ ┣ 📜footer.php
 ┃ ┗ 📜header.php
 ┣ 📜articles.php
 ┣ 📜index.php
 ┗ 📜sessionAdmin.php
 📦assets
 ┣ 📂img
 ┃ ┣ 📜default-article.jpg
 ┃ ┣ 📜hero.png
 ┃ ┣ 📜Logo.jpg
 ┃ ┣ 📜Logo_original.png
 ┃ ┣ 📜manga_trendz_with_pink_touches.webp
 ┃ ┗ 📜MixManga.jpg
 ┣ 📂uploads
 ┃ ┗ 📂articles
 ┃ ┃ ┣ 📜1-Luffy.jpeg
 ┃ ┃ ┣ 📜10-JJK.jpeg
 ┃ ┃ ┣ 📜10-JJK.jpg
 ┃ ┃ ┣ 📜11-DBS.jpg
 ┃ ┃ ┣ 📜12-Spy_x_family.jpg
 ┃ ┃ ┣ 📜14-TokyoR.jpeg
 ┃ ┃ ┣ 📜14-TokyoR.jpg
 ┃ ┃ ┣ 📜2-Kurosaki.jpg
 ┃ ┃ ┣ 📜3-Itachi.jpg
 ┃ ┃ ┣ 📜4-Kenshiro.jpg
 ┃ ┃ ┣ 📜5-one_piece.jpg
 ┃ ┃ ┣ 📜6-Demon_slayer.jpg
 ┃ ┃ ┣ 📜7-SNK.jpg
 ┃ ┃ ┣ 📜8-ChainsawMan.jpg
 ┃ ┃ ┣ 📜9-MHAvsMarvel.jpeg
 ┃ ┃ ┣ 📜9-MHAvsMarvel.jpg
 ┃ ┃ ┣ 📜aot.jpg
 ┃ ┃ ┣ 📜berserk.jpg
 ┃ ┃ ┣ 📜bluelock.jpg
 ┃ ┃ ┣ 📜bluespringride.jpg
 ┃ ┃ ┣ 📜chainsawman.jpg
 ┃ ┃ ┣ 📜deathnote.jpg
 ┃ ┃ ┣ 📜demonslayer-era.jpg
 ┃ ┃ ┣ 📜demonslayer.jpeg
 ┃ ┃ ┣ 📜demonslayer.jpg
 ┃ ┃ ┣ 📜eminence.jpg
 ┃ ┃ ┣ 📜fma.jpg
 ┃ ┃ ┣ 📜frieren.jpg
 ┃ ┃ ┣ 📜fruitsbasket.jpg
 ┃ ┃ ┣ 📜horimiya.jpg
 ┃ ┃ ┣ 📜jujutsu-era.jpg
 ┃ ┃ ┣ 📜jujutsu.jpg
 ┃ ┃ ┣ 📜marineford.jpg
 ┃ ┃ ┣ 📜mha.jpeg
 ┃ ┃ ┣ 📜mha.jpg
 ┃ ┃ ┣ 📜monster.jpg
 ┃ ┃ ┣ 📜mylovestory.jpg
 ┃ ┃ ┣ 📜nana.jpg
 ┃ ┃ ┣ 📜naru.webp
 ┃ ┃ ┣ 📜narut.jpg
 ┃ ┃ ┣ 📜naruto.jpg
 ┃ ┃ ┣ 📜OIP.DlZ4TeQ7A45SxD6pzrWu7AHaEo.jpg
 ┃ ┃ ┣ 📜onepiece.jpg
 ┃ ┃ ┣ 📜oshinoko.jpg
 ┃ ┃ ┣ 📜rezero.jpg
 ┃ ┃ ┣ 📜sao.jpg
 ┃ ┃ ┣ 📜slime.jpg
 ┃ ┃ ┣ 📜sololeveling.jpg
 ┃ ┃ ┣ 📜tokyoghoul.jpg
 ┃ ┃ ┣ 📜vinlandsaga.jpg
 ┃ ┃ ┣ 📜yourname.jpg
 ┃ ┃ ┗ 📜yourname.png
 ┗ 📜style.css
 📦lib
 ┣ 📜article.php
 ┣ 📜config.php
 ┣ 📜menu.php
 ┣ 📜pdo.php
 ┣ 📜session.php
 ┣ 📜start_session.php
 ┗ 📜user.php
 📦templates
 ┣ 📜article_part.php
 ┣ 📜footer.php
 ┗ 📜header.php
 📦z-Documentation
 ┣ 📜Blog-Théorie.pdf
 ┗ 📜mangaTrendz.sql
 ┣ 📜404.php
 ┣ 📜a_propos.php
 ┣ 📜actualite.php
 ┣ 📜actualites.php
 ┣ 📜contact.php
 ┣ 📜index.php
 ┣ 📜legal_information.php
 ┣ 📜list_files.php
 ┣ 📜login.php
 ┣ 📜logout.php
 ┗ 📜pdc.php
