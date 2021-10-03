<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
            <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900" >
                Dane z tabeli - import
            </h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base" />
        </div>
        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Name</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Surname</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Age</th>
                        <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">Action</th>
                        </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-4 py-3"><input type='text' name='name' size='16' /></td>
                        <td class="px-4 py-3"><input type='text' name='surname' size='16' /></td>
                        <td class="px-4 py-3"><input type='number' name='age' size='3' /></td>
                        <td class="px-4 py-3"><button on:click={
                            async function(e) {
                                const path = location.origin + location.pathname
                                const URL = `${path}backend/add.php`
                                let name = e.target.parentNode.parentNode.children[1].children[0].value
                                let surname = e.target.parentNode.parentNode.children[2].children[0].value
                                let age = e.target.parentNode.parentNode.children[3].children[0].value

                                let res = await fetch(URL, {
                                    method: 'POST',
                                    body: JSON.stringify({
                                        name: name,
                                        surname: surname,
                                        age: age
                                    })
                                })

                                await res.json()
                                location.reload()
                            }
                        }>Add</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
