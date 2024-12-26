export const manifest = (() => {
function __memo(fn) {
	let value;
	return () => value ??= (value = fn());
}

return {
	appDir: "_app",
	appPath: "_app",
	assets: new Set([".DS_Store",".gitignore","background.svg","cells/ayurveda.svg","cells/kinesiologie.svg","cells/lithotherapie.svg","heroRemoved.svg","logo.webp","logoRemoved.webp","private/cheque.jpeg","rooms/.DS_Store","rooms/room1.webp","rooms/room2.webp","rooms/room3.webp","rooms/room4.webp","rooms/room5.webp","rooms/room6.webp","rooms/room7.webp","rooms/room8.webp","svg/arrowRight.svg","svg/arrowTop.svg","svg/check.svg","svg/circle.svg","svg/envelope.svg","svg/facebook.svg","svg/heart.svg","svg/phone.svg","svg/user.svg"]),
	mimeTypes: {".svg":"image/svg+xml",".webp":"image/webp",".jpeg":"image/jpeg"},
	_: {
		client: {"start":"_app/immutable/entry/start.Bj8NGSYm.js","app":"_app/immutable/entry/app.BlXkzdM2.js","imports":["_app/immutable/entry/start.Bj8NGSYm.js","_app/immutable/chunks/runtime.BBG7IIjk.js","_app/immutable/chunks/index-client.CyEB8mP9.js","_app/immutable/entry/app.BlXkzdM2.js","_app/immutable/chunks/runtime.BBG7IIjk.js","_app/immutable/chunks/render.e6YOQFBm.js","_app/immutable/chunks/props.DKpQhFmG.js","_app/immutable/chunks/disclose-version.D_i6iMF7.js","_app/immutable/chunks/if.1owbTgLh.js","_app/immutable/chunks/index-client.CyEB8mP9.js"],"stylesheets":[],"fonts":[],"uses_env_dynamic_public":false},
		nodes: [
			__memo(() => import('./nodes/0.js')),
			__memo(() => import('./nodes/1.js')),
			__memo(() => import('./nodes/3.js')),
			__memo(() => import('./nodes/4.js')),
			__memo(() => import('./nodes/5.js')),
			__memo(() => import('./nodes/6.js')),
			__memo(() => import('./nodes/7.js')),
			__memo(() => import('./nodes/8.js'))
		],
		routes: [
			{
				id: "/ayurveda",
				pattern: /^\/ayurveda\/?$/,
				params: [],
				page: { layouts: [0,], errors: [1,], leaf: 2 },
				endpoint: null
			},
			{
				id: "/cgc",
				pattern: /^\/cgc\/?$/,
				params: [],
				page: { layouts: [0,], errors: [1,], leaf: 3 },
				endpoint: null
			},
			{
				id: "/kinesiologie",
				pattern: /^\/kinesiologie\/?$/,
				params: [],
				page: { layouts: [0,], errors: [1,], leaf: 4 },
				endpoint: null
			},
			{
				id: "/legals",
				pattern: /^\/legals\/?$/,
				params: [],
				page: { layouts: [0,], errors: [1,], leaf: 5 },
				endpoint: null
			},
			{
				id: "/lithotherapie",
				pattern: /^\/lithotherapie\/?$/,
				params: [],
				page: { layouts: [0,], errors: [1,], leaf: 6 },
				endpoint: null
			},
			{
				id: "/rdv",
				pattern: /^\/rdv\/?$/,
				params: [],
				page: { layouts: [0,], errors: [1,], leaf: 7 },
				endpoint: null
			}
		],
		matchers: async () => {
			
			return {  };
		},
		server_assets: {}
	}
}
})();
