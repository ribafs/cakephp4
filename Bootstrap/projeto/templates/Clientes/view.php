<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<div class="container">
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h3><?= __('Ações') ?></h3>
            <?= $this->Html->link(__('Editar Cliente'), ['action' => 'edit', $cliente->id], ['class' => 'btn btn-info btn-sm']) ?>
            <?= $this->Form->postLink(__('Excluir Cliente'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id), 'class' => 'btn btn-danger btn-sm']) ?>
            <?= $this->Html->link(__('List Clientes'), ['action' => 'index'], ['class' => 'btn btn-warning btn-sm']) ?>
            <?= $this->Html->link(__('New Cliente'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clientes view content">
            <h3><?= h($cliente->id) ?></h3>
            <table class="table table-hover table-sm">
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($cliente->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($cliente->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($cliente->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($cliente->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($cliente->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</div>
