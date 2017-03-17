/*
sub-common-js.js
共通使用するるJS
*/

/*load時にKICK*/
jQuery(function () {

    jQuery('.animation2').css('visibility', 'hidden'); //スクロールアニメーションのパーツを非表示
    CommonSubObj = new CommonSubJs();
    CommonSubObj.PageTop();

    var spMode = CommonSubObj.getBlnSp(); //true false の判定をしているが、実処理はこの中ファンクション内で実施しなければならない。

    //レスポンシブにてイメージマップのリンクずれを自動修正する
    jQuery('img[usemap]').rwdImageMaps();

});
/*end.load時にkick*/
/*

$win.on('load resize', function () {
    if (window.matchMedia('(min-width: 768px)').matches) {
        // PCの処理
        jQuery(".home-bottom-text").fixHeightSimple();//行の高さをそろえる(jquery-fixHeightSimple.js)
    } else {
        // SP,TABの処理
    }
});

*/
/* スクロールアニメーション([.animation] と定義したブロックがスクロール時にふわっと表示)*/
var $win = jQuery(window);
//jQuery(window).scroll(function () {
$win.on('scroll ', function () {
    var windowHeight = jQuery(window).height(),
        topWindow = jQuery(window).scrollTop();
    jQuery('.animation2').each(function () {
        var targetPosition = jQuery(this).offset().top;
        if (topWindow > targetPosition - windowHeight + 100) {
            jQuery(this).addClass("fadeInDown");
        }
    });
});
/* end.スクロールアニメーション*/



/* CommonSubJsオブジェクト生成コンストラクタ */
var CommonSubJs = function () {
        //■page topボタン
        /* 以下のHTML をフッターの一番下に追加。別途CSSは sub-common-style.css に記載済
        <p id="pageTop"><a href="#"><i class="fa fa-chevron-up"></i></a></p> 
        */
        this.PageTop = function () {
                var topBtn = jQuery('#pageTop');
                topBtn.hide();
                //◇ボタンの表示設定
                jQuery(window).scroll(function () {
                    //画面下位置を取得
                    var currentPos = jQuery(this).scrollTop()
                    var bottomPos = jQuery(document).height() - jQuery(window).height() - 200;
                    if (currentPos > 250 && currentPos < bottomPos) {
                        //---- 画面が特定の範囲内にスクロールするとボタン表示
                        topBtn.fadeIn();
                    } else {

                        //---- ボタン非表示
                        topBtn.fadeOut();
                    }
                });
                // ◇ボタンをクリックしたら、スクロールして上に戻る
                topBtn.click(function () {
                    jQuery('body,html').animate({
                        scrollTop: 0
                    }, 700);
                    return false;
                });
            }
            //end. ■page topボタン

        /*sp判定(768をブレイクポイント)*/
        this.getBlnSp = function () {
                var $win = jQuery(window);

                $win.on('load resize', function () {
                    if (window.matchMedia('(min-width: 768px)').matches) {
                        // PCの処理
                        return false;
                    } else {
                        // SP,TABの処理
                        CommonSubObj.moveSearch(); //リサイズ判定の中で実行しなければ、いつサイズが取れるか分からないので実行されない。
                        return true;
                    }
                });
            }
            /*end sp判定*/
        
        /*PCの検索ウィンドウをスマホのハンバーガーメニューに追加*/
        this.moveSearch = function () { //存在チェック
            if(jQuery('.search-form').length && jQuery('.js-movesearch').length == 0){ //検索ウィンドウの存在チェックかつ、2回追加しない
                var search = jQuery(".search-form").prop('outerHTML');
                jQuery("#err_name-mei").before(search);
                jQuery('ul#menu-menu-navi').prepend('<li class="js-movesearch menu-item menu-item-type-custom menu-item-object-custom">'+ search +'</li>');
                }
            }
            /* moveSearch*/
        

    } //end.subJs