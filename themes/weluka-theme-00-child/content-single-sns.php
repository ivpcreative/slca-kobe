
<?php
/*
Template Name:content-single-sns
*/
?>
<?php //SNS
  $article_url = get_permalink(); // 記事のURL
  $article_title = wp_title( ' | ', false, 'right' ) . get_bloginfo('name'); // 記事のタイトル
  $article_url_encode = urlencode($article_url); // 記事URLエンコード
  $article_title_encode = urlencode($article_title.""); // 記事タイトルエンコード
  
  $url_encode=urlencode(get_permalink());
  $title_encode=urlencode(get_the_title());
$tw_title_encode=urlencode(get_the_title()."");
  
?>
<div class="share-btns">
  <ul class="cf">
    <li class="share-btns-item">
      <a href="http://www.facebook.com/sharer.php?src=bm&u=<?php echo $url_encode;?>&t=<?php echo $article_title;?>" target="_blank" class="share-btn fb"><i class="fa fa-facebook"></i> シェア</a>
    </li>
    <li class="share-btns-item">
      <a href="http://twitter.com/intent/tweet?url=<?php echo $url_encode ?>&text=<?php echo $article_title_encode ?>" target="_blank"  class="share-btn twitter"><i class="fa fa-twitter"></i> ツィート</a>
    </li>

  </ul>
</div>
