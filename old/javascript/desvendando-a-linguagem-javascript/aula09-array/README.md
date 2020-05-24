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
Obs: quando **qtdElementos** = 0 ele adiciona o elemento na posicaoInicial.
**/

var carros = ["ka", "Corsa", "Palio"];

//remove
carros.splice(1,1); //[ 'Corsa' ]
carros.toString(); //'ka,Palio'

//adiciona
carros.splice(1, 0, "Corsa"); // []
carros.toString(); //'ka,Corsa,Palio'

//altera
carros.splice(1,1, "Sonic"); //Corsa
carros.toString(); //'ka,Sonic,Palio'





```

Iterando em um array com **forEach**


```js
var carros = ["ka", "Corsa", "Palio"];
carros.forEach(function(elemento){
    console.log(elemento);
});

```

Filtrando Array com **filter**

```js
//cria um array
var carros = [
    {
        marca: "Ford",
        modelo: "Ka"
    },
    {
        marca: "Chevrolet",
        modelo: "Corsa"
    },
    {
        marca: "Fiat",
        modelo: "Palio"
    }
];

carros.filter(function(elemento){
    return elemento.marca == "Ford";
});
//[ { marca: 'Ford', modelo: 'Ka' } ]

```

Testando todos os elementos com **every**
Verifica se todos os elementos de um array correspondem a um valor
```js
//cria um array
var carros = [
    {
        marca: "Ford",
        modelo: "Ka"
    },
    {
        marca: "Chevrolet",
        modelo: "Corsa"
    },
    {
        marca: "Fiat",
        modelo: "Palio"
    }
];

carros.every(function(elemento){
    return elemento.marca === "Ford";
}); //false

```
Testando todos os elementos com **some**
Verifica se algum elemento do array contém determinado valor
```js
//cria um array
var carros = [
    {
        marca: "Ford",
        modelo: "Ka"
    },
    {
        marca: "Chevrolet",
        modelo: "Corsa"
    },
    {
        marca: "Fiat",
        modelo: "Palio"
    }
];

carros.some(function(elemento){
    return elemento.marca === "Ford";
}); //true

```

Mapeando elementos com **map**
Retorna um array com determinados elementos de um array
**OBS:** _ele nao muda o array original_
```js
//cria um array
var carros = [
    {
        marca: "Ford",
        modelo: "Ka"
    },
    {
        marca: "Chevrolet",
        modelo: "Corsa"
    },
    {
        marca: "Fiat",
        modelo: "Palio"
    }
];

carros.map(function(elemento){
    return elemento.marca;
});
//["Ford", "Chevrolet", "Fiat"]

```

Processando elementos com **reduce**
Ele permite que faça um processamento e uma acumulação. Ele recebe uma fnução como parâmetro que tem  um parâmetro **prev** anterior e **cur** atual e um segundo que recebe o valor inicial da contagem
```js
//cria um array
var carros = [
    {
        modelo: "Ka",
        preco: 2
    },
    {
        modelo: "Corsa",
        preco: 5
    },
    {
        modelo: "Palio",
        preco: 10
    }
];

carros.reduce(function(prev, cur){
    return prev + cur.preco;
}, 0);
//17
```

Concatenando dois Arrays com **concat**
Ele concatena dois array gerando um novo Array

```js
var carros = ["Ka", "Corsa", "Palio"];
var motos = ["Honda", "Yamaha"];

carros.concat(motos); //["Ka", "Corsa", "Palio", "Honda", "Yamaha"]

```

Fatiando um Array com **slice**
ele recebe com parâmetro a posicaoInicial e posicaoFinal do array
```js
var carros = ["ka", "Corsa", "Palio", "Gol"];
carros.slice(0, 2); //[]"ka", "Corsa"]
carros.slice(1, 2); //["Corsa", "Palio", "Gol"]
carros.slice(2); // ["Palio", "Gol"]

```
Invertendo a ordem de um array com **reverse**  
**OBS:** _altera o array original_
```js
var carros = ["ka", "Corsa", "Palio", "Gol"];
carros.reverse(); //["Gol", "Palio", "Corsa", "ka"]
carros.toString(); //["Gol", "Palio", "Corsa", "ka"]

```

Ordenando um Array com **sort**
Se não for passado parâmetro deixa em ordem crescente.
Se passar uma função como parâmetro e o  `return` for  maior que `0`, então o elemento `b` deve passar à frente do elemento `a`.
**OBS:** _Altera o Array original_

```js
var carros = [
    {
        modelo: "Ka",
        preco: 2
    },
    {
        modelo: "Corsa",
        preco: 5
    },
    {
        modelo: "Palio",
        preco: 10
    }
];

//ordem crescente
carros.sort(function(a, b){
  return a.preco - b.preco;
});

//ordem decrescente
carros.sort(function(a, b){
  return b.preco - a.preco;
});

```

Juntando elementos de um Array com **join**
```js
var carros = ["ka", "Corsa", "Palio", "Gol"];
carros.join(";"); //"ka;Corsa;Palio;Gol"

```
