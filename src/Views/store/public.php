<?php
// Este arquivo contém a view pública da loja, onde os clientes podem visualizar serviços e agendar atendimentos.

// Inclui o layout principal
include_once '../layouts/main.php';

// Aqui você pode adicionar a lógica para buscar os serviços disponíveis da loja
// e exibi-los para o cliente.

?>

<div class="store-public">
    <h1>Bem-vindo à nossa loja!</h1>
    <p>Confira nossos serviços e agende um atendimento.</p>

    <div class="services">
        <!-- Aqui você pode iterar sobre os serviços e exibi-los -->
        <?php foreach ($services as $service): ?>
            <div class="service">
                <h2><?php echo htmlspecialchars($service['nome']); ?></h2>
                <p><?php echo htmlspecialchars($service['descricao']); ?></p>
                <p>Preço: R$ <?php echo number_format($service['preco'], 2, ',', '.'); ?></p>
                <a href="agendar.php?servico_id=<?php echo $service['id']; ?>" class="btn-agendar">Agendar</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
// Inclui o rodapé do layout
include_once '../layouts/footer.php';
?>