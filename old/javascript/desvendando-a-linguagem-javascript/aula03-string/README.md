# Desvendando a linguagem JavaScript - 3# - String
link: https://www.youtube.com/watch?v=c3vaqf9x1PQ&list=PLQCmSnNFVYnT1-oeDOSBnt164802rkegc&index=3

> Uma String é composta por uma sequência de 0 ou mais caracteres com as seguintes características:

- São imutáveis
- Podem ser declaradas com aspas **simples** ou **duplas**

## String API
`var nome = "Pedro";`

- charAt - Retorna o char da posição
```JavaScript
nome.charAt(2); //'d'
```

- charCodeAt - Retorna o código do char da posição
```JavaScript
nome.charCodeAt(0); //80
```

- concat - Concatena duas Strings
```JavaScript
nome.concat(" Silva"); //'Pedro Silva'
```
_Obs: lembrando que Strings são imutáveis e o valor de nome continua sendo 'Pedro'_

- indexOf - Retorna o índice da prmeira ocorrência do char
```JavaScript
nome.indexOf("e"); //1
```

- lastIndexOf - Retorna o índice da última ocorrênciaa do char
```JavaScript
var teste = "teste";
teste.lastIndexOf("e"); //4
```

- length - Retorna o tamanha da String
```JavaScript
nome.length //5
```

- match - Retorna um array resultante da busca com RegExp
```JavaScript
nome = nome.concat(" Silva"); //'Pedro Silva'
nome.match("Silva"); //[ 'Silva', index: 6, input: 'Pedro Silva' ]
```

- replace - Substitui parte da String por outra

```JavaScript
nome.replace("Silva", "Medeiros");//'Pedro Medeiros'

```
_Obs: lembrando novamente que a String nome não foi alterada_



- search - Retorna a posição da String ou RegExp

```JavaScript
nome.search("Silva"); //6
nome.search(/Sil/i); //6

```

- split - Divide a String com base na expressão regular informada

```JavaScript
var nomes = "Pedro;Ana;Maria;Carolina";
nomes.split(";"); //[ 'Pedro','Ana','Maria','Carolina' ]

```

- substring - Extrai a parte da String desejada

```JavaScript
nome.substring(0,5); //'Pedro'
nome.substring(5); //'Silva'
```

- toLowerCase - Gera uma nova String com letra minúscula

```JavaScript
nome.toLowerCase() //'pedro silva'

```

- toUpperCase - Gera uma nova String em letra maiúscula

```JavaScript
nome.toUpperCase() //'PEDRO SILVA'

```

- trim - Remove os espaços em branco do início e do fim da String
```JavaScript
var nome = ' Pedro Silva '; //'Pedro Silva'
```

- valueOf - Retorna o valor primitivo da String

```JavaScript
nome.valueOf() //' Pedro Silva '

```
