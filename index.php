<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            background-color: #6ad0ec;
        }
    </style>
    <title>Banco de Dados Livrarias</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body id="pagina">
    <div class="header">
        <div class="navbar">
            <div class="logo">
                <a href="#"><img src="assets/img/logo.png"></a>
            </div>
            <div class="tabs">
                <ul>
                    <button class="tablinks active" onclick="openTab(event, 'inicio')">Início</button>
                    <button class="tablinks" onclick="openTab(event, 'livrarias')">Livrarias</button>
                    <button class="tablinks" onclick="openTab(event, 'servicos')">Serviços</button>
                    <!-- <button class="tablinks" onclick="openTab(event, 'contatos')">Contatos</button>
                    <li>Início</li>
                    <li>Sobre</li>
                    <li>Serviços</li>
                    <li>Contatos</li> -->
                </ul>
            </div>
            <!-- <div class="login-btn">Login</div> -->
        </div>
    </div>

    <div id="inicio" class="tabcontent active">
        <div class="inicio">
            <h1 style="font-size: 30px;">Bem-vindo ao nosso site!</h1>
            <p style="font-size: 20px;">Dedicado a oferecer uma experiência única para os amantes de livros e leitores ávidos! Aqui, você
                encontrará um vasto banco de dados de livrarias, projetado para facilitar a busca e a descoberta
                de novos títulos em sua região ou em qualquer lugar do mundo.</p>
            <p style="font-size: 20px;">Descubra. Explore. Encontre sua próxima história favorita nas livrarias mais incríveis ao redor.
                Bem-vindo ao nosso mundo literário!</p>
        </div>
    </div>

    <div id="livrarias" class="tabcontent">
        <div class="inicio">
            <h1 style="font-size: 30px;">Livrarias</h1>
            <p style="font-size: 20px;">Aqui está o conteúdo da página "Livrarias".</p>
        </div>
    </div>

    <div id="servicos" class="tabcontent">
        <div class="inicio">
            <h1 style="font-size: 30px;">Serviços</h1>
            <p style="font-size: 20px;">Aqui está o conteúdo da página "Serviços".</p>
        </div>
    </div>


    <!-- <div id="contatos" class="tabcontent">
        <h2>Serviços</h2>
        <p>Aqui está o conteúdo da página "Serviços".</p>
    </div> -->

    <div class="row">
        <p>
            <a href="create.php" style="font-size: 1.5rem;" class="btn btn-success">Nova Livraria</a>
        </p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <!--<th scope="col">Id</th>-->
                    <th scope="col" style="font-size: 20px; border: 2px solid black">Site</th>
                    <th scope="col" style="font-size: 20px; border: 2px solid black;">Livrarias</th>
                    <th scope="col" style="font-size: 20px; border: 2px solid black;">Endereço</th>
                    <th scope="col" style="font-size: 20px; border: 2px solid black;">Telefone</th>
                    <th scope="col" style="font-size: 20px; border: 2px solid black;">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'banco.php';
                $pdo = Banco::conectar();
                $sql = 'SELECT id, Nome, Endereco, Telefone, Site, Logo FROM livrarias ORDER BY ID ASC';

                foreach($pdo->query($sql)as $row)
                {
                    echo '<tr>';
                    echo '<td>';
                    //echo '<th scope="row">'. $row['id'] . '</th>';
                    echo '<a href="'.$row['Site'].'">';
                    echo '<img src="'.$row['Logo'].'"style="width: 250px; height: 200px;">';
                    echo '</a>';
                    echo '</td>';
                    echo '<td style="font-size: 20px; border: 2px solid black">'. $row['Nome'] . '</td>';
                    echo '<td style="font-size: 20px; border: 2px solid black">'. $row['Endereco'] . '</td>';
                    if( preg_match( '/^(\d{2})(\d{4})(\d{4})$/', $row['Telefone'],  $matches ) )
                    {
                        $row['Telefone'] = '('.$matches[1].') ' .$matches[2] . '-' . $matches[3];
                    }
                    echo '<td style="font-size: 20px; border: 2px solid black">'. $row['Telefone'] . '</td>';
                    echo '<td class="action-cell" width=250>';
                    echo '<a class="btn btn-warning" href="update.php?id='.$row['id'].'">Editar</a>';
                    echo ' ';
                    echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Excluir</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                Banco::desconectar();
                ?>
            </tbody>
        </table>
    </div>

    <script src="assets/js/script.js"></script>

    <div class="social-icons">
        <ul>
            <!-- <li><a href="#"><i class="fa fa-facebook"></i></a></li> -->
            <li><a href="https://twitter.com/killerKSBR?t=NZAdY-ROaIcEkLUXmTEArQ&s=09"><i class="fa fa-twitter"></i></a>
            </li>
            <li><a href="https://br.linkedin.com/in/breno-bathemarque-a43961190"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="https://instagram.com/brenobathemarque?igshid=MzNlNGNkZWQ4Mg=="><i
                        class="fa fa-instagram"></i></a></li>
        </ul>
    </div>

    <script>
        function openTab(event, tabName) {
            // Fecha todas as abas
            var tabcontents = document.getElementsByClassName("tabcontent");
            for (var i = 0; i < tabcontents.length; i++) {
                tabcontents[i].style.display = "none";
            }

            // Remove a classe "active" de todos os botões de aba
            var tablinks = document.getElementsByClassName("tablinks");
            for (var i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }

            // Exibe a aba selecionada
            document.getElementById(tabName).style.display = "block";

            // Adiciona a classe "active" ao botão de aba clicado
            event.currentTarget.classList.add("active");

            // Rola a página até o início
            document.getElementById("pagina").scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>

</body>

</html>
