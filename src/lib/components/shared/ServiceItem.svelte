<script>
    import {adaptArticle} from "$lib/utils/string.js";

    let {id, title, image} = $props();
    const description = `Apprenez en plus à propos de ${adaptArticle(title)}` + title.toLowerCase() + ".";
    let link;
    switch (title) {
        case "Kinésiologie":
            link = "kinesiologie";
            break;
        case "Lithothérapie":
            link = "lithotherapie";
            break;
        case "Ayurvéda":
            link = "ayurveda";
            break;
    }
</script>

<a href="/{link}">
    <article class="service-item {id}">
        <img src={image} alt="Pictogramme sur la {title}"/>
        <h4>{title}</h4>
        <p>{description}</p>
        <p class="link">Explorer la page <img src="/svg/arrowRight.svg" alt="Flèche orientée vers la droite."></p>
    </article>
</a>
