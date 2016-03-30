<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->arTransactions,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'hidden' => true],
        'transactionNumber',
        'transactionName',
        'date',
        'dueDate',
        'note',
        'amount',
        'fine',
        'additionalCost',
        'total',
        'status',
        'rejectReason',
        'last_updated_at',
        'last_updated_by',
        [
                'attribute' => 'arTransactionType.id',
                'label' => 'Ar Transaction Type'
        ],
        [
                'attribute' => 'arTransactionStatus.id',
                'label' => 'Ar Transaction Status'
        ],
        [
                'attribute' => 'arDunning.id',
                'label' => 'Ar Dunning'
        ],
        [
                'attribute' => 'arDocument.id',
                'label' => 'Ar Document'
        ],
        [
                'attribute' => 'company.id',
                'label' => 'Company'
        ],
        [
                'attribute' => 'arPayterm.id',
                'label' => 'Ar Payterm'
        ],
        [
                'attribute' => 'currency.id',
                'label' => 'Currency'
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'ar-transaction'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
