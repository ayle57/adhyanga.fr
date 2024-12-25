<script>
import Loader from "$lib/components/shared/Loader.svelte";
</script>

<Loader></Loader>

<div class="privacy-policy-page">
    <h1>Conditions Générales de Confidentialité</h1>

    <section>
        <h2>Éditeur du site :</h2>
        <p>Adhyanga</p>
        <p>Entreprise</p>
        <p>16 rue des michelots, 16220, Saint-Sornin</p>
        <p>(+33) 06 14 56 53 69</p>
        <p>admin@adhyanga.fr</p>
    </section>

    <section>
        <h2>Hébergeur du site :</h2>
        <p>Infomaniak</p>
        <p>Avenue de la Praille, 26, 1227 Carouge, Suisse</p>
        <p>Téléphone : +41 22 820 35 44</p>
        <p>Email : support@infomaniak.com</p>
    </section>

    <section>
        <h2>Collecte des données personnelles :</h2>
        <p>
            Ce site collecte des données personnelles uniquement via ses formulaires de
            contact et de prise de rendez-vous, tous deux régis par Formspree.
        </p>
        <p>
            Les données collectées incluent, sans s'y limiter : noms, adresses email,
            numéros de téléphone et toute autre information fournie volontairement
            par l'utilisateur.
        </p>
    </section>

    <section>
        <h2>Utilisation des données personnelles :</h2>
        <p>
            Les données collectées sont utilisées exclusivement pour :
        </p>
        <ul>
            <li>Répondre aux demandes de contact.</li>
            <li>Gérer les rendez-vous.</li>
            <li>Améliorer les services proposés par Adhyanga.</li>
        </ul>
        <p>
            Aucune donnée personnelle n'est vendue, louée ou partagée avec des tiers sans le
            consentement explicite de l'utilisateur, sauf obligation légale.
        </p>
    </section>

    <section>
        <h2>Durée de conservation des données :</h2>
        <p>
            Les données personnelles collectées sont conservées pendant une durée maximale
            de 3 ans, sauf si une obligation légale impose une durée de conservation plus
            longue.
        </p>
    </section>

    <section>
        <h2>Vos droits :</h2>
        <p>
            Conformément au RGPD, vous disposez des droits suivants concernant vos données :
        </p>
        <ul>
            <li>Accès à vos données.</li>
            <li>Modification ou rectification de vos données.</li>
            <li>Suppression de vos données.</li>
            <li>Limitation du traitement de vos données.</li>
            <li>Portabilité de vos données.</li>
            <li>Opposition au traitement de vos données.</li>
        </ul>
        <p>
            Pour exercer ces droits, contactez-nous à admin@adhyanga.fr.
        </p>
    </section>

    <section>
        <h2>Sécurité des données :</h2>
        <p>
            Adhyanga met en œuvre des mesures techniques et organisationnelles appropriées
            pour garantir la sécurité et la confidentialité des données personnelles
            collectées.
        </p>
    </section>

    <section>
        <h2>Cookies :</h2>
        <p>Ce site n'utilise aucun cookie.</p>
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
  .privacy-policy-page {
    padding: 40px 2.5vw;
    font-family: Arial, sans-serif;
    line-height: 1.8;
    color: #0A2640FF;
    background-color: #f9f9f9;

    a {
      background-color: #65E4A3FF;
      padding: 10px 25px;
      border-radius: 20px;
      color: #fff;
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

    ul {
      margin-bottom: 10px;
      padding-left: 20px;

      li {
        margin-bottom: 5px;
      }
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
