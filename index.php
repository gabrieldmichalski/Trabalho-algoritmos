<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = trim($_POST["nome"] ?? "");
    $tempo = (int) ($_POST["tempo"] ?? 0);

    if ($nome !== "" && in_array($tempo, [5, 10, 15, 20])) {

        session_regenerate_id(true);

        $_SESSION["nome"] = $nome;

        $_SESSION["inicio"] = time();

        $_SESSION["tempo_maximo"] = $tempo * 60;

        $_SESSION["prazo"] = time() + ($tempo * 60);

        $_SESSION["tentativas"] = 0;

        $_SESSION["sala1_etapa"] = 1;

        $_SESSION["sala2_concluida"] = false;

        header("Location: sala1.php");
        exit;

    }

}

require "includes/cabecalho.php";

?>

<main>

    <h2>O caso do Pato de Ouro</h2>

    <p>
        Em uma sexta-feira chuvosa, às 22h44, um grito
        foi ouvido no quarto principal da mansão.
    </p>

    <p>
        O lendário Pato de Ouro desapareceu. Cinco pessoas
        estavam na mansão e todas tinham acesso ao quarto.
    </p>

    <p>
        As câmeras de segurança pararam de funcionar durante
        uma queda de energia causada pela tempestade.
    </p>

    <p>
        Sua missão é descobrir quem roubou o objeto,
        como o crime foi cometido e onde ele está escondido.
    </p>

    <h3>Configuração da investigação</h3>

    <form method="POST">

        <label for="nome">Nome do investigador:</label>

        <input
            type="text"
            id="nome"
            name="nome"
            maxlength="40"
            required
        >

        <label for="tempo">Tempo máximo da investigação:</label>

        <select id="tempo" name="tempo" required>
            <option value="5">5 minutos</option>
            <option value="10" selected>10 minutos</option>
            <option value="15">15 minutos</option>
            <option value="20">20 minutos</option>
        </select>

        <button type="submit">
            INICIAR INVESTIGAÇÃO
        </button>

    </form>

</main>

<?php require "includes/rodape.php"; ?>
