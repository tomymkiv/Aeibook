const btnInfo = document.getElementById('btn-info');
const parraph = document.getElementById('info');
const postContainer = document.querySelector('.new-posts');
const loader = document.querySelector(".loader");
let urlFetch = undefined;
let loguedUser = undefined; // Sirve para identificar al usuario en sesion.

if (btnInfo) {
    btnInfo.addEventListener('click', () => {
        let offset = parseInt(btnInfo.dataset.offset);
        parraph.classList.remove('hidden');
        parraph.textContent = 'Cargando...';
        loader.classList.toggle('hidden');

        // Si estoy en los posts de un usuario...
        if (document.URL.includes('muro')) {
            const userId = document.getElementById('muro-container').dataset.userId;
            urlFetch = `/user/${userId}/muro/data?offset=${offset}`;
        } else if (document.URL.includes('home')) { // Si estoy en el muro principal
            urlFetch = `/home/data?offset=${offset}`;
        }

        // Realizo el fetch dinamico segun la URL en la que esté
        fetch(urlFetch)
            .then(res => res.json())
            .then(posts => {
                loader.classList.toggle('hidden');
                parraph.textContent = 'Informacion cargada';

                if (posts['posts'].length === 0) {
                    btnInfo.textContent = 'No hay mas posts para mostrar';
                    btnInfo.disabled = true;
                    setTimeout(() => {
                        btnInfo.remove();
                        parraph.remove();
                        console.log('No more posts');
                    }, 1000);
                    return;
                }

                if (posts['loguedUser']) {
                    loguedUser = posts['loguedUser'];
                }

                posts['posts'].forEach(element => {
                    const fechaPublicacion = element['created_at'].replace('.000000Z', '').replace('T', ' '); // Convierto la fecha en el mismo formato que cuando lo muestro en php desde un principio.

                    // Detecta si el archivo es video o imagen
                    if (element['path']) {
                        const extension = element['path'].split('.').pop().toLowerCase();
                        const videoExtensions = ['mp4', 'webm', 'ogg', 'mkv', 'mov', 'avi'];
                        var mediaHtml = '';
                        if (videoExtensions.includes(extension)) {
                            mediaHtml = `
            <video controls
                class="rounded-lg shadow-md cursor-pointer hover:shadow-zinc-800 transition-shadow duration-300 w-full max-h-100 object-contain">
                <source src="/storage/${element['path']}" type="video/${extension}">
                Tu navegador no soporta el elemento de video.
            </video>
        `;
                        } else if (element['path']) {
                            mediaHtml = `
            <div class="flex items-center justify-center">
                <img src="/${element['path']}" class="rounded-lg w-full max-h-100 object-contain" alt="Imagen de la publicacion" />
            </div>
        `;
                        }
                    } else if (!element['path']) {
                        mediaHtml = '';
                    }
                    // Crea el HTML del post
                    const postHtml = `
    <article class="w-full max-w-sm sm:max-w-lg text-black/75 mt-24 mb-16 space-y-14">
        <div class="p-5 w-auto bg-white/90 rounded-lg md:max-w-[480px] md:min-w-[480px]">
            <div class="space-y-12">
                <div class="flex flex-row items-center gap-3">
                    <a href="/user/${element['user']['id']}/perfil" class="w-20 h-20 flex items-center justify-center border-white/30 rounded-full aspect-square object-cover hover:shadow-md shadow-zinc-400 transition duration-300">
                        <img src="${element['user']['profile_photo']}" class="rounded-full w-20 h-20 object-cover" />
                    </a>
                    <a href="/user/${element['user']['id']}/perfil" class="hover:underline text-lg w-full font-semibold">${element['user']['name']}</a>
                    ${loguedUser ? `
                        ${loguedUser['id'] === element['user_id'] ? `<div class="w-full flex justify-end">
                            <div class="relative flex justify-end">
                                <div class="info-button w-fit flex justify-end">
                                    <button type="button"
                                        class="cursor-pointer hover:bg-black/20 transition-background duration-300 rounded-full inline-flex justify-center gap-x-1.5 px-3 py-2 text-sm text-gray-600"
                                        aria-expanded="true" aria-haspopup="true">
                                        <svg class="cursor-pointer flex-none size-6 text-gray-600 dark:text-neutral-500"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="1" />
                                            <circle cx="12" cy="5" r="1" />
                                            <circle cx="12" cy="19" r="1" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>`: ''}
                        ` : ''}
                </div>
                ${mediaHtml}
                <div class="text-wrap break-words">
                    <p class="w-full text-sm font-medium">${element['descripcion']}</p>
                </div>
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-1">
                    <p class="text-md">Publicado el <b>${fechaPublicacion}</b>.</p>
                    ${element['created_at'] != element['updated_at'] ? `<p class="text-sm">(Editado)</p>` : ''}
                </div>
            </div>
        </div>
    </article>
    `;
                    postContainer.insertAdjacentHTML('beforeend', postHtml);
                });
                btnInfo.dataset.offset = offset + posts['posts'].length;
            }).catch(error => {
                console.error('Error fetching data:', error);
                parraph.textContent = 'Error al cargar la informacion';
            });
    });
}