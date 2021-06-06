@include('bladeComps/home_head')
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T5RJKHN"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0" nonce="augJntma"></script>
<div id="app">
<div class="sequence">

    <div class="seq-preloader">
        <svg width="39" height="16" viewBox="0 0 39 16" xmlns="http://www.w3.org/2000/svg" class="seq-preload-indicator">
            <g fill="#F96D38">
                <path class="seq-preload-circle seq-preload-circle-1" d="M3.999 12.012c2.209 0 3.999-1.791 3.999-3.999s-1.79-3.999-3.999-3.999-3.999 1.791-3.999 3.999 1.79 3.999 3.999 3.999z"/>
                <path class="seq-preload-circle seq-preload-circle-2" d="M15.996 13.468c3.018 0 5.465-2.447 5.465-5.466 0-3.018-2.447-5.465-5.465-5.465-3.019 0-5.466 2.447-5.466 5.465 0 3.019 2.447 5.466 5.466 5.466z"/>
                <path class="seq-preload-circle seq-preload-circle-3" d="M31.322 15.334c4.049 0 7.332-3.282 7.332-7.332 0-4.049-3.282-7.332-7.332-7.332s-7.332 3.283-7.332 7.332c0 4.05 3.283 7.332 7.332 7.332z"/>
            </g>
        </svg>
    </div>

</div>

<div class="logo">
    <h1>Alex Olariu</h1>
    <h2>AO</h2>
</div>
<nav>
    <ul>
        <li><a href="#1"><img src="assets/images/icon-1.png" alt="Homepage"> <em>Homepage</em></a></li>
        <li><a href="#2"><img src="assets/images/icon-2.png" alt="About ME"> <em>About ME</em></a></li>
        <li><a href="#3"><img src="assets/images/icon-3.png" alt="MY Gallery"> <em>MY Gallery</em></a></li>
        <li><a href="#4"><img src="assets/images/icon-4.png" alt="Contact ME"> <em>Contact ME</em></a></li>
    </ul>
</nav>

<div class="slides">
    <div class="slide" id="1">
        <div id="slider-wrapper">
            <div id="image-slider">
                <ul>
                    <li class="active-img">
                        <div class="slide-caption">
                            <h2>Astrofotografie</h2>

                        </div>
                    </li>
                    <li>
                        <div class="slide-caption">
                            <h6>Peisaje</h6>
                            <h2>Rurale</h2>
                        </div>
                    </li>
                    <li>
                        <div class="slide-caption">
                            <h6>Peisaje</h6>
                            <h2>Urbane</h2>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="thumbnail">
                <ul>
                    <li class="active"><img src="storage/images/2-denoise1.jpg" alt="" /></li>
                    <li><img src="storage/images/DSC_3735.jpg" alt="" /></li>
                    <li><img src="storage/images/DSC_2608.jpg" alt="" /></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="slide" id="2">
        <div class="content second-content">
            <div id='tabs'>
                <ul>
                    <li><a href='#tabs-1'><span class='fa fa-users'></span></a></li>
                    <li><a href='#tabs-2'><span class='fa fa-users'></span></a></li>
                    <li><a href='#tabs-3'><span class='fa fa-users'></span></a></li>
                </ul>
                <section class='tabs-content'>
                    <article id='tabs-1'>
                        <h2>Cine am fost?</h2>
                        <p>Am terminat liceul in 2016 la Harlau cu note "mari", sa zicem :)))). Am urmat facultatea de Matematica din Iasi.</p>
                    </article>
                    <article id='tabs-2'>
                        <h2>Cine sunt?</h2>
                        <p>Sunt student la Master la facultatea de Matematica din Iasi.</p>
                        <p>Sunt programator la DUK-TECH.</p>
                         </article>
                    <article id='tabs-3'>
                        <h2>Cine voi fi?</h2>
                        <p>Daca iti place ceea ce fac imi poti da un mesaj de incurajare in sectiunea de Contact.</p>
                        <p>Daca chiar iti place ceea ce fac atunci te invit sa imi dai un mail pe olariudumitrualexandru@gmail.com pentru o colaborare.</p>
                         </article>
                </section>
            </div>
        </div>
    </div>
    <div class="slide" id="3">
        <div class="content third-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="owl-carousel owl-theme" id="galerie">
                           <!-- <galery-posts></galery-posts>-->
                             <?php
                        try{
                            $nr=count($post);
                            $to_wright="";
                        for ($i=$nr-1;$i>=0;$i--){

                            $url="./storage/".$post[$i]->url;
                            if(strlen($post[$i]->url_low_res)>1){
                                $url_to_show="./storage/".$post[$i]->url_low_res;
                            }else{
                                $url_to_show="./storage/".$post[$i]->url;
                            }
                            $full_post="./post/".$post[$i]->id;
                            $titlu=$post[$i]->title;
                            $to_wright=$to_wright.'<div class="col-md-12">
                                            <div class="featured-item">
                                                <a href="'.$full_post.'">
                                                    <img src="'.$url_to_show.'" alt="'.$post[$i]->alt.'">
                                                </a>
                                    <div class="down-content">
                                    <h4>'.$titlu.'</h4>
                                            </div>
                                        </div></div>';
                            }
                        }catch (Exception $exception){
                            \Illuminate\Support\Facades\Log::info($exception);
                        }
                                    echo $to_wright??"";

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slide" id="4">
        <div class="content fourth-content">
            <div class="container-fluid">
                <form id="contact" action="messages" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Say Hello!</h2>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <input name="email" type="text" class="form-control" id="email" placeholder="Your email..." required="">
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                            </fieldset>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <button type="submit" id="form-submit" class="button">Send Now</button>
                            </fieldset>
                        </div>
                        <div class="fb-like" data-href="https://facebook.com/dumitrualexandru.olariu/" data-width="" data-layout="button" data-action="like" data-size="large" data-share="true"></div>
                        @csrf
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Additional Scripts -->
<script src="assets/js/owl.js"></script>
<script src="assets/js/accordations.js"></script>
<script src="assets/js/main.js"></script>

<script type="text/javascript">

    $(document).ready(function() {

        // navigation click actions
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });

    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    /*function getMyPics(){

        fetch("./post").then(function(response) {
            console.log(response);
            response.text().then(function (res){
                let posts=JSON.parse(res);
                console.log(posts);
                var galerie=document.getElementById('galerie');
                for (let i=0;i<posts.length;i++){
                    console.log(posts[i]);
                    var elem=document.createElement("div");
                    elem.classList.add("col-md-12");

                   var elementfi=document.createElement("div")
                       elementfi.classList.add("featured-item");

                   var a=document.createElement("a");
                    a.href = "./post/"+posts[i].id;


                    var img=document.createElement("img");
                    img.src="./storage/"+posts[i].url;
                    img.alt="";

                    var dwn_cnt=document.createElement("div")
                        dwn_cnt.classList.add("down-content");

                    var h4=document.createElement("H4");
                    var t4 = document.createTextNode(posts[i].title);
                    h4.appendChild(t4);
                    var h6=document.createElement("H6");
                    var t6 = document.createTextNode(posts[i].description);
                    h4.appendChild(t6);

                    dwn_cnt.appendChild(h4)
                    dwn_cnt.appendChild(h6)
                    a.appendChild(img);
                    elementfi.appendChild(a);
                    elementfi.appendChild(dwn_cnt);
                    elem.appendChild(elementfi)
                    galerie.appendChild(elem);
                    console.log(elem);
                }
            })
        });
    }*/
</script>
</div>
</body>

</html>

