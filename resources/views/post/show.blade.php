
    {{-- 
      <a href="{{ url('donate/banks') }}" class="btn btn-warning">Get all Banks</a>
      <a href="{{ url('donate/token') }}" class="btn btn-warning">Create Access Token</a>
 --}}

<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>TITLE</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">


  <!-- Font -->

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


  <!-- Stylesheets -->

  <link href="{{ asset('bona') }}/common-css/bootstrap.css" rel="stylesheet">

  <link href="{{ asset('bona') }}/common-css/ionicons.css" rel="stylesheet">


  <link href="{{ asset('bona') }}/single-post-2/css/styles.css" rel="stylesheet">

  <link href="{{ asset('bona') }}/single-post-2/css/responsive.css" rel="stylesheet">

</head>
<body >

  <header>
    <div class="container-fluid position-relative no-side-padding">

      <a href="#" class="logo"><img src="{{ asset('bona') }}/images/logo.png" alt="Logo Image"></a>

      <div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

      <ul class="main-menu visible-on-click" id="main-menu">
        <li><a href="#">Home</a></li>
        <li><a href="#">Categories</a></li>
        <li><a href="#">Features</a></li>
      </ul><!-- main-menu -->

      <div class="src-area">
        <form>
          <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
          <input class="src-input" type="text" placeholder="Type of search">
        </form>
      </div>

    </div><!-- conatiner -->
  </header>

  <div class="slider">

    @if ($flash = session("success"))
      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
          {{ $flash }}<br>
          @if ($msg = session("message"))
            <strong>{{ $message }}</strong>
          @endif
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
    @endif

    @if ($flash = session("error"))
      <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
          {{ $flash }}<br>
          @if ($msg = session("message"))
            <strong>{{ $msg }}</strong>
          @endif
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
    @endif

  </div><!-- slider -->

  <section class="post-area">
    <div class="container">

      <div class="row">

        <div class="col-lg-1 col-md-0"></div>
        <div class="col-lg-10 col-md-12">

          <div class="main-post">

            <div class="post-top-area">

              <h5 class="pre-title">{{ ucfirst($post->category->name) }}</h5>

              <h3 class="title"><a href="#"><b>{{ $post->title }}</b></a></h3>

              <div class="post-info">
                <div class="left-area">
                  <a class="avatar" href="#"><img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($post->user->email))) }}" alt="Profile Image"></a>
                </div>

                <div class="middle-area">
                  <a class="name" href="#"><b>{{ $post->user->first_name }} {{ $post->user->last_name }}</b></a>
                  <h6 class="date">on {{ $post->created_at->toFormattedDateString() }}</h6>
                </div>
              </div><!-- post-info -->

              <p class="para">{{ $post->content }}</p>

            </div><!-- post-top-area -->

            {{-- <div class="post-image"><img src="{{ asset('bona') }}/images/blog-1-1000x600.jpg" alt="Blog Image"></div> --}}

            <div class="post-bottom-area">

              <div class="post-icons-area">
                <ul class="post-icons">
                  <li><a href="#"><i class="ion-heart"></i>57</a></li>
                  <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                  <li><a href="#"><i class="ion-eye"></i>138</a></li>
                </ul>

                <ul class="icons">
                  <li>SHARE : </li>
                  <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                  <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                  <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                </ul>
              </div>

              <div class="post-footer post-info">
                <div class="text-center">
                  {{-- <a href="" class="btn btn-info">Donate</a> --}}
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#donate">
                    Donate
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="donate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                      <form method="POST" action="{{ url('category') }}/{{ $post->category->slug }}/{{ $post->slug }}/donate">
                        @csrf()
                        <div class="modal-header">
                          <h5 class="modal-title text-center" id="exampleModalLabel">Donate Now</h5>
                        </div>
                        <div class="modal-body">

                          <input type="text" name="card_no" value="5369020000295289">   <br>
                          <input type="text" name="cvv" value="991">   <br>
                          <input type="text" name="expiry_year" value="2020">   <br>
                          <input type="text" name="expiry_month" value="08">   <br>
                          <input type="number" name="amount" value="500">   <br>


                          <input type="hidden" name="fee" value="10">   <br>
                          <input type="hidden" name="redirecturl" value="{{ url('category') }}/{{ $post->category->slug }}/{{ $post->slug }}/donated">   <br>
                          
                        </div>
                        <div class="modal-footer">
                          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                          <button type="submit" class="btn btn-success">Continue</button>
                        </div>
                        
                      </form>
                      </div>
                    </div>
                  </div>




                </div>
              </div><!-- post-info -->

            </div><!-- post-bottom-area -->

          </div><!-- main-post -->
        </div><!-- col-lg-8 col-md-12 -->
      </div><!-- row -->
    </div><!-- container -->
  </section><!-- post-area -->


  <section class="recomended-area section">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="single-post post-style-1">

              <div class="blog-image"><img src="{{ asset('bona') }}/images/alex-lambley-205711.jpg" alt="Blog Image"></div>

              <a class="avatar" href="#"><img src="{{ asset('bona') }}/images/icons8-team-355979.jpg" alt="Profile Image"></a>

              <div class="blog-info">

                <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                Concepts in Physics?</b></a></h4>

                <ul class="post-footer">
                  <li><a href="#"><i class="ion-heart"></i>57</a></li>
                  <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                  <li><a href="#"><i class="ion-eye"></i>138</a></li>
                </ul>

              </div><!-- blog-info -->
            </div><!-- single-post -->
          </div><!-- card -->
        </div><!-- col-md-6 col-sm-12 -->

        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="single-post post-style-1">

              <div class="blog-image"><img src="{{ asset('bona') }}/images/caroline-veronez-165944.jpg" alt="Blog Image"></div>

              <a class="avatar" href="#"><img src="{{ asset('bona') }}/images/icons8-team-355979.jpg" alt="Profile Image"></a>

              <div class="blog-info">
                <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                  Concepts in Physics?</b></a></h4>

                <ul class="post-footer">
                  <li><a href="#"><i class="ion-heart"></i>57</a></li>
                  <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                  <li><a href="#"><i class="ion-eye"></i>138</a></li>
                </ul>
              </div><!-- blog-info -->

            </div><!-- single-post -->

          </div><!-- card -->
        </div><!-- col-md-6 col-sm-12 -->

        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="single-post post-style-1">

              <div class="blog-image"><img src="{{ asset('bona') }}/images/marion-michele-330691.jpg" alt="Blog Image"></div>

              <a class="avatar" href="#"><img src="{{ asset('bona') }}/images/icons8-team-355979.jpg" alt="Profile Image"></a>

              <div class="blog-info">
                <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                  Concepts in Physics?</b></a></h4>

                <ul class="post-footer">
                  <li><a href="#"><i class="ion-heart"></i>57</a></li>
                  <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                  <li><a href="#"><i class="ion-eye"></i>138</a></li>
                </ul>
              </div><!-- blog-info -->

            </div><!-- single-post -->

          </div><!-- card -->
        </div><!-- col-md-6 col-sm-12 -->

      </div><!-- row -->

    </div><!-- container -->
  </section>

  <section class="comment-section center-text">
    <div class="container">
      <h4><b>POST COMMENT</b></h4>
      <div class="row">

        <div class="col-lg-2 col-md-0"></div>

        <div class="col-lg-8 col-md-12">
          <div class="comment-form">
            <form method="post">
              <div class="row">

                <div class="col-sm-6">
                  <input type="text" aria-required="true" name="contact-form-name" class="form-control"
                    placeholder="Enter your name" aria-invalid="true" required >
                </div><!-- col-sm-6 -->
                <div class="col-sm-6">
                  <input type="email" aria-required="true" name="contact-form-email" class="form-control"
                    placeholder="Enter your email" aria-invalid="true" required>
                </div><!-- col-sm-6 -->

                <div class="col-sm-12">
                  <textarea name="contact-form-message" rows="2" class="text-area-messge form-control"
                    placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
                </div><!-- col-sm-12 -->
                <div class="col-sm-12">
                  <button class="submit-btn" type="submit" id="form-submit"><b>POST COMMENT</b></button>
                </div><!-- col-sm-12 -->

              </div><!-- row -->
            </form>
          </div><!-- comment-form -->

          <h4><b>COMMENTS(12)</b></h4>

          <div class="commnets-area text-left">

            <div class="comment">

              <div class="post-info">

                <div class="left-area">
                  <a class="avatar" href="#"><img src="{{ asset('bona') }}/images/avatar-1-120x120.jpg" alt="Profile Image"></a>
                </div>

                <div class="middle-area">
                  <a class="name" href="#"><b>Katy Liu</b></a>
                  <h6 class="date">on Sep 29, 2017 at 9:48 am</h6>
                </div>

                <div class="right-area">
                  <h5 class="reply-btn" ><a href="#"><b>REPLY</b></a></h5>
                </div>

              </div><!-- post-info -->

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
                Ut enim ad minim veniam</p>

            </div>

            <div class="comment">
              <h5 class="reply-for">Reply for <a href="#"><b>Katy Lui</b></a></h5>

              <div class="post-info">

                <div class="left-area">
                  <a class="avatar" href="#"><img src="{{ asset('bona') }}/images/avatar-1-120x120.jpg" alt="Profile Image"></a>
                </div>

                <div class="middle-area">
                  <a class="name" href="#"><b>Katy Liu</b></a>
                  <h6 class="date">on Sep 29, 2017 at 9:48 am</h6>
                </div>

                <div class="right-area">
                  <h5 class="reply-btn" ><a href="#"><b>REPLY</b></a></h5>
                </div>

              </div><!-- post-info -->

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
                Ut enim ad minim veniam</p>

            </div>

          </div><!-- commnets-area -->

          <div class="commnets-area text-left">

            <div class="comment">

              <div class="post-info">

                <div class="left-area">
                  <a class="avatar" href="#"><img src="{{ asset('bona') }}/images/avatar-1-120x120.jpg" alt="Profile Image"></a>
                </div>

                <div class="middle-area">
                  <a class="name" href="#"><b>Katy Liu</b></a>
                  <h6 class="date">on Sep 29, 2017 at 9:48 am</h6>
                </div>

                <div class="right-area">
                  <h5 class="reply-btn" ><a href="#"><b>REPLY</b></a></h5>
                </div>

              </div><!-- post-info -->

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur
                Ut enim ad minim veniam</p>

            </div>

          </div><!-- commnets-area -->

          <a class="more-comment-btn" href="#"><b>VIEW MORE COMMENTS</a>

        </div><!-- col-lg-8 col-md-12 -->

      </div><!-- row -->

    </div><!-- container -->
  </section>

  <footer>

    <div class="container">
      <div class="row">

        <div class="col-lg-4 col-md-6">
          <div class="footer-section">

            <a class="logo" href="#"><img src="{{ asset('bona') }}/images/logo.png" alt="Logo Image"></a>
            <p class="copyright">Bona @ 2017. All rights reserved.</p>
            <p class="copyright">Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
            <ul class="icons">
              <li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
              <li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
              <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
              <li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
              <li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
            </ul>

          </div><!-- footer-section -->
        </div><!-- col-lg-4 col-md-6 -->

        <div class="col-lg-4 col-md-6">
            <div class="footer-section">
            <h4 class="title"><b>CATAGORIES</b></h4>
            <ul>
              <li><a href="#">BEAUTY</a></li>
              <li><a href="#">HEALTH</a></li>
              <li><a href="#">MUSIC</a></li>
            </ul>
            <ul>
              <li><a href="#">SPORT</a></li>
              <li><a href="#">DESIGN</a></li>
              <li><a href="#">TRAVEL</a></li>
            </ul>
          </div><!-- footer-section -->
        </div><!-- col-lg-4 col-md-6 -->

        <div class="col-lg-4 col-md-6">
          <div class="footer-section">

            <h4 class="title"><b>SUBSCRIBE</b></h4>
            <div class="input-area">
              <form>
                <input class="email-input" type="text" placeholder="Enter your email">
                <button class="submit-btn" type="submit"><i class="icon ion-ios-email-outline"></i></button>
              </form>
            </div>

          </div><!-- footer-section -->
        </div><!-- col-lg-4 col-md-6 -->

      </div><!-- row -->
    </div><!-- container -->
  </footer>


  <!-- SCIPTS -->

  <script src="{{ asset('bona') }}/common-js/jquery-3.1.1.min.js"></script>

  <script src="{{ asset('bona') }}/common-js/tether.min.js"></script>

  <script src="{{ asset('bona') }}/common-js/bootstrap.js"></script>

  <script src="{{ asset('bona') }}/common-js/scripts.js"></script>

</body>
</html>
