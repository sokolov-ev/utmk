<?php



    Route::get('/metallokonstruktsii', ['as' => 'metallokonstruktsii', 'uses' => 'Frontend\IndexController@metallokonstruktsii']);
    Route::get('/modulnye-soorujeniya', ['as' => 'modulnye-soorujeniya', 'uses' => 'Frontend\IndexController@modulnyeSoorujeniya']);
    Route::get('/otsinkovannye-rulony', ['as' => 'otsinkovannye-rulony', 'uses' => 'Frontend\IndexController@otsinkovannyeRulony']);
    Route::get('/metall-iz-evropy', ['as' => 'metall-iz-evropy', 'uses' => 'Frontend\IndexController@metallIzEvropy']);
    Route::get('/armatura', ['as' => 'armatura', 'uses' => 'Frontend\IndexController@armatura']);
    Route::get('/balka-dvutavr', ['as' => 'balka-dvutavr', 'uses' => 'Frontend\IndexController@balkaDvutavr']);
    Route::get('/katanka', ['as' => 'katanka', 'uses' => 'Frontend\IndexController@katanka']);
    Route::get('/kvadrat', ['as' => 'kvadrat', 'uses' => 'Frontend\IndexController@kvadrat']);
    Route::get('/krug', ['as' => 'krug', 'uses' => 'Frontend\IndexController@krug']);
    Route::get('/polosa', ['as' => 'polosa', 'uses' => 'Frontend\IndexController@polosa']);
    Route::get('/rels', ['as' => 'rels', 'uses' => 'Frontend\IndexController@rels']);
    Route::get('/ugolok', ['as' => 'ugolok', 'uses' => 'Frontend\IndexController@ugolok']);
    Route::get('/shveller', ['as' => 'shveller', 'uses' => 'Frontend\IndexController@shveller']);
    Route::get('/shestigrannik', ['as' => 'shestigrannik', 'uses' => 'Frontend\IndexController@shestigrannik']);
    Route::get('/staltrub', ['as' => 'staltrub', 'uses' => 'Frontend\IndexController@staltrub']);
    Route::get('/truby-kotelnye', ['as' => 'truby-kotelnye', 'uses' => 'Frontend\IndexController@trubyKotelnye']);
    Route::get('/pokovka', ['as' => 'pokovka', 'uses' => 'Frontend\IndexController@pokovka']);
    Route::get('/list-hardox', ['as' => 'list-hardox', 'uses' => 'Frontend\IndexController@listHardox']);
    Route::get('/list-stalnoj', ['as' => 'list-stalnoj', 'uses' => 'Frontend\IndexController@listStalnoj']);
    Route::get('/shveller-gnutyj', ['as' => 'shveller-gnutyj', 'uses' => 'Frontend\IndexController@shvellerGnutyj']);
    Route::get('/ugolok-gnutyj', ['as' => 'ugolok-gnutyj', 'uses' => 'Frontend\IndexController@ugolokGnutyj']);
    Route::get('/z-obraznyj-profil', ['as' => 'z-obraznyj-profil', 'uses' => 'Frontend\IndexController@obraznyjProfil']);