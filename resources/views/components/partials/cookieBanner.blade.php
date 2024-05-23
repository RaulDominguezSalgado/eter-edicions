<div class="bg-black bg-opacity-60 fixed top-0 left-0 right-0 bottom-0 inset-x-0 flex content-center items-center z-50">
    <form action="" class="cookie-notice max-w-7xl w-[800px] mx-auto bg-white rounded-lg" method="">
        <header class="bg-black text-white p-6">
            <h2 class="font-normal normal-case">La nostra página utilitza cookies</h2>
        </header>
        <main class="p-2 border-black-500 border-b-2">
            <section class="border-[1px] border-red cookie-info p-5 overflow-hidden box-border transition-all duration-300">
                <p>A Eter Edicions utilitzem cookies per millorar l'experiència. Pots acceptar-les, denegables o configurar-les.</p>
                <p>Pots revisar la nostra <a class="underline" href="#" target="_blank">política de cookies</a> abans de acceptar-les.</p>
            </section>
            <section class="cookie-config disabled p-5 overflow-hidden box-border transition-all duration-300">
                <p>Configurar cookies</p>
                <ul>
                    <li class="flex border-b-2 py-5">
                        <div class="flex-col grow">
                            <strong class="w-full block">Necesaries</strong>
                            <small class="w-full block">Aquestes cookies no son opcionals, ja que son necessaries per al funcionament de la página.</small>
                        </div>
                        <div class="flex-col px-5 flex justify-end items-center">
                            <input type="checkbox" name="mandatory-cookies" id="mandatory-cookies" class="text-right" disabled checked>
                            <label for="mandatory-cookies"></label>
                        </div>
                    </li>
                    <li class="flex border-b-2 py-5">
                        <div class="flex-col grow">
                            <strong class="w-full block">Estadistiques</strong>
                            <small class="w-full block">Les utilitzem per poder millorar el funcionament de la web en base a com s'utilitza.</small>
                        </div>
                        <div class="flex-col px-5 flex justify-end items-center">
                            <input type="checkbox" name="stadistics-cookies" id="stadistics-cookies" class="text-right">
                            <label for="stadistics-cookies"></label>
                        </div>
                    </li>
                    <li class="flex border-b-2 py-5">
                        <div class="flex-col grow">
                            <strong class="w-full block">Estadistiques</strong>
                            <small class="w-full block">Les utilitzem per poder millorar el funcionament de la web en base a com s'utilitza.</small>
                        </div>
                        <div class="flex-col px-5 flex justify-end items-center">
                            <input type="checkbox" name="experience-cookies" id="experience-cookies" class="text-right">
                            <label for="experience-cookies"></label>
                        </div>
                    </li>
                    <li class="flex border-b-2 py-5">
                        <div class="flex-col grow">
                            <strong class="w-full block">Estadistiques</strong>
                            <small class="w-full block">Les utilitzem per poder millorar el funcionament de la web en base a com s'utilitza.</small>
                        </div>
                        <div class="flex-col px-5 flex justify-end items-center">
                            <input type="checkbox" name="stadistics-cookies" id="marketing-cookies" class="text-right">
                            <label for="marketing-cookies"></label>
                        </div>
                    </li>
                </ul>
            </section>
        </main>
        <footer class="flex justify-end p-5">
            <button class="border-[1px] border-dark py-[10px] px-[20px]" id="cookie-accept">Acceptar totes les cookies</button>
            <button class="border-[1px] border-dark py-[10px] px-[20px] mx-2" id="cookie-deny">Denegar totes les cookies</button>
            <button class="border-[1px] border-dark py-[10px] px-[20px]" type="button" id="cookie-set">Configurar</button>
        </footer>
    </form>
</div>
<style>
    section.disabled {
        padding: 0;
        max-height: 0;
        transition: .3s;
    }

    .cookie-config input[type="checkbox"] {
        display: none;
    }
    .cookie-config input[type="checkbox"] + label {
        display: block;
        width: 55px;
        height: 25px;
        border-radius: 50px;
        position: relative;
        background-color: #f55;
        transition: .3s;
    }
    .cookie-config input[type="checkbox"] + label::after {
        content: "";
        width: 15px;
        height: 15px;
        background-color: rgba(0,0,0,.5);
        border-radius: 50%;
        position: absolute;
        top: 5px;
        left: 5px;
        transition: .3s;
    }
    .cookie-config input[type="checkbox"]:checked + label {
        background-color: #5f5;
        transition: .3s;
    }
    .cookie-config input[type="checkbox"]:checked + label::after {
        left: 35px;
        transition: .3s;
    }
    .cookie-config input[type="checkbox"]:disabled + label {
        background-color: gray;
        transition: .3s;
    }
</style>
<script>
    let infoSection = document.querySelector(".cookie-info");
    let settingsSection = document.querySelector(".cookie-config");

    document.getElementById("cookie-set").addEventListener("click", function () {
        if (infoSection.classList.contains("disabled")) {
            infoSection.classList.remove("disabled");
            setTimeout(() => {
                settingsSection.classList.add("disabled");
            }, 200);
        }
        else {
            infoSection.classList.add("disabled");
            setTimeout(() => {
                settingsSection.classList.remove("disabled");
            }, 200);
        }
    });
</script>