setTimeout(function () {
    $('.alert').alert('close');
}, 6000);



var audio = "";
var audio_icon = "";
var ell = "";

function msc(elem, mus, audiPElem) {
    audiPElem = ell;
    console.log(audiPElem.className);
    if (elem.className == 'icon-play-button' || elem.className == 'play-pause fas fa-play') {
        if (audio != "") {
            audio.pause();
            if (audio != mus) {
                audio.currentTime = 0;
            }

            audio_icon.className = 'icon-play-button';
            audiPElem.className = 'play-pause fas fa-play';
            
            // console.log(audio_icon);
        }
        mus.play();
        elem.className = 'icon-pause';
        audiPElem.className = 'play-pause fas fa-pause';
    }
    else {
        mus.pause();
        elem.className = 'icon-play-button';
        audiPElem.className = 'play-pause fas fa-play';
    }
    audio = mus;
    audio_icon = elem;

    audio.addEventListener("timeupdate", function(){
        // console.log(audio.currentTime);
        if(audio.ended){
            audio_icon.className = "icon-play-button";
            audiPElem.className = 'play-pause fas fa-play';
        }
    });
}

$(window).on('load', function() {
    var dadosv = $('#item_21').children('.single-album-area').children('.album-info').children("#foto_cover").val();
    console.log(dadosv);
    var dados = document.getElementById("audiplay_21");
    // var dados = $('#item_21').children('.single-album-area').children('.album-info').children("#audiplay_21");
    ell = document.querySelector('.play-pause');

    var btnP = document.getElementById("btnP");

    btnP.addEventListener('click', function() {
        console.log(audio);
        // audio.play();
        // playM(ell,audio);
        var dadosv = $('#item_21').children('.single-album-area').children('.album-thumb').children("#foto_cover").val();
        console.log(dadosv);
    });

    var vlm = document.querySelector('.volume-bar');
    var vlmp = vlm.querySelector('.progress');
    var vlr = vlm.querySelector('input');
    vlm.addEventListener('input', function() {
        vlmp.style.width = vlr.value + '%';
        audio.volume = vlr.value / 100;
    })
});

function playM(elem, mus) {
    var au = document.getElementById(mus);
    var ps = document.getElementById(elem);
    var audP = document.getElementById(ell);

    msc(ps, au, audP);
    // ps.onclick = function () {
    // if (ps.className == 'icon-play-button') {
    //     if (audio != "") {
    //         audio.pause();
    //         if (audio != au) {
    //             audio.currentTime = 0;
    //         }

    //         audio_icon.className = 'icon-play-button';
    //         console.log(audio_icon);
    //     }
    //     au.play();
    //     ps.className = 'icon-pause';
    // }
    // else {
    //     au.pause();
    //     ps.className = 'icon-play-button';
    // }
    // audio = au;
    // audio_icon = ps;

    // audio.addEventListener("timeupdate", function(){
    //     // console.log(audio.currentTime);
    //     if(audio.ended){
    //         audio_icon.className = "icon-play-button";
    //     }
    // });

    return false;
    // };
}