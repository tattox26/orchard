@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .dd-handle {
            background: #f8f9fa;
            border: 1px solid #ddd;
            padding: 10px;
            cursor: move;
        }

        .dd-item > button {
            margin-left: 10px;
        }
    </style>
     <div class="container mt-4">
        <h1>Edit Menu</h1>

        <div class="dd" id="nestable">
            <ol class="dd-list">
                @foreach($menus as $menu)
                    <li class="dd-item" data-id="{{ $menu->id }}">
                        <div class="dd-handle">{{ $menu->name }}</div>
                        @if($menu->children->count())
                            <ol class="dd-list">
                                @foreach($menu->children as $child)
                                    <li class="dd-item" data-id="{{ $child->id }}">
                                        <div class="dd-handle">{{ $child->name }}</div>
                                    </li>
                                @endforeach
                            </ol>
                        @endif
                    </li>
                @endforeach
            </ol>
        </div>

        <button id="save-order" class="btn btn-primary mt-3">Save Order</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>

    <script>
        $(function() {
            $('#nestable').nestable({
                maxDepth: 3 // Define the maximum depth of nested elements
            });

            $('#save-order').on('click', function() {
                const order = $('#nestable').nestable('serialize');

                $.ajax({
                    url: '{{ route('menu.updateOrder') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    contentType: 'application/json',
                    data: JSON.stringify({ order: order }),
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
@endsection