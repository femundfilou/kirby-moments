import { fileURLToPath, URL } from 'node:url'
import { defineConfig } from 'vitepress'

// https://vitepress.dev/reference/site-config
export default defineConfig({
	title: "Kirby Moments",
	base: '/kirby-moments/',
	description: "Add a simple photo feed to your Kirby CMS powered website.",
	themeConfig: {
		// https://vitepress.dev/reference/default-theme-config
		nav: [
			{ text: 'Home', link: '/' },
			{ text: 'Installation', link: '/quickstart' }
		],

		sidebar: [
			{
				text: 'Installation',
				items: [
					{ text: 'Quickstart', link: '/quickstart' },
					{ text: 'Configuration', link: '/configuration' }
				]
			},
			{
				text: 'Upload images',
				items: [
					{ text: 'Apple Shortcuts', link: '/shortcuts' }
				]
			},
			{
				text: 'Frontend',
				items: [
					{ text: 'Styles', link: '/styles' },
					{ text: 'Scripts', link: '/scripts' },
					{ text: 'Output', link: '/output' }
				]
			},
			{
				text: 'Feed',
				items: [
					{ text: 'RSS', link: '/rss' }
				]
			}
		],
		socialLinks: [
			{ icon: 'github', link: 'https://github.com/femundfilou/kirby-moments' },
			{ icon: 'mastodon', link: 'https://mas.to/@jukra00' }
		]
	},
	vite: {
		resolve: {
			alias: [
				{
					find: /^.*\/VPHomeHero\.vue$/,
					replacement: fileURLToPath(
						new URL('./theme/Hero.vue', import.meta.url)
					)
				}
			]
		}
	}
})
