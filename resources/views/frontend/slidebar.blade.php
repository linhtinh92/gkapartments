<div class="column" id="ja-right">
    <div class="ja-moduletable moduletable clearfix">
        <!-- Template Start: site/home/WrapNotify -->
        <div class="title-right">
            Thông tin mới
        </div>
        <div class="conten-noibat">
            <ul class="latestnews" style="margin:1px 0;">
                @foreach($viewshare['listHotNews'] as $hotNews)
                    <?php
                    $category = $hotNews->category();
                    ?>
                <li class="latestnews">
                    <a class="latestnews" href="{{route ( 'web.detailnews', [ $category->slug, $hotNews->slug ] )}}" title="{{$hotNews->title}}">
                        {{$hotNews->title}}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <!-- Template End: site/home/WrapNotify -->
        <!-- Template Start: site/common/WrapVideo -->
        <div class="video">
            <div class="fb-page fb_iframe_widget" data-href="https://www.facebook.com/trangbanghighschool/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="adapt_container_width=true&amp;app_id=1527164294170956&amp;container_width=256&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Ftrangbanghighschool%2F&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false"><span style="vertical-align: bottom; width: 256px; height: 230px;"><iframe name="f13e2532e4c01" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:page Facebook Social Plugin" src="https://www.facebook.com/v2.5/plugins/page.php?adapt_container_width=true&amp;app_id=1527164294170956&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FP5DLcu0KGJB.js%3Fversion%3D42%23cb%3Df174db44146c408%26domain%3Dthpttrangbang.com%26origin%3Dhttp%253A%252F%252Fthpttrangbang.com%252Ff7bdc56ba5419c%26relation%3Dparent.parent&amp;container_width=256&amp;hide_cover=false&amp;href=https%3A%2F%2Fwww.facebook.com%2Ftrangbanghighschool%2F&amp;locale=vi_VN&amp;sdk=joey&amp;show_facepile=true&amp;small_header=false" style="border: none; visibility: visible; width: 256px; height: 230px;" class=""></iframe></span></div>
        </div>
        <!-- Template End: site/common/WrapVideo -->
    </div>
</div>
<div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="fb_xdm_frame_http" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_http" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="http://staticxx.facebook.com/connect/xd_arbiter/r/P5DLcu0KGJB.js?version=42#channel=f7bdc56ba5419c&amp;origin=http%3A%2F%2Fthpttrangbang.com" style="border: none;"></iframe><iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="https://staticxx.facebook.com/connect/xd_arbiter/r/P5DLcu0KGJB.js?version=42#channel=f7bdc56ba5419c&amp;origin=http%3A%2F%2Fthpttrangbang.com" style="border: none;"></iframe></div></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div></div></div></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=1527164294170956";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>