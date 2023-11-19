<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>System Barber</title>


    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">


    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>



</head>

<body class="bg-dark">
<?php include_once('IncludeHeaderADM.php'); ?>

<section class="inner-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="left-side">

                    <h1 class="title-bottom-line">FORMULARIO DE <strong>CONTATO</strong></h1>
                    <p>nao sei oque por nao, preenche ae.</p>
                    <form action="#" method="POST" id="contact-form">
                        <label for="name"></label><input type="text" name="name" id="name" placeholder="Seu Nome">
                        <label for="surname"></label><input type="text" name="surname" id="surname" placeholder="SobreNome">
                        <label for="phone"></label><input type="text" name="phone" id="phone" placeholder="Celular">
                        <label for="email"></label><input type="text" name="email" id="email" placeholder="E-mail">
                        <label for="city"></label><input type="text" name="city" id="city" placeholder="Cidade">
                        <label for="state"></label><input type="text" name="state" id="state" placeholder="Estado">
                        <label for="subject"></label><input type="text" name="subject" id="subject" placeholder="Motivo do seu contato" class="subject">
                        <input type="submit" name="submit" value="ENVIAR">
                    </form>
                    <div id="success">
                        <p>Sua mensagem foi enviada com sucesso! Entraremos em contato assim que pudermos.</p>
                    </div>
                    <div id="error">
                        <p>Algo deu errado, tente atualizar e enviar o formulário novamente.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="side-bar">
                    <h1 class="title-bottom-line"><strong>SEDE</strong> OFICIAL</h1>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-bs-toggle="collapse" data-bs-parent="#accordion" href="#collapseOne" class="btn collapsed" role="button">System Barber - IF</a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body gray-bg">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3704.869898831968!2d-52.11370228501676!3d-21.785295704290643!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x949198d8b971a46f%3A0xa778e28b9c04cf8b!2sInstituto%20Federal%20de%20Educa%C3%A7%C3%A3o%2C%20Ci%C3%AAncia%20e%20Tecnologia%20de%20S%C3%A3o%20Paulo%2C%20C%C3%A2mpus%20Presidente%20Epit%C3%A1cio!5e0!3m2!1spt-BR!2sbr!4v1646855594129!5m2!1spt-BR!2sbr" style="width:100%; height:300px; border:0"></iframe>
                                    <p><strong>SYSB</strong></p>
                                    <p>R. José Ramos Júnior, 27-50 - Jardim Tropical, Pres. Epitácio - SP, 19470-000<br>SP</p>
                                    <h3>+55 (18) 3281-9599</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<p></p>
<hr style="color: lightgrey;">
<?php include_once('IncludeFooter2.php'); ?>

<!-- FORMATAR (TELEFONE FIXO, TELEFONE CELULAR, CEP, CNPJ, CPF E DATA) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>
    $("#phone").mask("(99)99999-9999");
</script>
<script>
    $("#phone").mask("(99)99999-9999");
</script>

</body>
</html>