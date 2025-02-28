@extends("layouts.app")

@section("content")

<div class="container">
    <!-- Première section -->
    <div class="flex row mb-4 align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('images/tableau.jpg') }}" alt="Image de la section" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Bienvenue sur Chimax</h2>
            <p>Votre destination en ligne ultime pour l'achat d'équipement et de produits chimiques de haute qualité ! Chez Chimax, notre mission est de fournir aux professionnels de l'industrie, aux chercheurs et aux amateurs de chimie les outils et les substances nécessaires pour mener à bien leurs projets avec succès.</p>
        </div>
    </div>

    <!-- Deuxième section -->
    <div class="flex row mb-4 align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('images/produit.jpg') }}" alt="Image de la section" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Notre large gamme de produits</h2>
            <p>Nous proposons une vaste sélection d'équipements de laboratoire de pointe, des instruments de mesure précis aux réacteurs chimiques sophistiqués, en passant par tout ce dont vous avez besoin pour votre laboratoire. Nous comprenons l'importance d'avoir des outils fiables pour vos expériences et vos recherches, c'est pourquoi nous ne proposons que des produits de marques réputées, reconnues pour leur qualité et leur durabilité.</p>
        </div>
    </div>

    <!-- Troisième section -->
    <div class="flex row mb-4 align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('images/securite.webp') }}" alt="Image de la section" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Notre engagement envers la qualité et la sécurité</h2>
            <p>La qualité et la sécurité sont au cœur de notre démarche. Tous nos produits chimiques sont soumis à des contrôles de qualité rigoureux pour garantir leur pureté et leur conformité aux normes les plus strictes. De plus, nous fournissons des informations détaillées sur la manipulation sûre de nos produits, ainsi que des fiches de données de sécurité pour vous assurer une utilisation responsable.</p>
        </div>
    </div>

    <!-- Quatrième section -->
    <div class="flex row mb-4 align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('images/equipe.jpg') }}" alt="Image de la section" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Notre équipe d'experts</h2>
            <p>Chez Chimax, nous sommes fiers de notre équipe d'experts en chimie et en équipement de laboratoire. Nos spécialistes sont là pour vous conseiller, répondre à vos questions techniques et vous aider à choisir les produits les mieux adaptés à vos besoins spécifiques. Nous croyons en la création de partenariats à long terme avec nos clients, basés sur la confiance, la qualité et le service exceptionnel.</p>
        </div>
    </div>

    <!-- Cinquième section -->
    <div class="flex row mb-4 align-items-center">
        <div class="col-md-6">
            <img src="{{ asset('images/commande.png') }}" alt="Image de la section" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Facilité de commande en ligne</h2>
            <p>Commander sur Chimax est simple et pratique. Notre site web convivial vous permet de parcourir notre catalogue, de passer commande en quelques clics et de suivre la livraison de vos produits directement à votre porte. Nous nous efforçons de rendre votre expérience d'achat en ligne aussi fluide que possible.</p>
        </div>
    </div>
</div>


@endsection
