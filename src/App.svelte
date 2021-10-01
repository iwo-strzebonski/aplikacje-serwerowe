<script>
	import Router from "svelte-spa-router";
	import Home from "./routes/Home.svelte";
	import NotFound from "./routes/NotFound.svelte";
	import Header from "./components/Header.svelte";
	import Tailwindcss from "./Tailwindcss.svelte";
	import Display from "./components/Display.svelte";
</script>

<Tailwindcss />
<div class="flex flex-col h-screen justify-between">
	<Header />

	<Router
		routes={{
			"/": Home,
			"*": NotFound,
		}}
	/>
	<Display />
</div>
