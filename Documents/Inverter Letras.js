let value = "5LABS: SEMPRE A FRENTE";
let final = null;
var word = [];
var result = [];

let x = value.length;
let y = 0;
let z = 0;

//Separa as palavras da frase
while (y < x) {
	if (value[y] == " ") {
    	z++;
    } else if (word[z] != undefined) {
    	word[z] = word[z] + value[y]; //Palavra = Palavra + Letra
    } else {
    	word[z] = value[y];  //Palavra = Letra
    }
    
    y++;
}

y = 0;

//word = ["5LABS:", "SEMPRE", "A", "FRENTE"]
for (const value of word) {
	x = value.length;
    
    //Inverte as letras da palavra
	while (x >= 0) {
    	if (result[y] != undefined) {
        	result[y] = result[y] + value[x]; //Palavra = Palavra + Última Letra
        } else {
        	result[y] = value[x]; //Palavra = Última Letra
        }

      	x--;
  	}
    
    //Monta a frase novamente
    //result = [":SBAL5", "ERPMES", "A", "ETNERF"]
    if (final != null) {
    	final = final + " " + result[y];
    } else {
    	final = result[y];
    }
    y++;
}

console.log(final); //Imprime a frase - :SBAL5 ERPMES A ETNERF

/*----------------------------------------------------------------------*/

value = "5LABS: SEMPRE A FRENTE";
final = null;
word = null
result = [];
x = 0;

word = value.split(" "); //Separa as palavras da frase - word = ["5LABS:", "SEMPRE", "A", "FRENTE"]

for (const value of word) {
	word = value.split(""); //Separa as letras da palavra - word = ["5", "L", "A", "B", "S", ":"]
    result[x] = word.reverse().join(""); //Inverte as letras das palavra - word.reverse() = [":", "S", "B", "A", "L", "5"] - join("") = ":SBAL5"

    x++;
}

final = result.join(" "); //Monta a frase novamente - result = [":SBAL5", "ERPMES", "A", "ETNERF"]
console.log(final); //Imprime a frase - :SBAL5 ERPMES A ETNERF