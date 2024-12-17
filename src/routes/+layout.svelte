<script>
    import '$lib/styles/global.scss';

    let { title = "Adhyanga - Accueil", data, children } = $props();
</script>

<svelte:head>
    <title>{title}</title>
</svelte:head>

{@render children()}
