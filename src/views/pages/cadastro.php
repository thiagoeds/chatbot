<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Cadastro</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,200&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: 0;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background-image: url("https://claudia.abril.com.br/wp-content/uploads/2020/07/GettyImages-1153768961.jpg?quality=85&strip=info&resize=680,453");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }

    .form {
        background: #d3d3d37a;
        width: 50%;
        height: 70%;
        margin: 0 auto;
        text-align: center;
        border: 2px solid #069;
        border-radius: 10px;
        margin-top: 50px;
    }

    h1 {
        background: #069;
        color: #FFF;
    }

    input,
    select {
        border-radius: 8px;
        height: 30px;
        border: none;
    }

    /* 
          .sexo
          {
              align: center;
          } */

    input[type="submit"] {
        cursor: pointer;
        border-radius: 5px;
        border: none;
        width: 80px;
        height: 35px;
    }

    input[type="button"] {
        cursor: pointer;
        border-radius: 5px;
        border: none;
        width: 80px;
        height: 35px;
    }

    input[type="submit"]:hover {
        background: #069;
        color: #FFF;
    }

    input[type="button"]:hover {
        background: #069;
        color: #FFF;
    }
</style>

<body>

    <div class="form">
        <form method="post" action="index.php"><br>
            <h1>Area do Aluno</h1><br>
            <h2>Cadastro</h2><br>
            <label for="nome">Nome:</label>
            <input type="text" size="40" placeholder="Nome Completo" require>
            <label for="cpf">CPF:</label>
            <input type="text" placeholder="123.456.789-10" require><br><br>
            <label for="email">e-mail:</label>
            <input type="text" size="40" placeholder="e-mail valido" require>
            <label for="rg">RG:</label>
            <input type="text" size="40" placeholder="12.345.678"><br><br>
            <label for="sexo">Sexo:</label> &nbsp;
            <label for="mas">Masculino</label>
            <input class="sexo" type="radio" name="opcao" id="op1">
            <label for="fem">Feminino</label>
            <input class="sexo" type="radio" name="opcao" id="op1">
            <label for="outro">Outros</label>
            <input class="sexo" type="radio" name="opcao" id="op1"><br><br>
            <label for="data">Data de Nascimento:</label>
            <input type="date" name="data" id="op1"><br><br>
            <h2>Endereço</h2><br>
            <label for="uf">Estado:</label>
            <select name="estado" id="uf">
                <option value="0">Escolha sua Região</option>
                <optgroup label="Centro-Oeste">
                    <option value="1">Goiás</option>
                    <option value="2">Mato Grosso</option>
                    <option value="3">Mato Grosso do Sul</option>
                    <option value="4">Distrito Federal</option>
                </optgroup>
                <optgroup label="Nordeste">
                    <option value="5">Alagoas</option>
                    <option value="6">Bahia</option>
                    <option value="7">Ceará</option>
                    <option value="8">Maranhão</option>
                    <option value="9">Paraíba</option>
                    <option value="10">Pernambuco</option>
                    <option value="11">Piauí</option>
                    <option value="12">Rio Grande do Norte</option>
                    <option value="13">Sergipe</option>
                </optgroup>
                <optgroup label="Norte">
                    <option value="14">Acre</option>
                    <option value="15">Amazonas</option>
                    <option value="16">Amapá</option>
                    <option value="17">Para</option>
                    <option value="18">Rondônia</option>
                    <option value="19">Roraima</option>
                    <option value="20">Tocantins</option>
                </optgroup>
                <optgroup label="Sul">
                    <option value="21">Parana</option>
                    <option value="22">Santa Catarina</option>
                    <option value="23">Rio Grande do Sul</option>
                </optgroup>
                <optgroup label="Sudeste">
                    <option value="24">São Paulo</option>
                    <option value="25">Rio de Janeiro</option>
                    <option value="26">Espirito Santo</option>
                    <option value="27">Minas Gerais</option>
                </optgroup>
            </select>
            <label for="cidade">Cidade:</label>
            <input type="text" placeholder="Cidade"><br><br>
            <label for="cep">CEP:</label>
            <input type="text" placeholder="35300-000">
            <label for="bairro">Bairro</label>
            <input type="text" placeholder="Bairro"><br><br>
            <label for="rua">Rua:</label>
            <input type="text" size="30" placeholder="Logradouro">
            <label for="nu">Número</label>
            <input type="text" size="5" placeholder="Número"><br><br>
            <label for="comp">Complemento:</label>
            <input type="text" size="30" placeholder="Andar, Apartamento, Bloco"><br><br>
            <input type="submit" value="Voltar"> &nbsp; &nbsp;
            <input type="button" value="Enviar"><br><br>


        </form>

    </div>

</body>

</html>