<script>
	import Navbar from '$lib/components/Navbar.svelte';
	import '../styles/global.scss';
	import '../styles/layout/landing.svelte.scss';
	import '../styles/layout/hero.svelte.scss';
</script>

<main class="landing-layout">
	<div class="oval-quarter">
		<img src="/images/chief.webp" alt="Adeline Pierrot, praticienne en ayurvéda et en kinésiologie">
	</div>
	<Navbar />
	<section class="section hero-section">
		<div class="hero-inner">
			<div class="hero-content">
				<h4>Bienvenue chez Adhyanga</h4>
				<h1>Votre <span>bien-être</span> est<br /> notre <span>priorité</span></h1>
				<p>Which seems to confirm the idea that an basic component of a broad understanding of the development methodology is regularly debated in the light of The Influence of Deliberate Parameter.</p>
				<div class="hero-content__buttons">
					<div>
						<a href="/" class="btn btn-primary">
							Prendre rendez-vous
							<img src="/images/icons/phone.svg" alt="Arrow right icon" />
						</a>
					</div>
					<div>
						<a href="/" class="btn btn-secondary">Nous contacter</a>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
