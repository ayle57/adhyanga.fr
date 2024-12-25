<script>
import Loader from "$lib/components/shared/Loader.svelte";
</script>

<Loader></Loader>

<div class="legal-page">
    <h1>Mentions Légales</h1>
    <section>
        <h2>Éditeur du site :</h2>
        <p>Adhyanga</p>
        <p>Entreprise</p>
        <p>16 rue des michelots, 16220, Saint-Sornin</p>
        <p>(+33) 06 14 56 53 69</p>
        <p>admin@adhyanga.fr</p>
    </section>

    <section>
        <h2>Directeur de la publication :</h2>
        <p>Aucun directeur de publication</p>
    </section>

    <section>
        <h2>Hébergeur du site :</h2>
        <p>Infomaniak</p>
        <p>Avenue de la Praille, 26, 1227 Carouge, Suisse</p>
        <p>Téléphone : +41 22 820 35 44</p>
        <p>Email : support@infomaniak.com</p>
    </section>

    <section>
        <h2>Propriété intellectuelle :</h2>
        <p>
            Ce site et son contenu sont la propriété exclusive d'Adhyanga et sont
            protégés par les lois françaises et internationales sur la propriété
            intellectuelle. Toute reproduction, distribution, modification, ou
            utilisation non autorisée du contenu, en tout ou en partie, est
            strictement interdite.
        </p>
    </section>

    <section>
        <h2>Données personnelles :</h2>
        <p>Aucune donnée personnelle n'est prélevée sur ce site.</p>
    </section>

    <section>
        <h2>Cookies :</h2>
        <p>Ce site utilise aucun cookie.</p>
    </section>

    <section>
        <h2>Liens externes :</h2>
        <p>
            Ce site peut contenir des liens vers des sites externes sur lesquels
            Adhyanga n'a aucun contrôle. En conséquence, Adhyanga décline toute
            responsabilité quant au contenu de ces sites.
        </p>
    </section>

    <section>
        <h2>Contact :</h2>
        <p>16 rue des michelots, 16220, Saint-Sornin</p>
        <p>06 14 56 53 69</p>
        <p>admin@adhyanga.fr</p>
    </section>

    <section>
        <h2>Crédits :</h2>
        <p>Développement: Allistair</p>
    </section>

    <a href="/#contact" class="btn-primary">
        Retour
    </a>
</div>

<style lang="scss">
  .legal-page {
    padding: 40px 2.5vw;
    font-family: Arial, sans-serif;
    line-height: 1.8;
    color: #0A2640FF;
    background-color: #f9f9f9;

    a {
      padding: 10px 20px;
      background: #65E4A3FF;
      border-radius: 20px;
      color: #fff;
      font-family: 'Montserrat';
      font-weight: 500;
    }

    h1 {
      font-size: 2.5em;
      margin-bottom: 20px;
      color: #0A2640FF;
    }

    h2 {
      font-size: 1.5em;
      margin-top: 20px;
      margin-bottom: 10px;
      color: #0A2640FF;
    }

    p {
      font-size: 1em;
      margin-bottom: 10px;
      color: #333;
    }

    section {
      margin-bottom: 30px;
      padding-bottom: 10px;
      border-bottom: 1px solid #ddd;

      &:last-child {
        border-bottom: none;
      }
    }
  }
</style>
