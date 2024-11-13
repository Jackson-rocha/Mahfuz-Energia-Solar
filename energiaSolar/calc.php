<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculadora</title>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="logo.png" alt="logo-tipo">
            <p class="nome_empresa">Mahfuz Energia Solar </p>
        </div>
        <div class="nav">
            <ul>
                <li><a href="index.html">Blog</a></li>
                <li><a href="produtos.html">Produtos</a></li>
                <li><a href="calc.php">Calculadora</a></li>
                <li><a href="#">Contato</a></li>
            </ul>
        </div>
    </div>
        <div class="container">
            <h1>Simulador de Energia Solar</h1>
            <form method="POST">
                <label for="tipo">Tipo de Instalação</label>
                <select id="tipo" name="tipo">
                    <option value="residencial">Residencial</option>
                    <option value="empresarial">Empresarial</option>
                    <option value="agro">Agro</option>
                    <option value="semConexao">Sem Conexão</option>
                </select>
                
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco" placeholder="Insira o endereço" required>
                
                <label for="consumo">Gasto médio com a conta de luz (R$)</label>
                <input type="number" id="consumo" name="consumo" placeholder="Ex: 300" required>
                
                <button type="submit">Calcular</button>
            </form>
            
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $consumo = floatval($_POST['consumo']);
                $potenciaInstalada = round($consumo / 120, 2);
                $areaNecessaria = round($potenciaInstalada * 4.5, 2);
                $custoMinimo = round($potenciaInstalada * 2350, 2);
                $custoMaximo = round($potenciaInstalada * 2820, 2);
                $producaoMensal = round($potenciaInstalada * 119, 2);
                $economiaAnual = round($producaoMensal * 12 * 1.12, 2);
                $retornoInvestimento = round($custoMaximo / $economiaAnual, 1);
        
                echo "<div class='result'>";
                echo "<h2>Resultado</h2>";
                echo "<p><strong>Potência instalada:</strong> " . number_format($potenciaInstalada, 2, ',', '.') . " kWp</p>";
                echo "<p><strong>Área mínima necessária:</strong> " . number_format($areaNecessaria, 2, ',', '.') . " m²</p>";
                echo "<p><strong>Valor aproximado do sistema com instalação:</strong> R$ " . number_format($custoMinimo, 2, ',', '.') . " - R$ " . number_format($custoMaximo, 2, ',', '.') . "</p>";
                echo "<p><strong>Produção mensal:</strong> " . number_format($producaoMensal, 2, ',', '.') . " kWh</p>";
                echo "<p><strong>Economia anual aproximada:</strong> R$ " . number_format($economiaAnual, 2, ',', '.') . "</p>";
                echo "<p><strong>Tempo aproximado de retorno do investimento:</strong> Entre " . number_format($retornoInvestimento, 1, ',', '.') . " anos</p>";
                echo "</div>";
            }
            ?>
        </div>
        <div class="rodape">
        <footer>
            <ul>
                <li><a href="#">Política de Privacidade</a></li>
                <li><a href="#">Termos de Uso</a></li>
            </ul>
            <div class="socialmedia">
                <a href="#"><img src="facebook.png" alt="facebook"></a>
                <a href="#"><img src="instagram.png" alt="instagram"></a>
                <a href="#"><img src="twitter.png" alt="twitter"></a>
            </div>
            
        </footer>
        <p>&copy; 2021 Nome da Empresa. Todos os direitos reservados.</p>
    </div>
</body>
</html>