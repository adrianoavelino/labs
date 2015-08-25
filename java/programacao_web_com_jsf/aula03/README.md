#Programação Web com JSF
## Aula 3 - Programação Web com JSF - Aula 3 - Lista de Objetos
_fonte: https://www.youtube.com/watch?v=48ziUGDQ9ZM_

- crie um projeto e adicione o jsf e o Primefaces
- crie um pacote chamado _br.com.adriano.objetos.entity_
- crie uma classe java chamada _Carro_ dentro do pacote _br.com.adriano.objetos.entity_

A classe Carro terá o seguinte conteúdo:
```java
package br.com.adriano.objetos.entity;

public class Carro {
    private String modelo;
    private String fabricante;
    private String cor;
    private Integer ano;

    public String getModelo() {
        return modelo;
    }

    public void setModelo(String modelo) {
        this.modelo = modelo;
    }

    public String getFabricante() {
        return fabricante;
    }

    public void setFabricante(String fabricante) {
        this.fabricante = fabricante;
    }

    public String getCor() {
        return cor;
    }

    public void setCor(String cor) {
        this.cor = cor;
    }

    public Integer getAno() {
        return ano;
    }

    public void setAno(Integer ano) {
        this.ano = ano;
    }

}

```
- crie uma classe java chamada carroBean com o seguinte manageBean dentro do pacote br.com.adriano.objetos.bean:

```java
package br.com.adriano.objetos.bean;

import br.com.adriano.objetos.entity.Carro;
import java.util.ArrayList;
import java.util.List;
import javax.faces.bean.ManagedBean;
import javax.faces.bean.SessionScoped;

@ManagedBean
@SessionScoped
public class CarroBean {

    private Carro carro = new Carro();
    private List<Carro> carros = new ArrayList<>();

    public void adicionar(){
        carros.add(carro);
        carro = new Carro();
    }

    public Carro getCarro() {
        return carro;
    }

    public void setCarro(Carro carro) {
        this.carro = carro;
    }

    public List<Carro> getCarros() {
        return carros;
    }

    public void setCarros(List<Carro> carros) {
        this.carros = carros;
    }

}

```


- Altere o arquivo index conforme o código abaixo:
```xml
<?xml version='1.0' encoding='UTF-8' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:h="http://xmlns.jcp.org/jsf/html"
      xmlns:p="http://primefaces.org/ui">
    <h:head>
        <title>Facelet Title</title>
    </h:head>
    <h:body>
        <h:form>
            <p:toolbar id="frm">
                <p:toolbarGroup>
                    <p:commandButton value="Adicionar" action="#{carroBean.adicionar()}" update="@form"></p:commandButton>
                </p:toolbarGroup>
            </p:toolbar>
            <p:fieldset legend="Objetos">
                <p:panelGrid columns="2">
                    <h:outputLabel value="Modelo"></h:outputLabel>
                    <p:inputText value="#{carroBean.carro.modelo}"></p:inputText>

                    <h:outputLabel value="Fabricante"></h:outputLabel>
                    <p:inputText value="#{carroBean.carro.fabricante}"></p:inputText>

                    <h:outputLabel value="Cor"></h:outputLabel>
                    <p:inputText value="#{carroBean.carro.cor}"></p:inputText>

                    <h:outputLabel value="Ano"></h:outputLabel>
                    <p:inputMask mask="9999" value="#{carroBean.carro.ano}"></p:inputMask>
                </p:panelGrid>
                <p:dataTable value="#{carroBean.carros}" var="carro">
                    <p:column headerText="Modelo" sortBy="#{carro.modelo}">
                        <h:outputText value="#{carro.modelo}"></h:outputText>
                    </p:column>
                    <p:column headerText="Fabricante" sortBy="#{carro.fabricante}">
                        <h:outputText value="#{carro.fabricante}"></h:outputText>
                    </p:column>
                    <p:column headerText="Cor" sortBy="#{carro.cor}">
                        <h:outputText value="#{carro.cor}"></h:outputText>
                    </p:column>
                    <p:column headerText="Ano" sortBy="#{carro.ano}">
                        <h:outputText value="#{carro.ano}"></h:outputText>
                    </p:column>
                </p:dataTable>

            </p:fieldset>

        </h:form>
    </h:body>
</html>
```
