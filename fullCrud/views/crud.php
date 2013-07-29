<?php $models = $this->getModels(); ?>
<div class="row">
    <?php echo $form->labelEx($model, 'model'); ?>
    <?php
    $form->widget(
        'zii.widgets.jui.CJuiAutoComplete',
        array(
             'model'       => $model,
             'attribute'   => 'model',
             'source'      => array_keys($models),
             'options'     => array(
                 'delay' => 100,
                 'focus' => 'js:function(event,ui){
                $(this).val($(ui.item).val());
                $(this).trigger(\'change\');
                }',
             ),
             'htmlOptions' => array(
                 'size' => '65',
             ),
        )
    );
    ?>
    <div class="tooltip">
        Model class is case-sensitive. It can be either a class name (e.g. <code>Post</code>)
        or the path alias of the class file (e.g. <code>application.models.Post</code>).
        Note that if the former, the class must be auto-loadable.
    </div>
    <?php echo $form->error($model, 'model'); ?>
</div>

<div class="row sticky">
    <?php echo $form->labelEx($model, 'baseControllerClass'); ?>
    <?php echo $form->textField($model, 'baseControllerClass', array('size' => 65)); ?>
    <div class="tooltip">
        This is the class that the new CRUD controller class will extend from.
        Please make sure the class exists and can be autoloaded.
    </div>
    <?php echo $form->error($model, 'baseControllerClass'); ?>
</div>

<div class="row sticky">
    <?php echo $form->labelEx($model, 'moduleName'); ?>
    <?php echo $form->dropDownList($model, 'moduleName', array_combine(array_keys(Yii::app()->getModules()),array_keys(Yii::app()->getModules())), array('empty'=>'none')); ?>
    <div class="tooltip">
        Just a prefix for your controllers eg. 'crud'.
    </div>
    <?php echo $form->error($model, 'moduleName'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'controller'); ?>
    <?php echo $form->textField($model, 'controller', array('size' => 65)); ?>
    <div class="tooltip">
        Controller ID is case-sensitive. CRUD controllers are often named after
        the model class name that they are dealing with. Below are some examples:
        <ul>
            <li><code>post</code> generates <code>PostController.php</code></li>
            <li><code>postTag</code> generates <code>PostTagController.php</code></li>
            <li><code>admin/user</code> generates <code>admin/UserController.php</code></li>
        </ul>
    </div>
    <?php echo $form->error($model, 'controller'); ?>
</div>

<div class="row wide">
    <?php echo $form->labelEx($model, 'identificationColumn'); ?>
    <?php echo $form->textField(
        $model,
        'identificationColumn',
        array(
             'size' => 65
        )
    );
    ?>
    <div class="tooltip">
        If you specify a column here, the generated <br/> C-R-U-D Pages will be
        generated with URLs that uses the corresponding column as identification.
        Leave it empty or stick to the PK (default) column of the model to use the
        traditional identification via PK.
        For example, entering <code>title</code> as identification Column, a
        post would be associated with <code>index.php/post/title-of-the-post</code>
        instead of <code>index.php?r=post/view&amp;id=5</code>.
        Ready to use url rules for Yii's CUrlManager will be generated and shown
        after the generation.
        Please make sure that identificationColumnValidator is applied to the
        column. If the model has been generated by FullModel, this is already done
        automatically.
    </div>
    <?php echo $form->error($model, 'identificationColumn'); ?>
</div>

<div class="row wide">
    <?php echo $form->labelEx($model, 'messageCatalog'); ?>
    <?php echo $form->textField(
        $model,
        'messageCatalog',
        array(
             'size' => 65
        )
    );
    ?>
    <div class="tooltip">
        Message catalog for CRUD hints and labels.
    </div>
    <?php echo $form->error($model, 'identificationColumn'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'validation'); ?>
    <?php
    echo $form->dropDownList(
        $model,
        'validation',
        array(
            3 => 'Enable Ajax and Client-side Validation',
            2 => 'Enable Client Validation',
            1 => 'Enable Ajax Validation',
            0 => 'Disable ajax Validation'
        )
    );
    ?>
    <div class="tooltip">
        Enables instant Validation of input fields via Yii's form Generator and ajax
        requests after blur() on the field. Since Yii 1.1.7 you can also enable
        client-side validation for most of the validation rules
    </div>
    <?php echo $form->error($model, 'validation'); ?>
</div>

<h3>Slim Code Template specific</h3>

<fieldset>

    <div class="row">
        <?php
        echo $form->labelEx($model, 'authTemplateSlim');
        echo $form->dropDownList($model, 'authTemplateSlim', $this->getAuthTemplates('slim'));
        ?>
        <div class="tooltip">
            The Authentication method to be used in the Controller. Yii access Control is the
            default accessControl of Yii using the Controller accessRules() method. No access
            Control provides no Access control.
        </div>
        <?php echo $form->error($model, 'authTemplateSlim'); ?>
    </div>

</fieldset>

<h3>Hybrid Code Template specific</h3>

<fieldset>

<div class="row">
    <?php
    echo $form->labelEx($model, 'authTemplateHybrid');
    echo $form->dropDownList($model, 'authTemplateHybrid', $this->getAuthTemplates('hybrid'));
    ?>
    <div class="tooltip">
        The Authentication method to be used in the Controller. Yii access Control is the
        default accessControl of Yii using the Controller accessRules() method. No access
        Control provides no Access control.
    </div>
    <?php echo $form->error($model, 'authTemplateHybrid'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'formOrientation'); ?>
    <?php
    echo $form->dropDownList(
        $model,
        'formOrientation',
        array(
            'horizontal' => 'Horizontal',
            'vertical'   => 'Vertical',
        )
    );
    ?>
    <div class="tooltip">
        Valid for "Hybrid" template only. Determines the "type" attribute for the update forms. See <?php CHtml::link(
            'http://yiibooster.clevertech.biz/components.html#forms'
        ); ?> for an example.
    </div>
    <?php echo $form->error($model, 'formOrientation'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($model, 'textEditor'); ?>
    <?php
    echo $form->dropDownList(
        $model,
        'textEditor',
        array(
            'textarea'       => 'Plain Text Area',
            'redactor'       => 'Redactor WYSIWYG',
            'html5Editor'    => 'Bootstrap WYSIHTML5',
            'ckEditor'       => 'CKEditor WYSIWYG',
            'markdownEditor' => 'Markdown Editor',
        )
    );
    ?>
    <div class="tooltip">
        Valid for "Hybrid" template only. Determines the type of field used for TEXT-type fields. See <?php CHtml::link(
            'http://yiibooster.clevertech.biz/components.html#forms'
        ); ?> for a demo of the different editors.
    </div>
    <?php echo $form->error($model, 'textEditor'); ?>
</div>

</fieldset>

<h3>Legacy Code Template specific</h3>

<fieldset>

<div class="row">
    <?php
    echo $form->labelEx($model, 'authTemplate');
    echo $form->dropDownList($model, 'authTemplate', $this->getAuthTemplates('legacy'));
    ?>
    <div class="tooltip">
        The Authentication method to be used in the Controller. Yii access Control is the
        default accessControl of Yii using the Controller accessRules() method. No access
        Control provides no Access control.
    </div>
    <?php echo $form->error($model, 'authTemplate'); ?>
</div>

</fieldset>

<style>
    input.radio {
        display: inline !important;
    }
</style>
