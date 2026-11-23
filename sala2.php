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

if ($_SESSION["sala1_etapa"] <= 3) {
    header("Location: sala1.php");
    exit;
}

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $resposta = strtoupper(trim($_POST["resposta"] ?? ""));

    $_SESSION["tentativas"]++;

    if ($resposta === $salas[2]["resposta"]) {

        $_SESSION["sala2_concluida"] = true;

        header("Location: sala3.php");
        exit;

    } else {

        $mensagem = "Senha incorreta! A gaveta continua trancada.";

    }

}

require "includes/cabecalho.php";

?>

<main>

    <h2><?= htmlspecialchars($salas[2]["titulo"]) ?></h2>

    <p>
        Investigador:
        <?= htmlspecialchars($_SESSION["nome"]) ?>
    </p>

    <p>
        Tempo restante:
        <strong id="cronometro">--:--</strong>
    </p>

    <hr>

    <h3>A gaveta trancada</h3>

    <p>
        Dentro da sala de arquivos, vocês encontram uma gaveta
        com uma mensagem escrita pelo proprietário.
    </p>

    <blockquote>
        "O que caiu do céu naquela noite e impediu
        que alguém enxergasse o que aconteceu?"
    </blockquote>

    <p>
        A palavra correta abre a gaveta e revela uma nova evidência.
    </p>

    <?php if ($mensagem !== ""): ?>

        <p>
            <?= htmlspecialchars($mensagem) ?>
        </p>

    <?php endif; ?>

    <?php if (empty($_SESSION["sala2_concluida"])): ?>

        <form method="POST">

            <label for="resposta">Digite a palavra:</label>

            <input
                type="text"
                id="resposta"
                name="resposta"
                required
                autocomplete="off"
            >

            <button type="submit">
                ABRIR GAVETA
            </button>

        </form>

    <?php else: ?>

        <p>
            A gaveta está aberta. Vocês encontraram uma
            fotografia e um bilhete que serão analisados
            na próxima etapa da investigação.
        </p>

        <p>
            Sala 2 concluída! Aguarde a próxima etapa.
        </p>

    <?php endif; ?>

</main>

<script>
    const prazo = <?= $_SESSION["prazo"] ?>;
</script>

<script src="script.js"></script>

<?php require "includes/rodape.php"; ?>