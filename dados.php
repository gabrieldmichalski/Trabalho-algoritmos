<?php

$salas = [

    1 => [
        "titulo" => "O quarto principal",
        "descricao" => "A investigação começa no quarto onde o Pato de Ouro desapareceu.",

        "enigmas" => [

            1 => [
                "titulo" => "A hora do crime",
                "descricao" => "O relógio do quarto, que funciona em código morse, parou durante a queda de energia. Ele marcava ..--- ..--- ---... ....- ....-. Qual foi o horário registrado?",
                "dica" => "Observe o horário mencionado no relatório policial.",
                "resposta" => "22:44"
            ],

            2 => [
                "titulo" => "A mensagem misteriosa",
                "descricao" => "Um papel foi encontrado atrás do quadro. A mensagem está cifrada: QBUP.",
                "dica" => "Cada letra foi substituída pela próxima letra do alfabeto. Para decifrar, volte uma posição.",
                "resposta" => "PATO"
            ],

            3 => [
                "titulo" => "A chave reserva",
                "descricao" => "A chave reserva estava com um dos cinco suspeitos. O mordomo não estava no quarto. O jardineiro estava no jardim. A cozinheira estava na cozinha. O segurança estava na entrada da mansão. Quem permaneceu no quarto?",
                "dica" => "Elimine os suspeitos que estavam em outros lugares.",
                "resposta" => "PROPRIETARIO"
            ]

        ]
    ],

    2 => [
        "titulo" => "A sala de arquivos",
        "descricao" => "Uma nova evidência foi encontrada em uma gaveta trancada.",

        "dica" => "A mensagem foi escrita pelo proprietário antes do roubo.",

        "resposta" => "CHUVA"
    ]

];

?>
