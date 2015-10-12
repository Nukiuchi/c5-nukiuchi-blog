<?php defined('C5_EXECUTE') or die(_('Access denied.')); ?>

<div class="container">
    <div class="page-header">
        <?php if ($blog): ?>
            <h1><?= $blog ?></h1>
        <?php else: ?>
            <h1><?= t('Empty blog'); ?></h1>
        <?php endif; ?>
    </div>
    <?php if ($c->isEditMode()): ?>
        <div class="panel">
            <?php if (!$blog): ?>
                <div class="panel-heading object"><h3><?= t('Add blog') ?></h3></div>
                <div class="panel-body">
                    <form method="POST" action="<?= $this->action('add_blog') ?>" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="name"><?= t('Name') ?></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="descr"><?= t('Description') ?></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="descr" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-3">
                                <input class="btn object" type="submit" value="<?= t('Create') ?>" />
                            </div>
                        </div>
                    </form>
                </div>
            <?php else: ?>
                <h2><?= t('Edit blog') ?></h2>
                <div>TODO: Create some awesome Edit form here.</div>
                <button class="btn object">It's a button!</button>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <?php
        if (!isset($entries) && $debug) {
            $entries = array(
                array('title' => 'Entry Test One',
                    'content' => 'Some test Content.'),
                array('title' => 'Second Entry',
                    'content' => 'Moar content I just made up.'));
        }
        foreach ($entries as $entry):
            ?>
            <div>
                <h3><?= $entry['title'] ?></h3>
                <p><?= $entry['content'] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>