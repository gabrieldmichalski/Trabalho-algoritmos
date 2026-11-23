const cronometro = document.getElementById("cronometro");

if (cronometro && typeof prazo !== "undefined") {

    function atualizarCronometro() {

        const agora = Math.floor(Date.now() / 1000);

        const restante = prazo - agora;

        if (restante <= 0) {

            cronometro.textContent = "00:00";

            const formulario = document.querySelector("form");

            if (formulario) {
                formulario.remove();
            }

            const aviso = document.createElement("p");

            aviso.textContent = "O tempo da investigação acabou!";

            document.querySelector("main").appendChild(aviso);

            return;

        }

        const minutos = Math.floor(restante / 60);

        const segundos = restante % 60;

        cronometro.textContent =
            String(minutos).padStart(2, "0") + ":" +
            String(segundos).padStart(2, "0");

        setTimeout(atualizarCronometro, 1000);

    }

    atualizarCronometro();

}
