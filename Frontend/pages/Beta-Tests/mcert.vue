<template>
<div>
	<canvas id="NmyCanvas" ></canvas>
	</div>
</template>

<script>

export default {
mounted(){
     var canvas = document.getElementById("myCanvas");
     var context = canvas.getContext("2d");
  canvas.width = 372;
  canvas.height = 559;
     var imageObj = new Image(372,559);
      imageObj.setAttribute('crossOrigin','anonymous');
		imageObj.src = "http://localhost:3000/acumen-certificate.jpg"; 
     imageObj.onload = function(){
         context.drawImage(imageObj, 0, 0,372,559);
         context.font = "12px Monotype Corsiva";      
         context.fillText("Supply Chain Management", 60, 248);
         context.fillText("Flipkart, Ratnadeep", 160, 272);
         context.fillText("Syed Riyaz Uddin", 238, 344);
				 let d = new Date();
				 let date = d.getFullYear()+'/'+d.getMonth()+'/'+d.getDate();
         context.font = "10px Monotype Corsiva";  
         context.fillText(date, 205, 248);
     let imageData = canvas.toDataURL("image/png");
let imgEl = document.createElement('img');
imgEl.setAttribute('crossOrigin','anonymous');
 imgEl.setAttribute('src',imageData);
  document.body.append(imgEl);
 };
}//mounted
}
</script>

<style>

</style>