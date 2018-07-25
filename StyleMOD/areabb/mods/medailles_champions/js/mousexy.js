

// cette fonction mets dans des variables globales la position de la souris, ici Mouse_X et Mouse_Y...
//--------------------
function WhereMouse(e){
  var DocRef;
  //-- On traque les hybrides
  if( e && e.target){
    Mouse_X = e.pageX;
    Mouse_Y = e.pageY;
  }
  else{
    if( document.documentElement && document.documentElement.clientWidth)
      DocRef = document.documentElement;
    else
      DocRef = document.body;

    Mouse_X = event.clientX +DocRef.scrollLeft;
    Mouse_Y = event.clientY +DocRef.scrollTop;
  }
  return( true);
}
//...pour plus d'info voir POSITION DE LA SOURIS DANS LA PAGE , mais je pense que tu la déjà vu... 
//ceci étant tu récupéres la position de la souris quelque soit la position dans la page scrollée ou non.

//maintenant il te faut récupérer la position de l'objet cliquer...
//pour cela, et d'après ce que je vois il te faut une fonction absolue, l'image peut être impriquée
//----------------------
function ObjGetPos(obj_){
  var PosX = 0;
  var PosY = 0;
  var Obj  =  obj_;
  //-- Si l'objet existe
  if( Obj){
    //-- Si propriété existe
    if( Obj.offsetParent){
      //-- Récup. Position Objet
      PosX = Obj.offsetLeft;
      PosY = Obj.offsetTop;
      //-- Tant qu'un parent existe
      while( Obj = Obj.offsetParent){
        //-- Ajout position Parent
        PosX += Obj.offsetLeft;
        PosY += Obj.offsetTop;
      }
    }
  }
  //-- Retour des positions
  return([PosX, PosY]);
}
// On selectionne le champs input à renseigner
var cible = 'crd1';
function define_input(id)
{
	cible = id;
	return( true);
}

//cette fonction remonte donc au body pour récupérer la position absolute de l'objet...
//son appel peut se fait de la façon suivante
//--------------------------------
function Afficher_Position(obj_){
  var Pos =new Array();
  Pos = ObjGetPos(obj_)
  //alert("Pos_X = " + (Mouse_X -Pos[0]) +"<BR>Pos_Y = " + (Mouse_Y -Pos[1])); 
  document.getElementById(cible).value = (Mouse_X -Pos[0])+':'+(Mouse_Y -Pos[1]);
}


function Update_image(image)
{
	id_image = document.getElementById('podium');
	id_image.src = 'images/'+image;
}
document.onmousemove = WhereMouse;