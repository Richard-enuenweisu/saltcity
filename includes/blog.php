<?php
    $query = $pdo->query("SELECT * FROM blogtbl ORDER BY id DESC LIMIT 2");
?>    
    <div class="container">
        <div class="row home-header-flex">
          <div class="col-md-8 pusher">
              <h1>Recent blog posts</h1>
                <p>
                  Here you can find clarity for important subjects about your faith, personal questions, encouragements and instructions. We hope these articles help you grow. 
                </p>
                <a href="" class="btn btn-md btn-custom btn-pinky">Learn More</a>
          </div>        
        </div>
        <div class="row" style="margin-bottom: 70px;">
      <?php while($blog = $query->fetch(PDO::FETCH_ASSOC)) : 
        
        $post_date = strtotime( $blog['post_time'] );
        $mydate = date('l jS F Y', $post_date );
        ?>
        <div class="col-sm-6 col-md-6">
          <div class="grid">
            <a href="blog-view.php?title=<?=$blog['title']?>">
              <figure class="effect-zoe">
                <img src="<?=$blog['image']?>" alt="<?=$blog['image']?>"/>
                <figcaption>
                  <div>
                    <span class="small"><?=$blog['posted_by']?> • <?=$mydate?></span>
                  </div>
                  <h5 class="h5"><?=$blog['title']?></h5>
                  <div class="description"><?=substr($blog['description'], 0, 89).'...'; ?></div>
                </figcaption>     
              </figure>
            </a>            
          </div>
        </div>            
      <?php endwhile;?>             
        </div>        
    </div>
  </div>
