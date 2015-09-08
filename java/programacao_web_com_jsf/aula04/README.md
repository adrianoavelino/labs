# Programção Web com JSF
## Programação Web com JSF - Aula 4 - - Criando Templates
fonte: https://www.youtube.com/watch?v=oVTn6YucDmM

Utilizaremos o projeto da aula 03

- renomear o **index.xhtml** para gerenciar-carro.xhtml
- crie um arquivo chamado **index.xhtml**
- crie um arquivo jsf chamado template e adicione a biblioteca `xmlns:ui="http://xmlns.jcp.org/jsf/facelets"` dentro da tag `html`
- altere o seu arquivo template.xhtml conforme o exemplo abaixo:

```xml
<?xml version='1.0' encoding='UTF-8' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:h="http://xmlns.jcp.org/jsf/html"
      xmlns:ui="http://xmlns.jcp.org/jsf/facelets">
    <h:head>
        <title>Sistema Carros</title>
    </h:head>
    <h:body>
        <h1>Sistema Carros</h1>
        <ui:insert name="corpo"></ui:insert>
    </h:body>
</html>
```
A tag `<ui:insert name="corpo"></ui:insert>` será o container que receberá o conteúdo de outras páginas que contenham a tag `<ui:define name="corpo"></ui:define>`, onde o name deverá ter o mesmo valor da propriedade name da tag `<ui:insert name="corpo"></ui:insert>`.

- apague o `head` e o `body` do arquivo **index.xhtml** e altere a tag `html` pela tag `<ui:decorate>` e acrescente a propriedade template com o valor **template.xhtml** que é a sua template. Veja abaixo como deverá ficar o seu arquivo **index.xhtml**:

```xml
<?xml version='1.0' encoding='UTF-8' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<ui:decorate xmlns="http://www.w3.org/1999/xhtml"
      xmlns:h="http://xmlns.jcp.org/jsf/html"
      xmlns:p="http://primefaces.org/ui"
      xmlns:ui="http://xmlns.jcp.org/jsf/facelets"
      template="template.xhtml">

      <ui:define name="corpo">
          Bem vindo ao sistema
      </ui:define>

</ui:decorate>>

```

Todo conteúdo da tag `<ui:define name="corpo">` será passado para o corpo do seu template.xhtml

###Outra forma de cliar um template
- altere o arquivo template.xhtml comforme o exemplo abaixo:

```xml
<?xml version='1.0' encoding='UTF-8' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:h="http://xmlns.jcp.org/jsf/html"
      xmlns:ui="http://xmlns.jcp.org/jsf/facelets">
    <h:head>
        <title>Sistema Carros</title>
    </h:head>
    <h:body>
        <h1>Sistema Carros</h1>
        <ui:insert></ui:insert>
    </h:body>
</html>

```

Simplesmente foi retirado a propriedade name e seu valor da tag `<ui:insert></ui:insert>`

- altere o seu arquivo index.xhtml conforme o exemplo abaixo:
```xml
<?xml version='1.0' encoding='UTF-8' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<ui:decorate xmlns="http://www.w3.org/1999/xhtml"
      xmlns:h="http://xmlns.jcp.org/jsf/html"
      xmlns:p="http://primefaces.org/ui"
      xmlns:ui="http://xmlns.jcp.org/jsf/facelets"
      template="template.xhtml">

        Bem vindo ao sistema
        <span>Sistema para controle de veículos</span>

</ui:decorate>

```

Foi somente retirado a tag `<ui:define name="corpo">` e o template adicionará todo o conteúdo dentro do arquivo **index.xhtml**

- agora vamos adicionar uma barra de menu abaixo da tag `<h1>` no arquivo template.xhtml:

```xml
<p:menubar>
    <p:menuitem value="Home" url="./"></p:menuitem>
    <p:menuitem value="Gerenciar" url="gerenciar-carro.jsf"></p:menuitem>
</p:menubar>
```
- remover a tag `header` e `body` do arquivo gerenciar-carros.xhtml e alterar a tag `html` pela tag `<ui:decorate>` e adicionar a propriedade template como o valor template.xhml
