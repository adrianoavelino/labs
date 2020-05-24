# Programção Web com JSF
## Programação Web com JSF - Aula 2 - Hello Managed Bean
_fonte: https://www.youtube.com/watch?v=ULqq87Ac6X0 _


crie um novo pacote java chamado _br.com.adriano_
crie uma classe java chamada de _NomesBean_
  crie uma anotação `@ManageBean` acima da classe:
  ```java
  @ManageBean
public class NomesBean {

}
  ```

adicione uma anotação `SessionScope` na classe:
  ```java
@SessionScope
@ManageBean
public class NomesBean {

}
  ```

_Obs: é uma anotação de escopo, determina o tempo que a classe ficara na memória. O tempo definido no arquivo `/WEB-INF/web.xml`_

crie as propriedades nome, sobrenome, mensagem, os getters, os setters e o método público dizerOla() como o exemplo abaixo:
```java
package br.com.adriano;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.SessionScoped;

@SessionScoped
@ManagedBean
public class NomesBean {
    private String nome;
    private String sobrenome;

    private String mensagem;

    public void dizerOla(){
        mensagem = "Ola " + nome + " " + sobrenome;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getSobrenome() {
        return sobrenome;
    }

    public void setSobrenome(String sobrenome) {
        this.sobrenome = sobrenome;
    }

    public String getMensagem() {
        return mensagem;
    }

    public void setMensagem(String mensagem) {
        this.mensagem = mensagem;
    }



}


```

Altere a index.xhtml da seguinte forma:

```xml
<?xml version='1.0' encoding='UTF-8' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:h="http://xmlns.jcp.org/jsf/html"
      xmlns:p="http://primefaces.org/ui">
    <h:head>
        <title>Primeiro Projeto</title>
    </h:head>
    <h:body>
        <h:form>
            <p:panelGrid columns="2">
                <h:outputLabel value="Nome: " for="nome"></h:outputLabel>
                <p:inputText id="nome" value="#{nomesBean.nome}"></p:inputText>

                <h:outputLabel value="sobrenome" for="sobrenome"></h:outputLabel>
                <p:inputText id="sobrenome" value="#{nomesBean.sobrenome}"></p:inputText>

                <h:outputLabel></h:outputLabel>
                <p:commandButton value="Enviar" action="#{nomesBean.dizerOla}" update="msg" > </p:commandButton>

                <h:outputLabel></h:outputLabel>
                <h:outputLabel id="msg" value="#{nomesBean.mensagem}"></h:outputLabel>

            </p:panelGrid>
        </h:form>
    </h:body>
</html>
```
