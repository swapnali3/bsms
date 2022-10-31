<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Supplier Management';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake', 'home']) ?>

    <script>
        var baseUrl = '<?= $this->Url->build('/') ?>';
    </script>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
</head>
<body>
    <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>">
                Supplier Management
            </a>
        </div>
        <?php if(isset($logged_in)) : ?>
            <div class="top-nav-links">
            Welcome, <Span><?= $username ?></span>
            |
            <a target="_self" rel="noopener" href="<?= $this->Url->build('/') ?>dealer/logout">Logout</a>
        </div>
        <?php else : ?>
        <div class="top-nav-links">
            <a target="_self" rel="noopener" href="<?= $this->Url->build('/') ?>dealer/login">Login</a>
            |
            <a target="_self" rel="noopener" href="<?= $this->Url->build('/') ?>dealer/registration">Sign Up</a>
        </div>
        <?php endif ?>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
    <?= $this->Html->script('http://code.jquery.com/jquery.min.js') ?>
    <?= $this->Html->script('common'); ?>
</body>
</html>
