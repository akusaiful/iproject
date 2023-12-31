@extends('layouts.main')

@section('content')
    @php
        $gridData = [
            'dataProvider' => $dataProvider,
            'title' => 'Pengurusan Mesyurat JPICT',
            'useFilters' => true,
            'columnFields' => [
                [
                    'attribute' => 'id',
                    'htmlAttributes' => [
                        'width' => '5%', 
                        'style' => 'text-align:center'
                    ],
                    'format' => [
                        'htmlAttributes' => [
                            'class' => 'text-center'
                        ]
                    ]
                ],
                'tahun',
                'bil',
                'tarikh',
                'tempat',
                [
                    'label' => 'Actions', // Optional
                    'class' => Itstructure\GridView\Columns\ActionColumn::class, // Required
                    'actionTypes' => [
                        // Required
                        'view',
                        'edit',
                        // 'delete' => function ($data) {
                        //     return route('mesyuarat.delete', $data);
                        //     // return '/admin/pages/' . $data->id . '/edit';
                        // },
                        // 'delete',
                        [
                            'class' => Itstructure\GridView\Actions\Delete::class, // Required
                            'url' => function ($data) {
                                // Optional
                                return route('mesyuarat.destroy', $data);
                            },
                            'htmlAttributes' => [
                                // Optional
                                'target' => '_blank',
                                'style' => 'color: yellow; font-size: 16px;',
                                'onclick' => 'return window.confirm("Are you sure you want to delete?");',
                            ],
                        ],
                    ],
                ],
            ],
        ];
    @endphp

    <a href="{{ route('mesyuarat.create') }}" class="btn btn-primary">Daftar Mesyuarat</a>

    @gridView($gridData)
@endsection
