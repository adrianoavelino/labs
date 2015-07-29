#Desvendando a Linguagem Javascript
##Expressões Regulares

- Estrutura de caracteres que especificam um padrão formal para realizar validação de campos, extração de dados, substituição de caracteres

###Criando uma expressão regular
####1ª opção:
```js
var regExp = /<expressão regular>/;
```
####2ª opção:
```js
v2ª opção:ar regExp = new RehExp("<expressão regular>";
```
### RegExp API
`exec` - Executa a RegExp, retornando os detalhes
`test` - Testa a RegExp, retornando true ou false

####Telefone - passo 1
```js
var regExp = /9999-9999/;
var telefone = "9999-9999";
regExp.test(telefone);//true
```

####Telefone - passo 2
```js
var regExp = /(48) 9999-9999/;
var telefone = "(48) 9999-9999";
console.log(regExp.test(telefone));//false
```

##### Escapando caracteres
`\` - abarra é utilizada para escapar caracteres especiais

```js
var regExp = /\(48\) 9999-9999/;
var telefone = "(48) 9999-9999";
console.log(regExp.test(telefone));//true
```

###Telefone - passo 3

```js
var regExp = /\(48\) 9999-9999/;
var telefone = "Meu telefone é (48) 9999-9999";
console.log(regExp.test(telefone));//true
```
OBS:  para limitarmos a expressão regular devemos usar `^` , que determina o início ou `$` para indicarmos que deverá terminar.

```js
var regExp = /^\(48\) 9999-9999$/;
var telefone = "Meu telefone é (48) 9999-9999";
console.log(regExp.test(telefone));//false
```
### Telefone - passo 4
_vamos configurar para poder aceitar qualquer tipo de número na Expressão Regular, para isso vamos flexibilizar por meio de grupos_

`[abc]` - aceita qualquer caracteres dentro do grupo abc
`[^abc]` - não aceita qualquer caractere dentro do grupo
`[0-9]` - aceita qualquer caracteres entre 0 e 9
`[^0-9]` - não aceita qualquer caractere entre 0 e 9

```js
var regExp = /^\([0-9][0-9]\) [0-9][0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]$/;
var telefone = "(48) 9999-9999";
console.log(regExp.test(telefone)); //true
```

###Telefone - passo 5
Os quantificadores  podem ser aplicados a caracteres, grupos, conjuntos ou metacaracteres.
`{n}` - quantifica um número específico
`{n,}` - quantifica um número mínimo
`{n, m}` -  quantifica um número mínimo e um número máximo

```js
var regExp = /^\([0-9]{2}\) [0-9]{4}-[0-9]{4}$/;
var telefone = "(48) 9999-9999";
console.log(regExp.test(telefone)); //true
```
###Telefone - passo 6
_Telefone com 8 ou 9 dígitos_
```js
var regExp = /^\([0-9]{2}\) [0-9]{4,5}-[0-9]{4}$/;
var telefone1 = "(48) 8765-1234";
var telefone2 = "(48) 98765-1234";
console.log(regExp.test(telefone1)); //true
console.log(regExp.test(telefone2)); //true
```

###Telefone - passo 7
E se o hífen for opcional? Podemos utilizar um quantificador para torná-lo opcional.
####Quantificadores - Parte 2
>Os quantificadrores podem ser aplicados a caracteres, grupos ou metacaracteres.

`?` - zero ou um
`*` - zero ou mais
`+` - um ou mais

```js
var regExp = /^\([0-9]{2}\) [0-9]{4,5}-?[0-9]{4}$/;
var telefone1 = "(48) 87651234";
var telefone2 = "(48) 98765-1234";
console.log(regExp.test(telefone1)); //true
console.log(regExp.test(telefone2)); //true
```
###Telefone - passo 8
E se tiver uma estrutura de tabela?
```js
var regExp = /<table><tr>(<td>\([0-9]{2}\) [0-9]{4,5}-?[0-9]{4}<\/td>)+<\/tr><\/table>/;

var telefone = "<table><tr><td>(80) 999778899</td><td>(90) 99897-8877</td><td>(70) 98767-9999</td></tr></table>";
console.log(regExp.test(telefone));
```
###Telefone - passo 9
Em muitos casos também é possível substituir os grupos por metacaracteres específicos!
####Metacaracteres
`.` – representa qualquer caractere
`\w` – representa o conjunto [a-zA-Z0-9_]
`\W` – representa o conjunto [^a-zA-Z0-9_]
`\d` – representa o conjunto [0-9]
`\D` – representa o conjunto [^0-9]
`\s` – representa um espaço em branco
`\S` – representa um não espaço em branco
`\n` – representa uma quebra de linha
`\t` – representa um tab

```js
var regExp = /<table><tr>(<td>\(\d{2}\)\s\d{4,5}-?\d{4}<\/td>)+<\/tr><\/table>/;

var telefone = "<table><tr><td>(80) 999778899</td><td>(90) 99897-8877</td><td>(70) 98767-9999</td></tr></table>";
console.log(regExp.test(telefone));
```

###Telefone - passo 10
Chegou a hora de extrair o telefone de dentro dessas linhas
####String API
 **match** – executa uma busca na String e retorna um array contendo os dados encontrados, ou null.
**split** – Divide a String com base em uma outra String fixa ou expressão regular
**replace** – substitui partes da String com base em uma outra String fixa ou expressão regular.
```js
var regExp = /\(\d{2}\)\s\d{4,5}-?\d{4}/;

var telefone = "<table><tr><td>(80) 999778899</td><td>(90) 99897-8877</td><td>(70) 98767-9999</td></tr></table>";
console.log(telefone.match(regExp)); //["(80) 999778899", index: 15, input: "<table><tr><td>(80) 999778899</td><td>(90) 99897-8877</td><td>(70
```
###Telefone - passo 11
####Modificadores
**i** - case-insensitive matching
**g** - Global matching
**m** - Multiline matching
>Obs: são utilizados no final da expressão regular e podem ser combinados. Ex: `/<expressão regular>/g`
>Exemplo com  a função `regExp.exec(\<expressão regular>\,g)`   

```js
var regExp = /\(\d{2}\)\s\d{4,5}-?\d{4}/g;

var telefone = "<table><tr><td>(80) 999778899</td><td>(90) 99897-8877</td><td>(70) 98767-9999</td></tr></table>";
console.log(telefone.match(regExp));//["(80) 999778899", "(90) 99897-8877", "(70) 98767-9999"]
```
###Telefone - passo 12
Substituindo dados com replace
```js
var regExp = /\(\d{2}\)\s\d{4,5}-?\d{4}/g;

var telefone = "<table><tr><td>(80) 999778899</td><td>(90) 99897-8877</td><td>(70) 98767-9999</td></tr></table>";
console.log(telefone.replace(regExp, 'telefone'));//<table><tr><td>telefone</td><td>telefone</td><td>telefone</td></tr></table>
```
