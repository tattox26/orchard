@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .menu-container {
            background-color: #333;
            padding: 1px 0;
        }
        .menu-container ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        .menu-container li {
            position: relative;
            margin: 0 15px;
        }
        .menu-container a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }
        .menu-container a:hover {
            background-color: #575757;
        }
        /* Estilos para el submenú */
        .menu-container .submenu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #444;
            padding: 10px 0;
            min-width: 150px;
        }
        .menu-container li:hover .submenu {
            display: block;
        }
        .submenu li {
            margin: 0;
        }
        .submenu a {
            padding: 8px 15px;
        }
        .submenu a:hover {
            background-color: #575757;
        }
    </style>
    <!-- Horizontal Menu with Submenus -->
    <div class="menu-container">
        <ul>
            @foreach($menus as $menu)
                <li>
                    <a href="{{ $menu->url }}">{{ $menu->name }}</a>
                    @if($menu->children->count())
                        <ul class="submenu">
                            @foreach($menu->children as $child)
                                <li><a onClick="changeIMG('{{ $menu->img }}')" href="{{ $child->url }}">{{ $child->name }}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div><br>
    <center><img  src=""  id="imagen" width="500px" height="300px"></center>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>       
    <script>
        function changeIMG(imagen){           
            $("#imagen").attr("src", "storage/"+imagen);
        }
    </script>
@endsection