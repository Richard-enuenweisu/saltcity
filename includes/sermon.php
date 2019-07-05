<?php
    $sermon_query = $pdo->query("SELECT * FROM sermontbl ORDER BY id DESC LIMIT 4");
?>    

    <div class="home-sermon-holder pusher">
      <div class="container">
        <div class="row home-header-flex">
          <div class="col-md-8 pusher">
              <h1>Get Latest Sermons</h1>
                <p>
                  Week in, week out, we are totally sold out to seeking the face of God for his seasonal counsel for his church to equip you. We hope that these sermons help you growth.
                </p>
                <a href="sermon.php" class="btn btn-md btn-custom btn-pinky"> Learn More</a>
          </div>        
        </div>
        <div class="row">
          <?php while($sermon = $sermon_query->fetch(PDO::FETCH_ASSOC)) : ?>
            <div class="col-sm-6 col-md-3">
              <div class="grid">
                <figure class="effect-lily">
                  <img src="<?=$sermon['image']?>" alt="<?=$sermon['image']?>">
                  <!-- <img src="images/16.jpg" alt="img12"/> -->
                  <figcaption>
                    <div>                    
                      <p><a href="sermons-view.php?title=<?=$sermon['title']?>" class="btn btn-md btn-custom btn-blacky">Get Sermon</a></p>
                    </div>
                  </figcaption>                    
                </figure> 
              </div>
            </div>             
          <?php endwhile;?>          
                               
        </div>       
      </div>      
    </div>