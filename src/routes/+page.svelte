<script>
    import Navbar from "$lib/components/shared/Navbar.svelte";
    import ServiceItem from "$lib/components/shared/ServiceItem.svelte";

    import {page} from '$app/stores';

    export let data;
    console.log(data)
</script>

<main class="heroPage">
    <div class="heroPage-inner">

        <Navbar/>

        <section class="homeSection">
            <div class="homeSection-inner">

                <div class="homeSection-content">
                    <h1>Bienvenue sur <span>Adhyanga</span>, votre <span>cabinet</span> de <span>soin</span> sur <span>Saint-Sornin</span>
                    </h1>
                    <p>Je vous souhaite l'accueil, l'amour, le sourire, la gratitude de ce qui se présente sur votre
                        chemin. NAMASTE</p>
                    <div class="button-container">
                        <p class="btn-primary">
                            <a href="#">Mes Avis</a>
                        </p>
                        <p class="btn-secondary">
                            <a href="#">Nos Services</a>
                        </p>
                    </div>
                </div>
                <div class="homeSection-image">
                    <img src="/heroRemoved.svg" alt="Adeline Pierrot, Kinésiologue à Saint-Sornin">
                </div>

            </div>
        </section>

    </div>
</main>

<section class="section servicesSection">
    <div class="servicesSection-inner">
        <div class="__header">
            <h6>Nos services</h6>
            <h2>Retrouvez nos services et quelques petites informations</h2>
        </div>
        <div class="__body">
            <ServiceItem
                    id="1"
                    title="Kinésiologie"
                    image="/cells/kinesiologie.svg"
            />
            <ServiceItem
                    id="1"
                    title="Ayurvéda"
                    image="/cells/ayurveda.svg"
            />
            <ServiceItem
                    id="1"
                    title="Lithothérapie"
                    image="/cells/lithotherapie.svg"
            />
        </div>
    </div>
</section>

<section class="section tarifs">
    <div class="tarifsSection-inner">
        <div class="__header">
            <h6>Nos Tarifs</h6>
            <h2>Retrouvez nos différentes formules</h2>
        </div>
        <div class="__body">
            <div class="services-container">
                {#each data.services as service}
                    <div class="service-card">
                        <div class="service-header">
                            <h2>{service.category}</h2>
                        </div>
                        <div class="service-body">
                            {#each service.durations as duration}
                                <div class="price-card">
                                    <div class="price">
                                        {#if duration.prices}
                                            {#each duration.prices as price}
                                                <div class="duration-type">
                                                    <p>{price.type}</p>
                                                    <div class="circle-green">
                                                        <h3>{price.price} €</h3>
                                                        <p>{duration.duration}</p>
                                                    </div>
                                                </div>
                                            {/each}
                                        {/if}
                                        {#if !duration.prices}
                                            <div class="circle-green">
                                                <h3>{duration.price} €</h3>
                                                <p>{duration.duration}</p>
                                            </div>
                                        {/if}
                                    </div>
                                </div>
                                {#if duration.options}
                                    <ul class="service-options">
                                        {#each duration.options as option}
                                            <li><img src="/svg/check.svg" alt="Icône de succès V"/> {option}</li>
                                        {/each}
                                    </ul>
                                {/if}
                            {/each}
                        </div>
                        <div class="service-footer">
                            <a href="#" class="btn-primary">Demande de rendez-vous</a>
                        </div>
                    </div>
                {/each}
            </div>
        </div>
    </div>
</section>

<section class="section cabinetSection">
    <div class="cabinetSection-inner">

        <div class="__header">
            <h6>Le cabinet de soins</h6>
            <h2>Découvrez notre cabinet de soins</h2>
        </div>

        <div class="cabinetSection-gallery">
            <div class="room">
                <img src="/rooms/room1.svg" alt="" loading="lazy">
                <h6>Accueil</h6>
            </div>
            <div class="room">
                <img src="/rooms/room2.svg" alt="" loading="lazy">
                <h6>Salle de kinésiologie</h6>
            </div>
            <div class="room">
                <img src="/rooms/room3.png" alt="" loading="lazy">
                <h6>Salle d'attente</h6>
            </div>
            <div class="room">
                <img src="/rooms/room4.png" alt="" loading="lazy">
                <h6>Porte d'entrée</h6>
            </div>
            <div class="room">
                <img src="/rooms/room8.png" alt="" loading="lazy">
                <h6>Salle de massage</h6>
            </div>
            <div class="room">
                <img src="/rooms/room7.png" alt="" loading="lazy">
                <h6>Écriteau d'adhyanga</h6>
            </div>
        </div>

    </div>
</section>

<section class="section testimonialsSection">
    <div class="testimonialsSection-inner">

        <div class="testimonials-header">
            <h2>Ils m'ont fait confiance...</h2>
            <a href="#" class="arrow-container">
                <img src="/svg/arrowRight.svg" alt="Flèche orientée vers la droite">
            </a>
        </div>
        <div class="testimonials-content">
            <div class="testimonial-item">
                <p>Séance très agréable !
                    Une vraie écoute du patient qui se fait ressentir aussi bien pendant la séance que sur ses effets
                    après coup.
                    Pour avoir essayé de nombreuses thérapies, je recommande particulièrement celle-ci.</p>
                <small>Timothee V.</small>
            </div>
            <div class="testimonial-item">
                <p>J'ai découvert la kinesiologie grâce à Adeline et je sais aussi que grâce à elle j'y retournerai les
                    yeux fermés.
                    <br/>Je ne peux que dire merci , elle m'a fait un très grand bien .<br/><br/>
                    Je vous la conseil vivement !</p>
                <small>Christophe T.</small>
            </div>
            <div class="testimonial-item">
                <p>L'écoute active et la bienveillance d'Adeline font de cette première séance , une découverte
                    extraordinaire de mon corps et des émotions l'habitant, un moment de bien être pour soi et en soi!!
                    Je recommande avec sincérité et enthousiasme 💫</p>
                <small>Aurély V. - <i>Local Guide</i></small>
            </div>
        </div>

        <div class="testimonials-footer">
            <h6>D'après <a href="#">©Google Avis</a> | <span>15</span> avis à <span>5 étoiles</span></h6>
        </div>

    </div>
</section>

<section class="section aboutSection">
    <div class="aboutSection-inner">
        <div class="__header">
            <h6>À propos de moi</h6>
            <h2>Découvrez en plus a propos de moi et de mon entreprise</h2>
        </div>
        <div class="__body">
            <div class="content-container">
                <div class="left">
                    <p>Depuis 2019, j’ai décidé de me reconvertir et je me suis formée au sein de L’IBK (institut belge de kinésiologie) à Rixensart afin de devenir Kinésiologue. En ressentant les bienfaits psychologiques, physiologiques et anatomiques de ces formations, j’ai voulu proposer des massages ayurvédiques et le travail avec les pierres qui sont complémentaires. </p>
                </div>
                <div class="right">
                    <p>« Quand on a un objectif dans la vie, il peut devenir meilleur ou pire cela dépend du chemin que nous choisissons pour l’atteindre et de la manière dont nous le parcourons… »</p>
                    <img src="/logoRemoved.png" alt="Logo d'Adhyanga">
                </div>
            </div>
        </div>
        <div class="__footer">
            <div class="btn-container">
                <p>
                    <a href="" class="btn-secondary">Contactez moi</a>
                </p>
                <p>
                    <a href="#" class="btn-primary"><img src="/svg/arrowTop.svg" alt="Flèche vers la droite"></a>
                </p>
            </div>
        </div>
    </div>
</section>
