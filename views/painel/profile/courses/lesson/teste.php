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
        <script>
        //Criando as funcionalidades do video
        var myVideo=document.getElementById("video1");

        function playPause() { 
            if(myVideo.paused) 
                myVideo.play(); 
            else 
                myVideo.pause(); 
        } 

        function muteUnMute() { 
            if( !myVideo.muted)
                myVideo.muted = 'muted';
            else
                myVideo.muted = false;
        } 

        //Criando as propriedades do video

        var videoStartTime = 0;
        var durationTime = 0;

        myVideo.addEventListener('loadedmetadata', function() {
        
        //DETERMINADO PONTO DE PARTIDA DO VÍDEO
        videoStartTime = 0;
        
        //DURAÇÃO DO VÍDEO PROGRAMADA
        durationTime = 10;
        this.currentTime = videoStartTime;
        }, false);

        //Função que conta o progresso do vídeo
        myVideo.addEventListener('timeupdate', function() {
        
        //Setando na div o a duração do vídeo
        var div = document.getElementById('tempo');
        div.innerHTML = this.currentTime;
        
        //Condição para pausar o video em determinado tempo      
        if(this.currentTime > videoStartTime + durationTime){
            this.pause();
        }
        });

    </script>
    </body>
</html>