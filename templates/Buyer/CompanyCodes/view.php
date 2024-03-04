<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompanyCode $companyCode
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Company Code'), ['action' => 'edit', $companyCode->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Company Code'), ['action' => 'delete', $companyCode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companyCode->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Company Codes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Company Code'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="companyCodes view content">
            <h3><?= h($companyCode->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Code') ?></th>
                    <td><?= h($companyCode->code) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($companyCode->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($companyCode->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($companyCode->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Added Date') ?></th>
                    <td><?= h($companyCode->added_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated Date') ?></th>
                    <td><?= h($companyCode->updated_date) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Account Groups') ?></h4>
                <?php if (!empty($companyCode->account_groups)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Added Date') ?></th>
                            <th><?= __('Updated Date') ?></th>
                            <th><?= __('Company Code Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($companyCode->account_groups as $accountGroups) : ?>
                        <tr>
                            <td><?= h($accountGroups->id) ?></td>
                            <td><?= h($accountGroups->code) ?></td>
                            <td><?= h($accountGroups->name) ?></td>
                            <td><?= h($accountGroups->status) ?></td>
                            <td><?= h($accountGroups->added_date) ?></td>
                            <td><?= h($accountGroups->updated_date) ?></td>
                            <td><?= h($accountGroups->company_code_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'AccountGroups', 'action' => 'view', $accountGroups->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'AccountGroups', 'action' => 'edit', $accountGroups->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'AccountGroups', 'action' => 'delete', $accountGroups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accountGroups->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Payment Terms') ?></h4>
                <?php if (!empty($companyCode->payment_terms)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Added Date') ?></th>
                            <th><?= __('Updated Date') ?></th>
                            <th><?= __('Company Code Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($companyCode->payment_terms as $paymentTerms) : ?>
                        <tr>
                            <td><?= h($paymentTerms->id) ?></td>
                            <td><?= h($paymentTerms->code) ?></td>
                            <td><?= h($paymentTerms->description) ?></td>
                            <td><?= h($paymentTerms->status) ?></td>
                            <td><?= h($paymentTerms->added_date) ?></td>
                            <td><?= h($paymentTerms->updated_date) ?></td>
                            <td><?= h($paymentTerms->company_code_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PaymentTerms', 'action' => 'view', $paymentTerms->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PaymentTerms', 'action' => 'edit', $paymentTerms->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PaymentTerms', 'action' => 'delete', $paymentTerms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $paymentTerms->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Purchasing Organizations') ?></h4>
                <?php if (!empty($companyCode->purchasing_organizations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Company Code Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Added Date') ?></th>
                            <th><?= __('Updated Date') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($companyCode->purchasing_organizations as $purchasingOrganizations) : ?>
                        <tr>
                            <td><?= h($purchasingOrganizations->id) ?></td>
                            <td><?= h($purchasingOrganizations->code) ?></td>
                            <td><?= h($purchasingOrganizations->company_code_id) ?></td>
                            <td><?= h($purchasingOrganizations->name) ?></td>
                            <td><?= h($purchasingOrganizations->status) ?></td>
                            <td><?= h($purchasingOrganizations->added_date) ?></td>
                            <td><?= h($purchasingOrganizations->updated_date) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'PurchasingOrganizations', 'action' => 'view', $purchasingOrganizations->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'PurchasingOrganizations', 'action' => 'edit', $purchasingOrganizations->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'PurchasingOrganizations', 'action' => 'delete', $purchasingOrganizations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchasingOrganizations->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Reconciliation Accounts') ?></h4>
                <?php if (!empty($companyCode->reconciliation_accounts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Added Date') ?></th>
                            <th><?= __('Updated Date') ?></th>
                            <th><?= __('Company Code Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($companyCode->reconciliation_accounts as $reconciliationAccounts) : ?>
                        <tr>
                            <td><?= h($reconciliationAccounts->id) ?></td>
                            <td><?= h($reconciliationAccounts->code) ?></td>
                            <td><?= h($reconciliationAccounts->name) ?></td>
                            <td><?= h($reconciliationAccounts->status) ?></td>
                            <td><?= h($reconciliationAccounts->added_date) ?></td>
                            <td><?= h($reconciliationAccounts->updated_date) ?></td>
                            <td><?= h($reconciliationAccounts->company_code_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'ReconciliationAccounts', 'action' => 'view', $reconciliationAccounts->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'ReconciliationAccounts', 'action' => 'edit', $reconciliationAccounts->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'ReconciliationAccounts', 'action' => 'delete', $reconciliationAccounts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reconciliationAccounts->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Schema Groups') ?></h4>
                <?php if (!empty($companyCode->schema_groups)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Code') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Added Date') ?></th>
                            <th><?= __('Updated Date') ?></th>
                            <th><?= __('Company Code Id') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($companyCode->schema_groups as $schemaGroups) : ?>
                        <tr>
                            <td><?= h($schemaGroups->id) ?></td>
                            <td><?= h($schemaGroups->code) ?></td>
                            <td><?= h($schemaGroups->name) ?></td>
                            <td><?= h($schemaGroups->status) ?></td>
                            <td><?= h($schemaGroups->added_date) ?></td>
                            <td><?= h($schemaGroups->updated_date) ?></td>
                            <td><?= h($schemaGroups->company_code_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'SchemaGroups', 'action' => 'view', $schemaGroups->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'SchemaGroups', 'action' => 'edit', $schemaGroups->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'SchemaGroups', 'action' => 'delete', $schemaGroups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schemaGroups->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
