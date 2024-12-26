

export const index = 0;
let component_cache;
export const component = async () => component_cache ??= (await import('../entries/pages/_layout.svelte.js')).default;
export const imports = ["_app/immutable/nodes/0.4SNhrJXe.js","_app/immutable/chunks/disclose-version.D_i6iMF7.js","_app/immutable/chunks/runtime.BBG7IIjk.js","_app/immutable/chunks/props.DKpQhFmG.js"];
export const stylesheets = ["_app/immutable/assets/0.CNoHjyBG.css"];
export const fonts = [];
