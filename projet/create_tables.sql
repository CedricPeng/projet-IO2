DROP DATABASE IF EXISTS robicm;
CREATE DATABASE IF NOT EXISTS robicm;
USE robicm;
DROP TABLE IF EXISTS utilisateurs;
DROP TABLE IF EXISTS avis;
DROP TABLE IF EXISTS sites_avis;

CREATE TABLE IF NOT EXISTS utilisateurs (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(256) NOT NULL DEFAULT '',
  mdp VARCHAR(256) NOT NULL,
  email VARCHAR(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS avis (
  id_avis INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  id INT NOT NULL,
  id_site INT NOT NULL,
  message VARCHAR(256) DEFAULT '',
  note INT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS sites_avis (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nom VARCHAR(250) NOT NULL DEFAULT '',
  description LONGTEXT,
  source TEXT,
  note INT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO utilisateurs (name, mdp, email)
      VALUES ('admin', 'admin123', 'admin@gmail.com'),
      ('Philippe', '1234', 'Philippe@gmail.com'),
      ('Emilie', '5678', 'Emilie@hotmail.com'),
      ('Mark', '9101112', 'Mark@laposte.net'),
      ('Emma', '131415', 'Emma@gmail.com.com'),
      ('Pablo', '161718', 'Pablo@gmail.com'),
      ('Victoria', '192021', 'Victoria@hotmail.com'),
      ('Matthieu', '222324', 'Matthieu@gmail.com'),
      ('Jeanne', '252627', 'Jeanne@laposte.net'),
      ('Amélie', '282930', 'Amélie@gmail.com'),
      ('Virgil', '313233', 'Virgil@hotmail.com'),
      ('Yanick', '343536', 'Yanick@gmail.com'),
      ('Louise', '373839', 'Louise@laposte.net'),
      ('Lina', '404142', 'Lina@hotmail.com'),
      ('David', '434445', 'David@gmail.com');

INSERT INTO avis (id, id_site, message, note)
      VALUES ('8', '2', 'Très bon site, je recommande.', '8'),
      ('2', '3', 'Très bon site, je recommande.', '8'),
      ('5', '1', 'Nul.', '2'),
      ('2', '3', 'Pas mal mais peut mieux faire...', '5'),
      ('3', '3', 'Les avis sont super fiables', '8'),
      ('4', '3', 'Parfait rien à dire !', '10'),
      ('6', '1', 'C de la merde', '0'),
      ('7', '1', 'Intéressant mais des fois il y a des bugs', '6'),
      ('2', '2', 'Pas ouf', '4'),
      ('7', '2', 'Je préfère TripAdvisor', '5'),
      ('5', '2', 'Sympa', '8'),
      ('5', '4', 'Les avis ne sont pas fiables la plupart du temps', '3'),
      ('3', '4', 'Utile pour bien se décider', '8'),
      ('4', '4', 'On a connu mieux comme site', '5');


INSERT INTO sites_avis (nom, description, source, note)
      VALUES ('TripAdvisor', 'Saviez-vous que les avis des clients sur les entreprises sont plus nombreux dans le secteur du voyage ? TripAdvisor a sérieusement évolué depuis ses débuts en 2000. Aujourd’hui, il couvre non seulement les hôtels, les locations de vacances, les restaurants et les agences de voyage, mais aussi les spas, les cafés et autres entreprises de divertissement.
              Si une part importante des recherches est toujours liée aux voyages, les internautes consultent également les avis de Tripadvisor avant de choisir un nouveau restaurant ou un nouvel endroit où emmener les enfants le week-end. Les recherches Google telles que « restaurants près de chez moi » apportent à TripAdvisor une tonne de trafic mensuel, il vaudrait donc la peine d’ajouter votre entreprise à ses résultats.', 'Images Sites/TripAdvisor.png', '8'),

      ('Société des Avis Garantis', 'Les risques sont un peu plus élevés lorsqu’il s’agit de vente en ligne. Entre les sites arnaques, les entreprises non sérieuses et les publicités mensongères, les consommateurs sont de plus en plus méfiants et souhaitent consulter les avis des autres internautes avant d’acheter. Avec la Société des Avis Garantis, vous pouvez être sûr de l’authenticité des avis sur les sites e-commerce que vous consultez.
        Par ailleurs, cette plateforme a pour objectif de rendre la vente en ligne une transaction plus fiable. Par ailleurs, Société des Avis Garantis a pour spécificité de permettre au commerçant d’avoir une vue sur leur e-réputation. Plus elles obtiennent des avis favorables de la part des clients, plus elles auront de chance de faire plus de vente. Aussi, elles sauront les points essentiels à améliorer en cas d’insatisfaction.
        Cette plateforme d’avis client propose de nombreuses fonctionnalités et est compatible avec d’autres plateformes comme Prestashop, Magento, Woocommerce ou encore Shopify.', './Images Sites/SocieteDesAvisGarantis.png', '17'),

      ('Guest Suite', 'Guest Suite est la solution de Review Management qui permet d’accroître votre visibilité sur Internet et de convaincre toujours plus de consommateurs de se rendre dans vos points de vente. De la collecte, à l’analyse, en passant par la diffusion en ligne et la réponse centralisée aux avis publiés, vous atteignez vos objectifs de marketing digital en toute simplicité grâce à un seul et même outil SaaS.
        Guest Suite permet de faire parler tous vos clients en vous accompagnant dans la création simplifiée d’enquêtes de satisfaction personnalisées, leur envoi automatisé au meilleur moment via le canal le plus adapté à votre clientèle. En publiant régulièrement, et de manière automatisée, un maximum d’avis clients positifs sur vos fiches établissement, vous réussissez à accroître votre visibilité sur Internet et, par répercussion, votre taux de conversion en point de vente.', 'Images Sites/GuestSuite.png', '31'),

      ('Google My Business', 'La plateforme d’évaluation la plus évidente pour soutenir votre référencement, Google My Business est un outil gratuit qui aide les entreprises à gérer leur présence en ligne. Il vous suffit d’avoir un compte d’entreprise vérifié sur Google et votre site Web, le nom de votre entreprise, vos coordonnées, vos heures d’ouverture et votre emplacement seront tous soigneusement associés à votre fiche de recherche.
        Toute personne recherchant votre entreprise verra automatiquement tous ces détails. Et le meilleur ? Ils verront également tous vos avis, ce qui leur donnera une raison immédiate de cliquer sur le lien de votre site ou de composer votre numéro de téléphone.', 'Images Sites/GoogleMyBusiness.jpg', '24'),

      ('Trust Pilot', '« Une expérience personnelle derrière chaque avis », telle est la vision de Trustpilot. En tant que plateforme d’avis gratuite, elle est ouverte à toutes entreprises et consommateurs. Soucieux de l’image de la marque des entreprises collaborateurs, et de la satisfaction de leurs clients, la plateforme s’engage à protéger et à promouvoir la confiance entre les deux parties.
        Dans cette optique, elle a mis en place une charte de transparence dans le but de garantir son intégrité. Pour une meilleure expérience client, le site propose de trouver des entreprises par catégorie. Fondée en 2007, Trustpilot joue un rôle à double sens. D’un côté, il aide les clients à faire leurs achats en ligne en toute confiance. D’un autre, ils fournissent aux entreprises des données essentielles pour qu’ils puissent améliorer l’expérience client.
        Par ailleurs, la plateforme en elle-même dispose d’avis client pour l’aider à s’améliorer. Dans leur vision, chaque avis est important pour créer de meilleures expériences pour tous.', 'Images Sites/Trustpilot.jpg', '0'),

      ('Avis Vérifiés', 'Il est bien connu que toutes les marques sont dans l’obligation de rassurer les consommateurs, afin de les encourager à acheter davantage. Grâce à son expertise et à son système performant, plus de 6 000 entreprises ont choisi Avis Vérifiés pour gérer leurs avis clients et booster leur business.
        Dans une stratégie marketing, un client satisfait est la meilleure publicité gratuite qu’il soit. Afin de jouir d’une bonne réputation au-delà des frontières, donnez la parole à vos clients satisfaits. Les avis des internautes ayant acheté vos produits sont stratégiques pour votre commerce.
        Grâce à Avis Vérifiés, non seulement les avis clients sont authentiques, mais ils sont extrêmement bien référencés. Puisqu’il a été sondé que 92% des consommateurs préfèrent solliciter ou consulter des avis avant d’acheter, laissez les commentaires de vos clients impacter positivement la confiance des autres internautes. De plus, d’après les statistiques, 90% des avis des clients sont positifs lorsque la plateforme présente un système d’authentification d’achat unique. Tel est le cas de Avis Vérifiés.', 'Images Sites/AvisVerif.jpg', '0'),

      ('Trusted Shops', 'Trusted Shop permet de faire des achats en ligne en toute sécurité. Bien que les sites e-commerce proposent un service rapide, la livraison et la qualité des produits sont des critères rédhibitoires face au désir d’achat des clients. Certes, vous ne pouvez pas avoir de contact direct avec le vendeur ni toucher le produit, mais Trusted Shop peut vous être d’une grande aide.
        Cette plateforme vous indique les boutiques en lignes qui offrent un service exceptionnel. Cette plateforme dispose également d’une rubrique avis des clients. Elle peut vous être d’une grande utilité pour vous donner une idée de la qualité du service, de la livraison et des produits d’une marque. Les clients peuvent laisser des commentaires par rapport à leur expérience.
        Par ailleurs, le site a mis en place un système de sécurité pour que vous puissiez compter sur l’authenticité de ces avis. Rien de mieux qu’une référence de commande unique pour authentifier l’achat d’une personne.', 'Images Sites/TrustedShops.png', '0'),

      ('G2', 'G2 est une plateforme populaire pour les entreprises SaaS (Software As A Service), donc si votre entreprise propose des logiciels, vous devez vous assurer d’y être présent.  Les évaluateurs peuvent simplement écrire des critiques ou partager leurs idées sur un certain choix de logiciel avec l’ensemble de leur réseau LinkedIn en utilisant un authentificateur LinkedIn très pratique. Cela donne aux lecteurs un degré de confiance supplémentaire, tout en offrant une approche facile pour atteindre un public potentiellement important et pertinent.
      G2 vous permet de comparer les entreprises avec des centaines de services comparables sur la base d’évaluations 5 étoiles, des prix, de la simplicité d’utilisation, de la qualité de l’assistance, de la rapidité de l’installation, etc. Les visiteurs peuvent également voter sur les évaluations en les augmentant ou les diminuant en fonction de leurs propres expériences. Les propriétaires d’entreprises peuvent simplement parcourir les évaluations de leurs rivaux pour avoir une meilleure idée de ce que veulent les clients.', 'Images Sites/G2.jpg', '0'),

      ('Capterra', 'Capterra, qui compte près d’un million d’évaluations et une communauté engagée et active, est un autre favori des entreprises SaaS (Software As A Service). Les utilisateurs peuvent trouver rapidement des logiciels en effectuant une recherche par secteur, par type de logiciel ou par produit spécifique. Cette recherche est divisée en près de 700 catégories – c’est beaucoup d’informations pour vous aider à trouver le bon produit ! La fonction « comparer à » permet aux visiteurs de comparer jusqu’à quatre entreprises côte à côte.
      En outre, les pages Web de Capterra pour de nombreuses catégories obtiennent régulièrement de bons résultats sur Google. Si vous cherchez à améliorer votre référencement, cette plateforme d’évaluation vous sera sans aucun doute utile. Si vous cherchez à améliorer votre référencement, cette plateforme d’évaluation vous aidera sans aucun doute. Capterra soutient également son classement organique par des efforts sponsorisés, de sorte que vous n’avez pas à vous soucier de la publicité.', 'Images Sites/Capterra.jpg', '0'),

      ('Custplace', 'Besoin de vous exprimer par rapport à un produit, un service ou de renseignement ? Custplace est le site idéal pour partager votre expérience client. Cette plateforme se veut fiable pour les avis et la relation client. Pour ce faire, elle a pour mission de proposer une réponse instantanée et efficace à votre question de service client.
        De plus, une identification est incontournable afin de pouvoir bénéficier des services de cette plateforme. Par conséquent, les consommateurs et les marques doivent vérifier leurs identités en validant leurs informations personnelles. Laisser vos avis et vos conseils sur une plateforme va certainement aider de futurs acheteurs dans leur quête. D’autant plus que Custplace propose un moyen rapide d’entrer en contact avec le service client des marques.
        Poser une question ou faire part de votre avis n’a jamais été aussi facile. Par-dessus tout, les interactions sont sécurisées. Grâce à toute une panoplie de mesure de sécurité, vous pouvez interagir avec les marques en toute quiétude.', 'Images Sites/Custplace.png', '0'),

      ('Yelp', 'Après avoir racheté Cityvox, Yelp est devenu l’un des principaux concurrents de TripAdvisor, notamment sur le marché américain. Cependant, les établissements touristiques et commerces de proximité français doivent aussi veiller sur les avis laissés sur cette plateforme.
        Tout comme sur TripAdvisor, vous pouvez réagir en cas de consommateur insatisfait et obtenir de nombreux retours d’expérience qui vous aideront à améliorer vos services. L’objectif étant d’augmenter chaque jour les commentaires élogieux !', 'Images Sites/Yelp.jpg', '0'),

      ('Foursquare City Guide', 'Foursquare est un réseau social de géolocalisation. Chaque utilisateur peut s’identifier en temps réel dans l’endroit qu’il visite : restaurant, boulangerie, monument, musée, hôtel, stade… Il peut aussi poster des photos et des commentaires sur le lieu visité. Là encore, à vous de faire un tour régulièrement pour voir ce que les internautes postent lorsqu’ils se rendent dans votre établissement.', 'Images Sites/FoursquareCityGuide.png', '0'),

      ('Alatest', 'AlaTest concerne surtout les produits technologiques et électroniques : ordinateur, caméscope, smartphone, appareil électroménager, chaîne hi-fi, appareil photo, console de jeux, etc.
        Les consommateurs sont amenés à noter divers critères du produit comme les performances générales, l’ergonomie, le design, la qualité de l’écran (pour un ordinateur ou une tablette), la qualité de l’image (pour un appareil photo)… Puis ils doivent attribuer une note sur 100 et détailler leur avis.
        Cette plateforme est utile aux fabricants qui veulent savoir comment améliorer la prochaine version de leurs produits.
        Pour le bien de votre e-réputation et proposer des produits ou services en accord avec les attentes de vos consommateurs, pensez à surveiller ces sites et à inciter vos clients à déposer un avis après l’utilisation de votre service ou la réception de vos produits.
        Créez des alertes pour être informé en temps réel de ce que les internautes postent sur vous et soyez sûr de pouvoir répondre rapidement.', 'Images Sites/Alatest.jpg', '0'),

      ('Pages Jaunes', 'Difficile de faire plus célèbre que les Pages Jaunes ! Cet annuaire en ligne, aussi populaire qu’historique, aide les consommateurs à trouver une entreprise ou un professionnel proche de chez eux.
        Ils peuvent aussi y laisser des avis sur vos services. Ainsi, lorsqu’un prospect recherche vos compétences, il peut comparer les différents concurrents et choisir le prestataire avec les meilleurs commentaires.
        Surveiller les avis postés sur les Pages Jaunes vous permet d’évaluer votre réputation sur un plan local.', 'Images Sites/PagesJaunes.png', '0'),

      ('Glassdoor', 'À la différence des autres sites, Glassdoor recueille les avis de vos employés et d’autres personnes ayant travaillé avec vous. Il enregistre plus de 60 millions d’utilisateurs mensuels. Des chercheurs d’emploi, clients potentiels ou investisseurs le consultent pour se faire une idée de la vie au sein de votre entreprise.
        Cet outil vous aidera à développer votre marque employeur, afin de cibler et de recruter des candidats. Il peut aussi vous aider à améliorer le bien-être de votre équipe.
        N’oubliez pas que la culture d’entreprise et les engagements sociaux ont désormais une grande importance pour les prospects. Certains sont donc attentifs à la manière dont vous traitez et rémunérez vos collaborateurs.
        Sur Glassdoor, il est facile de suivre et de répondre aux évaluations. Par exemple, vous pouvez configurer des alertes pour recevoir un email à chaque nouvel avis.
        Si vous n’avez pas le temps ou les compétences pour effectuer de la veille, pensez à demander l’aide d’un freelance sur Codeur.com ! Il pourra s’occuper de votre e-réputation et vous proposer des rapports réguliers sur les propos de vos consommateurs.', 'Images Sites/Glassdoor.png', '0');
