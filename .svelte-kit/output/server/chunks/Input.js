import { i as ensure_array_like, d as bind_props, e as stringify } from "./index.js";
import { f as fallback } from "./utils.js";
import { e as escape_html } from "./escaping.js";
const replacements = {
  translate: /* @__PURE__ */ new Map([
    [true, "yes"],
    [false, "no"]
  ])
};
function attr(name, value, is_boolean = false) {
  if (value == null || !value && is_boolean || value === "" && name === "class") return "";
  const normalized = name in replacements && replacements[name].get(value) || value;
  const assignment = is_boolean ? "" : `="${escape_html(normalized, true)}"`;
  return ` ${name}${assignment}`;
}
function Input($$payload, $$props) {
  let id = fallback($$props["id"], "");
  let label = fallback($$props["label"], "");
  let type = fallback($$props["type"], "text");
  let value = fallback($$props["value"], "");
  let placeholder = fallback($$props["placeholder"], "");
  let variant = fallback($$props["variant"], "column");
  let disabled = fallback($$props["disabled"], false);
  let error = fallback($$props["error"], "");
  let className = fallback($$props["className"], "");
  let options = fallback($$props["options"], () => [], true);
  $$payload.out += `<div${attr("class", `input-container ${stringify(variant)} svelte-h5hoyj`)}>`;
  if (type !== "checkbox" && label) {
    $$payload.out += "<!--[-->";
    $$payload.out += `<label${attr("for", id)} class="input-label">${escape_html(label)}</label>`;
  } else {
    $$payload.out += "<!--[!-->";
  }
  $$payload.out += `<!--]--> `;
  if (type === "textarea") {
    $$payload.out += "<!--[-->";
    $$payload.out += `<textarea${attr("id", id)}${attr("class", `input-field ${stringify(className)} svelte-h5hoyj`)}${attr("placeholder", placeholder)}${attr("disabled", disabled, true)} required>`;
    const $$body = escape_html(value);
    if ($$body) {
      $$payload.out += `${$$body}`;
    }
    $$payload.out += `</textarea>`;
  } else {
    $$payload.out += "<!--[!-->";
    if (type === "checkbox") {
      $$payload.out += "<!--[-->";
      $$payload.out += `<div class="checkbox-container svelte-h5hoyj"><input${attr("id", id)} type="checkbox"${attr("checked", value, true)}${attr("disabled", disabled, true)} required> `;
      if (label) {
        $$payload.out += "<!--[-->";
        $$payload.out += `<label${attr("for", id)} class="input-label">${escape_html(label)}</label>`;
      } else {
        $$payload.out += "<!--[!-->";
      }
      $$payload.out += `<!--]--></div>`;
    } else {
      $$payload.out += "<!--[!-->";
      if (type === "select") {
        $$payload.out += "<!--[-->";
        const each_array = ensure_array_like(options);
        $$payload.out += `<select${attr("id", id)}${attr("class", `input-field ${stringify(className)} svelte-h5hoyj`)}${attr("disabled", disabled, true)} required><option value="" disabled selected>Choisissez une option</option><!--[-->`;
        for (let $$index = 0, $$length = each_array.length; $$index < $$length; $$index++) {
          let option = each_array[$$index];
          $$payload.out += `<option${attr("value", option.value)}>${escape_html(option.label)}</option>`;
        }
        $$payload.out += `<!--]--></select>`;
      } else {
        $$payload.out += "<!--[!-->";
        $$payload.out += `<input${attr("id", id)}${attr("class", `input-field ${stringify(className)} svelte-h5hoyj`)}${attr("type", type)}${attr("placeholder", placeholder)}${attr("value", value)}${attr("disabled", disabled, true)} required>`;
      }
      $$payload.out += `<!--]-->`;
    }
    $$payload.out += `<!--]-->`;
  }
  $$payload.out += `<!--]--> `;
  if (error) {
    $$payload.out += "<!--[-->";
    $$payload.out += `<div class="error-message svelte-h5hoyj">${escape_html(error)}</div>`;
  } else {
    $$payload.out += "<!--[!-->";
  }
  $$payload.out += `<!--]--></div>`;
  bind_props($$props, {
    id,
    label,
    type,
    value,
    placeholder,
    variant,
    disabled,
    error,
    className,
    options
  });
}
export {
  Input as I,
  attr as a
};
