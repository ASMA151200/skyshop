<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Stock - Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        body {
            background: linear-gradient(135deg, #1a1a1a, #333333);
            color: white;
            font-family: 'Arial', sans-serif;
            overflow-x: hidden;
        }
        .hero {
            height: 80vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            animation: fadeIn 2s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .hero h1 {
            font-size: 3.5rem;
            color:rgb(209, 45, 255);
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);
            animation: slideIn 1s ease-in-out;
        }
        @keyframes slideIn {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        .btn-light {
            background-color: rgba(255, 255, 255, 0.8);
            color: #343a40;
            transition: transform 0.3s ease, background-color 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
        }
        .btn-light:hover {
            background-color: #fff;
            color: #007bff;
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(255, 255, 255, 0.3);
        }
        .section-title {
            color:rgb(244, 45, 255);
            font-size: 2.5rem;
            margin-top: 50px;
            text-align: center;
            animation: fadeInUp 1s ease-in-out;
        }
        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
            border-radius: 8px;
            transition: transform 0.3s;
        }
        .feature-card:hover {
            transform: scale(1.05);
        }
        
        /* Style de base des liens */
.nav-link {
  position: relative; /* Nécessaire pour positionner le pseudo-élément */
  color: #333;  /* Couleur par défaut du texte */
  text-decoration: none;  /* Supprime le soulignement par défaut */
  transition: color 0.3s ease; /* Transition fluide pour la couleur */
}

/* Effet de survol */
.nav-link:hover {
  color: #007bff;  /* Nouvelle couleur du texte au survol */
}

/* Soulignement animé */
.nav-link::after {
  content: ''; /* Nécessaire pour créer un pseudo-élément */
  position: absolute;
  bottom: 0; /* Positionne le soulignement au bas du texte */
  left: 0;
  width: 100%;
  height: 2px;  /* Épaisseur du soulignement */
  background-color: #007bff;  /* Couleur du soulignement */
  font-size: 2rem !important;
  transform: scaleX(0); /* Initialement invisible */
  transform-origin: bottom right; /* L'animation commence par la droite */
  transition: transform 0.3s ease; /* Transition fluide pour le soulignement */
}

/* Animation du soulignement au survol */
.nav-link:hover::after {
  transform: scaleX(1); /* Affiche le soulignement sur le texte */
  transform-origin: bottom left; /* Animation du soulignement de gauche à droite */
}


/* Pour les éléments de la dropdown */
.dropdown-item {
  color: #333;
  text-decoration: none;
  transition: color 0.3s ease, background-color 0.3s ease;
}

/* Effet sur le lien de la dropdown au survol */
.dropdown-item:hover {
  color: #007bff;
  background-color: rgba(0, 123, 255, 0.1);  /* Effet de fond au survol */
}

        footer {
            background-color: #222;
            color: #aaa;
            padding: 20px;
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    
<nav class="container-fluid navbar navbar-expand-lg bg-body-tertiary shadow-sm py-3">
  <div class="container">
    <!-- Logo à gauche -->
    <a class="navbar-brand d-flex align-items-center" href="{{route('dashboard')}}">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 30%;">
      
    </a>
    
    <!-- Toggle button for mobile view -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
     
    <!-- Liens de navigation à droite -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link fw-semibold active " aria-current="page" href="{{route('dashboard')}}">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active fw-semibold" href="#Témoignages">Témoignages</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Fonctionnalités
          </a>
          <ul class="dropdown-menu shadow">
            <li><a class="dropdown-item" href="#Fonctionnalités">Ajouter un article</a></li>
            <li><a class="dropdown-item" href="#Fonctionnalités">Modifier un article</a></li>
            <li><a class="dropdown-item" href="#Fonctionnalités">Supprimer un article</a></li>
          </ul>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>

<!-- Hero Section -->
<div class="hero">
    <h1>Bienvenue dans SkyShop,  une entreprise de vente qui souhaite digitaliser ses produits afin d’élargir sa
      clientèle.</h1>
    <p>Gérez vos produits avec efficacité et simplicité</p>
    <a href="{{ route('articles.index') }}" class="btn btn-light btn-lg">Voir les articles</a>
</div>

<hr>

<!-- Features Section -->
<section class="my-5">
    <h2 class="section-title text-center mb-5" id="Fonctionnalités">Fonctionnalités</h2>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-5">
                <div class="card feature-card p-5 shadow-lg">
                    <h3>Ajout de produits</h3>
                    <p>Ajoutez facilement de nouveaux articles avec des détails précis.</p>
                    <a href="{{route('articles.create')}}" class="btn btn-light btn-lg">Ajouter un article</a>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card feature-card p-5 shadow-lg">
                    <h3>Modification de produit(s)</h3>
                    <p>Choisissez le(les) produits que vous voudrez modifier dans la liste des articles et modifiez-le(les).</p>
                    <a href="{{ route('articles.index') }}" class="btn btn-light btn-lg">Voir les articles</a>
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="card feature-card p-5 shadow-lg">
                    <h3>Suppression de produit(s)</h3>
                    <p>Choisissez le(les) produits que vous voudrez supprimer dans la liste des articles et supprimez-le(les).</p>
                    <a href="{{ route('articles.index') }}" class="btn btn-light btn-lg">Voir les articles</a>
                </div>
            </div>
        </div>
    </div>
</section>

<hr>

<!-- Testimonials Section -->
<section class="my-5">
    <h2 class="section-title text-center mb-5" id="Témoignages">Témoignages</h2>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-5">
                <blockquote class="blockquote">"Une interface intuitive et simple d'utilisation. Parfait pour notre gestion de stock."</blockquote>
                <p>- Client A</p>
            </div>
            <div class="col-md-4 mb-5">
                <blockquote class="blockquote">"Le suivi des stocks est impressionnant. Nous avons gagné en productivité !"</blockquote>
                <p>- Client B</p>
            </div>
            <div class="col-md-4 mb-5">
                <blockquote class="blockquote">"Les rapports et statistiques nous aident à anticiper nos besoins."</blockquote>
                <p>- Client C</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer>
    <p>&copy; 2024 Gestion de Stock. Tous droits réservés.</p>
</footer>

<!-- Scripts -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    // Ajoute un défilement en douceur au lien d'ancre
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>

</body>
</html>