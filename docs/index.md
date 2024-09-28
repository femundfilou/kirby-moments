---
# https://vitepress.dev/reference/default-theme-home-page
layout: home

hero:
  name: "Kirby Moments"
  text: "Little Moments Matter. Share Yours."
  tagline: Use this plugin to a photo feed to your Kirby CMS powered website.
  image:
    src: /u-camera.svg
    alt: Kirby Moments
  
---
<script setup>
	import { useData } from 'vitepress'
	

	const { page } = useData()
	
</script>

<style>
	.vp-doc h2.h1, h2.h1 {
		font-size: clamp(2rem, 10vw, 4rem);
		line-height: 1;
		font-weight: 700;
		font-family: var(--vp-font-family-headline);
		border-top: 0;
	}

	.features {
		--_gap: 2rem;
		--_columns: 1;
		display: flex;
		flex-wrap: wrap;
		gap: var(--_gap);
	}


	@media (min-width: 640px) {
		.features {
			--_columns: 2;
		}
	}


	@media (min-width: 960px) {
		.features {
			--_gap: 5rem;
			--_columns: 3;
		}
	}


	.feature {
		flex: 1 1 calc((100% / var(--_columns)) - (var(--_gap) * (var(--_columns) - 1) / var(--_columns)));
	}

	.vp-doc h3.h3,h3.h3 {
		font-weight: 700;
	}

	:root {
  --color-oxford: #000E29;
  --color-oxford-light: hsl(220, 100%, 12%);
  --color-white: #FBFBF9;
  --color-blue: #025BFF;
  --color-ivory: #F7F7E7;
  --color-celadon: #AEFFC4;
  --color-mauve: #D9B3F7;
  --color-giants-orange: #FA6934;
  --clea-base-color: var(--color-oxford);
  --clea-base-color-invert: var(--color-white);
	--photogrid-color: #EDEDC6;
}

:root.dark {
	--photogrid-color: var(--color-oxford-light);
}

/**
INTRO
*/

.intro figure {
	position: relative;
}

.intro figure svg {
	position: absolute;
	bottom: -1%;
	width: 102%;
	height: 102%;
	left: -1%;
}

.vp-doc .intro h2, .intro h2 {
	position: relative;
	top: -5rem;
	margin-bottom:-5rem;
}

</style>



<section class="intro">
	<figure>
		<img src="./grid.png" />
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 2587 931" fill="none"><path fill="url(#b)" d="M0 0h2587v931H0z"/><defs><linearGradient id="b" x1="1293.5" x2="1293.5" y1="200" y2="931" gradientUnits="userSpaceOnUse"><stop stop-color="var(--vp-c-bg)" stop-opacity="0"/><stop offset="1" stop-color="var(--vp-c-bg)"/></linearGradient></defs></svg>
	</figure>
	<h2 class="text-center h1">Claim back your photo feed</h2>
</section>

<section class="section">
	<div class="features">
		<div class="feature">
			<h3 class="h3">Apple Shortcut</h3>
			<p>Use a Shortcut on your Apple devices to quickly post a new photo in seconds.</p>
		</div>
		<div class="feature">
			<h3 class="h3">RSS Feed</h3>
			<p>Let your friends subscribe to your photo feed via RSS like it's 2005.</p>
		</div>
		<div class="feature">
			<h3 class="h3">Fully customizable</h3>
			<p>While the plugin comes with styles and (optional) javascript, it can easily be customized to your likings.</p>
		</div>
	</div>
</section>