setTimeout(function(){
    $('.alert').alert('close');
}, 6000);

var audio = "";
var audio_icon = "";

function playM(elem, mus) {
    var au = document.getElementById(mus);
    var ps = document.getElementById(elem);
    // ps.onclick = function () {
        if (ps.className == 'icon-play-button')
        {
            if(audio != ""){
                audio.pause();
                if (audio != au)
                    audio.currentTime = 0;
                    
                audio_icon.className = 'icon-play-button';
                console.log(audio_icon);
            }
            au.play();
            ps.className = 'icon-pause';
        }
        else
        {
            au.pause();
            ps.className = 'icon-play-button';
        }
        audio = au;
        audio_icon = ps; 
        return false;
    // };
}