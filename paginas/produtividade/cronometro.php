<style>
/* Generated by Font Squirrel (http://www.fontsquirrel.com) on November 26, 2014 */
@font-face {
    font-family: 'digital_dream';
    src: url('digital_dream/digitaldreamfatskew-webfont.eot');
    src: url('digital_dream/digitaldreamfatskew-webfont.eot?#iefix') format('embedded-opentype'),
         url('digital_dream/digitaldreamfatskew-webfont.woff2') format('woff2'),
         url('digital_dream/digitaldreamfatskew-webfont.woff') format('woff'),
         url('digital_dream/digitaldreamfatskew-webfont.ttf') format('truetype'),
         url('digital_dream/digitaldreamfatskew-webfont.svg#digital_dream_fat_skewregular') format('svg');
    font-weight: normal;
    font-style: normal;
}		
#cronometro { padding:10px; border: 5px #7c7bff double; width: 200px;
              text-align: center; background-color: #007; border-radius: 5px;
							float: right; margin: 1em 3em 1em 3em; }
#reloj { padding: 5px 10px; width: 90% ;border: 1px solid black; 
         font: normal 1em digital_dream, europa, arial; text-align: center; 
         margin: 4px; background-color: #f0ffff; border-radius: 3px;  }
#cronometro [type=button]  { margin: 4px; font: normal 9pt arial; width: 70px; } 
    
    
</style>
<script src="cronometro.js"></script>

<div id="cronometro">
  <div id="reloj">
	  0 00 00 00
  </div>
  <form name="cron" action="#">
    <input type="button" value="Empezar" name="boton1"   />
    <input type="button" value="Parar" name="boton2"  /><br/>
  </form>
</div>



    