function getWholeChar(str, i) {
    var code = str.charCodeAt(i);     
   
    if (Number.isNaN(code)) {
      return ''; // la position n'a pas pu être trouvée
    }
    if (code < 0xD800 || code > 0xDFFF) {
      return str.charAt(i);
    }
  
    // On traite ici le demi codet supérieur (high surrogate)
    // La borne supérieure du test pourrait être 0xDB7F afin de prendre en compte
    // les demi-codets privés comme des caractères uniques
    if (0xD800 <= code && code <= 0xDBFF) { 
      if (str.length <= (i+1))  {
        throw 'le demi-codet supérieur n\'est pas suivi par un demi-codet inférieur';
      }
      var next = str.charCodeAt(i+1);
        if (0xDC00 > next || next > 0xDFFF) {
          throw 'le demi-codet supérieur n\'est pas suivi par un demi-codet inférieur';
        }
        return str.charAt(i)+str.charAt(i+1);
    }
    // on gère le demi codet inférieur (0xDC00 <= code && code <= 0xDFFF)
    if (i === 0) {
      throw 'le demi-codet inférieur n\'est pas précédé d\'un demi-codet supérieur';
    }
    var prev = str.charCodeAt(i-1);
    
    // (la borne supérieure pourrait être modifiée en 0xDB7F afin de traiter
    // les demi-codets supérieurs privés comme des caractètres uniques)
    if (0xD800 > prev || prev > 0xDBFF) { 
      throw 'le demi-codet inférieur n\'est pas précédé d\'un demi-codet supérieur';
    }
    // on peut passer des demis codets inférieurs comme deuxième composant
    // d'une paire déjà traitée
    return false; 
  }

function mb_strlen(str)
{
	var lgth = 0;

	for (var i = 0; i < str.length; i++)
	{
		if ((getWholeChar(str, i)) === false)
			continue; //Passer si l’on a le LS

		lgth++;
	}
	
	return lgth;
}

function strlenUTF8(str)
{
  var length = 0;
  var char = '';
	
  for (var i = 0, c = str.length; i < c; i++)
  {
  	char = getWholeChar(str, i);
  	if (!char)
  		continue; //Si on a le LS, on passe
  	
  	if (char.length == 1)
  	{
  		//Si le caractère n’occupe qu’un codet en UTF-16, on récupère son point de code pour en déduire la place occupée en UTF-8
			var codeChar = char.charCodeAt(0);
			var nb_bits = Math.ceil((Math.log(codeChar + 1))/Math.log(2));
			
			length++;
			if (nb_bits >= 8) length++;
			if (nb_bits >= 12) length++;
		}
		else
			length += 4 //S’il en occupe 2, alors le point de code est supérieur à 0x10000, donc occupe plus de 17 bits, d’où quatre octets nécessaires en UTF-8
  }
	
  return length;
}