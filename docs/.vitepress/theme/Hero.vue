<script setup lang="ts">
import { type Ref, inject, onMounted, onUnmounted } from 'vue'
import { VPButton } from 'vitepress/theme'

export interface HeroAction {
	theme?: 'brand' | 'alt'
	text: string
	link: string
	target?: string
	rel?: string
}

const actions: HeroAction[] = [
	{
		theme: 'brand',
		text: 'Get started',
		link: '/quickstart'
	},
	{
		theme: 'alt',
		text: 'View on Github',
		link: 'https://github.com/femundfilou/kirby-moments'
	}
]

const heroImageSlotExists = inject('hero-image-slot-exists') as Ref<boolean>

function animate(module:any) {
	module.animate('#Linkes-Auge', [{ p: 'mpath', t: [1600, 1700, 2500, 2600], v: ['0%', '50%', '50%', '100%'], e: [[0], [0], [0], [0]], mp: 'M200,210L210.106,210L210.106,210L200,210' }, { p: 'd', t: [1600, 1700, 2500, 2600], v: ["path('M222,210C222,210,222,210,222,210')", "path('M204,210C204,210,209.4,210,222,210')", "path('M204,210C204,210,209.4,210,222,210')", "path('M222,210C222,210,222,210,222,210')"], e: [[0], [0], [0], [0]] }],
			'#Arm-rechts', [{ p: 'd', t: [800, 1600, 4800, 5300], v: ["path('M455.284,258C455.284,258,439,397.5,385.5,533.5C385.5,533.5,368.5,533.5,334.5,533.5')", "path('M455.284,258C455.284,258,587.284,316,385.284,444C385.284,444,371.284,444,337.284,444')", "path('M455.284,258C455.284,258,587.284,316,385.284,444C385.284,444,371.284,444,337.284,444')", "path('M455.284,258C455.284,258,439,397.5,385.5,533.5C385.5,533.5,368.5,533.5,334.5,533.5')"], e: [[0], [0], [0], [0]] }],
			'#Kamera', [{ p: 'mpath', t: [800, 1600, 4800, 5300], v: ['0%', '50%', '50%', '100%'], e: [[0], [0], [0], [0]], mp: 'M252.284,433.5L252.284,338L252.284,338L252.284,433.5' }],
			'#_a0', [{ p: 'mpath', t: [2000, 2200, 2400], v: ['0%', '50.000366%', '100%'], e: [[0], [0], [0]], mp: 'M47.216,88.658L48.216,86.5L47.216,88.658' }],
			'#arm-links', [{ p: 'd', t: [800, 1600, 1800, 2000, 2200, 2400, 2600, 2700, 4800, 5300], v: ["path('M57.4707,258C57.4707,258,22.5,408.5,178.5,464.5')", "path('M57.4707,258C57.4707,258,-99.5,396.5,170.5,360.5')", "path('M57.4707,258C57.4707,258,-99.5,396.5,170.5,360.5')", "path('M57.4707,258C57.4707,258,-97.5,369.5,172.5,333.5')", "path('M57.4707,258C57.4707,258,-96.5,361.5,173.5,325.5')", "path('M57.4707,258C57.4707,258,-97.5,369.5,172.5,333.5')", "path('M57.4707,258C57.4707,258,-97.5,369.5,172.5,333.5')", "path('M57.4707,258C57.4707,258,-99.5,396.5,170.5,360.5')", "path('M57.4707,258C57.4707,258,-99.5,396.5,170.5,360.5')", "path('M57.4707,258C57.4707,258,22.5,408.5,178.5,464.5')"], e: [[0], [1, 0, 0, 1, 1], [0], [0], [0], [0], [0], [1, 0, 0, 1, 1], [1, 0, 0, 1, 1], [0]] }],
			'#Foto', [{ p: 'visibility', t: [2700, 2800], v: ['visible', 'visible'], e: [[3, 1], [3, 1]], fill: [2, 'hidden'] }],
			'#_a1', [{ p: 'mpath', t: [3200, 3500, 3800, 4100, 4400, 4600, 4900, 5300], v: ['0%', '4.151721%', '5.588666%', '10.856648%', '24.144574%', '41.101877%', '65.039761%', '100%'], e: [[0], [0], [0], [0], [0], [0], [0], [0]], mp: 'M121.642,19.5L122.265,45.5L122.423,54.5L122.423,87.5L122.423,170.739L122.423,276.964L122.423,426.917L122.423,645.917' }, { p: 'd', t: [2800, 3000, 3200, 3500, 3800, 4100, 4400, 4600], v: ["path('M184.901,437L354.623,437L354.623,439.076C356.357,439.262,216.235,439.296,166.561,439.177C155.582,439.151,149.022,439.117,149.388,439.076L149.388,437Z')", "path('M182,437L316,437L371.782,461.69C373.606,462.498,208.103,462.664,149.297,462.155C136.301,462.043,128.516,461.898,128.9,461.719L182,437Z')", "path('M182,437L316,437L371.782,496.44C373.606,498.383,208.103,498.784,149.297,497.56C136.301,497.289,128.516,496.939,128.9,496.509L182,437Z')", "path('M182,411L316,411L371.782,494.216C373.606,496.937,208.103,497.498,149.297,495.784C136.301,495.405,128.516,494.915,128.9,494.313L182,411Z')", "path('M182,402L316,402L371.782,493.949C373.606,496.956,208.103,497.576,149.297,495.682C136.301,495.263,128.516,494.722,128.9,494.056L182,402Z')", "path('M182,386L346.842,386L371.782,515.793C373.606,520.037,208.103,520.912,149.297,518.239C136.301,517.647,128.516,516.884,128.9,515.944L155,386Z')", "path('M182,331.518L356.842,331.518L371.782,491.859C373.606,497.102,208.103,498.184,149.297,494.881C136.301,494.15,128.516,493.207,128.9,492.045L149.297,331.518Z')", "path('M183.842,236L371.782,236L371.782,490.472C373.606,497.199,208.103,498.587,149.297,494.349C136.301,493.412,128.516,492.202,128.9,490.711L128.9,236Z')"], e: [[0], [0], [0], [0], [0], [0], [0], [0]] }],
			'#_a2', [{ p: 'mpath', t: [2900, 3000, 3200, 3500, 3800, 4100, 4400, 4600, 4900, 5300], v: ['0%', '0.165965%', '1.400913%', '2.111127%', '3.689972%', '9.372433%', '22.483634%', '39.679807%', '63.810433%', '100%'], e: [[0], [0], [0], [0], [0], [0], [0], [0], [0], [0]], mp: 'M120.842,41.815L120.842,42.815L121.142,50.25L121.642,46L121.142,55.5L121.142,89.739L121.142,168.739L121.142,272.352L123.352,417.732L123.352,635.788' }, { p: 'fill', t: [4600, 5300], v: ['#000E29', '#c7c8ca'], e: [[0], [0]] }, { p: 'd', t: [2800, 2900, 3000, 3200, 3500, 3800, 4100, 4400, 4600], v: ["path('M170.8,415.185L331.8,415.185L345.8,415.185L156.8,415.185Z')", "path('M170.8,415.185L331.8,415.185L345.8,425.185L156.8,425.185Z')", "path('M183.5,420.75L313.5,420.75L340.8,433.185L160.8,433.185Z')", "path('M183.5,420.75L313.5,420.75L344.5,457L154.5,457Z')", "path('M187,430.5L311.5,430.5L342,483.5L157.5,483.5Z')", "path('M187.925,428.5L316.328,428.5L347.784,483.5L157.5,483.5Z')", "path('M163.5,415.5L340.5,415.5L355.5,499.5L147.5,499.5Z')", "path('M160.5,377L345.5,377L355.5,483.5L147.5,483.5Z')", "path('M147.5,298.629L356.08,298.629L356.08,483.5L147.5,483.5Z')"], e: [[0], [0], [0], [0], [0], [0], [0], [0], [0]] }],
			{ autoremove: false }).range(0, 5300).loop(true)
}
function executeKeyshapeJS() {
	import('./keyshape').then((module) => {
		//@ts-ignore
		window.keyshape = module;
		animate(module)
	});
}

onMounted(() => {
	// @ts-ignore
if(!window.keyshape) {
	executeKeyshapeJS()
}
})

onUnmounted(() => {
	//@ts-ignore
	window.keyshape.removeAll();
})

</script>

<template>
	<div class="VPHero" :class="{ 'has-image': image || heroImageSlotExists }">
		<div class="container">
			<div class="main">
				<slot name="home-hero-info-before" />
				<slot name="home-hero-info">
					<h1 class="name">
						<span class="clip">Kirby Moments</span>
					</h1>
					<p class="text">Little Moments Matter. Share Yours.</p>
					<p class="tagline">Use this plugin to add a photo feed to your Kirby CMS powered website.</p>
				</slot>
				<slot name="home-hero-info-after" />

				<div v-if="actions" class="actions">
					<div v-for="action in actions" :key="action.link" class="action">
						<VPButton tag="a" size="medium" :theme="action.theme" :text="action.text" :href="action.link"
							:target="action.target" :rel="action.rel" />
					</div>
				</div>
				<slot name="home-hero-actions-after" />
			</div>

			<div class="image">
				<div class="image-container">
					<div class="image-bg" />
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="507" height="817"
						viewBox="0 0 507 817" fill="none">
						<path id="u"
							d="M335.029,288.582C335.029,344.046,295.834,383.602,246.939,383.602C196.126,383.602,162.373,345.806,162.373,290.341L162.373,193.561L31.9999,193.561L31.9999,279.783C31.9999,413.664,121.347,499.739,246.939,499.739C370.613,499.739,465.401,413.664,465.401,279.783L465.401,0L335.029,0L335.029,288.582Z"
							fill="#D9B3F7" transform="translate(248.7,249.869) translate(-248.7,-249.869)" />
						<path id="Mund" d="M219.106,264.992C221.292,267.506,247.69,296.608,277.756,263.85"
							stroke="var(--vp-c-text-1)" stroke-width="18.6" stroke-miterlimit="1.5" stroke-linecap="round"
							stroke-linejoin="round" transform="translate(248.431,271.578) translate(-248.431,-271.578)" />
						<path id="Linkes-Auge" d="M222,210C222,210,222,210,222,210" stroke="var(--vp-c-text-1)" stroke-width="18.6"
							stroke-miterlimit="1.5" stroke-linecap="round" stroke-linejoin="round"
							transform="translate(200,210) translate(0,0) translate(-213,-210)" />
						<path id="rechtes-Auge" d="M284,210C284,210,284.139,210,285,210" stroke="var(--vp-c-text-1)"
							stroke-width="18.6" stroke-miterlimit="1.5" stroke-linecap="round" stroke-linejoin="round"
							transform="translate(284.5,210) translate(-284.5,-210)" />
						<path id="Arm-rechts" d="M455.284,258C455.284,258,439,397.5,385.5,533.5C385.5,533.5,368.5,533.5,334.5,533.5"
							stroke="var(--vp-c-text-1)" stroke-width="18.6" stroke-miterlimit="1.5" stroke-linecap="round"
							stroke-linejoin="round" transform="translate(417.467,351) translate(-417.467,-351)" />
						<path id="Bein-rechts" d="M318.659,475L322.5,806.5L378.5,806.5" stroke="var(--vp-c-text-1)"
							stroke-width="18.6" stroke-miterlimit="1.5" stroke-linecap="round" stroke-linejoin="round"
							transform="translate(348.33,641.058) translate(-348.33,-641.058)" />
						<path id="Bein-links" d="M211.25,484.705C211.25,484.705,181.5,669.357,153.5,806.5L97.5,806.5"
							stroke="var(--vp-c-text-1)" stroke-width="18.6" stroke-miterlimit="1.5" stroke-linecap="round"
							stroke-linejoin="round" transform="translate(154.125,643.924) translate(-154.125,-643.924)" />
						<g id="Kamera" transform="translate(252.284,433.5) translate(0,0) translate(-127,-100)">
							<path
								d="M125.284,248C125.284,242.477,129.761,238,135.284,238L369.284,238C374.807,238,379.284,242.477,379.284,248L379.284,411L125.284,411L125.284,248Z"
								fill="#F7F7E7" transform="translate(127,86.5) translate(-252.284,-324.5)" />
							<path stroke="#D9B3F7" stroke-width="8" d="M235,334L235,411"
								transform="translate(109.716,134.5) translate(-235,-372.5)" />
							<path stroke="#FA6934" stroke-width="8" d="M243,334L243,411"
								transform="translate(117.716,134.5) translate(-243,-372.5)" />
							<path stroke="#025BFF" stroke-width="8" d="M267,334L267,411"
								transform="translate(141.716,134.5) translate(-267,-372.5)" />
							<path stroke="#F7F7E7" stroke-width="8" d="M251,334L251,411"
								transform="translate(125.716,134.5) translate(-251,-372.5)" />
							<path stroke="#AEFFC4" stroke-width="8" d="M259,334L259,411"
								transform="translate(133.716,134.5) translate(-259,-372.5)" />
							<ellipse fill="#000E29" rx="41.5" ry="41.5" transform="translate(125.216,60.5)" />
							<ellipse fill="#00143D" rx="20" ry="20" transform="translate(127,61)" />
							<ellipse id="_a0" fill="#FA6934" rx="14" ry="14"
								transform="translate(47.216,88.658) translate(0,0) translate(0,0)" />
							<ellipse fill="#000E29" rx="14" ry="14" transform="translate(208,87)" />
							<path
								d="M125.284,383L379.284,383L379.284,428C379.284,433.523,374.807,438,369.284,438L135.284,438C129.761,438,125.284,433.523,125.284,428L125.284,383Z"
								fill="#FA6934" transform="translate(127,172.5) translate(-252.284,-410.5)" />
							<rect width="218" height="19" fill="#00143D" transform="translate(127,172.5) translate(-109,-9.5)" />
							<rect width="45" height="39" fill="#00143D" transform="translate(216.216,31.5) translate(-22.5,-19.5)" />
						</g>
						<path id="arm-links" d="M57.4707,258C57.4707,258,22.5,408.5,178.5,464.5" stroke="var(--vp-c-text-1)"
							stroke-width="18.6" stroke-miterlimit="1.5" stroke-linecap="round" stroke-linejoin="round"
							transform="translate(88.3775,295.788) translate(-88.3775,-295.788)" />
						<g id="Foto" visibility="hidden" transform="translate(250.373,456.5) translate(-122.265,-45.5)">
							<path id="_a1"
								d="M184.901,437L354.623,437L354.623,439.076C356.357,439.262,216.235,439.296,166.561,439.177C155.582,439.151,149.022,439.117,149.388,439.076L149.388,437Z"
								fill="#fff" transform="translate(121.642,19.5) translate(0,0) translate(-250.373,-456.5)" />
							<path id="_a2" d="M170.8,415.185L331.8,415.185L345.8,415.185L156.8,415.185Z" fill="#fff"
								transform="translate(120.842,41.815) translate(0,0) translate(-249.75,-457)" />
						</g>
					</svg>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped>
.VPHero {
	margin-top: calc((var(--vp-nav-height) + var(--vp-layout-top-height, 0px)) * -1);
	padding: calc(var(--vp-nav-height) + var(--vp-layout-top-height, 0px) + 24px) 24px 48px;
}

@media (min-width: 640px) {
	.VPHero {
		padding: calc(var(--vp-nav-height) + var(--vp-layout-top-height, 0px) + 0px) 48px 64px;
	}
}

@media (min-width: 960px) {
	.VPHero {
		padding: calc(var(--vp-nav-height) + var(--vp-layout-top-height, 0px) + 120px) 64px 64px;
	}
}

.container {
	display: flex;
	flex-direction: column;
	margin: 0 auto;
	max-width: 1152px;
}

@media (min-width: 960px) {
	.container {
		flex-direction: row;
	}
}

.main {
	position: relative;
	z-index: 10;
	order: 2;
	flex-grow: 1;
	flex-shrink: 0;
}

.VPHero.has-image .container {
	text-align: center;
}

@media (min-width: 960px) {
	.VPHero.has-image .container {
		text-align: left;
	}
}

@media (min-width: 960px) {
	.main {
		order: 1;
		width: calc((100% / 3) * 2);
	}

	.VPHero.has-image .main {
		max-width: 592px;
	}
}

.name,
.text {
	max-width: 392px;
	letter-spacing: -0.4px;
	line-height: 40px;
	font-size: 32px;
	font-weight: 700;
	white-space: pre-wrap;
}

.text {
	font-size: 2rem;
	margin-top: 0.75rem !important;
	display: block;
	font-family: var(--vp-font-family-headline);
	font-weight: 700;
	line-height: 1.1;
	color: #FA6934;
}

.name {
	font-size: 4rem;
	line-height: 1;
	font-weight: 700;
}

.VPHero.has-image .name,
.VPHero.has-image .text {
	margin: 0 auto;
}

.name {
	color: var(--vp-home-hero-name-color);
}

.clip {
	background: var(--vp-home-hero-name-background);
	-webkit-background-clip: text;
	background-clip: text;
	-webkit-text-fill-color: var(--vp-home-hero-name-color);
}

@media (min-width: 640px) {

	.name,
	.text {
		max-width: 576px;
	}
}

@media (min-width: 960px) {

	.VPHero.has-image .name,
	.VPHero.has-image .text {
		margin: 0;
	}
}

.tagline {
	padding-top: 8px;
	max-width: 392px;
	line-height: 28px;
	font-size: 18px;
	font-weight: 500;
	white-space: pre-wrap;
	color: var(--vp-c-text-2);
	margin-top: 1rem;
	font-size: 1.5rem;
	line-height: 1.2;
}

.VPHero.has-image .tagline {
	margin: 0 auto;
}

@media (min-width: 640px) {
	.tagline {
		padding-top: 12px;
		max-width: 576px;
		line-height: 32px;
		font-size: 20px;
	}
}

@media (min-width: 960px) {
	.tagline {
		line-height: 36px;
		font-size: 24px;
	}

	.VPHero.has-image .tagline {
		margin: 0;
	}
}

.actions {
	display: flex;
	flex-wrap: wrap;
	margin: -6px;
	padding-top: 24px;
}

.VPHero.has-image .actions {
	justify-content: center;
}

@media (min-width: 640px) {
	.actions {
		padding-top: 32px;
	}
}

@media (min-width: 960px) {
	.VPHero.has-image .actions {
		justify-content: flex-start;
	}
}

.action {
	flex-shrink: 0;
	padding: 6px;
}

.image {
	order: 1;
	margin: 0 0 2rem 0;
}

@media (min-width: 640px) {
	.image {}
}

@media (min-width: 960px) {
	.image {
		flex-grow: 1;
		order: 2;
		margin: 0;
		min-height: 100%;
	}
}

.image-container {
	position: relative;
	margin: 0 auto;
	width: 250px;
	height: 250px;
	display: flex;
	align-items: center;
	justify-content: center;
}

.image-container svg {
	width: 100%;
	height: 100%;
	object-fit: contain;
	object-position: center;
}

@media (min-width: 640px) {
	.image-container {
		width: auto;
		height: 392px;
		justify-content: flex-start;
	}
}

@media (min-width: 960px) {
	.image-container {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 100%;
		height: 100%;
		max-width: 200px;
		/*rtl:ignore*/
		transform: translate(-32px, -32px);
	}
}

.image-bg {
	position: absolute;
	top: 50%;
	/*rtl:ignore*/
	left: 50%;
	border-radius: 50%;
	width: 192px;
	height: 192px;
	background-image: var(--vp-home-hero-image-background-image);
	filter: var(--vp-home-hero-image-filter);
	/*rtl:ignore*/
	transform: translate(-50%, -50%);
}

@media (min-width: 640px) {
	.image-bg {
		width: 256px;
		height: 256px;
	}
}

@media (min-width: 960px) {
	.image-bg {
		width: 320px;
		height: 320px;
	}
}

:deep(.image-src) {
	position: absolute;
	top: 50%;
	/*rtl:ignore*/
	left: 50%;
	max-width: 192px;
	max-height: 192px;
	/*rtl:ignore*/
	transform: translate(-50%, -50%);
}

@media (min-width: 640px) {
	:deep(.image-src) {
		max-width: 256px;
		max-height: 256px;
	}
}

@media (min-width: 960px) {
	:deep(.image-src) {
		max-width: 320px;
		max-height: 320px;
	}
}

svg {
	height: auto;
	max-width: 200px;
}
</style>
