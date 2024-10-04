<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/CSS/home.css">
    <title>Home</title>
</head>
<body>
    <section class="container">
        <div id="fundo">
            <h1 class="titulo"><! -- classe para o titulo do dite --!>
                 MUDE SUA MENTE
            </h1>
            <p class="subtitulo">Mude sua Vida !!</p>
            <p class="citacao"> "As emoções são contagiosas. Todos sabemos disso por experiência.<br> 
            Depois de um bom café com um amigo, você se sente bem." Daniel Goleman</p>
        </div>

        <div>
            <h2 class="sentindo"> O que Você está sentindo ?</h2>
        </div>

            <div class="botoes">
                <button id="btn_geral" class="btn_tristeza" onclick="goToPage('tristeza')">Tristeza</button>
                <button id="btn_geral" class="btn_medo" onclick="goToPage('medo')">Medo</button>
                <button id="btn_geral" class="btn_raiva" onclick="goToPage('raiva')">Raiva</button>
                <button id="btn_geral" class="btn_ansiedade" onclick="goToPage('raiva')">Ansiedade</button>
            </div>

        <div class="imagens">
            <h1 class="img_um">img1</h1>
            <h1 class="img_dois">img2</h1>
            <h1 class="img_tres">img3</h1>
            <h1 class="img_quatro">img4</h1>
        </div>
    </section>
    <script src="assets/JS/rotasDePaginas.js"></script>
</body>
</html>
