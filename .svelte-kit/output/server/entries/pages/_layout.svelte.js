import { h as head, d as bind_props, c as pop, p as push } from "../../chunks/index.js";
import { e as escape_html } from "../../chunks/escaping.js";
function _layout($$payload, $$props) {
  push();
  const prerender = true;
  let { title = "Adhyanga - Accueil", data, children } = $$props;
  head($$payload, ($$payload2) => {
    $$payload2.title = `<title>${escape_html(title)}</title>`;
  });
  children($$payload);
  $$payload.out += `<!---->`;
  bind_props($$props, { prerender });
  pop();
}
export {
  _layout as default
};
