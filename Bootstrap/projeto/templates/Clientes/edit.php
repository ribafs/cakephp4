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
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cliente->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id), 'class' => 'btn btn-danger btn-sm']
            ) ?>
            <?= $this->Html->link(__('Lista de Clientes'), ['action' => 'index'], ['class' => 'btn btn-warning btn-sm']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="clientes form content">
            <?= $this->Form->create($cliente) ?>
            <fieldset>
                <legend><?= __('Edit Cliente') ?></legend>
                <?php
                    echo $this->Form->control('nome', ['class'=>'form-control']);
                    echo $this->Form->control('email', ['class'=>'form-control']);
                    echo $this->Form->control('created_at', ['empty' => true, 'class'=>'form-control']);
                    echo $this->Form->control('updated_at', ['empty' => true, 'class'=>'form-control']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class'=>'btn btn-primary btn-sm']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
</div>
