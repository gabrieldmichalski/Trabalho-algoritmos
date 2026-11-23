<?php

session_start();

require "dados.php";

if (!isset($_SESSION["nome"])) {
    header("Location: index.php");
    exit;
}

if (time() >= $_SESSION["prazo"]) {
    die("O tempo da investigação acabou!");
}

if ($_SESSION["sala1_etapa"] > 3) {
    header("Location: sala2.php");
    exit;
}

$etapa = $_SESSION["sala1_etapa"];

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $resposta = strtoupper(trim($_POST["resposta"] ?? ""));

    $_SESSION["tentativas"]++;

    if ($resposta === $salas[1]["enigmas"][$etapa]["resposta"]) {

        $_SESSION["sala1_etapa"]++;

        if ($_SESSION["sala1_etapa"] > 3) {

            header("Location: sala2.php");
            exit;

        } else {

            $mensagem = "Resposta correta! A próxima pista foi liberada.";

        }

    } else {

        $mensagem = "Resposta incorreta! Analise as evidências novamente.";

    }

    $etapa = $_SESSION["sala1_etapa"];

}

$enigma = $salas[1]["enigmas"][$etapa];

require "includes/cabecalho.php";

?>

<main>

    <h2><?= htmlspecialchars($salas[1]["titulo"]) ?></h2>

    <p>
        Investigador:
        <?= htmlspecialchars($_SESSION["nome"]) ?>
    </p>

    <p>
        Tempo restante:
        <strong id="cronometro">--:--</strong>
    </p>

    <hr>

    <h3>
        <?= htmlspecialchars($enigma["titulo"]) ?>
    </h3>

    <p>
        <?= htmlspecialchars($enigma["descricao"]) ?>
    </p>

    <p>
        Enigma <?= $etapa ?> de 3
    </p>

    <?php if ($mensagem !== ""): ?>

        <p>
            <?= htmlspecialchars($mensagem) ?>
        </p>

    <?php endif; ?>

    <form method="POST">

        <label for="resposta">Sua resposta:</label>

        <input
            type="text"
            id="resposta"
            name="resposta"
            required
            autocomplete="off"
        >

        <button type="submit">
            VERIFICAR RESPOSTA
        </button>

    </form>

    <details>
        <summary>Consultar dica</summary>

        <p>
            <?= htmlspecialchars($enigma["dica"]) ?>
        </p>

    </details>

</main>

<script>
    const prazo = <?= $_SESSION["prazo"] ?>;
</script>

<script src="script.js"></script>

<?php require "includes/rodape.php"; ?>
