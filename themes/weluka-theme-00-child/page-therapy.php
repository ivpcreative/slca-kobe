<?php
/**
 * The page template file.
 *Template Name:therapy
 * @package Weluka
 * @since Weluka Theme 00 1.0
 * 　
 */
get_header();

global $weluka_themename;

/* ボタンを変数化*/
$terapybtn = <<<EOT
<div id="" class="weluka-section " style="s-therapybtn">
	<div class="weluka-container clearfix">
		<div id="" class="weluka-row clearfix ">
			<div id="" class="weluka-col weluka-col-md-12 ">
				<div id="" class="weluka-row clearfix ">
					<div id="" class="weluka-col weluka-col-md-12 ">
						<div id="" class="weluka-button weluka-content weluka-text-left "><a href="#" class="js-therapy-sum weluka-btn weluka-btn-default btn-lg therapybtn therapybtn-def">概要</a>
						</div>
						<div id="" class="weluka-button weluka-content weluka-text-left "><a href="#" class="js-therapy-detail weluka-btn weluka-btn-default btn-lg therapybtn therapybtn-def">詳細</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
EOT;

echo $terapybtn ;
?>


<?php
if ( have_posts() ) :
	get_template_part( 'content', get_post_format() );
else:
	get_template_part( 'content', 'none' );

endif;
echo $terapybtn
?>
<div id="" class="weluka-section " style="s-therapy-webbtn">
	<div class="weluka-container clearfix">    
		<div id="" class="weluka-row clearfix ">
			<div id="" class="weluka-col weluka-col-md-12 ">
				<div id="" class="weluka-button weluka-content weluka-text-center "><a href="#" class="weluka-btn weluka-btn-default">WEB予約へ</a>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
jQuery(function () {
    var pathname = location.pathname;
    var therapyDetail = ""
    var therapySum = ""
    if(pathname.indexOf('-sum')!=-1){
        /*URLに'-sum'が含まれている*/
        jQuery(".js-therapy-sum").addClass("therapybtn-current");
        therapyDetail = pathname.replace('-sum', '');
        therapySum = pathname;
    }else{
        /*URLに'-sum'が含まれていない*/
        jQuery(".js-therapy-detail").addClass("therapybtn-current");
        therapyDetail = pathname;
        var varSlash = pathname.split('/');
        var splitMax = varSlash.length;
        if(splitMax > 1 ){
        therapySum = pathname.replace(varSlash[splitMax - 2] , varSlash[splitMax - 2] + '-sum');
            } 
    }
    jQuery(".js-therapy-detail").attr("href", therapyDetail);
    jQuery(".js-therapy-sum").attr("href", therapySum);

});
</script>

<?php
get_footer();
?>
