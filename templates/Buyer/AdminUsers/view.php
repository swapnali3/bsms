<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdminUser $adminUser
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="adminUsers view content">
            <h3><?= h($adminUser->first_name . ' '. $adminUser->last_name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($adminUser->username) ?></td>
                </tr>
                
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $adminUser->status ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Login') ?></th>
                    <td><?= h($adminUser->last_login) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($adminUser->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($adminUser->updated_date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
