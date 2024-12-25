import { c as pop, p as push, e as stringify, f as copy_payload, g as assign_payload, d as bind_props, i as ensure_array_like } from "../../chunks/index.js";
import { a as attr, I as Input } from "../../chunks/Input.js";
import { e as escape_html } from "../../chunks/escaping.js";
import { L as Loader } from "../../chunks/Loader.js";
function Navbar($$payload) {
  $$payload.out += `<header class="navbarComponent"><nav class="navbarLinks-container"><ul><li><a href="/#services">Les Soins</a></li> <li><a href="/#tarifs">Nos Tarifs</a></li> <li><a href="/#contact">Contactez-moi</a></li></ul></nav></header>`;
}
function adaptArticle(title) {
  const vowels = ["a", "e", "i", "o", "u", "y", "h"];
  const firstLetter = title.trim().toLowerCase()[0];
  return vowels.includes(firstLetter) ? "l'" : "la ";
}
function ServiceItem($$payload, $$props) {
  push();
  let { id, title, image } = $$props;
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
  $$payload.out += `<a${attr("href", `/${stringify(link)}`)}><article${attr("class", `service-item ${stringify(id)}`)}><img${attr("src", image)}${attr("alt", `Pictogramme sur la ${stringify(title)}`)}> <h4>${escape_html(title)}</h4> <p>${escape_html(description)}</p> <p class="link">Explorer la page <img src="/svg/arrowRight.svg" alt="Flèche orientée vers la droite."></p></article></a>`;
  pop();
}
function Footer($$payload) {
  $$payload.out += `<footer><ul class="internal-links"><li><a href="/#home">Accueil</a></li> <li><a href="/#tarifs">Nos Tarifs</a></li> <li><a href="/rdv">Prendre rendez-vous</a></li> <li><a href="/#contact">Me contacter</a></li></ul> <ul class="credits"><li><a href="/cgc">CGC</a></li> <li><a href="/legals">Mentions Légales</a></li> <li>Fait avec <img src="/svg/heart.svg" alt="Pictogramme coeur rouge provenant de fontawesome"> par Allistair</li></ul> <ul class="socials-links"><li><a href="https://www.facebook.com/people/Adhyanga/100092508739176/" target="blank"><img src="/svg/facebook.svg" alt="Logo de facebook"></a></li></ul></footer>`;
}
function _page($$payload, $$props) {
  push();
  let data = $$props["data"];
  let firstname = "";
  let lastname = "";
  let phone = "";
  let message = "";
  let acceptedTerms = false;
  let $$settled = true;
  let $$inner_payload;
  function $$render_inner($$payload2) {
    const each_array = ensure_array_like(data.services);
    Loader($$payload2, {});
    $$payload2.out += `<!----> <main class="heroPage" id="home"><div class="heroPage-inner">`;
    Navbar($$payload2);
    $$payload2.out += `<!----> <section class="homeSection"><div class="homeSection-inner"><div class="homeSection-content"><h1>Bienvenue chez <span>Adhyanga</span>, votre <span>cabinet de soins</span> à <span>Saint-Sornin</span></h1> <p>Je vous accueille avec amour, sourire et gratitude pour chaque expérience qui se présente sur votre chemin. <strong>Namaste</strong>.</p> <div class="btn-container"><p><a href="/rdv" class="btn-primary">Prendre rendez-vous</a></p> <p><a href="/#services" class="btn-primary btn-secondary">Nos Soins</a></p></div></div> <div class="homeSection-image"><img src="/heroRemoved.svg" alt="Adeline Pierrot, Kinésiologue à Saint-Sornin"></div></div></section></div></main> <section class="section servicesSection" id="services"><div class="servicesSection-inner"><div class="__header"><h6>Nos soins</h6> <h2>Découvrez nos offres et informations</h2></div> <div class="__body">`;
    ServiceItem($$payload2, {
      id: "1",
      title: "Kinésiologie",
      image: "/cells/kinesiologie.svg"
    });
    $$payload2.out += `<!----> `;
    ServiceItem($$payload2, {
      id: "1",
      title: "Ayurvéda",
      image: "/cells/ayurveda.svg"
    });
    $$payload2.out += `<!----> `;
    ServiceItem($$payload2, {
      id: "1",
      title: "Lithothérapie",
      image: "/cells/lithotherapie.svg"
    });
    $$payload2.out += `<!----></div></div></section> <section class="section tarifs" id="tarifs"><div class="tarifsSection-inner"><div class="__header"><h6>Nos Tarifs</h6> <h2>Choisissez la formule qui vous convient</h2></div> <div class="__body"><div class="services-container"><!--[-->`;
    for (let $$index_3 = 0, $$length = each_array.length; $$index_3 < $$length; $$index_3++) {
      let service = each_array[$$index_3];
      const each_array_1 = ensure_array_like(service.durations);
      $$payload2.out += `<div class="service-card"><div class="service-header"><h2>${escape_html(service.category)}</h2></div> <div class="service-body"><!--[-->`;
      for (let $$index_2 = 0, $$length2 = each_array_1.length; $$index_2 < $$length2; $$index_2++) {
        let duration = each_array_1[$$index_2];
        if (!["1h30", "2h00"].includes(duration.duration)) {
          $$payload2.out += "<!--[-->";
          $$payload2.out += `<div class="price-card"><div class="price">`;
          if (duration.prices) {
            $$payload2.out += "<!--[-->";
            const each_array_2 = ensure_array_like(duration.prices);
            $$payload2.out += `<!--[-->`;
            for (let $$index = 0, $$length3 = each_array_2.length; $$index < $$length3; $$index++) {
              let price = each_array_2[$$index];
              $$payload2.out += `<div class="duration-type"><p>${escape_html(price.type)}</p> <div class="circle-green"><h3>${escape_html(price.price)} €</h3> <p>${escape_html(duration.duration)}</p></div></div>`;
            }
            $$payload2.out += `<!--]-->`;
          } else {
            $$payload2.out += "<!--[!-->";
          }
          $$payload2.out += `<!--]--> `;
          if (!duration.prices) {
            $$payload2.out += "<!--[-->";
            $$payload2.out += `<div class="circle-green"><h3>${escape_html(duration.price)} €</h3> <p>${escape_html(duration.duration)}</p></div>`;
          } else {
            $$payload2.out += "<!--[!-->";
          }
          $$payload2.out += `<!--]--></div></div> `;
          if (duration.options) {
            $$payload2.out += "<!--[-->";
            const each_array_3 = ensure_array_like(duration.options);
            $$payload2.out += `<ul class="service-options"><!--[-->`;
            for (let $$index_1 = 0, $$length3 = each_array_3.length; $$index_1 < $$length3; $$index_1++) {
              let option = each_array_3[$$index_1];
              $$payload2.out += `<li><img src="/svg/check.svg" alt="Icône de succès V"> ${escape_html(option)}</li>`;
            }
            $$payload2.out += `<!--]--></ul>`;
          } else {
            $$payload2.out += "<!--[!-->";
          }
          $$payload2.out += `<!--]-->`;
        } else {
          $$payload2.out += "<!--[!-->";
        }
        $$payload2.out += `<!--]-->`;
      }
      $$payload2.out += `<!--]--></div></div>`;
    }
    $$payload2.out += `<!--]--></div> <div class="btn-container container-full-width"><a href="/rdv" class="btn-primary">Prendre rendez-vous</a></div></div></div></section> <section class="section cabinetSection" id="cabinet"><div class="cabinetSection-inner"><div class="__header"><h6>Le cabinet de soins</h6> <h2>Venez découvrir notre espace</h2></div> <div class="cabinetSection-gallery"><div class="room"><img src="/rooms/room1.webp" alt=""> <h6>Accueil</h6></div> <div class="room"><img src="/rooms/room2.webp" alt=""> <h6>Salle de kinésiologie</h6></div> <div class="room"><img src="/rooms/room3.webp" alt=""> <h6>Salle d'attente</h6></div> <div class="room"><img src="/rooms/room4.webp" alt=""> <h6>Porte d'entrée</h6></div> <div class="room"><img src="/rooms/room8.webp" alt=""> <h6>Salle de massage</h6></div> <div class="room"><img src="/rooms/room7.webp" alt=""> <h6>Écriteau d'adhyanga</h6></div></div></div></section> <section class="section testimonialsSection" id="testimonials"><div class="testimonialsSection-inner"><div class="testimonials-header"><h2>Ils m’ont fait confiance...</h2> <a href="https://www.google.com/search?sca_esv=b48a5fa61e646af5&amp;sxsrf=ADLYWILTVEFgbugYYtkKcDSmjG1IoluIGQ:1735143989653&amp;uds=ADvngMjcH0KdF7qGWtwTBrP0nt7d9EEqO9IjfLWgCQg2Gm_XVdHh_XJZnr4yOtCPmMkuIHqx8xteYPkJPkhIyW9O6D-xyCEu9-81H5NRSKlVa1ipSmEiyvpg1H3Mm7GH628IdQqPYnfx&amp;q=Adhyanga+%7C+Cabinet+de+Kin%C3%A9siologie+%7C+Massage+Ayurv%C3%A9dique+%7C+Kin%C3%A9siologue+Avis&amp;si=ACC90nwjPmqJHrCEt6ewASzksVFQDX8zco_7MgBaIawvaF4-7h0QtXE3tVje1OrVbeA1JgEiunR4DpZa1BL7AbHgRb7HaMDPU1VJj1GnuY8LknnHLEvad7TCNP3W-vJE_Y4pLn1MXeY7g1Bxk_7pTQUOHCvAdgoU63PTzDMzLcH33RTwRHAt0GkKpUtBeN9t9YYTpvcTPZildgYCdx0X9T7612zA23vdQg%3D%3D&amp;hl=fr-FR&amp;sa=X&amp;ved=2ahUKEwjisIyJq8OKAxUrT6QEHevBNbIQ_4MLegQIVRAN&amp;biw=1420&amp;bih=1235&amp;dpr=1" target="blank" class="arrow-container"><img src="/svg/arrowRight.svg" alt="Flèche orientée vers la droite"></a></div> <div class="testimonials-content"><div class="testimonial-item"><p>Séance très agréable ! Une vraie écoute du patient, ressentie pendant la séance et dans ses effets après coup. Pour avoir essayé de nombreuses thérapies, je recommande particulièrement celle-ci.</p> <small>Timothee V.</small></div> <div class="testimonial-item"><p>J'ai découvert la kinésiologie grâce à Adeline et je sais que je reviendrai les yeux fermés. Merci, elle m'a fait un grand bien. <br><br>Je vous la recommande vivement !</p> <small>Christophe T.</small></div> <div class="testimonial-item"><p>L'écoute active et la bienveillance d'Adeline font de cette première séance une découverte extraordinaire de mon corps et de mes émotions, un moment de bien-être pour soi et en soi ! Je recommande sincèrement.</p> <small>Aurély V. - <i>Local Guide</i></small></div></div> <div class="testimonials-footer"><h6>D'après <a href="https://google.com" target="blank">©Google Avis</a> | <span>15</span> avis à <span>5 étoiles</span></h6></div></div></section> <section class="section aboutSection" id="about"><div class="aboutSection-inner"><div class="__header"><h6>À propos de moi</h6> <h2>Découvrez mon parcours et mon entreprise</h2></div> <div class="__body"><div class="content-container"><div class="left"><p>Depuis 2019, après ma reconversion professionnelle, je me suis formée à l’Institut belge de kinésiologie (IBK) à Rixensart pour devenir Kinésiologue. En expérimentant les bienfaits de ces pratiques, j’ai choisi d'intégrer également les massages ayurvédiques et la lithothérapie, des soins complémentaires pour un bien-être global.</p></div> <div class="right"><p>« Un objectif peut se transformer en bien-être ou en défi, selon le chemin que nous choisissons de parcourir. »</p> <img src="/logoRemoved.webp" alt="Logo d'Adhyanga"></div></div></div> <div class="__footer"><div class="btn-container"><p><a href="/#contact" class="btn-secondary">Contactez-moi</a></p> <p><a href="#" class="btn-primary"><img src="/svg/arrowTop.svg" alt="Flèche vers la droite"></a></p></div></div></div></section> <section class="section chequeSection" id="cheque"><div class="chequeSection-inner"><div class="cheque-container"><h2>Des chèques cadeaux sont disponibles pour vos événements.</h2></div></div></section> <section class="section contactSection" id="contact"><div class="contactSection-inner"><div class="contactSection-container"><div class="contactSection-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22294.227574114582!2d0.42465365526856313!3d45.69541802439374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47fe4e3e3f978443%3A0x405d39260eeace0!2s16220%20Saint-Sornin!5e0!3m2!1sfr!2sfr!4v1734890222307!5m2!1sfr!2sfr" style="border:0;" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe></div> <div class="contactSection-form"><h2>Contactez-moi</h2> <form>`;
    Input($$payload2, {
      id: "firstname",
      label: "Votre prénom",
      placeholder: "Entrez votre prénom",
      variant: "column",
      get value() {
        return firstname;
      },
      set value($$value) {
        firstname = $$value;
        $$settled = false;
      }
    });
    $$payload2.out += `<!----> `;
    Input($$payload2, {
      id: "lastname",
      label: "Votre nom de famille",
      placeholder: "Entrez votre nom de famille",
      variant: "column",
      get value() {
        return lastname;
      },
      set value($$value) {
        lastname = $$value;
        $$settled = false;
      }
    });
    $$payload2.out += `<!----> `;
    Input($$payload2, {
      id: "phone",
      type: "tel",
      label: "Votre numéro de téléphone",
      placeholder: "Entrez votre numéro de téléphone",
      variant: "column",
      get value() {
        return phone;
      },
      set value($$value) {
        phone = $$value;
        $$settled = false;
      }
    });
    $$payload2.out += `<!----> `;
    Input($$payload2, {
      id: "message",
      type: "textarea",
      label: "Votre message",
      placeholder: "Entrez votre message",
      variant: "column",
      get value() {
        return message;
      },
      set value($$value) {
        message = $$value;
        $$settled = false;
      }
    });
    $$payload2.out += `<!----> `;
    Input($$payload2, {
      id: "acceptedTerms",
      type: "checkbox",
      label: "Veuillez accepter les termes de confidentialité",
      variant: "row",
      get value() {
        return acceptedTerms;
      },
      set value($$value) {
        acceptedTerms = $$value;
        $$settled = false;
      }
    });
    $$payload2.out += `<!----> <button class="btn-primary" type="submit"${attr("disabled", !acceptedTerms, true)}>Envoyer mon message</button></form></div></div></div></section> `;
    Footer($$payload2);
    $$payload2.out += `<!---->`;
  }
  do {
    $$settled = true;
    $$inner_payload = copy_payload($$payload);
    $$render_inner($$inner_payload);
  } while (!$$settled);
  assign_payload($$payload, $$inner_payload);
  bind_props($$props, { data });
  pop();
}
export {
  _page as default
};
