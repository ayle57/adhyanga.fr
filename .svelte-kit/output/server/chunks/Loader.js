import { j as slot } from "./index.js";
function Loader($$payload, $$props) {
  let isLoading = true;
  setTimeout(
    () => {
      isLoading = false;
    },
    3e3
  );
  if (isLoading) {
    $$payload.out += "<!--[-->";
    $$payload.out += `<div class="loader-section svelte-1vb33hl"><span class="loader loader-double svelte-1vb33hl"></span> <h4 class="svelte-1vb33hl">Bienvenue sur <span class="svelte-1vb33hl">adhyanga.fr</span></h4> <p class="svelte-1vb33hl">Vous y êtes presque...</p></div>`;
  } else {
    $$payload.out += "<!--[!-->";
    $$payload.out += `<!---->`;
    slot($$payload, $$props, "default", {});
    $$payload.out += `<!---->`;
  }
  $$payload.out += `<!--]-->`;
}
export {
  Loader as L
};
