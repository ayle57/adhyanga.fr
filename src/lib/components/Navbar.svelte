<script>
	import { onMount } from 'svelte';

	let isBlurred = false;

	onMount(() => {
		const handleScroll = () => {
			isBlurred = window.scrollY > 10;
		};

		window.addEventListener('scroll', handleScroll);
		handleScroll();

		return () => {
			window.removeEventListener('scroll', handleScroll);
		};
	});
</script>

<nav class="navbar {isBlurred ? 'blurred' : ''}">
	<div class="navbar-brand">
		<img src="/images/logo.webp" alt="Logo d'adhyanga" class="navbar-brand__logo" />
	</div>
	<ul class="navbar-links">
		<li class="navbar-links__item">
			<a href="/">Nos séances</a>
		</li>
		<li class="navbar-links__item">
			<a href="/">Nos tarifs</a>
		</li>
		<li class="navbar-links__item">
			<a href="/">À propos</a>
		</li>
		<li class="navbar-links__item">
			<a href="/">Nous contacter</a>
		</li>
		<li class="navbar-links__item">
			<a href="/" class="btn btn-primary btn-icon">
				Prendre rendez-vous
				<img src="/images/icons/phone.svg" alt="Icone de téléphone" />
			</a>
		</li>
	</ul>
</nav>

<div class="fake-navbar"></div>

<style lang="scss">
	.fake-navbar {
		height: 120px;
	}
	.navbar {
		position: fixed;
		width: 100%;
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 20px 5vw;
		z-index: 10;
		transition: all 300ms;

		&.blurred {
      backdrop-filter: blur(10px);
			padding: 10px 5vw;
    }

		.navbar-brand {
			flex: 0 0 30%;
			max-width: 30%;

			.navbar-brand__logo {
				width: 70px;
				height: auto;
			}
		}
		.navbar-links {
			display: flex;
			justify-content: space-around;
			align-items: center;
			flex: 0 0 70%;
			max-width: 70%;
		}
	}
</style>
