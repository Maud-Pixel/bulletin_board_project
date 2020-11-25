<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="board_wrap">

  <!--NAV LIST-->
  <div class="nav_list">
    <i class="fas fa-home" href="#"></i>
    <!--include nav list-->
  </div>
  <!-- END OF NAV LIST-->

  <div class="board_inner">
    <!--TOPIC TITLE-->
    <div class="topic_title">
      <h2><strong>Topic Icon Demos</strong></h2>
      <!--include topic title-->
    </div>
    <!-- END OF TOPIC TITLE-->

    <div class="rules_wrap">
      <a href="#">Forum rules</a>
    </div>

    <div class="action">
    
      <div id="topic_new">
        <span>New topic</span>
        <i class="fas fa-pencil-alt"></i>
        <!-- include topic new-->
      </div>
    
      <div id="topic_search">
        <div id="search_holder">
          <span>Search this forum...</span>
        </div>
    
        <div id="search_button">
          <i class="fas fa-search"></i>
        </div>
    
        <div id="search_option">
          <i class="fas fa-cog"></i>
        </div>
        <!-- include search php-->
      </div>
    
      <div id="topic_info">
        <span>12 topics • Page 1 of 1</span>
        <!--include topic info, delete p-->
      </div>
    </div>
    <!--END Action-->

    <div class="annonce">
      <div class="category_top">
        <div class="category_title">
          <span>Announcements</span>
        </div>
        
        <div class="info_column">
          <i class="fas fa-comments" href="#"></i>
          <i class="fas fa-eye" href="#"></i>
          <i class="far fa-clock" href="#"></i>
        </div>
      </div>

      <div class="post">
        <div class="post_bottom_left">
          <i class="fas fa-bullhorn"></i>
          <div class="post_bottom_left_info">
            <span>This is a global announcement</span>
            <span>by <span class="author"><strong>Carla</strong></span> >> in Unread Forum</span>
          </div>
        </div>

        <div class="post_bottom_right">

          <div class="post_bottom_right_info">
            <i class="fas fa-bullhorn"></i>
            <span>682</span>
            <span>3000</span>
          </div>

          <div class="post_bottom_right_author">
            <span>By <span class="author"><strong>Carla</strong></span><i class="fas fa-exeternal-link-square-alt"></i></span>
            <span>Sun Oct 09, 2016 5:58 pm</span>
          </div>
        </div>
      </div>

    </div>
    <!--END Annonce-->

    <div class="topic_posts">
      <div class="category_top">
          <div class="category_title">
            <span>Topics</span>
          </div>
        
          <div class="info_column">
            <i class="fas fa-comments" href="#"></i>
            <i class="fas fa-eye" href="#"></i>
            <i class="far fa-clock" href="#"></i>
          </div>
      </div>


      <div class="posts_wrap">
        <div class="post">
          <!--EXEMPLE, il faut créer des posts et include post php-->
          <div class="post_bottom_left">
            <i class="fas fa-bullhorn"></i>
            <!--include post icon status, enlever i-->
            <div class="post_bottom_left_info">
              <span>Topic Unread</span>
              <!--include post title, enlever p-->
              <span>by <span class="author"><strong>Clafoutis</strong></span></span>
              <!--include post author, enlever p-->
            </div>
          </div>
          <div class="post_bottom_right">
            <div class="post_bottom_right_info">
              <span>100</span>
              <!--include post messages number, enlever p-->
              <span>400</span>
              <!--include post views, enlever p-->
            </div>

            <div class="post_bottom_right_author">
              <span>By <span class="author"><strong>Clafoutis</strong></span><i class="fas fa-exeternal-link-square-alt"></i></span>
              <!--post author php, enlever p-->
              <span>Sun Oct 09, 2016 5:58 pm</span> <!-- post date, - p  -->
            </div>
          </div>
          

        </div>


      </div>

    </div>
    <!--END Topic Posts-->
  </div>
  <!--END Board Iner-->

  <div class="action_bottom">
  
    <div id="topic_new">
      <span>New topic</span>
      <i class="fas fa-pencil-alt"></i>
      <!-- include topic new-->
    </div>
  
    <div class="topic_sort">
      <i class="fas fa-sort-amount-down-alt"></i>
      <i class="fas fa-sort-down"></i>
    </div>
  
    <div id="topic_info">
      <p>12 topics • Page 1 of 1</p>
      <!--include topic info, delete p-->
    </div>
  
  
  </div>
  <!--END Action-->
  
  
  <div class="board_bottom">
  
    <div class="home_return">
      <i class="fas fa-home"></i>
      <span>Return to Board Index</span>
    </div>
  
    <div class="jump">
  
      <div class="jump_text">
        <span>Jump to</span>
      </div>
  
      <div class="jump_list">
        <i class="fas fa-sort-down" href="#"></i>
      </div>
    </div>
  
  </div>
  <!--END Board Bottom-->
</div>
<!--END Board Wrap-->
</body>
</html>