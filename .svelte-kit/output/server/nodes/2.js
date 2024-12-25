import * as server from '../entries/pages/_page.server.js';

export const index = 2;
let component_cache;
export const component = async () => component_cache ??= (await import('../entries/pages/_page.svelte.js')).default;
export { server };
export const server_id = "src/routes/+page.server.js";
export const imports = ["_app/immutable/nodes/2.DdtkA6Gi.js","_app/immutable/chunks/disclose-version.D_i6iMF7.js","_app/immutable/chunks/runtime.BBG7IIjk.js","_app/immutable/chunks/legacy.C5GGrqF4.js","_app/immutable/chunks/render.e6YOQFBm.js","_app/immutable/chunks/props.DKpQhFmG.js","_app/immutable/chunks/if.1owbTgLh.js","_app/immutable/chunks/Input.B5MhYbfR.js","_app/immutable/chunks/Loader.DEMFyS6D.js"];
export const stylesheets = ["_app/immutable/assets/Input.O7NQVRGX.css","_app/immutable/assets/Loader.0tHDxJav.css"];
export const fonts = [];
