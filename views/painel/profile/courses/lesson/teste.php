<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div style="text-align:center"> 
            <h3>Contando o tempo: </h3><div id="tempo" style="color: red"></div>
            <button onclick="playPause()">Play/Pausar</button>
            <button onclick="muteUnMute()">SemSom/comSom</button> 
                <br> 
            <video id="video1" width="420">
                <source src="http://www.jplayer.org/video/m4v/Big_Buck_Bunny_Trailer.m4v" type="video/m4v" />
                Seu browser não suporta HTML5 video.
            </video>
        </div> 
    </body>
</html>