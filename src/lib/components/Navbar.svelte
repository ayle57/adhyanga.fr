<nav class="navbar">
	<div class="navbar-brand">
		<img src="/images/logo.webp" alt="Logo d'adhyanga" class="navbar-brand__logo" />
	</div>
	<ul class="navbar-links">
		<li class="navbar-links__item">
			<a href="/">Nos tarifs</a>
		</li>
		<li class="navbar-links__item">
			<a href="/">Nos séances</a>
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

<style lang="scss">
	.navbar {
		position: relative;
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 20px 5vw;
		z-index: 10;

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
