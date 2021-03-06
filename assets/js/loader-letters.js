var ml4 = {};
       ml4.opacityIn = [0,1];
       ml4.scaleIn = [0.2, 1];
       ml4.scaleOut = 3;
       ml4.durationIn = 800;
       ml4.durationOut = 600;
       ml4.delay = 500;               
       var textWrapper = document.querySelector('.ml11 .letters');
       textWrapper.innerHTML = textWrapper.textContent.replace(/([^\x00-\x80]|\w)/g, "<img src='../assets/images/logo.png' width='300px' class='letter'>$&</span>");               
       ml.timelines["ml4"] = anime.timeline({loop: true})
       ml.timelines["ml11"] = anime.timeline({loop: true})
         .add({
           targets: '.ml4 .letters-1',
           opacity: ml4.opacityIn,
           scale: ml4.scaleIn,
           duration: ml4.durationIn
         }).add({
           targets: '.ml4 .letters-1',
           opacity: 0,
           scale: ml4.scaleOut,
           duration: ml4.durationOut,
           easing: "easeInExpo",
           delay: ml4.delay
         }).add({
           targets: '.ml4 .letters-2',
           opacity: ml4.opacityIn,
           scale: ml4.scaleIn,
           duration: ml4.durationIn
         }).add({
           targets: '.ml4 .letters-2',
           opacity: 0,
           scale: ml4.scaleOut,
           duration: ml4.durationOut,
           easing: "easeInExpo",
           delay: ml4.delay
         }).add({
           targets: '.ml4 .letters-3',
           opacity: ml4.opacityIn,
           scale: ml4.scaleIn,
           duration: ml4.durationIn
         }).add({
           targets: '.ml4 .letters-3',
           opacity: 0,
           scale: ml4.scaleOut,
           duration: ml4.durationOut,
           easing: "easeInExpo",
           delay: ml4.delay
         }).add({
        targets: '.ml11 .line',
        scaleY: [0,1],
        opacity: [0.5,1],
        easing: "easeOutExpo",
        duration: 700
        })
        .add({
        targets: '.ml11 .line',
        translateX: [0, document.querySelector('.ml11 .letters').getBoundingClientRect().width + 0],
        easing: "easeOutExpo",
        duration: 700,
        delay: 100
        }).add({
        targets: '.ml11 .letter',
        opacity: [0,1],
        easing: "easeOutExpo",
        duration: 600,
        offset: '-=775',
        delay: (el, i) => 34 * (i+1)
        }).add({
        targets: '.ml11',
        opacity: 0,
        duration: 1000,
        easing: "easeOutExpo",
        delay: 1000
        }).add({
            targets: '.ml4',
            opacity: 0,
            duration: 500,
            delay: 500
          }); 
