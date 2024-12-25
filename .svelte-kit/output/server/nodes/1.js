

export const index = 1;
let component_cache;
export const component = async () => component_cache ??= (await import('../entries/pages/_error.svelte.js')).default;
export const imports = ["_app/immutable/nodes/1.9NIoEOLr.js","_app/immutable/chunks/disclose-version.D_i6iMF7.js","_app/immutable/chunks/runtime.BBG7IIjk.js","_app/immutable/chunks/legacy.C5GGrqF4.js"];
export const stylesheets = [];
export const fonts = [];
