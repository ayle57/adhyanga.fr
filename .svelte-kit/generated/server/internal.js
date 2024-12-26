
import root from '../root.js';
import { set_building, set_prerendering } from '__sveltekit/environment';
import { set_assets } from '__sveltekit/paths';
import { set_manifest, set_read_implementation } from '__sveltekit/server';
import { set_private_env, set_public_env, set_safe_public_env } from '../../../node_modules/.pnpm/@sveltejs+kit@2.15.0_@sveltejs+vite-plugin-svelte@5.0.3_svelte@5.16.0_vite@6.0.5_@types+node@_l4si2ssrppwjxsul2nnulsv2rm/node_modules/@sveltejs/kit/src/runtime/shared-server.js';

export const options = {
	app_dir: "_app",
	app_template_contains_nonce: false,
	csp: {"mode":"auto","directives":{"upgrade-insecure-requests":false,"block-all-mixed-content":false},"reportOnly":{"upgrade-insecure-requests":false,"block-all-mixed-content":false}},
	csrf_check_origin: true,
	embedded: false,
	env_public_prefix: 'PUBLIC_',
	env_private_prefix: '',
	hash_routing: false,
	hooks: null, // added lazily, via `get_hooks`
	preload_strategy: "modulepreload",
	root,
	service_worker: false,
	templates: {
		app: ({ head, body, assets, nonce, env }) => "<!doctype html>\n<html lang=\"fr\">\n<head>\n\t<meta charset=\"utf-8\" />\n\t<link rel=\"icon\" href=\"" + assets + "/logo.webp\" />\n\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />\n\n\t<meta name=\"description\" content=\"Adhyanga, cabinet de soins à Saint-Sornin spécialisé en kinésiologie, ayurvéda et lithothérapie. Offrez-vous un bien-être global grâce à des soins holistiques adaptés à vos besoins.\" />\n\n\t<meta name=\"keywords\" content=\"Adhyanga, cabinet de soins, kinésiologie, ayurvéda, lithothérapie, bien-être, thérapies naturelles, soins holistiques, Saint-Sornin, relaxation, énergie, équilibre\" />\n\n\t<meta name=\"author\" content=\"PIERROT Adeline\" />\n\n\t<meta name=\"robots\" content=\"index, follow\" />\n\n\t<meta property=\"og:title\" content=\"Adhyanga - Soins Kinésiologiques, Ayurvédiques et Lithothérapiques à Saint-Sornin\" />\n\t<meta property=\"og:description\" content=\"Explorez un espace de bien-être à Saint-Sornin avec Adhyanga. Spécialisé en kinésiologie, ayurvéda et lithothérapie pour retrouver votre équilibre intérieur.\" />\n\t<meta property=\"og:image\" content=\"" + assets + "/logo.webp\" />\n\t<meta property=\"og:url\" content=\"https://www.adhyanga.fr\" />\n\t<meta property=\"og:type\" content=\"website\" />\n\t<meta property=\"og:locale\" content=\"fr_FR\" />\n\n\t<meta name=\"twitter:card\" content=\"summary_large_image\" />\n\t<meta name=\"twitter:title\" content=\"Adhyanga - Votre Cabinet de Soin à Saint-Sornin\" />\n\t<meta name=\"twitter:description\" content=\"Adhyanga vous propose des soins en kinésiologie, ayurvéda et lithothérapie. Découvrez nos thérapies naturelles pour un bien-être global.\" />\n\t<meta name=\"twitter:image\" content=\"" + assets + "/logo.webp\" />\n\n\t<link rel=\"canonical\" href=\"https://www.adhyanga.fr\" />\n\n\t<link rel=\"preload\" href=\"" + assets + "/logo.webp\" as=\"image\" />\n\n\t<script type=\"application/ld+json\">\n\t\t{\n\t\t\t\"@context\": \"https://schema.org\",\n\t\t\t\"@type\": \"LocalBusiness\",\n\t\t\t\"name\": \"Adhyanga\",\n\t\t\t\"description\": \"Adhyanga propose des soins en kinésiologie, ayurvéda et lithothérapie à Saint-Sornin pour un bien-être global.\",\n\t\t\t\"url\": \"https://www.adhyanga.fr\",\n\t\t\t\"image\": \"" + assets + "/logo.webp\",\n\t\t\t\"address\": {\n\t\t\t\t\"@type\": \"PostalAddress\",\n\t\t\t\t\"streetAddress\": \"16220 Saint-Sornin\",\n\t\t\t\t\"addressLocality\": \"Saint-Sornin\",\n\t\t\t\t\"addressRegion\": \"Nouvelle-Aquitaine\",\n\t\t\t\t\"postalCode\": \"16220\",\n\t\t\t\t\"addressCountry\": \"France\"\n\t\t\t},\n\t\t\t\"geo\": {\n\t\t\t\t\"@type\": \"GeoCoordinates\",\n\t\t\t\t\"latitude\": \"45.695418\",\n\t\t\t\t\"longitude\": \"0.424653\"\n\t\t\t},\n\t\t\t\"telephone\": \"+33 6 12 34 56 78\",\n\t\t\t\"openingHours\": \"Mo-Fr 09:00-18:00\",\n\t\t\t\"priceRange\": \"$$\"\n\t\t}\n\t</script>\n\n\t" + head + "\n</head>\n<body data-sveltekit-preload-data=\"hover\">\n<div style=\"display: contents\">" + body + "</div>\n</body>\n</html>\n",
		error: ({ status, message }) => "<!doctype html>\n<html lang=\"en\">\n\t<head>\n\t\t<meta charset=\"utf-8\" />\n\t\t<title>" + message + "</title>\n\n\t\t<style>\n\t\t\tbody {\n\t\t\t\t--bg: white;\n\t\t\t\t--fg: #222;\n\t\t\t\t--divider: #ccc;\n\t\t\t\tbackground: var(--bg);\n\t\t\t\tcolor: var(--fg);\n\t\t\t\tfont-family:\n\t\t\t\t\tsystem-ui,\n\t\t\t\t\t-apple-system,\n\t\t\t\t\tBlinkMacSystemFont,\n\t\t\t\t\t'Segoe UI',\n\t\t\t\t\tRoboto,\n\t\t\t\t\tOxygen,\n\t\t\t\t\tUbuntu,\n\t\t\t\t\tCantarell,\n\t\t\t\t\t'Open Sans',\n\t\t\t\t\t'Helvetica Neue',\n\t\t\t\t\tsans-serif;\n\t\t\t\tdisplay: flex;\n\t\t\t\talign-items: center;\n\t\t\t\tjustify-content: center;\n\t\t\t\theight: 100vh;\n\t\t\t\tmargin: 0;\n\t\t\t}\n\n\t\t\t.error {\n\t\t\t\tdisplay: flex;\n\t\t\t\talign-items: center;\n\t\t\t\tmax-width: 32rem;\n\t\t\t\tmargin: 0 1rem;\n\t\t\t}\n\n\t\t\t.status {\n\t\t\t\tfont-weight: 200;\n\t\t\t\tfont-size: 3rem;\n\t\t\t\tline-height: 1;\n\t\t\t\tposition: relative;\n\t\t\t\ttop: -0.05rem;\n\t\t\t}\n\n\t\t\t.message {\n\t\t\t\tborder-left: 1px solid var(--divider);\n\t\t\t\tpadding: 0 0 0 1rem;\n\t\t\t\tmargin: 0 0 0 1rem;\n\t\t\t\tmin-height: 2.5rem;\n\t\t\t\tdisplay: flex;\n\t\t\t\talign-items: center;\n\t\t\t}\n\n\t\t\t.message h1 {\n\t\t\t\tfont-weight: 400;\n\t\t\t\tfont-size: 1em;\n\t\t\t\tmargin: 0;\n\t\t\t}\n\n\t\t\t@media (prefers-color-scheme: dark) {\n\t\t\t\tbody {\n\t\t\t\t\t--bg: #222;\n\t\t\t\t\t--fg: #ddd;\n\t\t\t\t\t--divider: #666;\n\t\t\t\t}\n\t\t\t}\n\t\t</style>\n\t</head>\n\t<body>\n\t\t<div class=\"error\">\n\t\t\t<span class=\"status\">" + status + "</span>\n\t\t\t<div class=\"message\">\n\t\t\t\t<h1>" + message + "</h1>\n\t\t\t</div>\n\t\t</div>\n\t</body>\n</html>\n"
	},
	version_hash: "1yw5k0t"
};

export async function get_hooks() {
	let handle;
	let handleFetch;
	let handleError;
	let init;
	

	let reroute;
	let transport;
	

	return {
		handle,
		handleFetch,
		handleError,
		init,
		reroute,
		transport
	};
}

export { set_assets, set_building, set_manifest, set_prerendering, set_private_env, set_public_env, set_read_implementation, set_safe_public_env };
