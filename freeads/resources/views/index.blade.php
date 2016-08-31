<?php $unreadM = count(DB::table('messages')->where("id_recipient", Session::get('id'))->where("seen", 0)->get()); ?>    
<!DOCTYPE html>
<html>
    <head>
        <title>Free ads</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        {{ Html::style('style.css') }}
    </head>
    <body>

    @if(!empty(Session::get('username')))
        <h3 id="username">{{ Session::get('username') }}</h3>
    @endif    
         
    <div id="container">
    <div id="menu">
        <?php if(!is_null(Session::get('username'))) : ?>
            {{ Html::link('logout', 'logout') }}
            {{ Html::link('account', 'My account') }}
            {{ Html::link('ads/new', 'New ads') }}
            {{ Html::link('ads/list', 'All ads') }}
            {{ Html::link('ads/edit', 'My ads') }}
            {{ Html::link('ads/search', 'Search') }}
            {{ Html::link('mail', "Mail ($unreadM)") }}
        <?php else : ?>
            {{ Html::link('signin', 'signin') }}
            {{ Html::link('home', 'home') }}
        <?php endif; ?>
        </div>
        @yield('content')
    </div>    
    </body>
</html>
