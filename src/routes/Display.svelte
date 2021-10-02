<script>
    async function getItems() {
        const path = location.origin + location.pathname
        const URL = `${path}backend/display.php`
        let res = await fetch(URL, {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
            },
        })

        return await res.json()
    }

    let res2;

    let promise = getItems()
    console.log(promise)
</script>

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
            <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900" >
                Dane z tabeli - import
            </h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base" />
        </div>
        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            {#await promise}
                <h1>Loading...</h1>
            {:then res}
                <input
                    type="text"
                    on:input={(e) => {
                        res2 = res.filter((x) =>
                            x.name
                                .toLowerCase()
                                .includes(e.target.value.toLowerCase())
                        );
                    }}
                />
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Name</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Surname</th>
                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Age</th>
                        </tr>
                    </thead>
                    <!-- jeśli nic nie było jeszcze filtrowane -->
                    {#if res2 == undefined}
                        {#each res as item}
                            <tr>
                                <td class="px-4 py-3">{item.id}</td>
                                <td class="px-4 py-3">{item.name}</td>
                                <td class="px-4 py-3">{item.surname}</td>
                                <td class="px-4 py-3 text-lg text-gray-900">{item.age}</td>
                            </tr>
                        {/each}
                    {:else}
                        {#each res2 as item}
                            <tr>
                                <td class="px-4 py-3">{item.id}</td>
                                <td class="px-4 py-3">{item.name}</td>
                                <td class="px-4 py-3">{item.surname}</td>
                                <td class="px-4 py-3 text-lg text-gray-900">{item.age}</td>
                            </tr>
                        {/each}
                    {/if}
                </table>
            {/await}

            <tbody />
        </div>
    </div>
</section>
