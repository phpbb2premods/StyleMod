<div id="zone_liste_jeux">
</div>
<script language="Javascript" type="text/javascript">
  function ObjectDiv( div , content )
 {
 if ( document.getElementById )
 {
 document.getElementById( div ).innerHTML = content;
 }
 else
 {
 if ( document.layers )
 {
 document.div.innerHTML = content;
 }
 else
 {
 document.all.div.innerHTML = content;
 }
 }
 }

 function Goto( FILE , METHOD , DATA , div )
 {
 if( METHOD == 'GET' && DATA != null )
 {
 FILE += '?' + DATA;
 DATA = null;
 }

 var httpRequestM = null;

if( window.XMLHttpRequest )
 { // Firefox
 httpRequestM = new XMLHttpRequest();
 }
 else if( window.ActiveXObject )
 { // Internet Explorer
 httpRequestM = new ActiveXObject( "Microsoft.XMLHTTP" );
 }
else
 { // XMLHttpRequest non supporté par le navigateur
 return "Votre navigateur ne supporte pas les objets XMLHTTPRequest...";
 }

 httpRequestM.open( METHOD , FILE , true );
 httpRequestM.onreadystatechange = function()
 {
 if( httpRequestM.readyState == 4 )
 {
ObjectDiv( div , httpRequestM.responseText );
 }
 }

 if( METHOD == 'POST' )
 {
 httpRequestM.setRequestHeader( "Content-type" , "application/x-www-form-urlencoded" );
 }

 httpRequestM.send( DATA );
 }

function next_page_arcade( data )
{
	Goto( 'areabb/mods/liste_jeux_ajax/zone_liste_jeux.php' , 'POST'  , data , 'zone_liste_jeux' );
	return false;
} 
window.onload = next_page_arcade( '{VARS}' );
</script>