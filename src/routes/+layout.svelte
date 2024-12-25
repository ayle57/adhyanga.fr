<script>
    import '$lib/styles/global.scss';

    export const prerender = true

    let { title = "Adhyanga - Accueil", data, children } = $props();
</script>

<svelte:head>
    <title>{title}</title>
</svelte:head>

{@render children()}
