#Array

* Não existem array **de verdade** na Linguagem Javascript
* Os arrays são apenas **objetos especiais** que oferecem meios para **acessar** e **manipular** suas propriedades por meio de índices

##Formas de criar um Array##
_Criando um array com [ ]:_

 ```js
 var carros = [];

 ```

 _Inserindo elementos no Array:_
 ```js
 var carros = [];
 carros['Ka'];
 carros['Corsa'];
 carros['Palio'];

 ```

_Criar Array inicializado com elementos inline:_
```js
var carros[] = ["ka", "Corsa", "Palio"];
```


_Criando Array com o construtor new Array()_:

```js
var carros = new Array();
```

_Criando Array com um tamanho inicial_
```js
var carros = new Array(10);
```
_Obs: o Array inicia com 10 posições vazias_

```js
var carros = ["ka", "Corsa", "Palio"];
carros.valueOf(); //[ 'ka', 'Corssa', 'Palio' ]
carros.toString(); //'ka,Corssa,Palio'
carros.length //3 (é uma propriedade que retorna o tamanho do array)

//adiciona um valor no final do array
carros.push("Gol");//4

//remove o último elemento do array
carros.pop(); //'Gol'

//adiciona um valor no início do array
carros.unshift("Gol") //4

//remove a primeira posição do array
carros.shift(); //'Gol'

//retorna a posição do valor no array
 carros.indexOf('Corsa') //1

 //Trabalhando com splice
 /**
O splice serve tanto para adicionar, como alterar ou remover as posições de um array
Ex:
var carros = ["ka", "Corsa", "Palio"];

carros.splice(posicaoInicial,qtdElementos[,novoValor]);
**/

var carros[] = ["ka", "Corsa", "Palio"];

//remove
carros.splice(1,1); //[ 'Corsa' ]
carros.toString(); //'ka,Palio'

//adiciona
carros.splice(1, 0, "Corsa"); // []
carros.toString(); //'ka,Corsa,Palio'



```
**splice** remove, subtitui, adiciona,
