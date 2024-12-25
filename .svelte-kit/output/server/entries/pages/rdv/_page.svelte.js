import { f as copy_payload, g as assign_payload, c as pop, p as push } from "../../../chunks/index.js";
import { I as Input, a as attr } from "../../../chunks/Input.js";
import { L as Loader } from "../../../chunks/Loader.js";
const services = [{ "category": "Kinésiologie", "durations": [{ "duration": "1h00-1h30", "prices": [{ "type": "Adulte", "price": 60 }, { "type": "Enfant", "price": 50 }] }] }, { "category": "Ayurvéda", "durations": [{ "duration": "0h40", "price": 40, "options": ["massage du dos", "massage du ventre", "shirotchampi"] }, { "duration": "1h00", "price": 60, "options": ["abhyanga classique", "abhyanga dynamique"] }, { "duration": "1h30", "price": 90, "options": ["abhyanga classique", "abhyanga dynamique"] }, { "duration": "2h00", "price": 120, "options": ["abhyanga classique", "abhyanga dynamique"] }] }, { "category": "Lithothérapie", "durations": [{ "duration": "0h30-1h00", "price": 60 }] }];
function _page($$payload, $$props) {
  push();
  let firstname = "";
  let lastname = "";
  let email = "";
  let phone = "";
  let category = "";
  let duration = "";
  let selectedOption = "";
  let appointmentDate = "";
  let appointmentTime = "";
  let message = "";
  let acceptedTerms = false;
  let availableDurations = [];
  let availableOptions = [];
  if (category) {
    const selectedService = services.find((service) => service.category === category);
    availableDurations = selectedService?.durations || [];
    availableOptions = availableDurations.flatMap((d) => d.options || []).filter((option) => option);
  }
  let $$settled = true;
  let $$inner_payload;
  function $$render_inner($$payload2) {
    Loader($$payload2, {});
    $$payload2.out += `<!----> <div class="main-container"><header><a href="/#home"><img src="/logoRemoved.webp" alt=""></a></header> <div class="form-container"><h2>Prendre rendez-vous</h2> <form>`;
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
      id: "email",
      type: "email",
      label: "Votre adresse éléctronique",
      placeholder: "Entrez votre adresse éléctronique",
      variant: "column",
      get value() {
        return email;
      },
      set value($$value) {
        email = $$value;
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
      id: "category",
      type: "select",
      label: "Catégorie de service",
      options: services.map((service) => ({
        value: service.category,
        label: service.category
      })),
      variant: "column",
      get value() {
        return category;
      },
      set value($$value) {
        category = $$value;
        $$settled = false;
      }
    });
    $$payload2.out += `<!----> `;
    if (category) {
      $$payload2.out += "<!--[-->";
      Input($$payload2, {
        id: "duration",
        type: "select",
        label: "Durée",
        options: availableDurations.map((d) => ({
          value: d.duration,
          label: `${d.duration} (${d.price || "60"}€)`
        })),
        variant: "column",
        get value() {
          return duration;
        },
        set value($$value) {
          duration = $$value;
          $$settled = false;
        }
      });
    } else {
      $$payload2.out += "<!--[!-->";
    }
    $$payload2.out += `<!--]--> `;
    if (availableOptions.length > 0) {
      $$payload2.out += "<!--[-->";
      Input($$payload2, {
        id: "options",
        type: "select",
        label: "Options",
        options: availableOptions.map((option) => ({ value: option, label: option })),
        variant: "column",
        get value() {
          return selectedOption;
        },
        set value($$value) {
          selectedOption = $$value;
          $$settled = false;
        }
      });
    } else {
      $$payload2.out += "<!--[!-->";
    }
    $$payload2.out += `<!--]--> `;
    Input($$payload2, {
      id: "appointmentDate",
      type: "date",
      label: "Date du rendez-vous",
      variant: "column",
      get value() {
        return appointmentDate;
      },
      set value($$value) {
        appointmentDate = $$value;
        $$settled = false;
      }
    });
    $$payload2.out += `<!----> `;
    Input($$payload2, {
      id: "appointmentTime",
      type: "time",
      label: "Heure du rendez-vous",
      variant: "column",
      get value() {
        return appointmentTime;
      },
      set value($$value) {
        appointmentTime = $$value;
        $$settled = false;
      }
    });
    $$payload2.out += `<!----> `;
    Input($$payload2, {
      id: "message",
      type: "textarea",
      label: "Votre message",
      placeholder: "Ajoutez des détails ou des demandes spécifiques",
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
    $$payload2.out += `<!----> <button class="btn-primary" type="submit"${attr("disabled", !acceptedTerms, true)}>Prendre rendez-vous</button></form></div></div>`;
  }
  do {
    $$settled = true;
    $$inner_payload = copy_payload($$payload);
    $$render_inner($$inner_payload);
  } while (!$$settled);
  assign_payload($$payload, $$inner_payload);
  pop();
}
export {
  _page as default
};
