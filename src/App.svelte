<script>
	import Router from "svelte-spa-router"
	import Home from "./routes/Home.svelte"
	import NotFound from "./routes/NotFound.svelte"
	import Header from "./components/Header.svelte"
	import Tailwindcss from "./Tailwindcss.svelte"
	import Display from "./routes/Display.svelte"
	// import Add from "./routes/Add.svelte"
	import Delete from "./routes/Delete.svelte"
	import Update from "./routes/Update.svelte"
</script>

<Tailwindcss />
<div class="flex flex-col h-screen justify-between">
	<Header />

	<Router
		routes={{
			"/": Home,
			"/display": Display,
			"/add": NotFound,
			"/delete": Delete,
			"/update": Update,
			"/*": NotFound,
		}}
	/>
</div>
