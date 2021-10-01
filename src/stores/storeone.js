
import { writable } from "svelte/store";
export let storeone = writable([]);
async function load() {
    const URL = "./backend/skrypt.php";
    let res = await fetch(URL, {
        method: "GET",
    });
    res = await res.json();
    storeone.set(res);
}
load();